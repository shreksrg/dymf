<?php echo $this->fetch('public/page_head.html'); ?>
<link href="files/css/article.css" rel="stylesheet" type="text/css"/>
<div class='body'>
    <div class="body_back">
        <!--<div class="banner_no1" style="text-align:right;">
            <div>
                <a href="./">首页</a> | <a href="<?php echo $this->_var['CONTACT_US_URL']; ?>">联系我们</a>
            </div>
        </div>-->
        <div style="background-color:#0169be">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="737" valign="top">
                        <div class='left_top'>
                            首页 > <a href="./"><?php echo $this->_var['webname']; ?></a> > 在线问答
                        </div>
                        <div class="left_body">
                            <div class="left_inner" style=" text-align:left;">
                                <div class="article_title">
                                    <h2> </h2>
                                </div>
                                <div style="position:relative;left:100px;top:40px;">

                                </div>
                                <div class="art_content" style="padding-top: 1em">
                                    <span style="display: block; padding-bottom: 1em">&nbsp; &nbsp;问:<?php echo $this->_var['info']['ask']; ?></span>
                                    <span style="display: block;font-size:14px;padding-bottom: 2em" id="a_content">&nbsp; &nbsp;答:<?php echo $this->_var['info']['answer']; ?> </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td valign="top">
                        <div class="cj_right_top"></div>
                        <div class="cj_right_body">
                            <table class="art_right_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="top">
                                        <div>
                                            学修指南
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="art_ll_list">
                                            <ul>
                                                <?php $_from = $this->_var['xxzndata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                                                <li>
                                                    <a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo $this->_var['value']['article_title']; ?></a>
                                                </li>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table class="art_right_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="top">
                                        <div>
                                            学修动态
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="art_ll_list">
                                            <ul>
                                                <?php $_from = $this->_var['xxdtdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                                                <li>
                                                    <a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo $this->_var['value']['article_title']; ?></a>
                                                </li>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table class="art_right_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="top">
                                        <div>
                                            讲堂资讯
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="art_ll_list">
                                            <ul>
                                                <?php $_from = $this->_var['jtzxdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                                                <li>
                                                    <a href="<?php echo $this->_var['defaultA']; ?>&id=<?php echo $this->_var['value']['article_id']; ?>"><?php echo $this->_var['value']['article_title']; ?></a>
                                                </li>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="part_banner_no1"></div>
        <?php echo $this->fetch('public/page_foot1.html'); ?>
    </div>
    <?php echo $this->smarty_insert_scripts(array('files'=>'files/js/article.js')); ?>
    <?php echo $this->fetch('public/page_foot.html'); ?>
