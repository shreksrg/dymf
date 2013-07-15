$(function() {
	var _$part_list_table = $("#part_list_table");
	var p_id = $("#p_id").val();
	var _datagrid_config = {
		url : "?act=admin_part&st=part_list&p_id=" + p_id + "&status=0&api=json",
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
			title : '栏目名称',
			field : 'part_name',
			width : 100,
			resizable : false,
			sortable : true,
			formatter : function(v, d) {
				return "<a href=\"main.php?act=admin_part&st=part_list_page&p_id=" + d.id + "&num=" + (parseInt(d.class_num) + 1) + "\" >" + v + "</a>"
			}
		}]],
		toolbar : [{
			text : '修改栏目',
			iconCls : 'icon-edit',
			handler : _datagrid_edit
		}, {
			text : '添加栏目',
			iconCls : 'icon-add',
			handler : _datagrid_add
		}, {
			text : '删除栏目',
			iconCls : 'icon-cancel',
			handler : _datagrid_cancel
		}]
	};
	_$part_list_table.datagrid(_datagrid_config);

	/**
	 * 添加栏目
	 */
	function _datagrid_add() {

		window.location.href = "main.php?act=admin_part&st=show_part_info&p_id=" + $("#p_id").val() + "&num=" + $("#num").val();
	}

	function _datagrid_edit() {
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_part&st=show_part_info&id=" + _rows[0].id + "&num=" + $("#num").val();
	}

	function _datagrid_list() {
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		window.location.href = "main.php?act=admin_article&st=article_list_page&id=" + _rows[0].id + "&num=" + $("#num").val();
	}

	function _datagrid_cancel() {
		var _rows = _$part_list_table.datagrid("getSelections");
		if(_rows.length == 0) {
			alert("请至少选择一条记录！");
			return false;
		}
		if(confirm("你确定要删除" + _rows[0].part_name)) {
			window.location.href = "main.php?act=admin_part&st=cancel_part&id=" + _rows[0].id + "&p_id=" + $("#p_id").val() + "&num=" + $("#num").val();
		}
	}

})