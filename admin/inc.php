<?php
define('ADMIN_DIR', 'admin');
$rootDir = str_replace(ADMIN_DIR, '', dirname(__FILE__));
require ($rootDir . '/includes/init.php');

/**
 * 登录限制
 */
if (is_array($_SESSION)) {

    if (!isset($_SESSION['user_id']))
        $_SESSION['user_id'] = NULL;
    $toLogin = $_SESSION['user_id'] * 1 == 0 ? TRUE : FALSE;
    if ($toLogin) {
        $page = explode("/", static_function::curPageURL());
        $page = $page[count($page) - 1];

		// 登录页面不重复跳
        $actionList = array(
            'main.php?act=admin_index&st=loginAction' => 1,
            'main.php?act=admin_index&st=loginHTML' => 1
        );

        if (!array_key_exists($page, $actionList))
            header("Location: " . static_function::curURL() . 'main.php?act=admin_index&st=loginHTML');
    }
} else {
    exit ;
}
