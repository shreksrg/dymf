<?php echo $this->fetch('public/page_head.html'); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
    <fieldset>
    <legend>内容</legend>
		<div>
			申请日期：<input type="text" id="startime"  class="easyui-datebox" />&nbsp;&nbsp;查询姓名：
			<input id="name_search_input" class="easyui-searchbox" name="name_search_input"
			searcher="group_search"
			prompt="请输入查询姓名..." style="width:150px">
			</input>
		</div>        </fieldset>
		<div style="margin-top:5px;">
			<div id="stypestate" style="">
				<h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
				<div class="admin_table mb10">
					<table id="group_list_table"></table>
				</div>
			</div>
		</div>

	</div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/admin/js/group/group_list.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>