$(function () {
    // img 预加载
    var _img1 = document.createElement('img');
    _img1.src = './files/images/index_r5_c5.png';
    // 上师教言
    $("#ssjy_next_action").click(ssjy_next_action);

    //    $("#passwordchange").click(function(){
    //        var str = window.prompt("请输入新密码", "password");
    //        window.location.href = '?act=index&st=changePassword&np=' + str;
    //        return false;
    //    })
    // 注册用户
    $("#index_login .login_class").click(function () {
        window.location.href = '?act=user&st=user_reg';
    })

    $("a#reg_action").click(function () {
        var _username = $("#user_name").val();
        if ($.trim(_username).length < 1) {
            alert('请输入用户名！');
            return false;
        }
        var _password = $("#user_password").val();
        if ($.trim(_password).length < 1) {
            alert('请输入密码！');
            return false;
        }
        var _fullname = $("#user_fullname").val()
        if ($.trim(_fullname).length < 1) {
            alert('请输入姓名！');
            return false;
        }
        var _href = '?act=index&st=reginUser&un=' + _username + '&ps=' + _password + '&fn=' + _fullname;
        window.location.href = _href;
        return false;
    });

    // 修改密码
    $("#repass_action").click(function () {
        var _userNewPassWord = $.trim($("#user_repassword").val());
        if (_userNewPassWord.length < 1) {
            alert('新密码不能为空！');
            return false;
        }
        window.location.href = '?act=index&st=changePassword&np=' + _userNewPassWord;
        return false;
    })

    $("a#regin_action").fancybox({
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'overlayShow': 0,
        'padding': 1,
        'opacity': 1
    });

    $("#passwordchange_pre").fancybox({
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'overlayShow': 0,
        'padding': 1,
        'opacity': 1
    });

    //    $("#kcap_list li").hover(function(){
    //        $(this).toggleClass('onselect');
    //        $('a', this).css('color', '#6E4525');
    //    }, function(){
    //        $(this).toggleClass('onselect');
    //        $('a', this).css('color', '#B4A192');
    //    })

    $("#yz_action").click(function () {
        var _timestamp = (new Date()).valueOf();
        $("#yz_img").attr("src", "./yz.php?" + _timestamp);
    })
    // 上师教言 fn
    function ssjy_next_action(e) {
        if ($(this).attr('sync') * 1 == 1)
            return false;
        $ajaxURL = "?act=api_index&st=showSS";
        $(this).attr("sync", 1);
        var _ajaxData = {
            id: $(this).attr("actionid")
        };
        $.ajax({
            type: "POST",
            url: $ajaxURL,
            dataType: "json",
            data: _ajaxData,
            success: function (json) {
                $("#ssjy_next_action").attr('actionid', json.id);
                $("#ssjy_con").html(json.msg);
                $("#ssjy_next_action").attr("sync", 0);
            }
        });
    }


    // 查看课程
    $("#kcap_list li a").click(function () {
        $("#kcap_list li a").parent().removeClass('onselect');
        $("#kcap_list li a").css('color', '#B4A192');
        $(this).parent().toggleClass('onselect');
        $(this).css('color', '#6E4525');
        var class_id = class_id ? class_id : $(this).attr("class_id");
        var _ajaxData = {
            class_id: class_id
        };
        $.ajax({
            type: "POST",
            url: "?act=api_index&st=show_course",
            dataType: "json",
            data: _ajaxData,
            success: function (json) {
                $('#table_items tbody tr').remove();
                var _imgDom = '<img src="files/images/indxe_r2_c2.jpg" />';
                for (var i = 0; i < json.length; i++) {
                    $("#table_items").append("<tr class='order-bd'>" + "<td  class=\"col_1\" align=\"center\">" + json[i].course_date + "</td>" + "<td class=\"col_2\" align=\"center\"><a class='default1 content_icon_2' href='" + json[i].open_link + "'>" + json[i].course_title + "</a></td>" + "<td class=\"col_3\" align=\"center\"><a class='default1 download_i2' href='" + json[i].video_link + "' target='_self'></a>" + "</td>" + "<td class=\"col_3\" align=\"center\"><a class='default1 download_i2' href='" + json[i].audio_link + "' target='_self'></a>" + "</td>" + "<td class=\"col_3\" align=\"center\"><a class='default1 play_icon_2' href='" + json[i].video_link + "'></a></td>" + "</tr>");
                }

            }
        });
    });

    $("#kcap_list li a").eq(1).trigger('click')


    $('[name=btn-writeCLogs]').click(function () {

        $('#winWriteCLogs').window({
            width: 600,
            height: 400,
            modal: true
        });

        $('#winWriteCLogs').show();
    })
})


/**
 * 我要学修判断是否登录提示
 * @param state 登录状态
 * @return boolean
 */

function showMessage_toLogin(obj) {
    $.get(obj.href, function (r) {
        if (parseInt(r) == 0) {
            $.messager.alert('友情提示', '您好，请先登录再提交课程学修信息!', 'warning');
        } else {
            window.location.href = obj.href;
        }
    })
    return false;
}

/**
 * 相关信息
 * @return boolean
 */

function showMessage_related(obj) {
    // return false;
    $.get(obj.href, function (r) {
        if (parseInt(r) == 0) {
            $.messager.alert('友情提示', '您好,请先登录以后查看相关内容', 'warning');
        } else {
            window.location.href = obj.href;
        }
    })
    return false;
}


var clsCode = null;  //当前选择的学修班编码

/**
 * 加载班级学修统计表单
 * @code String 学修班编码
 */
function loadCountForm() {
    var url = "/?c=learnlogs&st=ResponseForm";
    $.post(url, {'clscode': clsCode, 'stuRole': stuRole}, function (data) {
        if (data.err == 0) {
            $('#countFormer').empty().append(data['content']);
        } else {
            $.messager.alert('Warning', data['content']);
        }
    }, 'json')
}


$('button[name=btnWS]').click(function () {
    clsCode = 'ws'
    loadCountForm();
})

$('button[name=btnJT]').click(function () {
    clsCode = 'jt';
    loadCountForm();
})

$('button[name=btnJX]').click(function () {
    clsCode = 'jx';
    loadCountForm();
})


