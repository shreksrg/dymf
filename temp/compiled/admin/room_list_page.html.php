<?php echo $this->fetch('public/page_head.html'); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
		<div style="margin-top:5px;">
			<form method="post" action="" id="websit_config">
				<div id="stypestate" style="">
					<h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
					<div class="admin_table mb10">
						<table id="room_list_table"></table>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/admin/js/room/room_list.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>