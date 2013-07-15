<?php
/**
 * admin user model 数据层逻辑
 * @author    jonah.fu
 * @date    2012-09-04
 */
class model_admin_user extends model_base
{
    private $admin_users_table = 'admin_users';

    /**
     * 读取用户信息
     */
    public static function get_user_info($user_name)
    {
        $sql = "
		select `user_id` ,
		  `user_name` ,
		  `user_fullname`,
		  `admin_flag`,
		  `raw_add_time`,
		  `user_email`,
		  `user_group`,
		  `user_qq`,
		  `user_password`,
		  `user_mobilenum`
			from admin_users
		where user_name=?
		";
        $rs = self::DB()->prepare($sql);
        $rs->execute(array($user_name));
        $rows = $rs->fetch();

        return $rows;
    }

    /**
     * 读取用户信息
     */
    public static function get_user_list()
    {
        $sql = "
		select `user_id` ,
		  `user_name` ,
		  `user_fullname`,
		  `admin_flag`,
		  `raw_add_time` 
			from admin_users order by raw_add_time desc
		";
        $rows = self::DB()->query($sql)->fetchAll();

        return $rows;
    }

    /**
     * 检查用户名是否存在
     */

    static public function chk_existUsername($username)
    {
        $sql = " select user_name from admin_users where user_name =$username";
        $rows = self::DB()->query($sql)->fetchAll();
        return $rows;
    }


    /**
     * 添加用戶执行逻辑
     */
    public static function insert_user($insertData)
    {
        $sql = "
    	insert into admin_users (" . implode(array_keys($insertData), ",") . ",raw_add_time,raw_update_time) values
    	(" . static_base::str4insert_prepare($insertData) . ",now(),now())
    	";


        // echo $sql;

        $rs = self::DB()->prepare($sql);
        try {
            self::DB()->beginTransaction();
            $rs->execute($insertData);
            $user_id = self::DB()->lastInsertId();
            $rs = self::DB()->query("select raw_add_time from admin_users where user_id=$user_id")->fetchColumn();
            self::DB()->exec("update admin_users set user_password='" . sha1($insertData['user_password'] . $rs) . "' where user_id=$user_id");
            return self::DB()->commit();
        } catch (Exception $e) {
            self::DB()->rollBack();
            return FALSE;

        }
    }

    public static function del_user_info($id)
    {
        $sql = "delete from `admin_users` where `user_id`=:user_id";
        try {
            $arr["user_id"] = $id;
            $rs = self::DB()->prepare($sql);
            $rs->execute($arr);
            return array(
                "err" => 0,
                "msg" => "管理员信息已删除！"
            );
        } catch (Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee->getMessage()
            );
        }
    }

    public static function edit_pwd($insertData)
    {
        $sql = "update admin_users set user_password='" . sha1($insertData['user_password']) . "' where user_id=" . $insertData["user_id"];
        try {
            $rs = self::DB()->prepare($sql);
            $rs->execute();
            return array(
                "err" => 0,
                "msg" => "密码修改成功！"
            );
        } catch (Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee->getMessage()
            );
        }
    }

    static public function chkPassword($uid)
    {
        $sql = " select user_id from admin_users where user_id =$uid";
        $rows = self::DB()->query($sql)->fetchAll();
        return $rows;
    }

    /**
     * 编辑用户信息
     */

    public static function edit_userProfile($insertData)
    {
        // $sql = "update admin_users set user_password='" . sha1($insertData['user_password']) . "' where user_id=" . $insertData["user_id"];
        $sql = "update admin_users set user_name='" . $insertData['user_name'] . "',user_fullname='" . $insertData['user_fullname'] . "', user_group='" . $insertData['user_group'] . "',user_email='" . $insertData['user_email'] . "',user_qq='" . $insertData['user_qq'] . "',user_mobilenum='" . $insertData['user_mobilenum'] . "' where user_id=" . $insertData["user_id"];
        try {
            $rs = self::DB()->prepare($sql);
            $rs->execute();
            return array(
                "err" => 0,
                "msg" => "密码修改成功！"
            );
        } catch (Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee->getMessage()
            );
        }
    }
}
