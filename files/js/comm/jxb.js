$(function(){
    var _apiURL = '?act=api_myclass&st=save_learning';
    // 
    $("button[course_id]").click(function(){
        if (confirm("您确定完成了一次吗?")) {
            $.getJSON(_apiURL, {
                type: $(this).attr("class"),
                class_id: $("#type_id").val()
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
