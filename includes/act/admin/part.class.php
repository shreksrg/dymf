<?php
/**
 * 栏目操作类
 * @author	lxy
 * @date	2013-01-16
 */
class act_admin_part {

	private static $htmlDir = 'part';

	public static function part_list() {
		$parent_id = $_GET["p_id"];
		$status = $_GET["status"];
		$model_part = new model_admin_part();
		$list = $model_part -> get_part_list($status, $parent_id);
		static_function::output_json(array('total' => count($list), 'rows' => $list));
	}

	/**
	 * 栏目树
	 */
	public static function part_list_page() {

		$id = $_GET["p_id"];
		$data = model_admin_part::get_part_info($id);
		base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '栏目列表');
		base_cmshop::smarty() -> assign('p_id', $id);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> display(self::$htmlDir . '/part_list.html');
	}

	public static function show_part_info() {
		$id = $_GET["id"];
		$p_id = $_GET["p_id"];
		$num = $_GET["num"];
		if (!empty($id)) {
			$data = model_admin_part::get_part_info($id);
			base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '修改栏目');
			base_cmshop::smarty() -> assign('part_name', $data["part_name"]);
			base_cmshop::smarty() -> assign('is_lock', $data["is_lock"]);
			base_cmshop::smarty() -> assign('remark', $data["part_Remark"]);
			base_cmshop::smarty() -> assign('id', $id);
		} elseif (isset($p_id)) {
			$data = model_admin_part::get_part_info($p_id);
			base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '添加栏目');
		}
		base_cmshop::smarty() -> assign('p_id', $p_id);
		base_cmshop::smarty() -> assign('num', $num);
		base_cmshop::smarty() -> assign('txt', "栏目");
		base_cmshop::smarty() -> assign('action', "?act=admin_part&st=edit_part_info");
		base_cmshop::smarty() -> display(self::$htmlDir . '/show_part_info.html');
	}

	public static function edit_part_info() {
		$id = $_POST["part_id"];
		if (empty($id)) {
			$p_id = $_POST["p_id"];
			if (isset($p_id)) {
				$data["part_name"] = $_POST["part_name"];
				$data["class_num"] = $_POST["class_num"];
				$data["part_Remark"] = $_POST["Remark"];
				$data["parent_id"] = $p_id;
				$data["status"] = 0;
				model_admin_part::add_part_info($data);
			}
		} else {
			$part_name = $_POST["part_name"];
			$part_Remark = $_POST["Remark"];
			model_admin_part::edit_part_info($part_name, $id, $part_Remark);
		}

		base_cmshop::admin_msg("设置成功！", 2, array( array('text' => '栏目列表', 'href' => 'main.php?act=admin_part&st=part_list_page&p_id=' . $_POST["p_id"] . '&num=' . $_POST["class_num"])));
	}

	public static function cancel_part() {
		$id = $_GET["id"];
		$data = model_admin_part::get_part_info($id);
		if ($data["is_lock"] == 1) {
			base_cmshop::admin_msg("栏目已锁定，不能删除！", 0);
		} else {
			act_admin_part::cancel($id);
			base_cmshop::admin_msg("删除成功！", 2, array( array('text' => '栏目列表', 'href' => 'main.php?act=admin_part&st=part_list_page&p_id=' . $_GET["p_id"] . '&num=' . $_GET["num"])));
		}
	}

	public static function cancel($id) {
		model_admin_part::del_part_info($id);
	}

	public static function show_class_info() {
		$id = $_GET["id"];
		$data = model_admin_part::get_part_info($id);
		base_cmshop::smarty() -> assign('part_name', $data["part_name"]);
		base_cmshop::smarty() -> assign('remark', $data["part_Remark"]);
		base_cmshop::smarty() -> assign('is_lock', $data["is_lock"]);
		base_cmshop::smarty() -> assign('id', $id);
		base_cmshop::smarty() -> assign('html_title', '修改班级名称');
		base_cmshop::smarty() -> assign('txt', "班级");
		base_cmshop::smarty() -> assign('action', "?act=admin_part&st=edit_class_info");
		base_cmshop::smarty() -> display(self::$htmlDir . '/show_part_info.html');
	}

	public static function edit_class_info() {
		$id = $_POST["part_id"];
		if (!empty($id)) {
			$part_name = $_POST["part_name"];
			$part_Remark = $_POST["Remark"];
			model_admin_part::edit_part_info($part_name, $id, $part_Remark);
		}
		base_cmshop::admin_msg("设置成功！", 2, array( array('text' => '班级列表', 'href' => 'main.php?act=admin_course&st=class_list_page&p_id=6&num=1')));
	}

	public static function show_semester_info() {
		$id = $_GET["id"];
		$p_id = $_GET["p_id"];
		$num = $_GET["num"];
		if (!empty($id)) {
			$data = model_admin_part::get_part_info($id);
			base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '修改学期');
			base_cmshop::smarty() -> assign('part_name', $data["part_name"]);
			base_cmshop::smarty() -> assign('remark', $data["part_Remark"]);
			base_cmshop::smarty() -> assign('is_lock', $data["is_lock"]);
			base_cmshop::smarty() -> assign('id', $id);
		} elseif (isset($p_id)) {
			$data = model_admin_part::get_part_info($p_id);
			base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '添加学期');
		}
		base_cmshop::smarty() -> assign('num', $num);
		base_cmshop::smarty() -> assign('p_id', $p_id);
		base_cmshop::smarty() -> assign('txt', "学期");
		base_cmshop::smarty() -> assign('action', "?act=admin_part&st=edit_semester_info");
		base_cmshop::smarty() -> display(self::$htmlDir . '/show_part_info.html');
	}

	public static function edit_semester_info() {
		$id = $_POST["part_id"];
		if (empty($id)) {
			$p_id = $_POST["p_id"];
			if (isset($p_id)) {
				$data["part_name"] = $_POST["part_name"];
				$data["class_num"] = $_POST["class_num"];
				$data["part_Remark"] = $_POST["Remark"];
				$data["status"] = 2;
				$data["parent_id"] = $p_id;
				model_admin_part::add_part_info($data);
			}
		} else {
			$part_name = $_POST["part_name"];
			$part_Remark = $_POST["Remark"];
			model_admin_part::edit_part_info($part_name, $id, $part_Remark);
		}

		base_cmshop::admin_msg("设置成功！", 2, array( array('text' => '学期列表', 'href' => 'main.php?act=admin_course&st=semester_list_page&p_id=' . $_POST["p_id"] . '&num=' . $_POST["class_num"])));
	}

	public static function cancel_semester() {
		$id = $_GET["id"];
		act_admin_part::cancel($id);
		base_cmshop::admin_msg("删除成功！", 2, array( array('text' => '学期列表', 'href' => 'main.php?act=admin_course&st=semester_list_page&p_id=' . $_GET["p_id"] . '&num=' . $_GET["num"])));
	}

	public static function show_category_info() {
		$id = $_GET["id"];
		$p_id = $_GET["p_id"];
		$num = $_GET["num"];
		if (!empty($id)) {
			$data = model_admin_part::get_part_info($id);
			base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '修改课程分类');
			base_cmshop::smarty() -> assign('part_name', $data["part_name"]);
			base_cmshop::smarty() -> assign('remark', $data["part_Remark"]);
			base_cmshop::smarty() -> assign('is_lock', $data["is_lock"]);
			base_cmshop::smarty() -> assign('id', $id);
		} elseif (isset($p_id)) {
			$data = model_admin_part::get_part_info($p_id);
			base_cmshop::smarty() -> assign('html_title', (!empty($data["part_name"]) ? $data["part_name"] . "-" : "") . '添加课程分类');
		}
		base_cmshop::smarty() -> assign('num', $num);
		base_cmshop::smarty() -> assign('p_id', $p_id);
		base_cmshop::smarty() -> assign('txt', "课程分类");
		base_cmshop::smarty() -> assign('action', "?act=admin_part&st=edit_category_info");
		base_cmshop::smarty() -> display(self::$htmlDir . '/show_part_info.html');
	}

	public static function edit_category_info() {
		$id = $_POST["part_id"];
		if (empty($id)) {
			$p_id = $_POST["p_id"];
			if (isset($p_id)) {
				$data["part_name"] = $_POST["part_name"];
				$data["class_num"] = $_POST["class_num"];
				$data["part_Remark"] = $_POST["Remark"];
				$data["status"] = 2;
				$data["parent_id"] = $p_id;
				model_admin_part::add_part_info($data);
			}
		} else {
			$part_name = $_POST["part_name"];
			$part_Remark = $_POST["Remark"];
			model_admin_part::edit_part_info($part_name, $id, $part_Remark);
		}

		base_cmshop::admin_msg("设置成功！", 2, array( array('text' => '课程分类列表', 'href' => 'main.php?act=admin_course&st=category_list_page&p_id=' . $_POST["p_id"] . '&num=' . $_POST["class_num"])));
	}

	public static function cancel_category() {
		act_admin_part::cancel($id);
		base_cmshop::admin_msg("删除成功！", 2, array( array('text' => '课程分类列表', 'href' => 'main.php?act=admin_course&st=category_list_page&p_id=' . $_GET["p_id"] . '&num=' . $_GET["num"])));
	}

}
?>
