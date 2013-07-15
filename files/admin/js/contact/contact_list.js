var _$contact_list_table = $("#contact_list_table");
$(function() {
	var _datagrid_config = {
		url : "?act=admin_contact&st=contact_list&api=json&",
		height : 440,
		border : 0,
		striped : true,
		sortName : 'contact_id',
		remoteSort : false,
		sortOrder : "desc",
		pageSize : 20,
		pagination : true,
		singleSelect : true,
		idField : 'contact_id',
		frozenColumns : [[ {
			title : 'id',
			field : 'contact_id',
			width : 55,
			resizable : false,
			sortable : true
		}]],
		columns : [[{
			title : '提交时间',
			field : 'raw_add_time',
			width : 120,
			sortable : true
		},{
			title : '问题类型',
			field : 'content_type',
			width : 100,
			resizable : false,
			sortable : true
		}, {
			title : '问题内容',
			field : 'content',
			width : 1000,
			resizable : false,
			sortable : true
		}]]
	};
	_$contact_list_table.datagrid(_datagrid_config);

});

