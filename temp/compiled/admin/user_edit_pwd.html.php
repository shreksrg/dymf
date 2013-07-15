<?php echo $this->fetch('public/page_head.html'); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
  <div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
    <div style="margin-top:5px;">
      <form method="post" action="?act=admin_user&st=edit_user_pwd" id="websit_config">
        <div id="stypestate" style="">
          <h2 class="h1">修改密码</h2>
          <div class="admin_table mb10">
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr class="tr1 vt">
                <td class="td1">用戶名</td>
                <td class="td2"><?php echo $this->_var['info']['user_name']; ?></td>
             
              </tr>
              <tr class="tr1 vt">
                <td class="td1">原密码</td>
                <td class="td2"><input name="user_old_pwd" type="password" class="easyui-validatebox input_wb input" id="user_old_pwd" maxlength="10" data-options="required:true,validType:'length[1,20]'" /></td>

              </tr>
              <tr class="tr1 vt">
                <td class="td1">新密码</td>
                <td class="td2"><input name="user_new_pwd" type="password" class="easyui-validatebox input_wb input" id="user_new_pwd" maxlength="10" data-options="required:true,validType:'length[1,20]'" /></td>

              </tr>
             
            </table>
          </div>
          <div class="tac mb10"> <span class="btn" id="submit"><span> <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">递交</a> </span></span> </div>
        </div>

      </form>
    </div>
  </div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/admin/js/user/user_add.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>