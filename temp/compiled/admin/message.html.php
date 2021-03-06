<?php echo $this->fetch('public/page_head.html'); ?>
<style>
.wrap {
	padding: 20px 20px 70px;
}
#error_tips {
	background: none repeat scroll 0 0 #FFFFFF;
	border: 1px solid #D4D4D4;
	box-shadow: 0 1px 5px #CCCCCC;
	margin: 50px auto;
	width: 500px;
}
#error_tips h2 {
	color: #666666;
	font: bold 14px/40px Arial;
	height: 40px;
	padding: 0 20px;
}
.user_group dt, #error_tips h2, .task_item_list .hd, .medal_term .ct h6, .app_info .hd, .app_present .hd, .app_updata .hd, .sql_list dt {
	background: linear-gradient(#FFFFFF, #FFFFFF 25%, #F4F4F4) no-repeat scroll 0 0 #F9F9F9;
	border-bottom: 1px solid #DFDFDF;
}
.error_cont {
	background: no-repeat scroll 20px 20px transparent;
	line-height: 1.8;
	padding: 20px 20px 30px 80px;
}
.error_return {
	padding: 10px 0 0;
}
a.btn {
}
.btn {
	background: url("../files/admin/images/content/btn.png") repeat scroll 0 0 #E6E6E6;
	border: 1px solid #C4C4C4;
	border-radius: 2px 2px 2px 2px;
	color: #333333;
	cursor: pointer;
	display: inline-block;
	font-family: inherit;
	font-size: 100%;
	line-height: normal;
	overflow: visible;
	padding: 4px 10px;
	text-align: center;
	text-decoration: none;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
	vertical-align: middle;
	white-space: nowrap;
}
.btn:hover {
	background-position: 0 -40px;
	color: #333333;
	text-decoration: none;
}
.btn:active {
	background-position: 0 -81px;
}
</style>
<body>
<div class="wrap">
  <div id="error_tips">
    <h2>信息提示</h2>
    <div class="error_cont"
    <?php if ($this->_var['msg_type'] == 0): ?> style=" background-image:url('../files/admin/images/tips/warning.gif')"    
    <?php elseif ($this->_var['msg_type'] == 1): ?> style=" background-image:url('../files/admin/images/tips/light.png')"
    <?php else: ?> style=" background-image:url('../files/admin/images/tips/success.gif')"<?php endif; ?>
    >
      <ul>
        <li><?php echo $this->_var['err_msg']; ?></li>
        <li id='auto_redirect_li'><?php if ($this->_var['auto_redirect']): ?>如果您不做出选择，将在 <span id="spanSeconds" style="color:red" link="<?php echo $this->_var['default_url']; ?>">3</span> 秒后跳转到第一个链接地址。<?php endif; ?></li>
      </ul>
      <?php $_from = $this->_var['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
      <div class="error_return"><a class="btn" href="<?php echo $this->_var['link']['href']; ?>" <?php if ($this->_var['link']['target']): ?>target="<?php echo $this->_var['link']['target']; ?>"<?php endif; ?>><?php echo $this->_var['link']['text']; ?></a></div><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
  </div>
</div>
<script src="http://127.0.0.1:81/phpwind_v9.0rc_utf8/upload/res/js/dev/pages/admin/common/common.js?v1.0.0"></script>
</body>
<?php if ($this->_var['auto_redirect']): ?>

<script type="text/javascript">
$(function(){
	var seconds = 3;
	var defaultUrl =$("#spanSeconds").attr("link");
	
	if (defaultUrl == 'javascript:history.go(-1)' && window.history.length == 0){
		$("#auto_redirect_li").html('');
		return;
	}
	
	window.setInterval(redirection, 1000);
	
	function redirection(){
	  if (seconds <= 0){
		window.clearInterval();
		return;
	  }
	
	  seconds --;
	  document.getElementById('spanSeconds').innerHTML = seconds;
	
	  if (seconds == 0){
		window.clearInterval();
		location.href = defaultUrl;
	  }
	}
})
</script>

<?php endif; ?>
<?php echo $this->fetch('public/page_foot.html'); ?>