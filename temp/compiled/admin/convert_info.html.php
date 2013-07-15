<?php echo $this->fetch('public/page_head.html'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/xheditor/xheditor-1.1.14-zh-cn.min.js')); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
		<div style="margin-top:5px;">
			<form method="post" action="?act=admin_convert&st=edit_convert_info" id="websit_config">
				<div id="stypestate" style="">
					<h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
					<div class="admin_table mb10">
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr class="tr1 vt">
								<td class="td1" >姓名</td>
								<td class="td2" ><?php echo $this->_var['info']['name']; ?></td>
								<td class="td1" >性别</td>
								<td class="td2" ><?php if ($this->_var['info']['sex'] == '0'): ?>女<?php else: ?>男<?php endif; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1" >籍贯</td>
								<td class="td2" ><?php echo $this->_var['info']['hometown']; ?></td>
								<td class="td1">出生日期</td>
								<td class="td2"><?php echo $this->_var['info']['date_birth']; ?></td>
							</tr>
							<tr>
								<td class="td1">职业</td>
								<td class="td2"><?php echo $this->_var['info']['profession']; ?></td>
								<td class="td1">联系电话</td>
								<td class="td2"><?php echo $this->_var['info']['Tel']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">QQ号</td>
								<td class="td2"><?php echo $this->_var['info']['QQ']; ?></td>
								<td class="td1">UC号</td>
								<td class="td2"><?php echo $this->_var['info']['UC']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">法名</td>
								<td class="td2">
								<input name="farmington" value="<?php echo $this->_var['info']['farmington']; ?>" />
								</td>
								<td class="td1">处理状态</td>
								<td class="td2"><select name="status" >
								<option value="0" <?php if ($this->_var['info']['status'] == 0): ?> selected="selected" <?php endif; ?>>未处理</option>
								<option value="1" <?php if ($this->_var['info']['status'] == 1): ?> selected="selected" <?php endif; ?>>已处理</option>
								<option value="2" <?php if ($this->_var['info']['status'] == 2): ?> selected="selected" <?php endif; ?>>已寄出</option>
								</select></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">收件人</td>
								<td class="td2"><?php echo $this->_var['info']['addressee']; ?></td>
								<td class="td1">邮编</td>
								<td class="td2"><?php echo $this->_var['info']['zip_code']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">邮寄地址</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['address']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">皈依的缘起</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['reason']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">皈依信息的来源</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['sources']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">学修方式</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['school_type']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">家庭环境</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['family']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">皈依的缘起</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['origin']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">学佛的情况</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['situation']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">学佛的时间</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['learning_time']; ?></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">饮食习惯</td>
								<td class="td2" colspan="4"><?php echo $this->_var['info']['eating_habits']; ?></td>
							</tr>
						</table>
					</div>
					<div class="tac mb10">
						<?php if ($this->_var['info']['status'] != '2'): ?>
						<input type="hidden" name="c_id" value="<?php echo $this->_var['info']['id']; ?>"/>
						<span class="btn" id="submit"><span> <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">处理</a> </span></span>
						<?php endif; ?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/admin/js/article/article_add.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>