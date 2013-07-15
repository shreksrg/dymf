$(function() {
	var _$part_list_table = $("#room_list_table");
	var p_id = $("#p_id").val();
	var _datagrid_config = {
		url : "?act=admin_room&st=room_list&api=json",
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
			title : '房间ID',
			field : 'id',
			width : 55,
			resizable : false,
			sortable : true
		}]],
		columns : [[{
			title : '房间名称',
			field : 'room_name',
			width : 200,
			resizable : false,
			sortable : true
		}]],
		toolbar : [{
			text : '修改房间',
			iconCls : 'icon-edit',
			handler : _datagrid_edit
		}, {
			text : '添加房间',
			iconCls : 'icon-add',
			handler : _datagrid_add
		}, {
			text : '删除房间',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		}]
	};
	_$part_list_table.datagrid(_datagrid_config);

	/**
	 * 添加栏目
	 */
	function _datagrid_add() {

		window.location.href = "main.php?act=admin_room&st=show_room_info";
	}

	function _datagrid_edit() {
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_room&st=show_room_info&id=" + _rows[0].id;
	}

	function _datagrid_cancel() {
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除" + _rows[0].room_name)) {
			window.location.href = "main.php?act=admin_room&st=cancel_room&id=" + _rows[0].id;
		}
	}

})