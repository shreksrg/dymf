<?php echo $this->fetch('public/convert_head.html'); ?>
<table width="98%" style="margin:0 auto; background-color:#FFF; margin-bottom:20px; border:#FC0 solid 1px;">
  <tr>
    <td height="30" align="center" valign="middle">姓名</td>
    <td height="30" align="center" valign="middle">性别</td>
    <td height="30" align="center" valign="middle">出生日期</td>
    <td height="30" align="center" valign="middle">提交时间</td>
    <td height="30" align="center" valign="middle">法名</td>
    <td height="30" align="center" valign="middle">处理状态</td>
    <td height="30" align="center" valign="middle">操作</td>
  </tr>
  <?php $_from = $this->_var['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');$this->_foreach['arr'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['arr']['total'] > 0):
    foreach ($_from AS $this->_var['value']):
        $this->_foreach['arr']['iteration']++;
?>
  <tr <?php if (($this->_foreach['arr']['iteration'] - 1) % 2 == 0): ?> bgcolor="#CCCCCC" <?php endif; ?>>
    <td height="30" align="center" valign="middle"><?php echo $this->_var['value']['name']; ?> </td>
    <td height="30" align="center" valign="middle"><?php if ($this->_var['value']['sex'] == "0"): ?>女<?php else: ?>男<?php endif; ?></td>
    <td height="30" align="center" valign="middle"><?php echo $this->_var['value']['date_birth']; ?></td>
    <td height="30" align="center" valign="middle"><?php echo $this->_var['value']['add_time']; ?></td>
    <td height="30" align="center" valign="middle"><?php echo $this->_var['value']['farmington']; ?></td>
    <td height="30" align="center" valign="middle"><?php if ($this->_var['value']['status'] == "0"): ?><font color="red">未处理</font><?php else: ?>已处理<?php endif; ?></td>
    <td height="30" align="center" valign="middle"><?php if ($this->_var['value']['status'] == "0"): ?><a href="?act=convert&st=edit_convert_page&id=<?php echo $this->_var['value']['id']; ?>">编辑</a>&nbsp;&nbsp;<a href="?act=convert&st=del_convert_page&id=<?php echo $this->_var['value']['id']; ?>" onclick="if(!confirm('你确定要删除这条皈依信息！'))return false;">删除</a><?php endif; ?></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
    <td></td>
</table>
<?php echo $this->fetch('public/convert_foot.html'); ?>