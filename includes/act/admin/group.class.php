<?php
/**
 * 实修小组操作类
 * @author	lxy
 * @date	2013-01-19
 */
class act_admin_group {
	private static $htmlDir = 'group';
	public static function group_list() {
		$page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
        $rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 1000;
		if (isset($_POST["name_search_input"])) {
			$where["name"] = $_POST["name_search_input"];
		}
		if (isset($_POST["startime"])) {
			$where["startime"] = $_POST["startime"];
		}
		$return["total"]=model_admin_group::get_group_count($where);
        $return["rows"] = model_admin_group::get_group_list($rows, $page,$where);
        static_function::output_json($return);
	}

	public static function guoup_list_page() {
		base_cmshop::smarty() -> assign('html_title','加入小组申请');
		base_cmshop::smarty() -> display(self::$htmlDir . '/group_list_page.html');

	}

public static function app_group_list() {
		$page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
        $rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 1000;
		$return["total"]=model_admin_group::get_app_group_count();
        $return["rows"] = model_admin_group::get_app_group_list($rows, $page);
        static_function::output_json($return);
	}

	public static function app_guoup_list_page() {
		base_cmshop::smarty() -> assign('html_title','实修小组申请');
		base_cmshop::smarty() -> display(self::$htmlDir . '/app_group_list_page.html');

	}
}
?>