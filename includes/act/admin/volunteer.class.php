<?php
/**
 * 义工报名操作类
 * @author	lxy
 * @date	2013-2-20
 */
class act_admin_volunteer {
	private static $htmlDir = 'volunteer';
	/**
	 * 联系我们列表
	 */
	public static function volunteer_list() {
		$page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
		$rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 20;

		$ret = model_admin_volunteer::get_volunteer_list($rows, $page);
		static_function::output_json($ret);
	}

	/**
	 * 联系我们页面
	 */
	public static function volunteer_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
		base_cmshop::smarty() -> assign('show', $_GET["show"]);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> assign('html_title', '义工报名');
		base_cmshop::smarty() -> display(self::$htmlDir . '/volunteer_list_page.html');
	}

	public static function del_volunteer_info() {
		$id = $_GET["id"];
		$ret = model_admin_volunteer::del_volunteer($id);
		base_cmshop::admin_msg("义工信息删除成功！", 2, array( array(
				'text' => '义工报名信息列表',
				'href' => 'main.php?act=admin_volunteer&st=volunteer_list_page'
			)));
	}

	public static function volunteer_info_page() {
		base_cmshop::smarty() -> assign('html_title', '义工信息');
		$info = model_admin_volunteer::volunteer_info($_GET["id"]);
		$info["willing_service"] = json_decode($info["willing_service"], true);
		base_cmshop::smarty() -> assign('info', $info);
		base_cmshop::smarty() -> display(self::$htmlDir . '/volunteer_info.html');
	}

}
?>