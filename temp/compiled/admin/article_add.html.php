<?php echo $this->fetch('public/page_head.html'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/xheditor/xheditor-1.1.14-zh-cn.min.js')); ?>
<div class="easyui-tabs" data-options="fit:true,border:false">
  <div title="<?php echo $this->_var['html_title']; ?>" style="padding:20px;overflow:auto;">
    <div style="margin-top:5px;">
      <form method="post" action="?act=admin_article&st=edit_article_info" id="websit_config">
        <div id="stypestate" style="">
          <h2 class="h1"><?php echo $this->_var['html_title']; ?></h2>
          <div class="admin_table mb10">
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr class="tr1 vt">
                <td class="td1">文章标题</td>
                <td class="td2"><input name="article_title"  value="<?php echo $this->_var['article']['article_title']; ?>" class="easyui-validatebox input_wb input" id="article_title" maxlength="20" data-options="required:true,validType:'length[1,20]'" />
                <div class="help_a" style="display: block;"> 填写标题，必填</div></td>
              </tr>
              <tr class="tr1 vt">
                <td class="td1">文章内容</td>
                <td class="td2"><textarea name="article_content" id="article_content" style="width:700px; height:300px;"><?php echo $this->_var['article']['article_content']; ?></textarea></td>
              </tr>  
              <tr class="tr1 vt">
                <td class="td1">文章排序</td>
                <td class="td2"><input type="text" name="sort" value="<?php echo $this->_var['article']['sort']; ?>" /></td>
              </tr> 
              <tr>
              	<td class="td1">设置显示日期</td>
              	<td class="td2"><input name="top_date" id="top_date"  class="easyui-datebox" required="true" value="<?php echo $this->_var['article']['set_top']; ?>"/></td>
              </tr>
              <tr class="tr1 vt">
                <td class="td1">是否显示</td>
                <td class="td2">
                	<input type="checkbox" name="hide_flag" <?php if ($this->_var['article']['hide_flag'] == 0 || $this->_var['article']['article_id'] == 0): ?> checked="checked" <?php endif; ?> />
                	<input type="hidden" value="<?php echo $this->_var['article']['article_id']; ?>" name="article_id" />
                	<input type="hidden" value="<?php echo $this->_var['p_id']; ?>" name="part_id" id="part_id"/>
                	<input type="hidden" value="<?php echo $this->_var['num']; ?>" id="num" name="num"  />
                	</td>
              </tr>             
            </table>
          </div>
          <div class="tac mb10"> <span class="btn" id="submit"><span> <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">递交</a> </span></span> </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/admin/js/article/article_add.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>