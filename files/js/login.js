var domain = "http://localhost/dymf";

function popLogin() {

    //$('#winLogin').window('open');
    $('#winLogin').window({
        title: '用户注册',
        width: 380,
        height: 360,
        top: ($(document).height()) * 0.7,
        left: ($(window).width() - 450) * 0.5,
        shadow: true,
        modal: true,

        closed: true,
        minimizable: false,
        maximizable: false,
        collapsible: false
    });

    $('#winLogin').window('open')

}


/**
 * 提交密码修改
 */

function submitModifyPwd() {
    $('#frmModifyPwd').form('submit', {
        success: function (r) {
            var msg;
            var r = parseInt(r);
            if (r == 1) {
                msg = '修改密码成功';
                $('#winLogin').window('close')

            } else {
                msg = '修改密码失败';
            }
            $.messager.alert('注册提示', msg, 'info');
        }
    });
}


function submitRegister() {
    // $('#frmRegister').form('submit');
    $('#frmRegister').form('submit', {
        success: function (r) {
            var msg;
            var r = parseInt(r);
            if (r == 1) {
                msg = '注册成功';
                $('#winLogin').window('close')

            } else {
                msg = '用户名已经存在';
            }
            $.messager.alert('注册提示', msg, 'info');
        }
    });
}

$.extend($.fn.validatebox.defaults.rules, {
    /*必须和某个字段相等*/
    equalTo: {
        validator: function (value, param) {
            return $(param[0]).val() == value;
        },
        message: '密码不一致'
    },
    phone: {
        validator: function (value, param) {
            return /^(13|15|18)\d{9}$/i.test(value);
            // return /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/i.test(value);
        },
        message: '号码格式不正确'
    },
    chkUsername: {
        validator: function (value, param) {
            value = $('#' + param[1]).attr('value');
            $('#' + param[1]).load(param[0] + "?" + param[2] + "=" + value,
                function (responseText, textStatus, XMLHttpRequest) {
                    if (responseText) //后台返回true或者false
                        return true;
                });
            return false;
        },
        message: '用户名已存在'
    }
});


/**
 * 修改密码弹出层
 */

function modifyPassword() {
    $('#winModifyPwd').window({
        title: '修改密码',
        width: 320,
        height: 210,
        top: ($(document).height()) * 0.7,
        left: ($(window).width() - 450) * 0.5,
        shadow: true,
        modal: true,

        closed: true,
        minimizable: false,
        maximizable: false,
        collapsible: false
    });

    $('#winModifyPwd').window('open')
}


/**
 * 用户登录
 */

function userLogin() {
    $('#frmUserLogin').form('submit', {
        success: function (r) {

            var msg;
            var r = strToJson(r);
            var type = $.type(r)

            if (type === 'array') {
                msg = '登录成功';
                // $('#winLogin').window('close')
            } else if (type === 'object') {
                if (r.fullname) {
                    // msg = '登录成功';
                    window.location.reload();
                    return false;
                    $('#frmUserLogin').hide();
                    $('#login_region').load(domain + '/files/template/logininfo.html', function () {
                        var li = $('#loginInfo li:first');
                        var str = li.html();
                        li.html(str.replace('fullName', r.fullname))
                        $.messager.alert('提示', '登录成功', 'info');
                    })
                    return true;
                } else {
                    msg = r.errMsg;
                }
            } else {
                msg = '系统错误，请联系管理员'
            }
            $.messager.alert('注册提示', msg, 'info');
        }
    });
}

/**
 * 字符转换为json
 */

function strToJson(str) {
    var json = (new Function("return " + str))();
    return json;
}


/**
 * 用户退出登录
 */

function userLogout(obj) {
    $.post(obj.href, function (r) {
        if (r) {
            window.location.reload();
            return false;
            $('#loginInfo').remove();
            $('#login_region').load(domain + '/files/template/loginfrm.html', function () {
                $.messager.alert('提示', '注销成功', 'info');
            })
        }
    })
}


function getUserInfo(obj) {

    var win = $('#winLogin').clone(true);

    win.window({
        title: '修改个人信息',
        width: 380,
        height: 320,
        top: ($(document).height()) * 0.7,
        left: ($(window).width() - 450) * 0.5,
        shadow: true,
        modal: true,

        closed: true,
        minimizable: false,
        maximizable: false,
        collapsible: false
    });

    win.window('refresh', obj.href);
    win.window('open')

}


/**
 * 提交并保存用户信息编辑
 */

function submitEditProfile() {
    $('#frmProfile').form('submit', {
        success: function (r) {
            console.log(r);
            var msg;
            var r = strToJson(r);
            var type = $.type(r)

            if (type === 'object') {
                var err = parseInt(r.err)
                if (err == 0) {
                    msg = '修改成功';
                    $.messager.alert('提示', msg, 'info');
                    $('#winLogin').window('close');
                } else {
                    $.messager.alert('提示', '修改失败', 'info');
                }
            }
        }
    });
}
