<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>菜单</title>
<link href="../files/css/reset.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="easyui-accordion" data-options="fit:true,border:1">

  <div title="首页信息管理"  style="padding:5px;overflow:auto;" data-options="selected:true">
    <ul><li> <a href="main.php?act=admin_course&st=course_list_page&p_id=<?php echo $this->_var['jckc']; ?>&num=0&show=0" target="main-frame" class="easyui-linkbutton" data-options="plain:true">基础课程安排</a> </li>
      
    	<li> <a href="main.php?act=admin_course&st=course_list_page&show=1" target="main-frame" class="easyui-linkbutton" data-options="plain:true">课程安排</a> </li>
    	<li> <a href="main.php?act=admin_course&st=course_list_page&show=0" target="main-frame" class="easyui-linkbutton" data-options="plain:true">成就之路</a> </li>
    	<li> <a href="main.php?act=admin_article&st=ss_article_list_page&id=<?php echo $this->_var['ssjy']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">上师教言</a> </li>
    	<li> <a href="main.php?act=admin_group&st=app_guoup_list_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">实修小组申请</a> </li>
    	<li> <a href="main.php?act=admin_room&st=room_list_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">学修平台</a> </li>
      <li> <a href="main.php?act=admin_group&st=guoup_list_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">加入小组申请</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['xxzn']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">学修指南</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['xxdt']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">学修动态</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['xxjc']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">学修进程</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['jtzx']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">讲堂资讯</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['jtdt']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">讲堂动态</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['dymf']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">大圆满法</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['ckqz']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">查看群组</a> </li>
    </ul>
  </div>
    <div title="全局" style="padding:5px; display: none;">
    <ul>
      <li> <a href="main.php?act=admin_set&st=cms_config" target="main-frame" class="easyui-linkbutton" data-options="plain:true">站点设置</a> </li>
      <?php if ($this->_var['user_name'] == "admin"): ?>
      <li> <a href="main.php?act=admin_user&st=user_list" target="main-frame" class="easyui-linkbutton" data-options="plain:true">用户列表</a> </li>
      <?php endif; ?>
      <li> <a href="main.php?act=admin_part&st=part_list_page&p_id=0&num=0" target="main-frame" class="easyui-linkbutton" data-options="plain:true">栏目列表</a> </li>
      <li> <a href="main.php?act=admin_convert&st=convert_list_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">皈依入学申请</a> </li>
      <li> <a href="main.php?act=admin_article&st=article_list_page&id=<?php echo $this->_var['gyrx']; ?>" target="main-frame" class="easyui-linkbutton" data-options="plain:true">皈依入学开示问答</a> </li>
      <li> <a href="main.php?act=admin_course&st=class_list_page&p_id=6&num=1" target="main-frame" class="easyui-linkbutton" data-options="plain:true">班级信息</a> </li>
      <li> <a href="main.php?act=admin_contact&st=contact_list_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">联系我们</a> </li>
      <li> <a href="main.php?act=admin_volunteer&st=volunteer_list_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">义工报名</a> </li>
      <li> <a href="main.php?act=admin_question&st=question_list_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">在线问答</a> </li>
      <li> <a href="main.php?act=admin_user&st=edit_user_pwd_page" target="main-frame" class="easyui-linkbutton" data-options="plain:true">修改密码</a> </li>
      <li> <a href="main.php?act=admin_events&st=showHTML" target="main-frame" class="easyui-linkbutton" data-options="plain:true">事件管理</a> </li>
    </ul>
  </div>
</div>
</body>
<link href="../files/js/jquery.easyui/themes/default/easyui.css" rel="stylesheet" type="text/css" />
<link href="../files/js/jquery.easyui/themes/icon.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/jquery.min.js')); ?>
	<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/jquery.easyui/jquery.easyui.min.js')); ?>
	<?php echo $this->smarty_insert_scripts(array('files'=>'../files/js/jquery.easyui/locale/easyui-lang-zh_CN.js')); ?>
	
	<script type="text/javascript">
		$(function() {
			$("a[href='#']").attr("href", "javascript:;");
		})
	</script>
	
</html>