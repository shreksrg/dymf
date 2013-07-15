<?php
define('IN_CMSHOP', TRUE);
require (dirname(__FILE__) . '/inc.php');

base_cmshop::smarty() -> assign('shop_url', "..");
base_cmshop::smarty() -> display('index.html');
