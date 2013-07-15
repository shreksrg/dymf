<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/article.css" rel="stylesheet" type="text/css" />
<div class='body'>
<div class="body_back">

  <div style="background-color:#0169be">
  <div class="left_top"><a href="#">首页</a> >> <a href="./"><?php echo $this->_var['webname']; ?></a> >> 戒律自查
  </div>
  <div>
  <img src="files/images/selfexamination_r2_c2.gif" />
  </div>
  <div class="part_banner_no1"></div>
  <?php echo $this->fetch('public/page_foot1.html'); ?> </div>
  <?php echo $this->smarty_insert_scripts(array('files'=>'files/js/article.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>