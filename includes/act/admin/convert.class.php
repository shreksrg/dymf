<?php
/**
 * 皈依信息操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_admin_convert {
    private static $htmlDir = 'convert';
    public static function convert_list_page() {
        base_cmshop::smarty() -> assign('html_title', '皈依入学信息');
        base_cmshop::smarty() -> display(self::$htmlDir . '/convert_list.html');
    }

    public static function convert_list() {
        $page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
        $rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 1000;
        if (isset($_POST["name_search_input"])) {
            $where["name"] = $_POST["name_search_input"];
        }
        if (isset($_POST["startime"])) {
            $where["startime"] = $_POST["startime"];
        }
        $return["total"] = model_convert::get_convert_count($where);
        $return["rows"] = model_convert::get_convert_list($rows, $page, $where);
        static_function::output_json($return);
    }

    public static function convert_info() {
        $id = $_GET["id"];
        base_cmshop::smarty() -> assign('info', model_convert::get_convert_info($id));
        base_cmshop::smarty() -> assign('html_title', '处理皈依入学信息');
        base_cmshop::smarty() -> display(self::$htmlDir . '/convert_info.html');
    }

    public static function edit_convert_info() {
        $id = $_POST["c_id"];
        $arr["farmington"] = $_POST["farmington"];
        $arr["status"] = $_POST["status"];
        $ret = model_convert::edit_convert_info($arr, $id);
        if ($ret["err"] == 0) {
            base_cmshop::admin_msg("皈依入学信息处理成功！", 2, array( array(
                    'text' => '皈依入学列表',
                    'href' => 'main.php?act=admin_convert&st=convert_list_page'
                )));
        } else {
            base_cmshop::admin_msg("皈依入学信息处理失败！", 0, array( array(
                    'text' => '皈依入学列表',
                    'href' => 'main.php?act=admin_convert&st=convert_list_page'
                )));
        }
    }

    public static function del_convert_info() {
        $id = $_GET["id"];
        $ret = model_convert::del_convert_info($id);
        base_cmshop::admin_msg("皈依信息删除成功！", 2, array( array(
                'text' => '皈依入学列表',
                'href' => 'main.php?act=admin_convert&st=convert_list_page'
            )));
    }

    public static function get_all() {
        static_function::exportToCsv(model_convert::get_convert_list_all(), date("Y-d-m_H_i_s") . '.csv');

    }

}
?>