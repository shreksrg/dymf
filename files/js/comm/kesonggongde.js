$(function(){
    var _apiURL = '?act=api_myclass&st=save_kesong';
    // 
    $("#kc_table button").click(function(){
        if (confirm("您确定完成了一次" + $(this).html() + "吗?")) {
            $.getJSON(_apiURL, {
                learning_type: $(this).html(),
                integral: $(this).attr('integral')
            }, function(json){
                alert(json.msg);
            });
        }
    })
    
    $("#next_table button.chizhou").click(function(){
        var _chizhou = $("#chizhou").val();
        if (_chizhou % 100 !== 0) {
            alert('请输入100的整数倍！');
            return false;
        }
        if (confirm("您确定完成了" + _chizhou + "遍" + $('#chizhou_text').val() + "吗?")) {
            $.getJSON(_apiURL, {
                learning_type: $.trim($('#chizhou_text').val()),
                integral: _chizhou * $(this).attr('integral')
            }, function(json){
                alert(json.msg);
            });
        }
    })
    
    $("#next_table button.qita").click(function(){
        var n = 0;
        var s = $.trim($('#qita_text').val()).length;
        if (s > 10) {
            alert('字数过长！请控制在10个字内，包括标点符号。');
            return false;
        }
        if (confirm("您确定进行一次" + $('#qita_text').val() + "吗?")) {
            $.getJSON(_apiURL, {
                learning_type: $.trim($('#qita_text').val()),
                integral: $(this).attr('integral')
            }, function(json){
                alert(json.msg);
            });
        }
    })
    //
    $("select").combobox({
        onSelect: function(v, t){
            $.getJSON(_apiURL, {
                is_complete: v.value,
                class_id: $("#type_id").val()
            }, function(json){
                if (json.err * 1 == 0) 
                    alert(json.msg);
            });
        }
    })
    
    $(".easyui-linkbutton").click(function(){
        var _typeCode = $(this).parent().parent().find('td').eq(0).html();
        var _integral = $(this).parent().parent().find('td').eq(1).find("input").val();
        $.getJSON(_apiURL, {
            typeCode: _typeCode,
            class_id: $("#type_id").val(),
            integral: _integral
        }, function(json){
            alert(json.msg);
        })
    })
})
