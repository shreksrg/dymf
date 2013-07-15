$(function() {
	var _$question_list_table = $("#question_list_table");
	var p_id = $("#p_id").val();
	var _datagrid_config = {
		url : "?act=admin_question&st=question_list&api=json",
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
			title : '栏目ID',
			field : 'id',
			width : 55,
			resizable : false,
			sortable : true
		}]],
		columns : [[{
			title : '问题',
			field : 'ask',
			width : 500,
			resizable : false,
			sortable : true
		},{
			title : '状态',
			field : 'status',
			width : 100,
			resizable : false,
			sortable : true,
			formatter : function(v) {
				return v=="0"?"未回答":"已回答";
			}
		}]],
		toolbar : [{
			text : '回答问题',
			iconCls : 'icon-edit',
			handler : _datagrid_edit
		}, {
			text : '删除问题',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		},"-", {
			text : '已回答问题',
			iconCls : 'icon-search',
			handler : _datagrid_status_1
		}, {
			text : '未回答问题',
			iconCls : 'icon-search',
			handler : _datagrid_status_0
		}]
	};
	_$question_list_table.datagrid(_datagrid_config);


	function _datagrid_edit() {
		var _rows = _$question_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_question&st=show_question_info&id=" + _rows[0].id ;
	}


	function _datagrid_cancel() {
		var _rows = _$question_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除" + _rows[0].ask)) {
			window.location.href = "main.php?act=admin_question&st=cancel_question&id=" + _rows[0].id ;
		}
	}
	
	function _datagrid_status_0()
	{
		var _queryParams={};
		_queryParams.status=0;
		_$question_list_table.datagrid({queryParams:_queryParams});
	}
	
	function _datagrid_status_1()
	{
		var _queryParams={};
		_queryParams.status=1;
		_$question_list_table.datagrid({queryParams:_queryParams});
	}
	

})