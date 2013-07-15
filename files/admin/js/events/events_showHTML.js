$(function(){
    var _$article_list_table = $("#article_list_table");
    var _part_id = $("#part_id");
    var _dataGridURL = "?act=admin_events&st=ezuiGetList";
    var _datagrid_config = {
        url: _dataGridURL,
        height: 440,
        border: 0,
        striped: true,
        remoteSort: false,
        pageSize: 20,
        pagination: true,
        singleSelect: true,
        idField: 'event_id',
        frozenColumns: [[        /*{
         field: 'ck',
         checkbox: true
         },*/
        {
            title: '事件ID',
            field: 'event_id',
            width: 55,
            resizable: false,
            sortable: true
        }]],
        columns: [[{
            title: '事件标题',
            field: 'event_title',
            width: 200,
            resizable: false,
            sortable: true
        }, {
            title: '显示日期',
            field: 'event_datetime',
            width: 200,
            resizable: false,
            sortable: true
        }]],
        toolbar: [{
            text: '添加事件',
            iconCls: 'icon-add',
            handler: _datagrid_add
        }, {
            text: '修改事件',
            iconCls: 'icon-edit',
            handler: _datagrid_edit
        }, {
            text: '删除',
            iconCls: 'icon-cancel',
            handler: _datagrid_cancel
        }]
    };
    _$article_list_table.datagrid(_datagrid_config);
    
    /**
     * 添加文章
     */
    function _datagrid_add(){
        window.location.href = "main.php?act=admin_events&st=addHTML";
    }
    
    function _datagrid_edit(){
        var _rows = _$article_list_table.datagrid("getSelections");
        if (_rows.length == 0) {
            alert("请至少选择一条记录！");
            return false;
        }
        window.location.href = "main.php?act=admin_events&st=editHTML&id=" + _rows[0].event_id;
    }
    
    function _datagrid_cancel(){
        var _rows = _$article_list_table.datagrid("getSelections");
        if (_rows.length == 0) {
            alert("请至少选择一条记录！");
            return false;
        }
        if (confirm("你确定要删除吗？")) {
            window.location.href = "main.php?act=admin_events&st=actionDel&id=" + _rows[0].event_id;
        }
        
    }
    
})


