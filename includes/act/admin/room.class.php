<?php
/**
 * UC房间操作类
 * @author	lxy
 * @date	2013-01-20
 */
class act_admin_room {

	private static $htmlDir = 'room';

	public static function room_list() {
		$id = $_GET["id"];
		$page = isset($_POST["page"]) ? $_POST["page"] * 1 : 1;
		$rows = isset($_POST["rows"]) ? $_POST["rows"] * 1 : 20;
		$course = new model_admin_room();
		$ret = $course -> get_room_list($rows, $page, $id);
		static_function::output_json($ret);
	}

	/**
	 * 房间信息列表页面
	 */
	public static function room_list_page() {
		base_cmshop::smarty() -> assign('p_id', $_GET["p_id"]);
		base_cmshop::smarty() -> assign('num', $_GET["num"]);
		base_cmshop::smarty() -> assign('html_title', '房间信息列表');
		base_cmshop::smarty() -> display(self::$htmlDir . '/room_list_page.html');
	}

	public static function show_room_info() {
		$id = $_GET["id"];
		$model_course = new model_admin_room();

		if (!empty($id)) {
			$data = $model_course -> get_room_info($id);
			base_cmshop::smarty() -> assign('html_title', '修改房间信息');
			base_cmshop::smarty() -> assign('info', $data);
			base_cmshop::smarty() -> assign('id', $id);
		} else {
			$data = $model_course -> get_room_info($p_id);
			base_cmshop::smarty() -> assign('html_title', '添加房间信息');
		}
		base_cmshop::smarty() -> display(self::$htmlDir . '/room_info.html');
	}

	public static function edit_room_info() {
		$id = $_POST["c_id"];
		$data["room_name"] = $_POST["room_name"];
		$data["room_content"] = $_POST["room_content"];
		$data["room_url"] = $_POST["room_url"];

		$image = $_FILES['room_img']['name'];
		if (!empty($image)) {
			$datedate = date("Y-m-d");
			$path = "../files/images/uc_upfiles/" . $_FILES['room_img']['name'];
			$type = strstr($image, ".");
			$size = $_FILES['room_img']['size'];
			$url = "/files/images/uc_upfiles/" . $_FILES['room_img']['name'];
			//echo $path;exit;
			if ($size > 1000000) {
				base_cmshop::admin_msg("上传容量超限！", 0, null);
			} elseif ($type != ".jpg" && $type != ".png" && $type != ".gif" && $type != ".bmp" && $type != ".jpeg") {
				base_cmshop::admin_msg("上传类型不对！", 0, null);
			} elseif (move_uploaded_file($_FILES['room_img']['tmp_name'], $path)) {
				$data["room_img"] = $url;
			} else {
				base_cmshop::admin_msg("图片上传失败！", 0, null);
			}
		} else {
			$data["room_img"] = $_POST["img"];
		}

		$model_course = new model_admin_room();
		if (empty($id)) {
			$model_course -> add_room_info($data);
		} else {
			$data["id"] = $id;
			$model_course -> edit_room_info($data);
		}

		base_cmshop::admin_msg("设置成功！", 2, array( array('text' => '房间信息列表', 'href' => 'main.php?act=admin_room&st=room_list_page')));

	}

	public static function cancel_room() {
		$id = $_GET["id"];
		$model_part = new model_admin_room();
		$model_part -> del_room_info($id);
		base_cmshop::admin_msg("删除成功！", 2, array( array('text' => '房间信息列表', 'href' => 'main.php?act=admin_room&st=room_list_page')));
	}

}
?>
