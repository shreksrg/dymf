<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div>hello,<?php echo $this->_var['name']; ?></div>

<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
<span><?php echo $this->_var['value']; ?></span>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</body>
</html>