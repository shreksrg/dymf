<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/article.css" rel="stylesheet" type="text/css" />
<div class='body'>
	<div class="body_back">
		<!--<div class="banner_no1" style="text-align:right;">
			<div>
				<a href="./">首页</a> | <a href="<?php echo $this->_var['CONTACT_US_URL']; ?>">联系我们</a>
			</div>
		</div>-->
		<div style="background-color:#0169be">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="737" valign="top">
					<div class='left_top'>
						首页 > <a href="./"><?php echo $this->_var['webname']; ?></a> > <?php echo $this->_var['status']; ?>
					</div>
					<div class="left_body">
						<div class="left_inner" style=" text-align:left;">
							<ul style="padding-top:5px;">
								<?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
								<li class="part_art_li">
									<?php if ($this->_var['value']['status'] == 1): ?>
									<a href="?act=question&st=question_info&id=<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['ask']; ?></a>
									<?php else: ?>
									<?php echo $this->_var['value']['ask']; ?>
									<?php endif; ?>
								</li>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</ul>
						</div>
					</div></td>
					<td valign="top"><div class="cj_right_top"></div>
					<div class="cj_right_body">
						<table class="art_right_table" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="top">
								<div>
									学修指南
								</div></td>
							</tr>
							<tr>
								<td valign="top">
								<div class="art_ll_list">
									<ul>
										<?php $_from = $this->_var['xxzndata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
										<li>
											<a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo $this->_var['value']['article_title']; ?></a>
										</li>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
								</div></td>
							</tr>
						</table>
						<table class="art_right_table" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="top">
								<div>
									学修动态
								</div></td>
							</tr>
							<tr>
								<td valign="top">
								<div class="art_ll_list">
									<ul>
										<?php $_from = $this->_var['xxdtdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
										<li>
											<a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo $this->_var['value']['article_title']; ?></a>
										</li>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
								</div></td>
							</tr>
						</table>
						<table class="art_right_table" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="top">
								<div>
									讲堂资讯
								</div></td>
							</tr>
							<tr>
								<td valign="top">
								<div class="art_ll_list">
									<ul>
										<?php $_from = $this->_var['jtzxdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
										<li>
											<a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo $this->_var['value']['article_title']; ?></a>
										</li>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
								</div></td>
							</tr>
						</table>
					</div></td>
				</tr>
			</table>
		</div>
		<div class="part_banner_no1"></div>
		<?php echo $this->fetch('public/page_foot1.html'); ?>
	</div>
	<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/article.js')); ?>
	<?php echo $this->fetch('public/page_foot.html'); ?>
