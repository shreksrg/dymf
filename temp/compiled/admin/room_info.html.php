<?php echo $this->fetch('public/page_head.html'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/xheditor/xheditor-1.1.14-zh-cn.min.js')); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
		<div style="margin-top:5px;">
			<form method="post" action="?act=admin_room&st=edit_room_info" enctype="multipart/form-data" id="websit_config">
				<div id="stypestate" style="">
					<h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
					<div class="admin_table mb10">
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr class="tr1 vt">
								<td class="td1">房间名称</td>
								<td class="td2">
								<input name="room_name"  value="<?php echo $this->_var['info']['room_name']; ?>" class="easyui-validatebox input_wb input" id="room_name" maxlength="20" data-options="required:true,validType:'length[1,20]'" />
								<div class="help_a" style="display: block;">
									房间名称标题，必填
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">房间内容</td>
								<td class="td2">								
								<textarea name="room_content" id="room_content" style="width:700px; height:300px;"><?php echo $this->_var['info']['room_content']; ?></textarea></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">房间URL地址</td>
								<td class="td2">
								<input type="text" name="room_url" value="<?php echo $this->_var['info']['room_url']; ?>" style="width:700px;"/>								
								</td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">房间图片</td>
								<td class="td2">
								<input type="hidden"  name="c_id" value="<?php echo $this->_var['info']['id']; ?>"/>
								<input type="text" value="<?php echo $this->_var['info']['room_img']; ?>" name="img"  style="width:700px;" /><br/>
								<input type="file" id="room_img" name="room_img" size="80" /></td>
							</tr>
							
						</table>
					</div>
					<div class="tac mb10">
						<span class="btn" id="submit"><span> <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">递交</a> </span></span>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/admin/js/room/room_add.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>