<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/admin/css/main.css" rel="stylesheet" type="text/css" />
<link href="files/css/part.css" rel="stylesheet" type="text/css" />
<?php if ($this->_var['msg'] != ""): ?>
<script>
	alert("<?php echo $this->_var['msg']; ?>");
	window.location.href="?act=group&st=showHTML";
</script>
<?php endif; ?>
<div class='body'>
  <div class="body_back">
    <div class="banner_no1" style="text-align:right;">
      <div><a href="./">首页</a> | <a href="<?php echo $this->_var['CONTACT_US_URL']; ?>">联系我们</a></div>
    </div>
    <div class="top_route"> 首页 -> <a href="./"><?php echo $this->_var['webname']; ?></a> -> 成就之路 </div>
    <div id="g_con_body">
      <h1>组建实修小组申请</h1>
      <div class="show">* 以下内容为必填项</div>
      <form method="post" action="?act=group&st=app_group_info" id="websit_config">
      <table id="g_con_body_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30%" align="right"><span>*</span> 申请人姓名：</td>
          <td align="left"><input name="getname" class="easyui-validatebox input_wb input" <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> id="getname" value="<?php echo $this->_var['info']['userfullname']; ?>" data-options="required:true,validType:'length[1,20]'" /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 性别：</td>
          <td align="left">男：
            <input name="getman" type="radio" value="1" <?php if ($this->_var['info']['getman'] == 1 || $this->_var['ss_id'] == ''): ?>checked="checked"<?php endif; ?>  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> />
            女：
            <input name="getman" type="radio" value="0"  <?php if ($this->_var['info']['getman'] == 0): ?>checked="checked"<?php endif; ?> <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 出生年月：</td>
          <td align="left"><input name="getbirthday" required="required" class="easyui-datebox" id="getbirthday" value="<?php echo $this->_var['nowdate']; ?>" editable="0"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 职业：</td>
          <td align="left"><input name="getprofession" class="easyui-validatebox input_wb input" id="getprofession" value="<?php echo $this->_var['info']['getprofession']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right">何时依止上师：</td>
          <td align="left"><input name="getwhen" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['getwhen']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> />
            （暂未皈依可不填）</td>
        </tr>
        <tr>
          <td width="30%" align="right">法名：</td>
          <td align="left"><input name="getfaming" class="easyui-validatebox input_wb input" id="getfaming" value="<?php echo $this->_var['info']['getfaming']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 联系电话1：</td>
          <td align="left"><input name="gettel1" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['gettel1']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right">联系电话2：</td>
          <td align="left"><input name="gettle2" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['gettle2']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> />
            （至少填一个联系电话）</td>
        </tr>
        <tr>
          <td width="30%" align="right">QQ：</td>
          <td align="left"><input name="getqq" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['getqq']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right">E-mail：</td>
          <td align="left"><input name="getmail" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['getmail']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 您发起在何地组建实修小组：</td>
          <td align="left"></td>
        </tr>
        <tr>
          <td width="30%" align="right">省：</td>
          <td align="left"><input name="joinsheng" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['joinsheng']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right">市：</td>
          <td align="left"><input name="joinshi" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['joinshi']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right">区：</td>
          <td align="left"><input name="joinqu" class="easyui-validatebox input_wb input" id="getwhen" value="<?php echo $this->_var['info']['joinqu']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 共修场所安排：</td>
          <td align="left"><input name="getplace" class="easyui-validatebox input_wb input" id="getplace" value="<?php echo $this->_var['info']['getplace']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 目前组员人数：</td>
          <td align="left"><input name="crewnum" class="easyui-validatebox input_wb input" id="crewnum" value="<?php echo $this->_var['info']['crewnum']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 目前学修方式：</td>
          <td align="left"><input name="learning" class="easyui-validatebox input_wb input" id="learning" value="<?php echo $this->_var['info']['learning']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
        <tr>
          <td width="30%" align="right"><span>*</span> 拟建小组名称：</td>
          <td align="left"><input name="groupname" class="easyui-validatebox input_wb input" id="groupname" value="<?php echo $this->_var['info']['groupname']; ?>" data-options="required:true,validType:'length[1,20]'"  <?php if ($this->_var['ss_id'] != ''): ?> disabled="disabled"<?php endif; ?> /></td>
        </tr>
      </table>
      <?php if ($this->_var['ss_id'] == ''): ?>
      <div class="tac mb10"> <span class="btn" id="submit"><span> <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">递交</a> </span></span> </div><br /><br /><br />
  		<?php endif; ?>
  	</form>
  </div>
  <div class="part_banner_no1"></div>
  <?php echo $this->fetch('public/page_foot1.html'); ?> </div>
  <?php echo $this->smarty_insert_scripts(array('files'=>'files/js/group_add.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>