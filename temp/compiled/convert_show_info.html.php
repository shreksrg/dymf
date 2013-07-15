<?php echo $this->fetch('public/convert_head.html'); ?>
<div style="height:80px; text-align:center; padding-top:40px;">
	<a id="add" href="?act=convert&st=conaert_set_info
	" class="easyui-linkbutton" data-options="">&nbsp;&nbsp;我要皈依&nbsp;&nbsp;</a>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="400" align="center" valign="top" ><img src="files/images/cms_g_r8_c6.jpg" /></td>
		<td valign="top">
		<table class="c_right_list_table" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="c_right_list_h1">一段开示</td>
			</tr>
			<tr>
				<td class="con"><?php echo $this->_var['remark']; ?></td>
			</tr>
		</table>
		<table class="c_right_list_table" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="c_right_list_h1">皈依相关开示、问答</td>
			</tr>
			<tr>
				<td class="con">
				<ul>
					<?php $_from = $this->_var['kswd']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
					<li>
						<a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>" class="default1"><?php echo $this->_var['value']['article_title']; ?></a>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul></td>
			</tr>
		</table></td>
	</tr>
</table>
<div><img src="files/images/cms_g_r11_c4.jpg" />
</div>
<div style="height:80px; text-align:center; padding-top:40px;">
</div>
<?php echo $this->fetch('public/convert_foot.html'); ?>