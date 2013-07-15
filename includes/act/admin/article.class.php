<?php
/**
 * 文章操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_admin_article {
    private static $htmlDir = 'article';

    /**
     * 文章列表
     */
    public static function article_list_page() {
        $id = $_GET["id"];
        $data = model_admin_part::get_part_info($id);
        base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '文章列表');
        base_cmshop::smarty() -> assign('part_id', $_GET["id"]);
        base_cmshop::smarty() -> display(self::$htmlDir . '/article_list.html');
    }

    /**
     * 文章列表
     */
    public static function article_list() {
        $id = $_GET["part_id"];
        $page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
        $rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 1000;
        $ret = model_admin_article::get_article_list($rows, $page, $id);
        $return = array();
        foreach ($ret['rows'] as $v) {
            $v['set_top'] = empty($v['set_top']) ? 0 : 1;
            $return[] = $v;
        }
        $ret['rows'] = $return;
        static_function::output_json($ret);
    }

    /**
     * 添加文章頁面
     */
    public static function edit_article_info() {
        $data["article_content"] = stripslashes(trim($_POST["article_content"]));

        $data["article_title"] = $_POST["article_title"];
        $data["sort"] = $_POST["sort"];
        $data["hide_flag"] = (empty($_POST["hide_flag"])) ? 1 : 0;
        $article = new model_admin_article();
        if (empty($_POST["article_id"])) {
            $data["part_id"] = $_POST["part_id"];

            $article -> add_article_info($data);

            base_cmshop::admin_msg("文章添加成功！", 2, array( array(
                    'text' => '文章列表',
                    'href' => 'main.php?act=admin_article&st=article_list_page&id=' . $_POST["part_id"] . "&num=" . $_POST["num"]
                )));
        } else {
            $data["article_id"] = $_POST["article_id"];
            $article -> edit_article_info($data);

            base_cmshop::admin_msg("文章修改成功！", 2, array( array(
                    'text' => '文章列表',
                    'href' => 'main.php?act=admin_article&st=article_list_page&id=' . $_POST["part_id"] . "&num=" . $_POST["num"]
                )));
        }

    }

    public static function article_add() {
        $id = $_GET["id"];
        $p_id = $_GET["p_id"];
        $num = $_GET["num"];
        $data = model_admin_part::get_part_info($p_id);
		
        if (empty($id)) {
            base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '添加文章');
        } else {
            $article = new model_admin_article();
            base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '修改文章');
            $arr = $article -> get_article_info($id);

            base_cmshop::smarty() -> assign('article', $arr);
        }

        base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
        base_cmshop::smarty() -> assign('num', $_GET["num"]);
        base_cmshop::smarty() -> display(self::$htmlDir . '/article_add.html');
    }

    public static function ss_article_list_page() {
        base_cmshop::smarty() -> assign('html_title', '上师教言列表');
        base_cmshop::smarty() -> assign('part_id', SSJY);
        base_cmshop::smarty() -> display(self::$htmlDir . '/ss_article_list.html');
    }

    public static function ss_article_add() {
        $id = $_GET["id"];
        $p_id = $_GET["p_id"];
        $num = $_GET["num"];
        if (empty($id)) {
            base_cmshop::smarty() -> assign('html_title', '添加上师教言');
            base_cmshop::smarty() -> assign('article', array('set_top' => date('Y-m-d')));
        } else {
            base_cmshop::smarty() -> assign('html_title', '修改上师教言');
            $arr = model_admin_article::get_article_info($id);
            if (!empty($arr['set_top']))
                $arr['set_top'] = 1;
            $arr["article_content"] = base_cmshop::smarty() -> assign('article', $arr);
        }

        base_cmshop::smarty() -> display(self::$htmlDir . '/ss_article_add.html');
    }

    /**
     * 添加文章頁面htmlspecialchars(stripcslashes(
     */
    public static function edit_ss_article_info() {
        $data["article_title"] = trim($_POST['article_title']);
        $data["article_content"] = $_POST["article_content"];

        $data["set_top"] = $_POST["set_top"];
        $link = array( array(
                'text' => '上师教言列表',
                'href' => '?act=admin_article&st=ss_article_list_page'
            ));
        if (empty($_POST["article_id"])) {
            $data["part_id"] = SSJY;
            model_admin_article::add_article_top($data);
            base_cmshop::admin_msg("上师教言添加成功！", 2, $link);
        } else {
            $data["article_id"] = $_POST["article_id"];
            model_admin_article::edit_article_top($data);
            base_cmshop::admin_msg("上师教言修改成功！", 2, $link);
        }

    }

    public static function del_article() {
        $id = $_GET["id"];
        $p_id = $_GET["p_id"];
        $data = model_admin_part::get_part_info($p_id);
        $ret = model_admin_article::del_article_info($id);
        base_cmshop::admin_msg("信息删除成功！", 2, array( array(
                'text' => $data["part_name"] . '文章列表',
                'href' => 'main.php?act=admin_article&st=article_list_page&id=' . $p_id
            )));

    }

}
?>