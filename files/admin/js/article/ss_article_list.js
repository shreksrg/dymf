$(function(){
    var _$article_list_table = $("#ss_article_list_table");
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
            title: '教言ID',
            field: 'article_id',
            width: 50,
            resizable: false,
            sortable: true
        }]],
        columns: [[{
            title: '标题',
            field: 'article_title',
            width: 140,
            sortable: true
        },{
            title: '添加时间',
            field: 'raw_add_time',
            width: 140,
            sortable: true
        }, {
            title: '修改时间',
            field: 'raw_update_time',
            width: 140,
            sortable: true
        }, {
            title: '是否当前显示',
            field: 'set_top',
            width: 140,
            sortable: true,
            formatter: function(v){
                if (v * 1 == 1) {
                    return '<span style="color:red">显示</span>';
                }
                else {
                    return '否';
                }
            }
        }]],
        toolbar: [{
            text: '添加教言',
            iconCls: 'icon-add',
            handler: _datagrid_add
        }, {
            text: '修改教言',
            iconCls: 'icon-edit',
            handler: _datagrid_edit
        }]
    };
    _$article_list_table.datagrid(_datagrid_config);
    
    /**
     * 添加文章
     */
    function _datagrid_add(){
        window.location.href = "main.php?act=admin_article&st=ss_article_add";
    }
    
    function _datagrid_edit(){
        var _rows = _$article_list_table.datagrid("getSelections");
        if (_rows.length == 0) {
            alert("请至少选择一条记录！");
            return false;
        }
        window.location.href = "main.php?act=admin_article&st=ss_article_add&id=" + _rows[0].article_id;
    }
    
})


