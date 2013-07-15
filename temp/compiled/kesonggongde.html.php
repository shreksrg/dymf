<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/article.css" rel="stylesheet" type="text/css" />
<style>
#kc_table button,#next_table button {width:140px;}
#next_table input{border: 1px solid #A4BED4; height:20px; line-height:20px;}
#next_table textarea{border: 1px solid #A4BED4; height:80px; width:460px;}
#kc_table tr {border-bottom:#727473 dashed 1px;}
</style>
<div class='body'>
<div class="body_back">
  <div class="banner_no1">
    <div class='bread_path_1'> <a href="./">首页</a> </div>
  </div>
  <div style="margin:0 auto;">
    <div style="width:974px;margin:0 auto; margin-top:15px;">
      <div><img src="files/images/kesonggongde_r2_c2.png"></div>
      <div style="border:#727473 solid 1px; border-top: 0px;">
        <table id="kc_table" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20%" height="35" align="center" valign="middle"><button integral="10">早课</button></td>
            <td width="20%" align="center" valign="middle"><button integral="10">晚课</button></td>
            <td width="20%" align="center" valign="middle"><button integral="5">上师瑜伽</button></td>
            <td width="20%" align="center" valign="middle"><button integral="5">金刚萨垛除障法 </button></td>
            <td width="20%" align="center" valign="middle"><button integral="5">供护法</button></td>
          </tr>
          <tr>
            <td width="20%" height="35" align="center" valign="middle"><button  integral="5">火施</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="5">药师佛修法仪轨</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="5">催破金刚修法仪轨</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="3">简供</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="20">会供</button></td>
          </tr>
          <tr>
            <td width="20%" height="35" align="center" valign="middle"><button integral="10">八关斋戒</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="10">破瓦法</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="10">放生</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="10">接引皈依</button></td>
            <td width="20%" align="center" valign="middle"><button  integral="5">交流心得</button></td>
          </tr>
        </table>
        <table id="next_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:50px;">
          <tr>
            <td width="125" height="50" align="right">持咒：</td>
            <td><input id="chizhou_text" type="text"/>&nbsp;&nbsp; 咒语 <input type="text" id="chizhou" value="200"/> 遍</td>
            <td width="350" align="center"><button  integral="1" class="chizhou">递交</button></td>
          </tr>
          <tr>
            <td align="right" valign="top">其他：</td>
            <td valign="top"><input class="easyui-validatebox" id="qita_text" data-options="required:true,validType:'length[1,10]'" style="width:460px;"></td>
            <td width="350" align="center"><button  integral="10" class='qita'>递交</button></td>
          </tr>
        </table>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
      </div>
    </div>
  </div>
  <div class="part_banner_no1"></div>
  <?php echo $this->fetch('public/page_foot1.html'); ?> </div>
<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/comm/kesonggongde.js')); ?>
	<?php echo $this->fetch('public/page_foot.html'); ?> 