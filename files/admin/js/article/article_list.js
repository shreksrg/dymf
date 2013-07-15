$(function(){
    var _$article_list_table = $("#article_list_table");
    var _part_id = $("#part_id");
    var _datagrid_config = {
        url: "?act=admin_article&st=article_list&api=json&part_id=" + _part_id.val(),
        height: 440,
        border: 0,
        striped: true,
        sortName: 'article_id',
        remoteSort: false,
        sortOrder: "desc",
        pageSize: 20,
        pagination: true,
        singleSelect: true,
        idField: 'article_id',
        frozenColumns: [[        /*{
         field: 'ck',
         checkbox: true
         },*/
        {
            title: '文章ID',
            field: 'article_id',
            width: 55,
            resizable: false,
            sortable: true
        }]],
        columns: [[{
            title: '标题',
            field: 'article_title',
            width: 300,
            resizable: false,
            sortable: true
        }, {
            title: '添加时间',
            field: 'raw_add_time',
            width: 100,
            sortable: true
        }, {
            title: '修改时间',
            field: 'raw_update_time',
            width: 140,
            resizable: false,
            sortable: true
        }, {
            title: '是否显示',
            field: 'hide_flag',
            width: 70,
            resizable: false,
            sortable: true,
            formatter: function(v){
                if (v == '1') {
                    return '<span style="color:red">隐藏</span>';
                }
                else {
                    return '显示';
                }
            }
        }]],
        toolbar: [{
            text: '添加文章',
            iconCls: 'icon-add',
            handler: _datagrid_add
        }, {
            text: '修改文章',
            iconCls: 'icon-edit',
            handler: _datagrid_edit
        }, {
            text: '删除文章',
            iconCls: 'icon-cancel',
            handler: _datagrid_cancel
        }]
    };
    _$article_list_table.datagrid(_datagrid_config);
    
    /**
     * 添加文章
     */
    function _datagrid_add(){
        window.location.href = "main.php?act=admin_article&st=article_add&p_id=" + $("#part_id").val();
    }
    
    function _datagrid_edit(){
        var _rows = _$article_list_table.datagrid("getSelections");
        if (_rows.length == 0) {
            alert("请至少选择一条记录！");
            return false;
        }
        window.location.href = "main.php?act=admin_article&st=article_add&id=" + _rows[0].article_id + "&p_id=" + $("#part_id").val();
    }
    
    function _datagrid_cancel(){
		var _rows = _$article_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除【"+_rows[0].article_title+"】吗？"))
		{
			window.location.href = "main.php?act=admin_article&st=del_article&id="+ _rows[0].article_id+ "&p_id=" + $("#part_id").val();
		}
		
	}
        
})


