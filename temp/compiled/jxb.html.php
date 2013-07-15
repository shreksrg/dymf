<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/article.css" rel="stylesheet" type="text/css" />
<div class='body'>
<div class="body_back">
  <div class="banner_no1" style="text-align:right;">
    <div> <a href="./">首页</a> | <a href="<?php echo $this->_var['CONTACT_US_URL']; ?>">联系我们</a> </div>
  </div>
  <div style="margin:0 auto;">
    <input type="hidden" name="type_id" id="type_id" title="班级ID" value="<?php echo $this->_var['id']; ?>" />
    <div id="jxb_body"> <?php $_from = $this->_var['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'contact');$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from AS $this->_var['contact']):
        $this->_foreach['outer']['iteration']++;
?>
      <div class="timeline"> <?php echo $this->_var['contact']['semester_name']; ?>
        <input type="hidden" name="semester_id" title="学期" value="<?php echo $this->_var['contact']['semester_id']; ?>" />
      </div>
      <div class="timelinename"> <?php echo $this->_var['contact']['part_name']; ?>
        <input type="hidden" name="part_id" title="课程分类" value="<?php echo $this->_var['contact']['id']; ?>" />
      </div>
      <table class="cj_list" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="25%" height="30" align="center" class="top">&nbsp;</td>
          <td width="25%" height="30" align="center" class="top">闻法</td>
          <td width="25%" height="30" align="center" class="top">观修</td>
          <td height="30" align="center" class="top">作业</td>
        </tr>
        <?php $_from = $this->_var['contact']['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <tr>
          <td height="30" align="center" class="top"><?php echo $this->_var['item']['course_title']; ?></td>
          <td height="30" align="center" class="web_study_room"><button class="wf_button" course_id="<?php echo $this->_var['item']['id']; ?>"> 完成一次 </button></td>
          <td height="30" align="center" class="web_study_room"><button class="gx_button" course_id="<?php echo $this->_var['item']['id']; ?>"> 完成一次 </button></td>
          <td height="30" align="center" class="web_study_room"><select class="easyui-combobox" panelHeight="60" course_id="<?php echo $this->_var['item']['id']; ?>">
              <option value="0">未完成</option>
              <option value="1">已完成</option>
            </select></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table>
      <br/>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php if ($this->_var['id'] == 9): ?>
      <div class="timelinename"> 五内加行实修数目统计 </div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="default">
        <tr>
          <td width="33%" height="30" align="center" class="top">&nbsp;</td>
          <td width="33%" height="30" align="center" class="top">今日完成</td>
          <td width="33%" height="30" align="center" class="top">已完成</td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">皈依</td>
          <td height="30" align="center"><input class="easyui-numberbox" id="nn" style="height:20px; line-height:20px;" value="200" data-options="min:1,max:200,precision:0,required:true"/>
            <a href="#" class="easyui-linkbutton" data-options="plain:true">确认</a></td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['gy']; ?></span></td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">发心</td>
          <td height="30" align="center"><input class="easyui-numberbox" id="nn" style="height:20px; line-height:20px;" value="200" data-options="min:1,max:200,precision:0,required:true"/>
            <a href="#" class="easyui-linkbutton" data-options="plain:true">确认</a></td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['fx']; ?></span></td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">除障法</td>
          <td height="30" align="center"><input class="easyui-numberbox" id="nn" style="height:20px; line-height:20px;" value="200" data-options="min:1,max:200,precision:0,required:true"/>
            <a href="#" class="easyui-linkbutton" data-options="plain:true">确认</a></td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['czf']; ?></span></td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">曼茶罗</td>
          <td height="30" align="center"><input class="easyui-numberbox" id="nn" style="height:20px; line-height:20px;" value="200" data-options="min:1,max:200,precision:0,required:true"/>
            <a href="#" class="easyui-linkbutton" data-options="plain:true">确认</a></td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['mcl']; ?></span></td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">上师瑜伽</td>
          <td height="30" align="center"><input class="easyui-numberbox" id="nn" style="height:20px; line-height:20px;" value="200" data-options="min:1,max:200,precision:0,required:true"/>
            <a href="#" class="easyui-linkbutton" data-options="plain:true">确认</a></td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['ssyj']; ?></span></td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">合计</td>
          <td height="30" align="center">&nbsp;</td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['sum_integral']; ?></span></td>
        </tr>
      </table>
      <?php elseif ($this->_var['id'] == 10): ?>
      <div class="timelinename"><?php echo $this->_var['info']['0']['part_name']; ?>念诵统计</div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="default">
        <tr>
          <td width="33%" height="30" align="center" class="top">&nbsp;</td>
          <td width="33%" height="30" align="center" class="top">今日完成</td>
          <td width="33%" height="30" align="center" class="top">已完成</td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">阿弥陀佛心咒</td>
          <td height="30" align="center"><input class="easyui-numberbox" id="nn" style="height:20px; line-height:20px;" value="4000" data-options="min:1,max:4000,precision:0,required:true"/>
            <a href="#" class="easyui-linkbutton" data-options="plain:true">确认</a></td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['xz']; ?></span></td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">阿弥陀佛圣号</td>
          <td height="30" align="center"><input class="easyui-numberbox" id="nn" style="height:20px; line-height:20px;" value="4000" data-options="min:1,max:4000,precision:0,required:true"/>
            <a href="#" class="easyui-linkbutton" data-options="plain:true">确认</a></td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['sh']; ?></span></td>
        </tr>
        <tr>
          <td height="30" align="center" class="top">合计</td>
          <td height="30" align="center">&nbsp;</td>
          <td height="30" align="center"><span><?php echo $this->_var['statistics']['sum_integral']; ?></span></td>
        </tr>
      </table>
      <?php endif; ?> <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
    </div>
  </div>
  <div class="part_banner_no1"></div>
  <?php echo $this->fetch('public/page_foot1.html'); ?> </div>
<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/comm/jxb.js')); ?>
	<?php echo $this->fetch('public/page_foot.html'); ?> 