<?php
/**
 * 皈依入学逻辑操作类
 * @author    jonah.fu
 * @date    2012-09-04
 */
class act_convert
{
    private static $htmlDir = 'convert';

    /**
     * 皈依入学页面
     */
    public static function showHTML()
    {
        base_cmshop::smarty()->assign('webtitle', GYRX_TITLE);
        $data = model_admin_part::get_part_info(GYRX);
        base_cmshop::smarty()->assign('remark', $data["part_Remark"]);
        $kswd = model_admin_article::get_reception_article_list(8, 1, GYRX);
        base_cmshop::smarty()->assign('kswd', $kswd["rows"]);
        base_cmshop::smarty()->display(self::$htmlDir . '/convert_show_info.html');

    }

    public static function conaert_set_info()
    {
        base_cmshop::smarty()->assign('webtitle', GYRX_TITLE);
        base_cmshop::smarty()->assign('msg', "");
        base_cmshop::smarty()->assign('acitonURL', '?act=convert&st=add_convert_info');
        base_cmshop::smarty()->display(self::$htmlDir . '/convert_set_info.html');
    }

    public static function add_convert_info()
    {
        $info = array(
            "c_name" => $_POST["c_name"],
            "sex" => $_POST["c_sex"],
            "hometown" => $_POST["c_home"],
            "date_birth" => $_POST["c_birth"],
            "profession" => $_POST["c_prof"],
            "QQ" => $_POST["c_qq"],
            "UC" => $_POST["c_uc"],
            "Tel" => $_POST["c_tel"],
            "address" => $_POST["address"],
            "zip_code" => $_POST["zip_code"],
            "addressee" => $_POST["addressee"],
            "user_id" => 1, //用户ID
            "reason" => $_POST["reason"],
            "sources" => $_POST["sources"],
            "school_type" => $_POST["school_type"],
            "family" => $_POST["family"],
            "origin" => $_POST["origin"],
            "situation" => $_POST["situation"],
            "learning_time" => $_POST["learning_time"],
            "family_environment" => $_POST["family_environment"],
            "eating_habits" => $_POST["eating_habits"]
        );

        if (empty($info["c_name"]))
            static_function::jsMsg("请输入姓名！");
        if (empty($info["Tel"]))
            static_function::jsMsg("请输入联系电话！");
        if (empty($info["address"]))
            static_function::jsMsg("请输入寄证地址！");
        if (empty($info["addressee"]))
            static_function::jsMsg("请输入收件人！");
        if (empty($info["zip_code"]))
            static_function::jsMsg("请输入邮编！");

        $ret = model_convert::set_info($info);
        static_function::jsMsg($ret["msg"], "index.php?act=convert&st=showHTML");
        // ?act=convert&st=showHTML
    }

    public function edit_convert_page()
    {
        $id = $_GET["id"];

        $info = model_convert::get_convert_info($id);
        if ($info["status"] == 1) {
            static_function::jsMsg("信息已处理！不能再进行编辑！", "index.php?act=convert&st=my_list_page");
        } else {
            base_cmshop::smarty()->assign('cid', '$id');
            base_cmshop::smarty()->assign('msg', '');
            base_cmshop::smarty()->assign('acitonURL', '?act=convert&st=edit_convert_info');
            base_cmshop::smarty()->display(self::$htmlDir . '/convert_edit_info.html');
        }

    }

    public function edit_convert_info()
    {
        $id = $_POST["c_id"];
        $info = array(
            "name" => $_POST["c_name"],
            "sex" => $_POST["c_sex"],
            "date_birth" => $_POST["c_birth"],
            "farmington" => $_POST["c_farmington"],
            "origin" => $_POST["origin"],
            "situation" => $_POST["situation"],
            "learning_time" => $_POST["learning_time"],
            "family_environment" => $_POST["family_environment"],
            "eating_habits" => $_POST["eating_habits"]
        );
        $ret = model_convert::edit_convert_info($info, $id);
        base_cmshop::smarty()->assign('msg', $ret["msg"]);
        base_cmshop::smarty()->display('convert/convert_edit_info.html');
    }

   static  public function my_list_page()
    {
        if (empty($_SESSION['user_id'])) {
            echo 0;
            return false;
        }
        //   static_function::jsMsg('请先登录以后查看相关内容！');

        base_cmshop::smarty()->assign('info', model_convert::get_my_convert_list(1));
        base_cmshop::smarty()->display('convert/convert_my_list.html');
    }

    public function del_convert_page()
    {
        $id = $_GET["id"];
        $ret = model_convert::del_convert_info($id);
        base_cmshop::smarty()->assign('msg', $ret["msg"]);
        static_function::jsMsg($ret["msg"], "index.php?act=convert&st=my_list_page");
    }

}

?>