<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/index.css" rel="stylesheet" type="text/css"/>
<div class='body'>
<div id="index_top1">
    <div class="index_top1_inner">
        <div class="title_left">学修指导</div>
        <div class="title_right">上师教言</div>
        <div class="menu_list">
            <ul>
                <li><a href="?act=volunteer&st=showHTML">义工报名</a></li>
                <li><a href="??act=convert&st=showHTML">皈依入学</a></li>
                <li><a href="?act=part&st=showHTML&pid=30">学修指南</a></li>
                <li><a href="?act=selfexamination&st=showHTML">戒律自查</a></li>
            </ul>
        </div>
        <div class="famous_saying" id="ssjy_con"><?php echo $this->_var['ssjy']['msg']; ?></div>
        <a actionid="<?php echo $this->_var['ssjy']['id']; ?>" id="ssjy_next_action" class="next_saying" href="#" sync="0"> 下一篇</a>
    </div>
</div>
<div class="body_back">
<div class="banner_no1">
    <div class="col_bno1_center"><b class="bno1">成就之路</b></div>
</div>
<div><img src="files/images/fw_r8_c3.png" border="0" usemap="#Map"/>
    <map name="Map" id="Map">
        <area shape="rect" coords="87,185,137,202" href="?act=course&st=showHTML&id=7"/>
        <area shape="rect" coords="358,108,409,125" href="?act=course&st=showHTML&id=8"/>
        <area shape="rect" coords="593,106,642,123" href="?act=course&st=showHTML&id=9"/>
        <area shape="rect" coords="595,199,645,214" href="?act=course&st=showHTML&id=10"/>
        <area shape="rect" coords="602,286,653,303" href="?act=course&st=showHTML&id=11"/>
    </map>
</div>
<div class="banner_no1">
    <div class="row_caption_l2">
        <b class="bno1 bt1">学修动态</b>
        <b class="bno1 bt1">学修进程</b>
    </div>
    <map name="Map2" id="Map2">
        <area shape="rect" coords="106,8,199,35" href="?act=part&st=showHTML&pid=<?php echo $this->_var['XXDT']; ?>"/>
        <area shape="rect" coords="557,6,635,37" href="?act=part&st=showHTML&pid=<?php echo $this->_var['XXJC']; ?>"/>
    </map>
</div>
<div id="index_top2">
    <div class="index_top2_cl">
        <ul>
            <?php $_from = $this->_var['xxdt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
            <li><a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"
                   class="default1 show"><?php echo $this->_var['value']['article_title']; ?></a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
    <div class="index_top2_cr" style="">
        <ul>
            <?php $_from = $this->_var['xxjc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
            <li><a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"
                   class="default1 show"><?php echo $this->_var['value']['article_title']; ?></a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
</div>
<div class="banner_no1">
    <div class="col_bno1_center"><b class="bno1">近期课程</b></div>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#A17955;">
    <tr>
        <td width="180" align="center" id="kcap_list" style="font-weight:bolder">
            <ul>
                <?php $_from = $this->_var['cjzl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                <li><a href="#" class="kc default1" class_id="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['part_name']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </td>
        <td valign="top">
            <table id="table_items" class="index_lesson_table" width="100%" border="0" cellspacing="1" cellpadding="0"
                   bgcolor="c8c8c8">
                <thead>
                <tr>
                    <td height="20px">日期</td>
                    <td>内容</td>

                    <td>视频下载</td>
                    <td>音频下载</td>
                    <td>在线播放</td>
                </tr>
                </thead>
                <tbody>

                <?php $_from = $this->_var['kcap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                <tr>
                    <td class="col_1" align="center"><?php echo $this->_var['value']['course_date']; ?></td>
                    <td class="col_2" align="center"><a class='default1'
                                                        href='<?php echo $this->_var['value']['open_link']; ?>'><?php echo $this->_var['value']['course_title']; ?></a></td>


                    <td class="col_3" align="center"><a class='default1' href='<?php echo $this->_var['value']['audio_link']; ?>'>下载<img
                            src="files/images/indxe_r2_c2.jpg"/></a></td>
                    <td class="col_3" align="center"><a class='default1' a href='<?php echo $this->_var['value']['video_link']; ?>'>播放</a></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </tbody>

            </table>
        </td>
    </tr>
</table>
<div class="banner_no1">
    <div class="col_bno1_center"><b class="bno1">学修平台</b></div>
</div>
<div id="index_top3"><b style="font-size: 14px; line-height: 36px">大圆满网络共修讲堂</b></div>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="50%" height="100%" valign="top">
            <table height="100%" width="100%" border="0" cellspacing="0" cellpadding="0" class="index_lesson_table2">
                <tr>
                    <td style="height:20px;"><b>UC房间</b></td>
                    <td style="height:20px;"><b>今日课程</b></td>
                </tr>
                <?php $_from = $this->_var['room']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                <tr>
                    <td><?php echo $this->_var['value']['room_name']; ?> <br/>
                        <img src="<?php echo $this->_var['value']['room_img']; ?>" width="200px" height="70px"/></td>
                    <td><?php echo $this->_var['value']['room_content']; ?></td>

                </tr>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
        </td>
        <td height="100%" width="50%" valign="top">
            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" class="index_lesson_table2">
                <tr>
                    <td style="height:20px;" valign="middle"><a href="<?php echo $this->_var['defaultP']; ?>&amp;pid=<?php echo $this->_var['JTDT']; ?>"
                                                                class="default1"><b>讲堂动态</b></a></td>
                    <td style="height:20px;" valign="middle"><a href="<?php echo $this->_var['defaultP']; ?>&amp;pid=<?php echo $this->_var['JTZX']; ?>"
                                                                class="default1"><b>讲堂资讯</b></a></td>
                </tr>
                <tr>
                    <td id="jt_content1">
                        <ul>
                            <?php $_from = $this->_var['jtdt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                            <li><a href="<?php echo $this->_var['defaultA']; ?>&amp;id=<?php echo $this->_var['value']['article_id']; ?>"
                                   class="default1"><?php echo $this->_var['value']['article_title']; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </td>
                    <td id="jt_content2">
                        <ul>
                            <?php $_from = $this->_var['jtzx']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                            <li><a href="<?php echo $this->_var['defaultA']; ?>&amp;id=<?php echo $this->_var['value']['article_id']; ?>"
                                   class="default1"><?php echo $this->_var['value']['article_title']; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div id="index_top4">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="33%" height="152" align="center" valign="top" class="top" style="line-height:30px;">
                <a class="index_top4_bno" href="###">大圆满法函授部</a>
                <a href="<?php echo $this->_var['defaultA']; ?>&id=21" class="default1 show">招生简章</a>
                <a class="index_top4_bno" href="###">大圆满E友群</a>
                <a href="<?php echo $this->_var['defaultP']; ?>&pid=36" class="default1 show">查看群组</a></td>
            <td width="33%" height="152" align="center" valign="top" class="top" style="line-height:30px;">
                <a class="index_top4_bno" href="?act=part&st=showHTML&pid=37">大圆满YY语音共修频道</a>
                <br>
                <a class="index_top4_bno" href="?act=part&st=showHTML&pid=38">大圆满QT语音共修房间</a>


                <!--<ul>
                  <?php $_from = $this->_var['ckqz']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                  <li> <a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>" class="default1 show"><?php echo $this->_var['value']['article_title']; ?></a> </li>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>--></td>
            <td height="152" align="center" valign="top" class="top">
                <a class="index_top4_bno" href="###">大圆满实修小组</a>
                <table border="0" cellspacing="0" cellpadding="0" style="margin-top:8px;">
                    <tr>
                        <td class="right"><a href="?act=group&st=showHTML" class="default1 show">加入实修小组</a></td>
                        <td class="right"><a href="<?php echo $this->_var['defaultP']; ?>&pid=<?php echo $this->_var['SSJY']; ?>" class="default1 show">上师教言</a></td>
                    </tr>
                    <tr>
                        <td class="right">&nbsp;</td>
                        <td class="right"><a href="<?php echo $this->_var['defaultA']; ?>&id=23" class="default1 show">学员制度</a></td>
                    </tr>
                    <tr>
                        <td class="right"><a href="?act=group&st=show_app_group" class="default1 show">组建小组申请</a></td>
                        <td class="right"><a href="<?php echo $this->_var['defaultA']; ?>" class="default1 show">优秀小组</a></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div class="banner_no1">
    <div class="col_bno1_center"><b class="bno1">网络自习室</b></div>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
    <div id="index_login">
        <!-- <div class="login_class" style="cursor:pointer;"></div>-->
        <b class="index_cls_title">学员登录</b>

        <div id="login_region">
            <?php if ($this->_var['login'] == 1): ?>
            <ul id='loginInfo' style="margin-top:10px;">
                <li>您好 <?php echo $this->_var['user_fullName']; ?>,随喜您精进学修!</li>
                <li>
                    <a class="chpwd" id="passwordchange" href="#inline2" onclick="modifyPassword()">修改密码</a>
                    <a class="chprofile" id="changeProfile" href="?act=user&st=getUserInfo"
                       onclick="getUserInfo(this);return false;">修改个人信息</a>

                </li>
                <li><a class="logout" href="?at=index&st=loginOut"
                       onclick="userLogout(this); return false;">退出</a>
                </li>
            </ul>

            <button name="btn-writeCLogs">填写本月学修记录</button>

            
            <div id="winWriteCLogs" style="display: none">
                
                <?php if ($this->_var['role'] == g0): ?>
                <div id="panel-course">
                    <div class="pc-top">
                        <span>学号:<?php echo $this->_var['stuno']; ?></span>
                        <span>法号:<?php echo $this->_var['buddhist']; ?></span>
                        <span>
                            <select name="xx_year">
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                            </select>
                            <select name="xx_month">
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </span>
                    </div>
                    <div class="pc-left">
                        <button name='btnWS'>闻思班</button>
                        <button name='btnJT'>净土班</button>
                        <button name='btnJX'>加行班</button>
                    </div>
                    <div id="countFormer"></div>
                </div>
                <?php else: ?>
                
                <div id="panel-course">
                    <div class="pc-top">
                        <span>学号:<input type="text"/></span>
                        <span>法号:<input type="text"/></span>
                        <span>
                            <select name="xx_year">
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                            </select>
                            <select name="xx_month">
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </span>
                    </div>
                    <div class="pc-left">
                        <button name='btnWS'>闻思班</button>
                        <button name='btnJT'>净土班</button>
                        <button name='btnJX'>加行班</button>
                    </div>
                    <div id="countFormer"></div>
                </div>
                <?php endif; ?>
            </div>


            <?php else: ?>
            <form id='frmUserLogin' action="?act=index&st=userLogin" method="post">
                <ul>
                    <li> 用户名：<input type="text" name="username" class="easyui-validatebox" maxlength="20"
                                    data-options="required:true,validType:'length[1,20]'"/>
                    </li>
                    <li> 密　码：<input type="password" name="password" class="easyui-validatebox" maxlength="20"
                                    data-options="required:true,validType:'length[1,20]'"/>
                    </li>
                    <li>验证码：<input name="VCODE" type="text" size="4" maxlength="4" style="width:50px;"
                                   id="VCODE"
                                   class="easyui-validatebox" maxlength="20"
                                   data-options="required:true,validType:'length[4,20]'"/>
                        <a href="#" id="yz_action"><img id="yz_img" src="./yz.php"/></a></li>
                    <li>
                        <input type="button" value="登录" style="width:40px;"
                               onclick="userLogin(); return false"/>

                        <input type="button" value="注册" style="width:40px;" onclick="popLogin();"/>
                    </li>
                </ul>
            </form>
            <?php endif; ?>
        </div>
    </div>
    <div id="index_my_classes">
        <b class="index_cls_title">我的课程</b>
        <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
            <?php $_from = $this->_var['cjzl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['v']):
?>
            <tr>
                <td><?php echo $this->_var['v']['part_name']; ?></td>
                <td><a href="?act=myclass&st=showHTML&type=<?php echo $this->_var['v']['id']; ?>"
                       onclick="return showMessage_toLogin(this)">【<?php echo $this->_var['v']['status']; ?>】</a>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <tr>
                <td>课诵及功德统计</td>
                <td><a href="?act=myclass&st=showKS">【我要提交】</a>
                </td>
            </tr>

        </table>
    </div>
    <div id="index_my2">
        <b class="index_cls_title">相关信息</b>
        <!--<a href="?act=myclass&st=showKS" style=" text-decoration:none; background-image:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/></a>-->
        <ul>
            <li><a href="http://www.dymf.cn/User/Message/MessageManager.aspx?ManageType=0">我的信箱</a></li>
            <li><a href="?act=convert&st=my_list_page" onclick="return showMessage_related(this);">我的皈依信息</a></li>
        </ul>
    </div>
    <div id="index_my3">
        <b class="index_cls_title">说明</b>

        <div class="index_my3_desc"><?php echo $this->_var['sysm']; ?></div>
    </div>
</td>
<td width="538" valign="top">

    <div class="index_ask_title"> 咨询与答疑 <span style="float:right;margin-top: 7px"><a class="easyui-linkbutton"
                                                                                     href="index.php?act=question&st=question_show">我要提问</a></span>
    </div>
    <div class="index_ask_body"><b class="bweight_s1">已解答：</b>
        <table width="100%">
            <?php $_from = $this->_var['zxwd1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
            <tr>
                <td><a class="issues_l2" href="?act=question&st=question_info&id=<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['ask']; ?></a>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <tr>
                <td align="right"><a class="issue_more"
                                     href="?act=question&st=question_list&status=1">更多问题..</a></td>
            </tr>
        </table>
        <div class="split_line1"></div>
        <b class="bweight_s1">?待解答：</b>
        <table width="100%">
            <?php $_from = $this->_var['zxwd0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
            <tr>
                <td><a class="issues_l3" href="###"><?php echo $this->_var['value']['ask']; ?></a></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <tr>
                <td align="right"><a class="issue_more"
                                     href="?act=question&st=question_list&status=0">更多问题..</a></td>
            </tr>
        </table>
        <div></div>
    </div>
    <br/>

    <div class="index_ask_title" class="ask_caption"> 教室风景线</div>

    <div class="index_ask_body">
        <ul style="list-style-type:disc">
            <?php $_from = $this->_var['classroom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['v']):
?>
            <li> <?php echo $this->_var['v']; ?></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
</td>
<td width="237" valign="top" style="padding:4px; color:#a07952;">
    <div id="index_ph_top"></div>
    <div class="index_ph_caption"> 课颂及功德排行榜</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="index_ph1table">

        <tr>
            <td class="top">名次</td>
            <td class="top">法名</td>
            <td class="top">学号</td>
        </tr>


        <?php $_from = $this->_var['ks_top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from AS $this->_var['v']):
        $this->_foreach['outer']['iteration']++;
?>
        <tr>
            <td><?php echo $this->_foreach['outer']['iteration']; ?></td>
            <td><?php echo $this->_var['v']['user_fullname']; ?></td>
            <td><?php echo $this->_var['v']['user_id']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

    </table>
    <div class="index_ph_caption"> 闻思班闻法排行榜</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="index_ph1table">
        <tr>
            <td class="top">名次</td>
            <td class="top">法名</td>
            <td class="top">学号</td>
        </tr>
        <?php $_from = $this->_var['wf_top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from AS $this->_var['v']):
        $this->_foreach['outer']['iteration']++;
?>
        <tr>
            <td><?php echo $this->_foreach['outer']['iteration']; ?></td>
            <td><?php echo $this->_var['v']['user_fullname']; ?></td>
            <td><?php echo $this->_var['v']['user_id']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>


    <div class="index_ph_caption"> 加行班观修排行榜</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="index_ph1table">
        <tr>
            <td class="top">名次</td>
            <td class="top">法名</td>
            <td class="top">学号</td>
        </tr>
        <?php $_from = $this->_var['gx_top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from AS $this->_var['v']):
        $this->_foreach['outer']['iteration']++;
?>
        <tr>
            <td><?php echo $this->_foreach['outer']['iteration']; ?></td>
            <td><?php echo $this->_var['v']['user_fullname']; ?></td>
            <td><?php echo $this->_var['v']['user_id']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <div class="index_ph_caption">五加行实修排行榜</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="index_ph1table">
        <tr>
            <td class="top">名次</td>
            <td class="top">法名</td>
            <td class="top">学号</td>
        </tr>
        <?php $_from = $this->_var['sx_top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from AS $this->_var['v']):
        $this->_foreach['outer']['iteration']++;
?>
        <tr>
            <td><?php echo $this->_foreach['outer']['iteration']; ?></td>
            <td><?php echo $this->_var['v']['user_fullname']; ?></td>
            <td><?php echo $this->_var['v']['user_id']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <div class="index_ph_caption"> 净土班念诵排行榜</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="index_ph1table">
        <tr>
            <td class="top">名次</td>
            <td class="top">法名</td>
            <td class="top">学号</td>
        </tr>
        <?php $_from = $this->_var['top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from AS $this->_var['v']):
        $this->_foreach['outer']['iteration']++;
?>
        <tr>
            <td><?php echo $this->_foreach['outer']['iteration']; ?></td>
            <td><?php echo $this->_var['v']['user_fullname']; ?></td>
            <td><?php echo $this->_var['v']['user_id']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<?php echo $this->fetch('public/page_foot1.html'); ?>
</div>
<div style="display:none;">
    <div id="inline1" style="width:392px;height:126px;overflow:auto;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0"
               style="margin:1px; border: #ccc solid 2px; width:390px;">
            <tr>
                <td width="100" height="30" align="right">用户名：</td>
                <td><input name="user_name" type="text" style="border: 1px solid #A4BED4;" maxlength="20"
                           id="user_name"/></td>
            </tr>
            <tr>
                <td width="100" height="30" align="right">密码：</td>
                <td><input name="user_password" type="password" id="user_password" style="border: 1px solid #A4BED4;"
                           maxlength="20"/></td>
            </tr>
            <tr>
                <td width="100" height="30" align="right">姓名：</td>
                <td><input name="user_fullname" type="text" id="user_fullname" style="border: 1px solid #A4BED4;"
                           maxlength="6"/></td>
            </tr>
            <tr>
                <td width="100" height="30" align="right">&nbsp;</td>
                <td><a href="#" id="reg_action" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-save'">注册</a>
                </td>
            </tr>
        </table>
    </div>
    <div id="inline2" style="width:392px;height:66px;overflow:auto;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0"
               style="margin:1px; border: #ccc solid 2px; width:390px;">
            <tr>
                <td width="100" height="30" align="right">新密码：</td>
                <td><input name="user_repassword" type="password" id="user_repassword"
                           style="border: 1px solid #A4BED4;" maxlength="20"/></td>
            </tr>
            <tr>
                <td width="100" height="30" align="right">&nbsp;</td>
                <td><a href="#" id="repass_action" class="easyui-linkbutton"
                       data-options="plain:true,iconCls:'icon-save'">修改</a></td>
            </tr>
        </table>
    </div>
</div>

<div id="winLogin" class="easyui-window" data-options="modal:true,closed:true">
    <form id="frmRegister" action="?act=user&st=user_addAction" method="post">
        <table width="0" border="0" cellspacing="0" cellpadding="6">
            <tr>
                <td width="96">用户名</td>
                <td width="198"><input name="user_name" class="easyui-validatebox" maxlength="20"
                                       data-options="required:true,validType:'length[1,20]'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input id="password" name="user_password" type="password" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'length[6,20]'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>再次输入密码</td>
                <td>
                    <input type="password" name="repassword" id="repassword" class="easyui-validatebox"
                           data-options="required:true" validType="equalTo['#password','shrek']"
                           invalidMessage="两次输入密码不匹配"/>
                    <!--<input name="user_confirmPwd" type="password" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'length[1,20]'"/>-->
                    *
                </td>
            </tr>
            <tr>
                <td>法名</td>
                <td><input name="user_fullname" type="text" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'length[4,20]'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>属学修小组</td>
                <td><input name="user_group" type="text" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'length[1,20]'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>QQ号码</td>
                <td><input name="user_qq" type="text" class="easyui-numberbox" maxlength="20"
                           data-options="validType:'length[4,20]'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>邮件地址</td>
                <td><input name="user_email" type="text" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'email'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>手机号码</td>
                <td><input name="user_mobile" type="text" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'phone'"/>
                    *
                </td>
            </tr>

        </table>
        <input name="admin_flag" type="hidden" value="0"/>

    </form>
    <div style="text-align:center;padding:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitRegister()">提交</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#winLogin').window('close')">关闭</a>
    </div>
</div>
<div id="winModifyPwd" class="easyui-window" data-options="modal:true,closed:true">
    <form id="frmModifyPwd" action="?act=user&st=user_editPassword" method="post">
        <table width="0" border="0" cellspacing="0" cellpadding="6">
            <tr>
                <td>原始密码</td>
                <td><input id="mo_password" name="mo_password" type="password" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'length[6,20]'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>新密码</td>
                <td><input id="mn_password" name="mn_password" type="password" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'length[6,20]'"/>
                    *
                </td>
            </tr>
            <tr>
                <td>再次输入密码</td>
                <td>
                    <input type="password" name="mre_password" id="mre_password" class="easyui-validatebox"
                           data-options="required:true" validType="equalTo['#mn_password']" invalidMessage="两次输入密码不匹配"/>
                    <!--<input name="user_confirmPwd" type="password" class="easyui-validatebox" maxlength="20"
                           data-options="required:true,validType:'length[1,20]'"/>-->
                    *
                </td>
            </tr>


        </table>


    </form>
    <div style="text-align:center;padding:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitModifyPwd()">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#winModifyPwd').window('close')">关闭</a>
    </div>
</div>


<script type="text/javascript" src="files/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="files/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="files/js/fancybox/jquery.fancybox-1.3.4.css" media="screen"/>
<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/index.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'files/js/login.js')); ?>
<?php echo $this->fetch('public/page_foot.html'); ?>