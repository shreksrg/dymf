<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="files/css/reset.css" rel="stylesheet" type="text/css" />
<style>
body{font-family:"Microsoft Yahei";}
#tip {
	display: none;
	border: #000 solid 1px;
	height: 80px;
	width: 130px;
	position: absolute;
	background-color: yellow;
}
#tip div {
	padding: 3px;
}
.datenum {
	cursor: pointer;
}
</style>
<title></title>
<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/jquery.min.js')); ?>
</head>

<body style=" background-color: #fff;">
<div style="text-align:center;">
  <div style=" margin:0 auto;">
    <ul>
      <li><img src="files/images/calendar_r2_c2.png" /></li>
      <li>
        <table border="0" cellpadding="0" cellspacing="0" style="width:998x; margin:0 auto;">
          <tr> <?php $_from = $this->_var['dataCalendarArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['v']):
?>
            <td width="35" height="50" align="center" valign="middle" class="datenum"><span class="date_num_str" style="font-family:'黑体'; font-size:16px; font-weight:bolder; <?php if ($this->_var['v']['show'] == 1): ?>color:red <?php endif; ?>" ><?php echo $this->_var['v']['dateNum']; ?></span><br />
              <span class="nl" style="width:35px;"></span><span class="hide_time" style="display:none;"><?php echo $this->_var['v']['dateTime']; ?></span> <span class="hide_title" style="display:none;"><?php echo $this->_var['v']['event_title']; ?></span></td>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></tr>
          <tr><?php $_from = $this->_var['dataCalendarArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['v']):
?>
            <td height="30" align="center" valign="middle" style="display:none;"><?php echo $this->_var['v']['event_title']; ?></td>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></tr>
        </table>
      </li>
      <li><img src="files/images/calendar_r4_c3.png" usemap="#Map" border="0">
        <map name="Map" id="Map">
          <area shape="rect" coords="4,3,51,26" href="?act=calendar&st=showHTML&m=1" />
          <area shape="rect" coords="76,3,136,26" href="?act=calendar&st=showHTML&m=2" />
          <area shape="rect" coords="158,1,218,29" href="?act=calendar&st=showHTML&m=3" />
          <area shape="rect" coords="238,2,302,27" href="?act=calendar&st=showHTML&m=4" />
          <area shape="rect" coords="324,4,385,26" href="?act=calendar&st=showHTML&m=5" />
          <area shape="rect" coords="405,1,463,30" href="?act=calendar&st=showHTML&m=6" />
          <area shape="rect" coords="485,1,545,29" href="?act=calendar&st=showHTML&m=7" />
          <area shape="rect" coords="564,2,630,30" href="?act=calendar&st=showHTML&m=8" />
          <area shape="rect" coords="651,2,711,30" href="?act=calendar&st=showHTML&m=9" />
          <area shape="rect" coords="734,2,803,30" href="?act=calendar&st=showHTML&m=10" />
          <area shape="rect" coords="822,1,896,33" href="?act=calendar&st=showHTML&m=11" />
          <area shape="rect" coords="918,0,984,31" href="?act=calendar&st=showHTML&m=12" />
        </map>
      </li>
    </ul>
  </div>
</div>
<div id="tip">
  <div style="background-color:#8c0c02; text-align:right; color:#FFF;"></div>
  <div></div>
</div>
</body>
</html>
<script type="text/javascript" src="files/js/comm/calendar_showHTML.js"></script>