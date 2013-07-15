<?php
/**
 * mysql 数据库信息
 */
$CMSmySqlPdoServer = array(
    'host' => '127.0.0.1',
    'dbname' => 'dymf_db',
    'username' => 'root',
    'password' => '',
    'charset' => 'UTF8'
);
define('MYSQL_MASTER_DBNAME', $CMSmySqlPdoServer['dbname']);

$timezone = 'Asia/Shanghai';
$cookie_path = "/";
$cookie_domain = "";
$session = "1440";
//--------------------------------------------------
/* 定义常量 */
//--------------------------------------------------
/**
 * 是否配置主站域名
 */
define('SERVER_GET_IP', TRUE);
define('TABLE_PREFIX', '');
define('BASE_CHARSET', 'utf-8');
define('CMS_WEB_HOST', 'testxy.dymf.cn');

/**
 * 不使用
 */
define('SESSION_DATA_LENGTH', '4000');
define('SESSION_ID_NAME', 'bpm_SID');
// session time out secends
define('SESSION_TIME_OUT', $session);
define('API_TIME', '2012-03-14 10:02:59');

/**
 * memcached 数据默认缓存时间
 */
define('MEM_DEFAULT_TIMEOUT', 120);

/**
 * 是否使用memcached缓存
 * @var boolen
 */
define('MEM_OPEN', TRUE);
/**
 * memcached 命名空间根词
 */
define('MEM_GROUP_ROOT', 'dymf_xy_');
/**
 * cookie time out 10 分钟
 */
define('COOKIE_TIME_OUT', 3600);
define('COOKIE_PATH', $cookie_path);
define('COOKIE_DOMAIN', $cookie_domain);

/* 获取执行相对路径 */
$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
if ('/' == substr($php_self, -1))
    $php_self .= 'index.php';

define('PHP_SELF', $php_self);
define('DEBUG_MODE', TRUE);

/**
 * memcached 服务器阵列地址
 *
 * @author  Jonah.Fu
 * @date    2012-03-20
 */
$cacheServer = array( array(
        'host' => '127.0.0.1',
        'port' => 11211
    ));
/**
 * 后台上传图片存放目录
 * @var string
 */
define('IMG_PATH', '/files/upload/admin');
