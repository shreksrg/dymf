<?php echo $this->fetch('public/page_head.html'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/xheditor/xheditor-1.1.14-zh-cn.min.js')); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
		<div style="margin-top:5px;">
			<form method="post" action="?act=admin_course&st=edit_course_info" id="websit_config">
				<div id="stypestate" style="">
					<h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
					<div class="admin_table mb10">
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr class="tr1 vt">
								<td class="td1">课程标题</td>
								<td class="td2">
								<input name="course_title"  value="<?php echo $this->_var['info']['course_title']; ?>" class="easyui-validatebox input_wb input" id="course_title" maxlength="20" data-options="required:true,validType:'length[1,20]'" />
								<div class="help_a" style="display: block;">
									填写标题，必填
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">课程内容</td>
								<td class="td2">								<textarea name="course_content" id="course_content" style="width:700px; height:300px;"><?php echo $this->_var['info']['course_content']; ?></textarea></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">音频链接</td>
								<td class="td2">
								<input type="text" id="audio_link" name="audio_link" value="<?php echo $this->_var['info']['audio_link']; ?>" style="width:600px;"/>
								<input type="button" id="audio_up" value="选择文件" />
								</td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">视频链接</td>
								<td class="td2">
								<input type="text" id="video_link" name="video_link" value="<?php echo $this->_var['info']['video_link']; ?>" style="width:600px;"/>
								<input type="button" id="video_up" value="选择文件" />
								</td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">文档链接</td>
								<td class="td2">
								<input type="text" id="doc_link" name="doc_link" value="<?php echo $this->_var['info']['doc_link']; ?>" style="width:600px;"/>
								<input type="button" id="doc_up" value="选择文件" />
								</td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">在线链接</td>
								<td class="td2">
								<input type="text" name="online_link" value="<?php echo $this->_var['info']['online_link']; ?>" style="width:700px;"/>
								</td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">开示链接</td>
								<td class="td2">
								<input type="text" name="open_link" value="<?php echo $this->_var['info']['open_link']; ?>" style="width:700px;"/>
								</td>
							</tr>
							<tr>
								<td class="td1">课程日期</td>
								<td class="td2">
								<input type="hidden" value="<?php echo $this->_var['id']; ?>" name="c_id" />
								<input type="hidden" value="<?php echo $this->_var['p_id']; ?>" name="p_id" />
								<input name="course_date" id="course_date"  class="easyui-datebox" required="true" value="<?php echo $this->_var['info']['course_date']; ?>"/>
								</td>
							</tr>
							<tr class="tr1 vt" style="display:none">
								<td class="td1">是否在课程安排里显示</td>
								<td class="td2">
								<input type="radio" value="0" name="index_show" <?php if ($this->_var['show'] == 0 || $this->_var['info']['index_show'] == 0): ?>checked="checked"<?php endif; ?> />
								不显示 &nbsp;&nbsp;
								<input type="radio" value="1" name="index_show"  <?php if ($this->_var['show'] == 1 || $this->_var['info']['index_show'] == 1): ?>checked="checked"<?php endif; ?> />
								显示 </td>
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
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/admin/js/article/article_add.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>