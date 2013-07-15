<?php
/**
 * cmsshop 基类
 */
class base_cmshop {
    private static $smarty, $dbName, $preFix, $cache;

    /**
     * 系统提示信息
     *
     * @access      public
     * @param       string      $errStr			消息内容
     * @param       int         msg_type        消息类型， 0 错误，1 消息，2 完成
     * @param       array       links           可选的链接
     * @param       boolen      $auto_redirect  是否需要自动跳转
     * @return      void
     */
    public static function admin_msg($errStr, $msg_type = 0, $links = array(), $auto_redirect = 1) {
        if (empty($errStr))
            exit("Err Msg Empty!!");

        // print_r($links);
        // exit;

        if (count($links) == 0) {
            $links[0]['text'] = '返回';
            $links[0]['href'] = 'javascript:history.go(-1)';
        }

        base_cmshop::smarty() -> assign('links', $links);
        base_cmshop::smarty() -> assign('default_url', $links[0]['href']);
        base_cmshop::smarty() -> assign('err_msg', $errStr);
        base_cmshop::smarty() -> assign('auto_redirect', $auto_redirect);
        base_cmshop::smarty() -> display('message.html');
    }

    /**
     * 获取站点基础配置信息
     */
    public static function get_config() {
        $configArr = model_admin_set::cms_config_get();
        return $configArr;
    }

    public static function get_cache() {
        /**
         * memcached
         */
        if (MEM_OPEN) {
            if (self::$cache == NULL)
                self::$cache = new base_memcached();
        } else {
            self::$cache = NULL;
        }

        return self::$cache;

    }

    // 获取json 文本数据
    public static function get_json_config($fileName) {
        $filePath = ROOT_PATH . '/includes/config/' . $fileName . ".json";
        if (!file_exists($filePath))
            return FALSE;

        $cache = self::get_cache();
        $cacheName = MEM_GROUP_ROOT . "_get_json_config_" . $fileName;
        $cacheValue = $cache -> get($cacheName);
        $cacheValue = null;
        if (empty($cacheValue)) {
            $cacheValue = file_get_contents($filePath);
            $cache -> set($cacheName, $cacheValue, 0, MEM_DEFAULT_TIMEOUT);
        }
        return json_decode($cacheValue, 1);
    }

    /**
     * 模板静态方法
     * @author	jonah.fu
     * @date	2012-09-04
     */
    public static function smarty() {
        if (self::$smarty == NULL)
            self::$smarty = new base_template();

        return self::$smarty;
    }

    public static function table($str) {
        if (self::$dbName == NULL)
            self::$dbName = MYSQL_MASTER_DBNAME;
        if (self::$preFix == NULL)
            self::$preFix = TABLE_PREFIX;
        return '`' . self::$dbName . '`.`' . self::$preFix . $str . '`';
    }

}
