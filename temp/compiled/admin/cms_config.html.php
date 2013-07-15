<?php echo $this->fetch('public/page_head.html'); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="网站信息" style="padding:20px;overflow:auto;">
		<div style="margin-top:5px;">
			<form method="post" action="?act=admin_set&st=cms_config_save" id="websit_config">
				<div id="stypestate" style="">
					<h2 class="h1">网站信息设置</h2>
					<div class="admin_table mb10">
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr class="tr1 vt">
								<td class="td1">站点状态</td>
								<td id="bbsifopen" class="td2">
								<ul style="float:none;width:200px;" class="list_A cc">
									<li class="current">
										<input type="radio" name="info[closed]" value="1" <?php if ($this->_var['data']['info'] [ closed ] == 1): ?>checked="checked"<?php endif; ?> />
										完全开放
									</li>
									<li>
										<input type="radio" name="info[closed]" value="2" <?php if ($this->_var['data']['info'] [ closed ] == 2): ?>checked="checked"<?php endif; ?> />
										内部开放
									</li>
									<li>
										<input type="radio" name="info[closed]" value="0" <?php if ($this->_var['data']['info'] [ closed ] == 0): ?>checked="checked"<?php endif; ?> />
										完全关闭
									</li>
								</ul></td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									完全开放:允许任何人访问站点
									<br>
									内部开放:特定会员才能访问站点，通常用于站点内部测试、调试
									<br>
									完全关闭:除站点创始人，其他人都不允许访问站点，一般用于站点关闭、系统维护等情况
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">网站名称</td>
								<td class="td2">
								<input class="easyui-validatebox input_wb input" data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['data']['info']['name']; ?>" name="info[name]" />
								</td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									填写站点论坛名称
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">网站标题</td>
								<td class="td2">
								<input class="easyui-validatebox input_wb input" data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['data']['info']['title']; ?>" name="info[title]" />
								</td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									标题将显示在浏览器的标题栏
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">网站描述</td>
								<td class="td2">
								<input class="easyui-validatebox input_wb input" data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['data']['info']['description']; ?>" name="info[description]" />
								</td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									meta 标签下的 Description 属性内容，用于 SEO 优化
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">网站关键字</td>
								<td class="td2">
								<input class="easyui-validatebox input_wb input" data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['data']['info']['keywords']; ?>" name="info[keywords]" />
								</td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									meta 标签下的 Keywords 属性内容，用于 SEO 优化
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">管理员电子邮箱</td>
								<td class="td2">
								<input class="easyui-validatebox input_wb input" data-options="required:true,validType:'email'" value="<?php echo $this->_var['data']['info']['ceoemail']; ?>" name="info[ceoemail]" />
								</td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									填写站点管理员的电子邮箱地址
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">ICP证书或ICP备案证书号: </td>
								<td class="td2">
								<input class="easyui-validatebox input_wb input" data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['data']['basic']['icp']; ?>" name="basic[icp]" />
								</td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									填写 ICP 备案的信息，例如: 沪ICP备xxxxxxxx号
								</div></td>
							</tr>
							<tr class="tr1 vt">
								<td class="td1">第三方统计代码</td>
								<td class="td2">								<textarea class="easyui-validatebox textarea" name="basic[statscode]"><?php echo $this->_var['data']['basic']['statscode']; ?></textarea></td>
								<td class="td2">
								<div class="help_a" style="display: block;">
									在第三方网站上注册并获得统计代码，并将统计代码粘贴在下面文本框中即可
								</div></td>
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

<script type="text/javascript">
	$(function() {
		$("a", $("#submit")).click(function() {
			var _o = $(this).linkbutton('options');
			if (!_o.disabled) {
				$("#websit_config").submit();
			}
		})
	})
</script>

<?php echo $this->fetch('public/page_foot.html'); ?>