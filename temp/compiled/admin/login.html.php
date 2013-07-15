<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../files/css/reset.css" rel="stylesheet" type="text/css" />
		
		<link href="../files/js/jquery.easyui/themes/default/easyui.css" rel="stylesheet" type="text/css" />
		<link href="../files/js/jquery.easyui/themes/icon.css" rel="stylesheet" type="text/css" />
		<link href="../files/admin/css/login.css" rel="stylesheet" type="text/css" />
		<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/jquery.min.js')); ?>
		<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/jquery.easyui/jquery.easyui.min.js')); ?>
		<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/jquery.easyui/locale/easyui-lang-zh_CN.js')); ?>
		<title>登录</title>
	</head>
	<body>
		<div class="wrap">
			<form autocomplete="off" action="?act=admin_index&st=loginAction" name="login" method="post">
				<div class="login">
					<ul>
						<li>
							<input type="text" title="帐号名" placeholder="帐号名" name="username" required="required" id="J_admin_name" class="input">
						</li>
						<li>
							<input type="password" title="密码" placeholder="密码" name="password" required="required" id="admin_pwd" class="input">
						</li>
					</ul>
					<button class="btn" name="submit" type="submit">
						登录
					</button>
					<br />
					<br />
					<button class="btn" name="reg" type="button" style="display: none;">
						注册
					</button>
				</div>
				
			</form>
		</div>
	</body>
	<script type="text/javascript">
		$(function() {
			$("button[name='reg']").click(function() {
				window.location.href = "..\/index.php?act=user&st=user_reg";
			})
		})
	</script>
</html>
