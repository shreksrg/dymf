<?php echo $this->fetch('public/convert_head.html'); ?>
<style>
#c_body_table {padding-top:0px;}
.c_banner_1{display:none;}
</style>
<?php if ($this->_var['msg'] != ""): ?>
<script type="text/javascript" charset="utf-8">
	alert('<?php echo $this->_var['msg']; ?>'); 
	window.location.href="?act=contact&st=showHTML";
</script>
<?php endif; ?>
<div style="background-image:url(./files/images/contact_r2_c2.png); height:47px;"></div>
<div style="background-color:#E1A201; text-align:center;">
  <div style="width:960px; background-color:#FFF; margin:0 auto; padding-top:60px; padding-left:10px; padding-right:10px;">
    <div style=" margin-top:60px; border:#B2B2B2 solid 1px;">
      <div style="height:65px; background-color:#FFEFC7; line-height:65px; color:#494949; font-size:14px; font-weight:bolder;"><?php echo $this->_var['webtitle']; ?></div>
      <form method="post" action="?act=contact&st=add_contact" >
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:#CC8D00 solid 3px;">
        <tr>
          <td width="270" height="75" align="right">问题类型：</td>
          <td align="left"><select class="easyui-combobox" name="content_type" panelHeight="65" style="width:100px;">
              <option value="皈依资讯">皈依资讯</option>
              <option value="学员建议">学员建议</option>
              <option value="其他">其他</option>
            </select></td>
        </tr>
        <tr>
          <td align="right" valign="top">问题内容：</td>
          <td align="left"><textarea name="content" style=" height:150px; width:480px; border:#B3B3B3 solid 1px;"></textarea></td>
        </tr>
        <tr>
          <td align="right" valign="top"></td>
          <td height="100" align="left"><span class="btn" id="submit" style=" padding-left:200px;"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'">递交</a></span></td>
        </tr>
      </table>
      </form>
    </div>
  </div>
</div>
<div style="height:80px; text-align:center; padding-top:40px;"> </div>
<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/group_add.js')); ?>
<?php echo $this->fetch('public/convert_foot.html'); ?>