var _$convert_list_table = $("#convert_list_table");
$(function() {
	var _datagrid_config = {
		url : "?act=admin_convert&st=convert_list&api=json&",
		height : 440,
		border : 0,
		striped : true,
		sortName : 'article_id',
		remoteSort : false,
		sortOrder : "desc",
		pageSize : 20,
		pagination : true,
		singleSelect : true,
		idField : 'article_id',
		frozenColumns : [[{
			field : 'ck',
			checkbox : true
		}, {
			title : 'id',
			field : 'id',
			width : 55,
			resizable : false,
			sortable : true
		}]],
		columns : [[{
			title : '姓名',
			field : 'name',
			width : 100,
			resizable : false,
			sortable : true
		}, {
			title : '联系电话',
			field : 'tel',
			width : 100,
			resizable : false,
			sortable : true
		}, {
			title : '添加时间',
			field : 'add_time',
			width : 100,
			sortable : true
		}, {
			title : '状态',
			field : 'status',
			width : 70,
			resizable : false,
			sortable : true,
			formatter : function(v) {
				switch(v) {
					case "0":
						return '<span style="color:red">未处理</span>';
						break;
					case "1":
						return '已处理';
						break;
					case "2":
						return '已寄出';
						break;
				}
			}
		}]],
		toolbar : [{
			text : '处理',
			iconCls : 'icon-edit',
			handler : _datagrid_check
		}, {
			text : '删除',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		}]
	};
	_$convert_list_table.datagrid(_datagrid_config);

	function _datagrid_check() {
		var _rows = _$convert_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_convert&st=convert_info&id=" + _rows[0].id;
	}

	function _datagrid_cancel() {
		var _rows = _$convert_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除" + _rows[0].name + "的皈依信息吗？")) {
			window.location.href = "main.php?act=admin_convert&st=del_convert_info&id=" + _rows[0].id;
		}

	}

});

/* 查询触发 */
	function convert_search(v, n) {
		v = $.trim(v);
		var _queryParams = {};
		//    if ($.trim(v) == "") {
		//        alert("请出入查询内容！");
		//        return false;
		//    }
		_queryParams[n] = v;
		_queryParams.startime = $("#startime").datebox("getValue");
		_$convert_list_table.datagrid({
			queryParams : _queryParams
		});

	}