<?php
/**
 * index 业务逻辑操作类
 * @author    jonah.fu
 * @date    2012-09-04
 */
class act_index
{
    private static $kcStatus = array(
        "0" => '我要学修',
        '1' => '功课提交',
        '2' => '学修圆满'
    );

    private static $kcType = array(
        '一年期加行班',
        '净土教程',
        '三年期加行班',
        '闻思班'
    );

    /**
     * 获得上师教言数据
     * @return    Array();
     */
    private static function getSSJY()
    {
        $rows = 1000;
        $page = 1;
        $ssjy = model_admin_article::get_reception_article_list($rows, $page, SSJY);
        $ssjy = $ssjy['rows'];

        // print_r($ssjy['article_id']);

        $ssjyStr = array();
        $i = 0;
        foreach ($ssjy as $v) {
            if (!empty($v['set_top']))
                if ($v['set_top'] == date('Y-m-d')) {
                    $ssjyStr['id'] = $v['article_id'];
                    $ssjyStr['msg'] = $v['article_content'];
                } else {
                    if (isset($ssjy[$i + 1])) {
                        $ssjyStr['id'] = $ssjy[$i + 1]['article_id'];
                        $ssjyStr['msg'] = $ssjy[$i + 1]['article_content'];
                    }
                    model_admin_article::edit_article_top(array('article_id' => $ssjy[$i + 1]['article_id']), 1);
                }
            ++$i;
        }
        if (empty($ssjyStr)) {
            $ssjyStr['id'] = $v[0]['article_id'];
            $ssjyStr['msg'] = $ssjy[0]['article_content'];
            model_admin_article::edit_article_top(array('article_id' => $ssjy[0]['article_id']), 1);
        }
        return $ssjyStr;
    }

    /**
     * index 主页
     */
    public static function showHTML()
    {
        $class = static_function::set_row_key('part_name', self::getCLASS());
        $userClass = array();
        if ($_SESSION['user_id'] * 1 != 0) {
            $classStatus = static_function::set_row_key('part_name', model_index::getUserClassInfo($_SESSION['user_id']));
        } else {
            $classStatus = array();

        }
        foreach ($class as $k => $v) {
            if (isset($classStatus[$k]))
                $class[$k]['status'] = self::$kcStatus[1];
            else {
                $class[$k]['status'] = self::$kcStatus[0];
            }
        }

        base_cmshop::smarty()->assign('login', 0);
        if ($_SESSION['user_id'] * 1 != 0) {
            base_cmshop::smarty()->assign('login', 1);
            base_cmshop::smarty()->assign('user_fullName', $_SESSION['user_fullname']);
        }

        base_cmshop::smarty()->assign('classroom', self::getClassroom());
        base_cmshop::smarty()->assign('ssjy', self::getSSJY());
        base_cmshop::smarty()->assign('xxdt', self::getXXDT());
        base_cmshop::smarty()->assign('xxjc', self::getXXJC());
        base_cmshop::smarty()->assign('jtzx', self::getJTZX());
        base_cmshop::smarty()->assign('jtdt', self::getJTDT());
        base_cmshop::smarty()->assign('ckqz', self::getCKQZ());
        base_cmshop::smarty()->assign('room', self::getROOM());

        base_cmshop::smarty()->assign('cjzl', $class);
        base_cmshop::smarty()->assign('userClass', $userClass);
        base_cmshop::smarty()->assign('zxwd1', self::getZXWD_1());
        base_cmshop::smarty()->assign('zxwd0', self::getZXWD_0());
        base_cmshop::smarty()->assign('sysm', self::getSYSM());
        base_cmshop::smarty()->assign('kcap', self::getKCAP($class[0]["id"]));
        base_cmshop::smarty()->assign('top_list', model_myclass::statistics_top());
        base_cmshop::smarty()->assign('ks_top_list', model_myclass::ks_top());
        base_cmshop::smarty()->assign('wf_top_listt', model_myclass::wf_top());
        base_cmshop::smarty()->assign('gx_top_list', model_myclass::gx_top());
        base_cmshop::smarty()->assign('sx_top_list', model_myclass::sx_top());
        base_cmshop::smarty()->display('index.html');

    }

    /**
     * 用户登录
     */
    public static function userLogin()
    {
        if (trim($_POST['VCODE']) != $_SESSION['VCODE']) {
            echo json_encode(array('errMsg' => '验证码错误'));
            return false;
        }
        // echo "验证码错误";
        // static_function::jsMsg('验证码错误！');

        act_admin_index::loginAction(1);
        exit;
    }

    /**
     * 用户注册
     */
    public static function reginUser()
    {
        $insertData = array();
        $insertData['user_name'] = trim($_GET['un']);
        $insertData['user_password'] = trim($_GET['ps']);
        $insertData['user_fullname'] = trim($_GET['fn']);
        $insertData['user_email'] = '';
        $insertData['user_mobilenum'] = '';

        $return = model_admin_user::insert_user($insertData);
        if ($return)
            static_function::jsMsg('注册成功！请重新登录', './');
        else {
            static_function::jsMsg('信息出错，请重新注册！', './');
        }

    }

    public static function loginOut()
    {
        $_SESSION = array();
        echo 1;
        // static_function::jsMsg('注销成功！', './');
    }

    public static function changePassword()
    {
        //检查原始密码
        //model_admin_user::


        $return = model_admin_user::edit_pwd(array(
            "user_password" => ($_GET['np'] . $_SESSION["raw_add_time"]),
            "user_id" => $_SESSION["user_id"]
        ));

        if ($return['err'] * 1 != 1) {
            // static_function::jsMsg('密码修改成功！');
            echo 1;
        } else {
            echo 0;
            // static_function::jsMsg('密码修改出错！');
        }

    }

    private static function getXXDT()
    {
        $arr = model_admin_article::get_reception_article_list(5, 0, XXDT);
        return $arr["rows"];
    }

    private static function getXXJC()
    {
        $arr = model_admin_article::get_reception_article_list(5, 0, XXJC);
        return $arr["rows"];
    }

    private static function getJTZX()
    {
        $arr = model_admin_article::get_reception_article_list(1000, 1, JTZX);
        return $arr["rows"];
    }

    private static function getJTDT()
    {
        $arr = model_admin_article::get_reception_article_list(1000, 1, JTDT);
        return $arr["rows"];
    }

    private static function getCKQZ()
    {
        $arr = model_admin_article::get_reception_article_list(3, 1, CKQZ);
        return $arr["rows"];
    }

    private static function getZXWD_1()
    {
        $arr = model_admin_question::get_question_list(3, 1, 1);
        return $arr["rows"];
    }

    private static function getZXWD_0()
    {
        $arr = model_admin_question::get_question_list(3, 1, 0);
        return $arr["rows"];
    }

    private static function getKCAP($id)
    {
        $arr = model_admin_course::get_course_index($id);

        foreach ($arr as $key => $value) {
            if (!empty($arr[$key]["course_date"])) {
                $arr[$key]["course_date"] = date("m月d日", strtotime($arr[$key]["course_date"]));
            } else {
                $arr[$key]["course_date"] = "";
            }
        }
        return $arr;
    }

    private static function getSYSM()
    {
        $info = model_admin_article::get_article_info(SYSM);
        return $info["article_content"];
    }

    private static function getROOM()
    {
        $arr = model_admin_room::get_room_list(1000, 1);
        return $arr["rows"];
    }

    public static function getCLASS()
    {
        $arr = model_admin_part::get_part_list(2, CJZL);
        return $arr;
    }

    /**
     * 教室风景线
     */
    public static function getClassroom()
    {
        $arr = model_myclass::get_learning_list(6);
        $return = array();
        foreach ($arr as $v) {
            $str = "";
            $str .= $v['user_fullname'];
            $str .= " " . static_function::time_tran($v['raw_add_time']);
            $str .= " 完成了 {$v['part_name']} 的 {$v['learning_type']}";
            $return[] = $str;
        }
        return $return;
    }


    /*学员登录*/
    public function actionTraineeLogin()
    {

    }
}
