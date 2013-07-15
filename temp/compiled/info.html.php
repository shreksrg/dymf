
<form id="frmProfile" action="?act=user&st=user_editProfile" method="post">
    <table width="0" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td width="96">用户名</td>
            <td width="198"><input name="user_name" class="easyui-validatebox" maxlength="20"
                                   data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['info']['user_name']; ?>"/>
                *
            </td>
        </tr>

        <tr>
            <td>法名</td>
            <td><input name="user_fullname" type="text" class="easyui-validatebox" maxlength="20"
                       data-options="required:true,validType:'length[4,20]'" value="<?php echo $this->_var['info']['user_fullname']; ?>"/>
                *
            </td>
        </tr>
        <tr>
            <td>属学修小组</td>
            <td><input name="user_group" type="text" class="easyui-validatebox" maxlength="20"
                       data-options="required:true,validType:'length[1,20]'" value="<?php echo $this->_var['info']['user_group']; ?>"/>
                *
            </td>
        </tr>
        <tr>
            <td>QQ号码</td>
            <td><input name="user_qq" type="text" class="easyui-numberbox" maxlength="20"
                       data-options="validType:'length[4,20]'" value="<?php echo $this->_var['info']['user_qq']; ?>"/>
                *
            </td>
        </tr>
        <tr>
            <td>邮件地址</td>
            <td><input name="user_email" type="text" class="easyui-validatebox" maxlength="20"
                       data-options="required:true,validType:'email'" value="<?php echo $this->_var['info']['user_email']; ?>"/>
                *
            </td>
        </tr>
        <tr>
            <td>手机号码</td>
            <td><input name="user_mobilenum" type="text" class="easyui-validatebox" maxlength="20"
                       data-options="required:true,validType:'phone'" value="<?php echo $this->_var['info']['user_mobilenum']; ?>"/>
                *
            </td>
        </tr>

    </table>
    <input name="admin_flag" type="hidden" value="0"/>

</form>
<div style="text-align:center;padding:5px">
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitEditProfile()">提交</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#winLogin').window('close')">关闭</a>
</div>