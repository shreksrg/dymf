<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/index.css" rel="stylesheet" type="text/css" />
<div class='body'>
<div class="body_back">
  <div class="banner_no1">
    <div class="bread_path_1"> <a href="./">首页</a> -> <?php echo $this->_var['webname']; ?> -> <?php echo $this->_var['html_title']; ?> </div>
  </div>

  <div id="content">
    <div class="title" >我要提问</div>
    <div class="q_body"> <br />
      <br />
      <form method="post" action="?act=question&st=add_question_info" id="websit_config">
        <table width="100%">
          <tr>
            <td width="300" align="right" valign="top">问题：</td>
            <td align="left"><textarea cols="45" name="ask" rows="8" wrap="on" onBlur="textCounter(this.form.ask,100);" onKeyDown="textCounter(this.form.ask,100);" onKeyUp="textCounter(this.form.ask,100);"></textarea>
              <br />
              <br />
              <span style="color:#666">问题内容100字以内</span></td>
          </tr>
          <tr>
            <td></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <div>
          <input type="submit" value="递 交"/>
        </div>
      </form>
    </div>
  </div>
  <div class="part_banner_no1"></div>
  <div id="main_foo_img"></div>
  <?php echo $this->fetch('public/page_foot1.html'); ?> </div>
  <?php echo $this->smarty_insert_scripts(array('files'=>'files/js/question/question_add.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?> 