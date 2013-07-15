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
					<td  valign="top" width="737">
					<div class='left_top'>
						首页 > <a href="./"><?php echo $this->_var['webname']; ?></a> > <?php echo $this->_var['part_name']; ?>
					</div>
					<div class="left_body">
						<div class="left_inner" >
							<div class="article_title">
								<h2><?php echo $this->_var['info']['article_title']; ?></h2>
							</div>
							<div class="art_attr">
								更新日期：<?php echo $this->_var['info']['raw_update_time']; ?>&nbsp;&nbsp;点击数:<?php echo $this->_var['info']['click_num']; ?>&nbsp;&nbsp;文字：[<a href="javascript:void(0);" onclick="edit_font(18)">大</a>][<a href="javascript:void(0);" onclick="edit_font(16)">中</a>][<a href="javascript:void(0);" onclick="edit_font(14)">小</a>]
							</div>
							<div class="art_content">
								<span style="font-size:14px" id="a_content"> <?php echo $this->_var['info']['article_content']; ?> </span>
							</div>
						</div>
					</div></td>
					<td valign="top"><div class="cj_right_top"></div>
					<div class="cj_right_body">
						<?php if ($this->_var['info']['part_id'] != $this->_var['XXZN']): ?>
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
                                            <span style="float: right; margin-right:20px;"><?php echo $this->_var['value']['raw_add_time']; ?></span>
										</li>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
								</div></td>
							</tr>
						</table>
						<?php endif; ?>
						<?php if ($this->_var['info']['part_id'] != $this->_var['XXDT']): ?>
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
											<a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo static_base::sub_str($this->_var['value']['article_title'],12); ?></a>
                                            <span style="float: right; margin-right:20px;"><?php echo $this->_var['value']['raw_add_time']; ?></span>
										</li>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
								</div></td>
							</tr>
						</table>
						<?php endif; ?>
						<?php if ($this->_var['info']['part_id'] != $this->_var['JTZX']): ?>
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
											<a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo static_base::sub_str($this->_var['value']['article_title'],12); ?></a>
                                            <span style="float: right; margin-right:20px;"><?php echo $this->_var['value']['raw_add_time']; ?></span>
										</li>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
								</div></td>
							</tr>
						</table>
						<?php endif; ?>
					</div></td>
				</tr>
			</table>
		</div>
		<!--<div class="part_banner_no1"></div>-->
		<?php echo $this->fetch('public/page_foot1.html'); ?>
	</div>
	<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/article.js')); ?>
	<?php echo $this->fetch('public/page_foot.html'); ?>
