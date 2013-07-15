<?php
/**
 * 用户操作类
 * @author    jonah.fu
 * @date    2012-09-04
 */
class act_admin_user
{
    private static $htmlDir = 'user';

    /**
     * 用户列表
     */
    public static function user_list()
    {

        base_cmshop::smarty()->assign('html_title', '用户列表');
        base_cmshop::smarty()->display(self::$htmlDir . '/user_list.html');
    }

    /**
     * 添加用戶頁面
     */
    public static function user_add()
    {
        base_cmshop::smarty()->assign('html_title', '添加管理员');
        base_cmshop::smarty()->display(self::$htmlDir . '/user_add.html');
    }

    /**
     * 添加用戶执行逻辑
     */
    public static function user_addAction($is_front = 0)
    {
        $insertData = array();
        $insertData['user_name'] = trim($_POST['user_name']);
        $insertData['user_password'] = trim($_POST['user_password']);
        $insertData['user_fullname'] = trim($_POST['user_fullname']);
        $insertData['user_email'] = trim($_POST['user_email']);
        $insertData['user_mobilenum'] = trim($_POST['user_mobile']);
        $insertData['user_qq'] = trim($_POST['user_qq']);
        $insertData['user_group'] = trim($_POST['user_group']);
        $insertData['admin_flag'] = $_POST['admin_flag'];

        $insertData['user_intercom_calls'] = trim($_POST['user_intercom_calls']);
        $insertData['user_direct_calls'] = trim($_POST['user_direct_calls']);

        if (empty($insertData['user_name']))
            $is_front ? static_function::jsMsg("用户名不能为空！") : base_cmshop::admin_msg("用户名不能为空！");
        if (empty($insertData['user_password']))
            $is_front ? static_function::jsMsg("密码不能为空！") : base_cmshop::admin_msg("密码不能为空！");
        if (empty($insertData['user_fullname']))
            $is_front ? static_function::jsMsg("全名不能为空！") : base_cmshop::admin_msg("全名不能为空！");
        if (empty($insertData['user_email']))
            $is_front ? static_function::jsMsg("E-mail不能为空！") : base_cmshop::admin_msg("E-mail不能为空！");
        if (empty($insertData['user_mobilenum']))
            $is_front ? static_function::jsMsg("手机号不能为空！") : base_cmshop::admin_msg("手机号不能为空！");

        $sql = "
    	insert into admin_users (" . implode(array_keys($insertData), ",") . ",raw_add_time,raw_update_time) values
    	(" . static_base::str4insert_prepare($insertData) . ",now(),now())
    	";

        if (model_admin_user::insert_user($insertData)) {
            echo 1;
        } else {
            echo 0;
            //  $is_front ? static_function::jsMsg("注册失败！") : base_cmshop::admin_msg("注册失败！");
        }
    }

    static public function user_isNameExist($username)
    {

        if (model_admin_user::chk_existUsername($username)) {
            echo 1;
        } else {
            echo 0;
            //  $is_front ? static_function::jsMsg("注册失败！") : base_cmshop::admin_msg("注册失败！");
        }
    }

    public static function get_user_list()
    {
        $data = model_admin_user::get_user_list();
        if (!empty($GLOBALS['api']))
            static_function::output_json(array(
                'total' => count($data),
                'rows' => $data
            ));

    }

    public static function cancel_user()
    {
        $id = $_GET["id"];
        $ret = model_admin_user::del_user_info($id);
        base_cmshop::admin_msg("管理员信息删除成功！", 2, array(array(
            'text' => '管理员列表',
            'href' => 'main.php?act=admin_user&st=user_list'
        )));
    }

    public static function edit_user_pwd_page()
    {
        $info = model_admin_user::get_user_info($_SESSION["user_name"]);
        base_cmshop::smarty()->assign('html_title', '修改密码');
        base_cmshop::smarty()->assign('info', $info);
        base_cmshop::smarty()->display(self::$htmlDir . '/user_edit_pwd.html');
    }

    public static function edit_user_pwd()
    {
        $info = model_admin_user::get_user_info($_SESSION["user_name"]);
        if ($info["user_password"] == sha1($_POST['user_old_pwd'] . $info["raw_add_time"])) {
            $info = model_admin_user::edit_pwd(array(
                "user_password" => ($_POST['user_new_pwd'] . $info["raw_add_time"]),
                "user_id" => $info["user_id"]
            ));
            base_cmshop::admin_msg("密码修改成功！", 2, array(array(
                'text' => '密码修改',
                'href' => 'main.php?act=admin_user&st=edit_user_pwd_page'
            )));
        } else {
            base_cmshop::admin_msg("原密码输入错误！请重新输入！", 2, array(array(
                'text' => '密码修改',
                'href' => 'main.php?act=admin_user&st=edit_user_pwd_page'
            )));
        }
    }

}

?>