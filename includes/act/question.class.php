<?php
/**
 * 我要提问 操作类
 * @author    lxy
 * @date    2013-1-20
 */
class act_question
{
    private static $htmlDir = 'question';

    /**
     * 我要提问
     */
    public static function question_show()
    {
        base_cmshop::smarty()->assign('html_title', '我要提问');
        base_cmshop::smarty()->display(self::$htmlDir . '/question_add.html');
    }

    public static function add_question_info()
    {
        $content = trim($_POST["ask"]);
        if (empty($content))
            static_function::jsMsg('请填写问题内容！');
        $question = new model_admin_question();
        $insertData["ask"] = htmlspecialchars($content);
        $ret = $question->add_question_info($insertData);
        if ($ret) {
            static_function::jsMsg('问题已提交，请等待回答！谢谢！');
        } else {
            static_function::jsMsg('问题没有成功提交，请稍后再提交！');
        }
    }

    public static function question_list()
    {
        self::data();
        $status = $_GET["status"];
        if ($status == "0") {
            base_cmshop::smarty()->assign('status', '在线问答【待解决】');
        } else {
            base_cmshop::smarty()->assign('status', '在线问答【已解决】');
        }
        $arr = model_admin_question::get_question_list(1000, 1, $status);
        base_cmshop::smarty()->assign('data', $arr["rows"]);
        base_cmshop::smarty()->assign('html_title', '在线问答');
        base_cmshop::smarty()->display(self::$htmlDir . '/question_list.html');
    }

    public static function question_info()
    {
        self::data();
        $id = $_GET["id"];
        $info = model_admin_question::get_question_info($id);
        base_cmshop::smarty()->assign('info', $info);
        base_cmshop::smarty()->display(self::$htmlDir . '/question_info.html');
    }

    public static function data()
    {
        // 学修动态右侧栏目 xxdtdata
        $xxdtData = model_admin_article::get_reception_article_list(10, 1, XXDT);
        $xxdtData = $xxdtData['rows'];
        base_cmshop::smarty()->assign('xxdtdata', $xxdtData);
        $xxznData = model_admin_article::get_reception_article_list(10, 1, XXZN);
        $xxznData = $xxznData['rows'];
        base_cmshop::smarty()->assign('xxzndata', $xxznData);
        $jtzxData = model_admin_article::get_reception_article_list(10, 1, JTZX);
        $jtzxData = $jtzxData['rows'];
        base_cmshop::smarty()->assign('jtzxdata', $jtzxData);
    }

}

?>