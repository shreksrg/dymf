$(function() {
	var _$part_list_table = $("#course_list_table");
	var p_id=$("#p_id").val();
	var show=$("#p_show").val();
	var _datagrid_config = {
		url : "?act=admin_course&st=course_list&id="+p_id+"&show="+show+"&api=json",
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
		frozenColumns : [[/*{
		 field: 'ck',
		 checkbox: true
		 },*/
		{
			title : '课程ID',
			field : 'id',
			width : 55,
			resizable : false,
			sortable : true
		}]],
		columns : [[{
			title : '课程名称',
			field : 'course_title',
			width : 300,
			resizable : false,
			sortable : true
		},{
			title : '课程类型',
			field : 'category',
			width : 200,
			resizable : false,
			sortable : true
		},{
			title : '所属学期',
			field : 'semester',
			width : 200,
			resizable : false,
			sortable : true
		},{
			title : '所属班级',
			field : 'class',
			width : 200,
			resizable : false,
			sortable : true
		}]],
		toolbar : [{
			text : '修改课程',
			iconCls : 'icon-edit',
			handler : _datagrid_edit
		}, {
			text : '添加课程',
			iconCls : 'icon-add',
			handler : _datagrid_add
		},{
			text : '删除课程',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		}]
	};
	_$part_list_table.datagrid(_datagrid_config);

	/**
	 * 添加课程
	 */
	function _datagrid_add() {
		if($("#p_id").val()==7){
			window.location.href = "main.php?act=admin_course&st=show_course_info&p_id="+$("#p_id").val()+"&show="+show;
		}else{
			window.location.href = "main.php?act=admin_course&st=class_list_page&p_id=6&num=1&show="+show;
		}
		
	}
	/**
	 * 修改课程
	 */
	function _datagrid_edit() {
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_course&st=show_course_info&id="+ _rows[0].id+"&p_id="+ _rows[0].part_id;
	}
		function _datagrid_cancel(){
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除"+_rows[0].course_title))
		{
			window.location.href = "main.php?act=admin_course&st=cancel_course&id="+ _rows[0].id+"&p_id="+$("#p_id").val()+"&num=2";
		}
		
	}
})