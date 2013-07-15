<?php
/**
 * 课程安排操作类
 * @author	lxy
 * @date	2013-01-19
 */
class act_admin_course {

	private static $htmlDir = 'course';

	public static function course_list() {
		$id = $_GET["id"];
		$show = $_GET["show"];
		$page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
		$rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 20;
		$course = new model_admin_course();
		$ret = model_admin_course:: get_course_list($rows, $page, $id,$show);
		static_function::output_json($ret);
	}

	/**
	 * 班级列表页面
	 */
	public static function class_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
		base_cmshop::smarty() -> assign('show', $_GET["show"]);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> assign('html_title', '添加课程-班级列表');
		base_cmshop::smarty() -> display(self::$htmlDir . '/class_list_page.html');
	}

	/**
	 * 学期页面
	 */
	public static function semester_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> assign('show', $_GET["show"]);
		$data = model_admin_part::get_part_info($_GET["p_id"]);
		base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '添加课程-学期列表');
		base_cmshop::smarty() -> display(self::$htmlDir . '/semester_list_page.html');
	}

	/**
	 * 课程分类页面
	 */
	public static function category_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> assign('show', $_GET["show"]);
		$data = model_admin_part::get_part_info($_GET["p_id"]);
		base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '添加课程-课程分类列表');
		base_cmshop::smarty() -> display(self::$htmlDir . '/category_list_page.html');
	}

	/**
	 * 课程安排页面
	 */
	public static function course_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
	
		base_cmshop::smarty() -> assign('show', $_GET["show"]);
		$data = model_admin_part::get_part_info($_GET["p_id"]);
		base_cmshop::smarty() -> assign('html_title', ($_GET["p_id"]==JCKC ? "基础课程-" : (!empty($_GET["show"]) ? "课程安排-" : "成就之路-")) . '课程列表');
		base_cmshop::smarty() -> display(self::$htmlDir . '/course_list_page.html');
	}

	public static function show_course_info() {
		$id = $_GET["id"];
		$p_id = $_GET["p_id"];
		$model_course = new model_admin_course();
		$ret = model_admin_part::get_part_info($p_id);
		if (!empty($id)) {
			$data = $model_course -> get_course_info($id);
			base_cmshop::smarty() -> assign('html_title', (!empty($ret["part_name"]) ? $ret["part_name"] . "-" : "") . '修改课程');
			base_cmshop::smarty() -> assign('info', $data);
			base_cmshop::smarty() -> assign('id', $id);
		} elseif (isset($p_id)) {
			$data = $model_course -> get_course_info($p_id);
			base_cmshop::smarty() -> assign('html_title', (!empty($ret["part_name"]) ? $ret["part_name"] . "-" : "") . '添加课程');
		}
		base_cmshop::smarty() -> assign('show', $_GET["show"]);
		base_cmshop::smarty() -> assign('p_id', $p_id);
		base_cmshop::smarty() -> display(self::$htmlDir . '/course_info.html');
	}

	public static function edit_course_info() {
		$id = $_POST["c_id"];
		$data["course_title"] = $_POST["course_title"];
		$data["course_content"] = $_POST["course_content"];
		$data["audio_link"] = $_POST["audio_link"];
		$data["video_link"] = $_POST["video_link"];
		$data["doc_link"] = $_POST["doc_link"];
		$data["online_link"] = $_POST["online_link"];
		$data["open_link"] = $_POST["open_link"];
		$data["course_date"] = $_POST["course_date"];
		$data["index_show"] = $_POST["index_show"];
		$model_course = new model_admin_course();
		if (empty($id)) {
			$data["part_id"] = $_POST["p_id"];
			$model_course -> add_course_info($data);

		} else {
			$data["id"] = $id;
			$model_course -> edit_course_info($data);
		}
		if($_POST["p_id"]==JCKC)
		{
			base_cmshop::admin_msg("设置成功！", 2, array( array(
				'text' => '课程列表',
				'href' => 'main.php?act=admin_course&st=course_list_page&p_id='.JCKC.'&num=0&show=0' 
			)));
		}else{
			base_cmshop::admin_msg("设置成功！", 2, array( array(
				'text' => '课程列表',
				'href' => 'main.php?act=admin_course&st=course_list_page&show=' . $_POST["index_show"]
			)));
		}
		
	}

	public static function cancel_course() {
		$id = $_GET["id"];
		$model_part = new model_admin_course();
		$model_part -> del_course_info($id);
		base_cmshop::admin_msg("删除成功！", 2, array( array(
				'text' => '课程列表',
				'href' => 'main.php?act=admin_course&st=course_list_page&p_id=' . $_GET["p_id"]
			)));
	}

}
?>
