var _$group_list_table = $("#group_list_table");
$(function() {
	var _datagrid_config = {
		url : "?act=admin_group&st=group_list&api=json",
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
		frozenColumns : [[
		{
			title : 'ID',
			field : 'ss_group_id',
			width : 55,
			resizable : false,
			sortable : true
		}]],
		columns : [[{
			title : '申请人姓名',
			field : 'userfullname',
			width : 100,
			resizable : false,
			sortable : true,
			formatter : function(v, d) {
				return "<a href=\"../index.php?act=group&st=showHTML&id="+d.ss_group_id+"\" target=\"_blank\" >" + d.userfullname + "</a>";
			}
		},{
			title : '性别',
			field : 'getman',
			width : 50,
			resizable : false,
			sortable : true,
			formatter : function(v, d) {
				return d.getman==1?"男":"女";
			}
		},{
			title : '职业',
			field : 'getprofession',
			width : 150,
			resizable : false,
			sortable : true
		},{
			title : '电话',
			field : 'gettel1',
			width : 100,
			resizable : false,
			sortable : true
		},{
			title : '申请加入地址',
			field : 'joinsheng',
			width : 200,
			resizable : false,
			sortable : true,
			formatter : function(v, d) {
				return  d.joinsheng+"&nbsp"+ d.joinshi+"&nbsp"+d.joinqu;
			}
		}]]
	};
	_$group_list_table.datagrid(_datagrid_config);

});
/* 查询触发 */
	function group_search(v, n) {
		v = $.trim(v);
		var _queryParams = {};
		_queryParams[n] = v;
		_queryParams.startime = $("#startime").datebox("getValue");
		_$group_list_table.datagrid({
			queryParams : _queryParams
		});

	}