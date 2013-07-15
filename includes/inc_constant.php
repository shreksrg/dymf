<?php
if (!defined('IN_CMSHOP')) {
    die('Hacking attempt');
}
/* 系统常量 */
/**
 * 配置文件目录信息
 */
define('CONFIG_DIR_PATH', '/config/');
define('CONFIG_UPLOAD_FILE', '');

/**
 * 系统信息
 */
define('OS_WIN', !strncasecmp(PHP_OS, 'win', 3));

/**
 * log系统路径
 * @author	jonah.fu
 * @date	2012-07-13
 */
define('SYS_LOG_DIR', '/data/log/');
/**
 * memcached
 */
define('MEM_CACHE_ROOT', 'bpm_');
/**
 * 皈依入学ID
 */
define('GYRX', '1');
/**
 * 上师教言ID
 */
define('SSJY', '5');
/**
 * 成就之路ID
 */
define('CJZL', '6');
/**
 * 基础课程ID
 */
define('JCKC', '7');
/**
 * 学修动态ID
 */
define('XXDT', '2');
/**
 * 学修进程ID
 */
define('XXJC', '3');
/**
 * 讲堂资讯ID
 */
define('JTZX', '4');
/**
 * 讲堂动态ID
 */
define('JTDT', '12');
/**
 * 学修指南ID
 */
define('XXZN', '30');
/**
 * 大圆满法
 */
define('DYMF', '35');
/**
 * 查看群组
 */
define('CKQZ', '36');
/**
 * YY语音
 */
define('YYYY', '37');
/**
 * QT语音
 */
define('QTYY', '38');
/**
 * 皈依入学Title
 */
define('GYRX_TITLE', '皈依入学');
// 联系我们URL
define('CONTACT_US_URL', '#');
// 默认栏目页面
define('DEFAULT_PART_URL', '?act=part&st=showHTML');
// 默认文章页面
define('DEFAULT_ARTICLE_URL', '?act=article&st=showHTML');
define('USERNAME', 'user');
define('USERID', '1');

define('CLASS_LIST_CONFIG', 'classList.json');
define('CLASS_OK_MSG', '随喜赞叹！请继续精进！');
//首页说明
define('SYSM', '28');
