<?php
/**
 * admin user model 数据层逻辑
 * @author	jonah.fu
 * @date	2012-09-04
 */
class model_admin_index extends model_base {
    /**
     * 读取用户信息
     */
    public static function get_loginAction($loginData) {
        $sql = "
    	select raw_add_time from admin_users where user_name=:user_name
    	";
        $rs = self::DB() -> prepare($sql);
        $return = $rs -> execute(array('user_name' => $loginData['user_name']));
        if (!$return)
            return FALSE;

        $rows = $rs -> fetchColumn();
        $loginData['user_password'] = sha1($loginData['user_password'] . $rows);

        $sql = "
		select count(1) from admin_users where user_password=:user_password and user_name=:user_name
		";
        $rs = self::DB() -> prepare($sql);
        $return = $rs -> execute($loginData);
        $rows = $rs -> fetchColumn();
        return $rows;  // 上线后请改回rows
    }

}
