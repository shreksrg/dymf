<?php echo $this->fetch('public/page_head.html'); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
  <div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
    <div style="margin-top:5px;">
      <form method="post" action="?act=admin_events&st=<?php echo $this->_var['formAction']; ?>" id="websit_config">
      <input type="hidden" name="event_id" value="<?php echo $this->_var['id']; ?>" id="event_id" />
        <div id="stypestate" style="">
          <h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
          <div class="admin_table mb10">
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr class="tr1 vt">
                <td class="td1">事件标题</td>
                <td class="td2"><input name="event_title" class="easyui-validatebox input_wb input" id="event_title" maxlength="20" data-options="required:true,validType:'length[1,20]'" /></td><td class="td2">
                  <div class="help_a" style="display: block;"> 填写标题，必填</div></td>
              </tr>
              <tr>
                <td class="td1">事件日期</td>
                <td class="td2"><input name="event_datetime" id="event_datetime"  class="easyui-datebox" required="true" value="<?php echo $this->_var['nowdate']; ?>" editable="0"/></td>
                <td class="td2"><div class="help_a" style="display: block;">事件显示日期</div></td>
              </tr>
            </table>
          </div>
          <div class="tac mb10"> <span class="btn" id="submit"><a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">递交</a></span> </div>
        </div>
      </form>
    </div>
  </div>
</div>
 
<script language="javascript">
$(function(){
	$("#submit").click(function(){
		$("#websit_config").submit();
	})
})
</script>

<?php if ($this->_var['id'] != 0): ?>
 
<script language="javascript">
$(function(){
	$("#websit_config").form('load','?act=admin_events&st=ezuiGetInfo&id='+$("#event_id").val());
})
</script>
aaaa
<?php endif; ?>
<?php echo $this->fetch('public/page_foot.html'); ?>