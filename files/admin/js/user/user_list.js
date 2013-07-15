$(function() {
	var _$user_list_table = $("#user_list_table");
	var _datagrid_config = {
		url : "?act=admin_user&st=get_user_list&api=json",
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
			title : '用户ID',
			field : 'user_id',
			width : 55,
			resizable : false,
			sortable : true
		}]],
		columns : [[{
			title : '用户名',
			field : 'user_name',
			width : 100,
			resizable : false,
			sortable : true
		}, {
			title : '姓名',
			field : 'user_fullname',
			width : 100,
			sortable : true
		}, {
			title : '注册时间',
			field : 'raw_add_time',
			width : 140,
			resizable : false,
			sortable : true
		}, {
			title : '是否管理员',
			field : 'admin_flag',
			width : 70,
			resizable : false,
			sortable : true,
			formatter : function(v) {
				if (v=='1') {
					return '<span style="color:red">是</span>';
				} else {
					return '否';
				}
			}
		}]],
		toolbar : [/*{
		 text: '修改',
		 iconCls: 'icon-edit',
		 handler: _datagrid_edit
		 },*/
		{
			text : '添加用戶',
			iconCls : 'icon-add',
			handler : _datagrid_add
		}, {
			text : '删除用戶',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		}]
	};
	_$user_list_table.datagrid(_datagrid_config);

	/**
	 * 添加用戶
	 */
	function _datagrid_add() {
		window.location.href = "main.php?act=admin_user&st=user_add";
	}
	
	function _datagrid_cancel(){
		var _rows = _$user_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除"+_rows[0].user_name))
		{
			window.location.href = "main.php?act=admin_user&st=cancel_user&id="+ _rows[0].user_id;
		}
		
	}
})
