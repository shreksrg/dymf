<?php
/**
 * 用户操作类
 * @author    jonah.fu
 * @date    2012-09-04
 */
class act_user
{
    private static $htmlDir = 'user';

    /**
     * 用户列表
     */
    public static function user_reg()
    {
        base_cmshop::smarty()->assign('html_title', '用户列表');
        base_cmshop::smarty()->display(self::$htmlDir . '/user_add.html');
    }

    public static function user_addAction()
    {
        act_admin_user::user_addAction(1);
    }

    static public function isUserNameExist()
    {
        $username = $_POST['username'];
        act_admin_user::user_isNameExist($username);
    }

    public static function user_editPassword()
    {
        $info = model_admin_user::get_user_info($_SESSION["user_name"]);

        if ($info["user_password"] == sha1($_POST['mo_password'] . $info["raw_add_time"])) {
            $info = model_admin_user::edit_pwd(array(
                "user_password" => ($_POST['mn_password'] . $info["raw_add_time"]),
                "user_id" => $info["user_id"]
            ));
            echo 1;

        } else {
            echo 0;
        }
    }

    static public function getUserInfo()
    {
        if (empty($_SESSION['user_name'])) {
            //static_function::jsMsg('请先登录！');
            echo "请先登录";
            return false;
        }

        $info = model_admin_user::get_user_info($_SESSION["user_name"]);

        // print_r($info);
        base_cmshop::smarty()->assign('info', $info);
        base_cmshop::smarty()->display(self::$htmlDir . '/info.html');
    }

    /**
     * 编辑用户个人信息
     */
    static public function user_editProfile()
    {
        if (!$_SESSION['user_id']) {
            echo json_encode(array('err' => 1, 'msg' => '请先登录'));
            return false;
        }


        $field_required_arr = array('user_name', 'user_fullname', 'user_email', 'user_mobilenum');
        $errors_arr = array();

        if (isset($_POST)) {
            foreach ($_POST as $k => $v) {
                if (in_array($k, $field_required_arr)) {
                    if (empty($v) || !$v)
                        $errors_arr[$k] = $k . '不能为空';
                }
            }

            if (count($errors_arr) > 0)
                echo json_encode(array('err' => 1, 'msg' => $errors_arr));

            $info = $_POST;
            $info['user_id'] = $_SESSION['user_id'];
        }


        $result = model_admin_user::edit_userProfile($info);
        echo json_encode($result);
    }
}