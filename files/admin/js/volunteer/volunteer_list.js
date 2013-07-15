var _$volunteer_list_table = $("#volunteer_list_table");
$(function() {
	var _datagrid_config = {
		url : "?act=admin_volunteer&st=volunteer_list&api=json&",
		height : 440,
		border : 0,
		striped : true,
		sortName : 'volunteer_id',
		remoteSort : false,
		sortOrder : "desc",
		pageSize : 20,
		pagination : true,
		singleSelect : true,
		columns : [[{
			title : 'id',
			field : 'volunteer_id',
			width : 80,
			sortable : true
		},{
			title : '姓名',
			field : 'fullname',
			width : 120,
			sortable : true
		}, {
			title : '性别',
			field : 'gender',
			width : 100,
			resizable : false,
			sortable : true
		}, {
			title : '年龄',
			field : 'agenum',
			width : 100,
			resizable : false,
			sortable : true
		}, {
			title : '文化程度',
			field : 'educational_level',
			width : 100,
			resizable : false,
			sortable : true
		}, {
			title : '皈依时间',
			field : 'convert_time',
			width : 150,
			resizable : false,
			sortable : true
		}, {
			title : '查看',
			field : '查看',
			width : 100,
			formatter : function(v, d) {
				return "<a href=\"main.php?act=admin_volunteer&st=volunteer_info_page&id="+d.volunteer_id+"\" >查看</a>";
			}
		}]],
		toolbar : [{
			text : '删除',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		}]
	};
	_$volunteer_list_table.datagrid(_datagrid_config);

	function _datagrid_cancel() {
		var _rows = _$volunteer_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除" + _rows[0].fullname + "的报名信息吗？")) {
			window.location.href = "main.php?act=admin_volunteer&st=del_volunteer_info&id=" + _rows[0].volunteer_id;
		}

	}

});
