<?php echo $this->fetch('public/page_head.html'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/xheditor/xheditor-1.1.14-zh-cn.min.js')); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
	<div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
		<div style="margin-top:5px;">
			<div id="stypestate" style="">
				<h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
				<div class="admin_table mb10">
					<table width="100%" cellspacing="0" cellpadding="0">
						<tr class="tr1 vt">
							<td class="td1" >姓名</td>
							<td class="td2" ><?php echo $this->_var['info']['fullname']; ?></td>
							<td class="td1" >性别</td>
							<td class="td2" ><?php if ($this->_var['info']['gender'] == '0'): ?>女<?php else: ?>男<?php endif; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1" >发心服务项目</td>
							<td class="td2" ><?php echo $this->_var['info']['services_name']; ?></td>
							<td class="td1">年龄</td>
							<td class="td2"><?php echo $this->_var['info']['agenum']; ?></td>
						</tr>
						<tr>
							<td class="td1">职业</td>
							<td class="td2"><?php echo $this->_var['info']['profession']; ?></td>
							<td class="td1">文化程度</td>
							<td class="td2"><?php echo $this->_var['info']['educational_level']; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">法名——藏文</td>
							<td class="td2"><?php echo $this->_var['info']['farmington_tibetan']; ?></td>
							<td class="td1">法名——译文</td>
							<td class="td2"><?php echo $this->_var['info']['farmington_zh']; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">学佛时间</td>
							<td class="td2"> <?php echo $this->_var['info']['learning_start_time']; ?> </td>
							<td class="td1">是否皈依上师达真堪步及皈依时间</td>
							<td class="td2"><?php echo $this->_var['info']['convert_time']; ?> </td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">联系地址</td>
							<td class="td2"><?php echo $this->_var['info']['address']; ?></td>
							<td class="td1">联系电话</td>
							<td class="td2"><?php echo $this->_var['info']['telnum']; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">QQ</td>
							<td class="td2" ><?php echo $this->_var['info']['qqnum']; ?></td>
							<td class="td1">您是否参加过佛教义工服务</td>
							<td class="td2" ><?php echo $this->_var['info']['joined_flag']; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">您有哪方面的专长</td>
							<td class="td2" colspan="4"> <?php echo $this->_var['info']['specialty']; ?> </td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">你愿意为众生提供哪些义工服务</td>
							<td class="td2" colspan="4"> <?php $_from = $this->_var['info']['willing_service']['yz']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
							<?php echo $this->_var['value']; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">报刊杂志印制</td>
							<td class="td2" colspan="4"><?php $_from = $this->_var['info']['willing_service']['yz']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
							<?php echo $this->_var['value']; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">网络共修讲堂</td>
							<td class="td2" colspan="4"><?php $_from = $this->_var['info']['willing_service']['wl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
							<?php echo $this->_var['value']; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">网络论坛管理</td>
							<td class="td2" colspan="4"><?php $_from = $this->_var['info']['willing_service']['lt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
							<?php echo $this->_var['value']; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">工程建设</td>
							<td class="td2" colspan="4"><?php $_from = $this->_var['info']['willing_service']['gc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
							<?php echo $this->_var['value']; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">弘法宣传</td>
							<td class="td2" colspan="4"><?php $_from = $this->_var['info']['willing_service']['hf']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
							<?php echo $this->_var['value']; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">其他</td>
							<td class="td2" colspan="4"><?php $_from = $this->_var['info']['willing_service']['qt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
							<?php echo $this->_var['value']; ?>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">您能提供义工服务的时间说明</td>
							<td class="td2" colspan="4"><?php echo $this->_var['info']['time_description']; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">您认为光明大圆满坛城的特色是</td>
							<td class="td2" colspan="4"><?php echo $this->_var['info']['characteristic']; ?></td>
						</tr>
						<tr class="tr1 vt">
							<td class="td1">自我描述</td>
							<td class="td2" colspan="4"><?php echo $this->_var['info']['self_descriptive']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->fetch('public/page_foot.html'); ?>