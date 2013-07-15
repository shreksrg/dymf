<?php echo $this->fetch('public/convert_head.html'); ?>
<style>
#c_body_table {padding-top:0px;}
.c_banner_1{display:none;}
</style>
<?php if ($this->_var['msg'] != ""): ?> 
<script type="text/javascript" charset="utf-8">
	alert('<?php echo $this->_var['msg']; ?>'); 
	window.location.href="?act=volunteer&st=showHTML";
</script> 
<?php endif; ?>
<div style="background-image:url(./files/images/contact_r2_c2.png); height:47px;"></div>
<div style="background-color:#E1A201; text-align:center;">
  <div style="width:960px; background-color:#FFF; margin:0 auto; padding-top:20px; padding-left:10px; padding-right:10px;">
    <div style=" margin-top:60px; border:#B2B2B2 solid 1px;">
      <div style="height:65px; background-color:#FFEFC7; line-height:65px; color:#494949; font-size:14px; font-weight:bolder;"><?php echo $this->_var['webtitle']; ?></div>
      <form method="post" action="?act=volunteer&st=add_volunteer_info" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:#CC8D00 solid 3px;">
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;姓名：</td>
            <td align="left"><input name="fullname"  <?php if ($this->_var['info']['fullname'] != ""): ?> value="<?php echo $this->_var['info']['fullname']; ?>" readonly <?php endif; ?> type="text" class="easyui-validatebox defaulttext combo" id="fullname" style="width:300px;" maxlength="10" data-options="required:true,validType:'length[1,10]'"></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;发心服务项目：</td>
            <td align="left"><input name="services_name" type="text" <?php if ($this->_var['info']['services_name'] != ""): ?> value="<?php echo $this->_var['info']['services_name']; ?>" readonly <?php endif; ?>  class="easyui-validatebox defaulttext combo" id="services_name" style="width:300px;" maxlength="20" data-options="required:true,validType:'length[1,20]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;性别：</td>
            <td align="left">男：
              <input name="gender" type="radio" value="男" <?php if ($this->_var['info']['volunteer_id'] == "" || $this->_var['info']['gender'] == "男"): ?> checked="checked" <?php endif; ?> <?php if ($this->_var['info']['volunteer_id'] != ""): ?> disabled="disabled"<?php endif; ?> />
              女：
              <input name="gender" type="radio" value="女" <?php if ($this->_var['info']['gender'] == "女"): ?> checked="checked" <?php endif; ?> <?php if ($this->_var['info']['volunteer_id'] != ""): ?> disabled="disabled"<?php endif; ?> /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;年龄：</td>
            <td align="left"><input name="agenum" type="text" class="easyui-validatebox defaulttext combo" id="agenum" <?php if ($this->_var['info']['agenum'] != ""): ?> value="<?php echo $this->_var['info']['agenum']; ?>" readonly <?php endif; ?> style="width:300px;" maxlength="3" data-options="required:true,validType:'length[1,3]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right">职业：</td>
            <td align="left"><input name="profession" type="text" class="easyui-validatebox defaulttext combo" id="profession" <?php if ($this->_var['info']['profession'] != ""): ?> value="<?php echo $this->_var['info']['profession']; ?>" readonly <?php endif; ?>style="width:300px;" maxlength="20" data-options="validType:'length[1,20]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right">文化程度：</td>
            <td align="left"><input name="educational_level" type="text" class="easyui-validatebox defaulttext combo" id="educational_level" <?php if ($this->_var['info']['educational_level'] != ""): ?> value="<?php echo $this->_var['info']['educational_level']; ?>" readonly <?php endif; ?>style="width:300px;" maxlength="20" data-options="validType:'length[1,20]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;法名——藏文：</td>
            <td align="left"><input name="farmington_tibetan" type="text" class="easyui-validatebox defaulttext combo" id="farmington_tibetan" <?php if ($this->_var['info']['farmington_tibetan'] != ""): ?> value="<?php echo $this->_var['info']['farmington_tibetan']; ?>" readonly <?php endif; ?>style="width:300px;" maxlength="100" data-options="required:true,validType:'length[1,100]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;法名——译文：</td>
            <td align="left"><input name="farmington_zh" type="text" class="easyui-validatebox defaulttext combo" id="farmington_zh" <?php if ($this->_var['info']['farmington_zh'] != ""): ?> value="<?php echo $this->_var['info']['farmington_zh']; ?>" readonly <?php endif; ?>style="width:300px;" maxlength="100" data-options="required:true,validType:'length[1,100]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;学佛时间：</td>
            <td align="left"><input name="learning_start_time" type="text" class="easyui-datebox" id="learning_start_time" data-options="required:true" <?php if ($this->_var['info']['learning_start_time'] != ""): ?> value="<?php echo $this->_var['info']['learning_start_time']; ?>" readonly disabled="disabled"<?php else: ?> value="<?php echo $this->_var['nowdate']; ?>" <?php endif; ?>  editable="0" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;是否皈依上师达真堪步及皈依时间：</td>
            <td align="left"><input name="convert_time" type="text" class="easyui-validatebox defaulttext combo" id="convert_time" style="width:300px;" maxlength="10" <?php if ($this->_var['info']['convert_time'] != ""): ?> value="<?php echo $this->_var['info']['convert_time']; ?>" readonly <?php endif; ?> data-options="required:true,validType:'length[1,10]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;联系地址：</td>
            <td align="left"><input name="address" type="text" class="easyui-validatebox defaulttext combo" id="address" <?php if ($this->_var['info']['address'] != ""): ?> value="<?php echo $this->_var['info']['address']; ?>" readonly <?php endif; ?> style="width:300px;" maxlength="100" data-options="required:true,validType:'length[1,100]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right">联系电话：</td>
            <td align="left"><input name="telnum" type="text" class="easyui-validatebox defaulttext combo" id="telnum" <?php if ($this->_var['info']['telnum'] != ""): ?> value="<?php echo $this->_var['info']['telnum']; ?>" readonly <?php endif; ?> style="width:300px;" maxlength="20" data-options="validType:'length[1,20]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right"><span style="color:red;">*</span>&nbsp;&nbsp;QQ：</td>
            <td align="left"><input name="qqnum" type="text" class="easyui-validatebox defaulttext combo" id="qqnum" <?php if ($this->_var['info']['qqnum'] != ""): ?> value="<?php echo $this->_var['info']['qqnum']; ?>" readonly <?php endif; ?> style="width:300px;" maxlength="20" data-options="required:true,validType:'length[1,20]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right">您是否参加过佛教义工服务：</td>
            <td align="left">是：
              <input name="joined_flag" type="radio" value="1" <?php if ($this->_var['info']['volunteer_id'] == "" || $this->_var['info']['joined_flag'] == 1): ?> checked="checked" <?php endif; ?> <?php if ($this->_var['info']['volunteer_id'] != ""): ?> disabled="disabled"<?php endif; ?>/>
              否：
              <input name="joined_flag" type="radio" value="0" <?php if ($this->_var['info']['joined_flag'] == 0): ?> checked="checked" <?php endif; ?> <?php if ($this->_var['info']['volunteer_id'] != ""): ?> disabled="disabled"<?php endif; ?>/></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right">您有哪方面的专长：</td>
            <td align="left">音乐:
              <input name="specialty[]" type="checkbox" value="音乐" checked="checked">
              美术：
              <input name="specialty[]" type="checkbox" value="美术">
              摄影:
              <input name="specialty[]" type="checkbox" value="摄影">
              主持:
              <input name="specialty[]" type="checkbox" value="主持">
              英语 :
              <input name="specialty[]" type="checkbox" value="英语">
              计算机:
              <input name="specialty[]" type="checkbox" value="计算机">
              写作:
              <input name="specialty[]" type="checkbox" value="写作">
              <br />
              <br />
              其他：
              <input name="specialty[]" type="text" class="easyui-validatebox defaulttext combo" style="width:300px;" maxlength="20" data-options="validType:'length[1,20]'" /></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right" valign="top" style="padding-top:5px;">你愿意为众生提供哪些义工服务：</td>
            <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="100" height="30" align="right">报刊杂志印制：
                    </td>
                  <td>文字编辑：
                    <input name="willing_service[yz][]" type="checkbox"  value="文字编辑">
                    校对：
                    <input name="willing_service[yz][]" type="checkbox" value="校对">
                    排版：
                    <input name="willing_service[yz][]" type="checkbox" value="排版">
                    策划：
                    <input name="willing_service[yz][]" type="checkbox" value="策划">
                    平面设计：
                    <input name="willing_service[yz][]" type="checkbox" value="平面设计"></td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right">网络共修讲堂：</td>
                  <td>UC房间管理员：
                    <input name="willing_service[wl][]" type="checkbox" value="UC房间管理员"></td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right">网络论坛管理：
                    </td>
                  <td>网站管理员：
                    <input name="willing_service[lt][]" type="checkbox" value="网站管理员">
                    论坛版主：
                    <input name="willing_service[lt][]" type="checkbox" value="论坛版主">
                    网站设计：
                    <input name="willing_service[lt][]" type="checkbox" value="网站设计">
                    视频编辑：
                    <input name="willing_service[lt][]" type="checkbox" value="视频编辑">
                    摄录：
                    <input name="willing_service[lt][]" type="checkbox" value="摄录"></td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right">工程建设：
                  </td>
                  <td>工程监督：
                    <input name="willing_service[gc][]" type="checkbox" value="工程监督">
                    建筑设计：
                    <input name="willing_service[gc][]" type="checkbox" value="建筑设计"></td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right">弘法宣传：
                   </td>
                  <td>QQ群、UC群管理：
                    <input name="willing_service[hf][]" type="checkbox" value="QQ群、UC群管理">
                    宣传员：
                    <input name="willing_service[hf][]" type="checkbox" value="宣传员"></td>
                </tr>
                <tr>
                  <td width="100" height="30" align="right">其他：
                    </td>
                  <td>翻译人员：
                    <input name="willing_service[qt][]" type="checkbox" value="翻译人员">
                    有声书录制：
                    <input name="willing_service[qt][]" type="checkbox" value="有声书录制"> 电子书、电子杂志制作：
                    <input name="willing_service[qt][]" type="checkbox" value="电子书、电子杂志制作"> 音视频听打字录入：
                    <input name="willing_service[qt][]" type="checkbox" value="音视频听打字录入"></td>
                </tr>                
              </table></td>
          </tr>
          <tr>
            <td width="270" height="40" align="right">您能提供义工服务的时间说明：</td>
            <td align="left"><input name="time_description" type="text" <?php if ($this->_var['info']['time_description'] != ""): ?> value="<?php echo $this->_var['info']['time_description']; ?>" readonly <?php endif; ?> class="easyui-validatebox defaulttext combo" id="time_description" style="width:300px;" maxlength="255" data-options="required:true,validType:'length[1,255]'" value="本人在家上班，业务有时很忙，有时闲。在家时间多一点" /> （如：长短期、机动与否、上网时段等）</td>
          </tr>
          <tr>
            <td width="270" height="40" align="right">您认为光明大圆满坛城的特色是：</td>
            <td align="left" style="padding-top:10px; padding-bottom:10px;"><textarea name="characteristic" style=" height:80px; width:300px; border:#B3B3B3 solid 1px;" id="characteristic" <?php if ($this->_var['info']['characteristic'] != ""): ?>  readonly="true"  <?php endif; ?>><?php if ($this->_var['info']['characteristic'] != ""): ?> <?php echo $this->_var['info']['characteristic']; ?> <?php endif; ?></textarea></td>
          </tr>
          <tr>
            <td align="right" valign="top">自我描述（至少200字）：</td>
            <td align="left" style="padding-top:10px; padding-bottom:10px;"><textarea name="self_descriptive" style=" height:150px; width:300px; border:#B3B3B3 solid 1px;" id="self_descriptive" <?php if ($this->_var['info']['self_descriptive'] != ""): ?>  readonly="true"  <?php endif; ?>><?php if ($this->_var['info']['self_descriptive'] != ""): ?> <?php echo $this->_var['info']['self_descriptive']; ?> <?php endif; ?></textarea></td>
          </tr>
          <tr>
            <td align="right" valign="top"></td>
            <td height="100" align="left"><span class="btn" id="submit" style="padding-left:115px;"><?php if ($this->_var['info']['volunteer_id'] == ""): ?> <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'">递交</a> <?php endif; ?></span></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<div style="height:80px; text-align:center; padding-top:40px;"> </div>
<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/group_add.js')); ?>
<?php echo $this->fetch('public/convert_foot.html'); ?>