<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/part.css" rel="stylesheet" type="text/css" />
<div class='body'>
<div class="body_back">
  <div class="banner_no1" style="text-align:right;">
      <div class="bread_path_1"><a href="./">首页</a> -> <?php echo $this->_var['webname']; ?> -> <?php echo $this->_var['part_name']; ?> </div>
  </div>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top"><div class='cj_top'></div>
        <div class="cj_body"> <?php $_from = $this->_var['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'contact');$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from AS $this->_var['contact']):
        $this->_foreach['outer']['iteration']++;
?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="show">
              <td><h1>查看课程 >> <?php echo $this->_var['contact']['part_name']; ?></h1></td>
              <td width="70"> <?php if ($this->_var['contact']['id'] != ""): ?> <a href="?act=course&st=showHTML&id=<?php echo $this->_var['contact']['id']; ?>&p_id=<?php echo $this->_var['p_id']; ?>" style="color:red; font-weight:bolder; text-decoration:none;">更多 >></a> <?php endif; ?> </td>
            </tr>
          </table>
          <table class="cj_list" width="100%" border="0" cellspacing="0" cellpadding="0">
            <?php $_from = $this->_var['contact']['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
            <tr class="list">
              <td><?php echo $this->_var['item']['course_title']; ?></td>
              <td>视频 >> <a href="<?php echo $this->_var['item']['video_link']; ?>">下载</a></td>
              <td>音频 >> <a href="<?php echo $this->_var['item']['audio_link']; ?>">下载</a></td>
              <td>文件 >> <a href="<?php echo $this->_var['item']['doc_link']; ?>">下载</a></td>
              <td width="80" align="right">在线播放 >></td>
              <td width="40" align="left"><a href="<?php echo $this->_var['item']['online_link']; ?>"><img src="files/images/part_r5_c7.jpg" /></a></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
          <br/>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </div>
        <div class='cj_foot'></div></td>
      <td valign="top"><div class="cj_right_top"> <?php echo $this->_var['remark']; ?> </div></td>
    </tr>
  </table>
  <div class="part_banner_no1"></div>
  <?php echo $this->fetch('public/page_foot1.html'); ?> </div>
<?php echo $this->fetch('public/page_foot.html'); ?> 