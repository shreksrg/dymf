<?php
/**
 * 联系我们操作类
 * @author	lxy
 * @date	2013-2-20
 */
class act_admin_contact {
	private static $htmlDir = 'contact';
	/**
	 * 联系我们列表
	 */
	public static function contact_list() {
		$page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
		$rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 20;

		$ret = model_admin_contact::get_contact_list($rows, $page);
		static_function::output_json($ret);
	}

	/**
	 * 联系我们页面
	 */
	public static function contact_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
		base_cmshop::smarty() -> assign('show', $_GET["show"]);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> assign('html_title', '联系我们');
		base_cmshop::smarty() -> display(self::$htmlDir . '/contact_list_page.html');
	}

}
?>