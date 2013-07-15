<?php
/**
 * 在线问答操作类
 * @author	lxy
 * @date	2013-01-20
 */
class act_admin_question {

	private static $htmlDir = 'question';

	public static function question_list() {
		$id = $_GET["id"];
		$page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
		$rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 20;
		$status=2;
		if(isset($_POST["status"])){
			$status=$_POST["status"];
		}
		$course = new model_admin_question();
		$ret = $course -> get_question_list($rows, $page, $status);
		static_function::output_json($ret);
	}
	/**
	 * 在线问答列表页面
	 */
	public static function question_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> assign('html_title', '在线问答信息列表');
		base_cmshop::smarty() -> display(self::$htmlDir . '/question_list_page.html');
	}
	
	public static function show_question_info() {
		$id = $_GET["id"];
		$model_question = new model_admin_question();

		if (!empty($id)) {
			$data = $model_question -> get_question_info($id);
			base_cmshop::smarty() -> assign('html_title', '回答问题');
			base_cmshop::smarty() -> assign('ask', $data["ask"]);
			base_cmshop::smarty() -> assign('answer', $data["answer"]);
			base_cmshop::smarty() -> assign('id', $id);
		}
		base_cmshop::smarty() -> display(self::$htmlDir . '/question_add.html');
	}
	
	public static function edit_question_info() {
		$id = $_POST["c_id"];
		$data["answer"] = $_POST["answer"];
		$model_question = new model_admin_question();
		if (empty($id)) {
				$model_question -> add_question_info($data);
		} else {
			$data["id"] = $id;
			$model_question -> edit_question_info($data);
		}

		base_cmshop::admin_msg("设置成功！", 2, array( array('text' => '在线问答信息列表', 'href' => 'main.php?act=admin_question&st=question_list_page')));
	}
	
	public static function cancel_question() {
		$id = $_GET["id"];
		$model_question = new model_admin_question();
		$model_question -> del_question_info($id);
		base_cmshop::admin_msg("删除成功！", 2, array( array('text' => '在线问答信息列表', 'href' => 'main.php?act=admin_question&st=question_list_page')));
	}
}
?>
