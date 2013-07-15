$(function() {
	var _$part_list_table = $("#category_list_table");
	var p_id=$("#p_id").val();
	var show=$("#p_show").val();
	var _datagrid_config = {
		url : "?act=admin_part&st=part_list&p_id="+p_id+"&show="+show+"&status=2&api=json",
		height : 440,
		border : 0,
		striped : true,
		sortName : 'id',
		remoteSort : false,
		sortOrder : "desc",
		pageSize : 20,
		pagination : true,
		singleSelect : true,
		idField : 'id',
		columns : [[{
			title : '课程分类名称',
			field : 'part_name',
			width : 200,
			resizable : false,
			sortable : true
		}]],
		toolbar : [{
			text : '添加分类',
			iconCls : 'icon-add',
			handler : _datagrid_add
		}, {
			text : '修改分类',
			iconCls : 'icon-edit',
			handler : _datagrid_edit
		}, {
			text : '删除分类',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		},"-",  {
			text : '添加课程',
			iconCls : 'icon-redo',
			handler : _datagrid_list
		}]
	};
	_$part_list_table.datagrid(_datagrid_config);

/**
	 * 添加栏目
	 */
	function _datagrid_add() {
		
		window.location.href = "main.php?act=admin_part&st=show_category_info&p_id="+$("#p_id").val()+"&num=3";
	}
	function _datagrid_edit() {
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_part&st=show_category_info&id="+ _rows[0].id+"&p_id="+$("#p_id").val()+"&num=3";
	}
	function _datagrid_cancel(){
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除"+_rows[0].part_name))
		{
			window.location.href = "main.php?act=admin_part&st=cancel_category&id="+ _rows[0].id+"&p_id="+$("#p_id").val()+"&num=2";
		}
		
	}
	function _datagrid_list()
	{
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_course&st=show_course_info&p_id="+ _rows[0].id+"&show="+show;
	}
})