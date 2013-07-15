<?php
define('IN_CMSHOP', TRUE);
require(dirname(__FILE__) . '/includes/init.php');

$act = isset($_GET['act']) ? $_GET['act'] : 'index';
if (empty($act))
    exit('get act code err!');

$st = isset($_GET['st']) ? $_GET['st'] : 'showHTML';
if (empty($st))
    exit('get st code err!');

//
$api = isset($_GET['api']) ? $_GET['api'] : NULL;

// 联系我们
base_cmshop::smarty()->assign('nowdate', date('Y-m-d'));
base_cmshop::smarty()->assign('CONTACT_US_URL', CONTACT_US_URL);
base_cmshop::smarty()->assign('defaultP', DEFAULT_PART_URL);
base_cmshop::smarty()->assign('defaultA', DEFAULT_ARTICLE_URL);
base_cmshop::smarty()->assign('cms_web_host', 'http://' . CMS_WEB_HOST . '/');
base_cmshop::smarty()->assign('cms_web_contactme', '?act=contact&st=showHTML');
base_cmshop::smarty()->assign('web_icp', $config['basic']['icp']);
base_cmshop::smarty()->assign('web_statscode', $config['basic']['statscode']);

base_cmshop::smarty()->assign('XXDT', XXDT);
base_cmshop::smarty()->assign('XXZN', XXZN);
base_cmshop::smarty()->assign('XXJC', XXJC);
base_cmshop::smarty()->assign('SSJY', SSJY);
base_cmshop::smarty()->assign('JTDT', JTDT);
base_cmshop::smarty()->assign('JTZX', JTZX);

if (isset($_GET['c'])) {
    $controlClass = 'act_' . $_GET['c'];
    $controller = new $controlClass();
    $controller->$st();
} else {
    $tmpObjName = 'act_' . $act;
    $tmpObjName::$st();
}

