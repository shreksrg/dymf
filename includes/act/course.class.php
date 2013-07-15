<?php
/**
 * 栏目逻辑操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_course {
	/**
	 * 栏目页面
	 */
	public static function showHTML() {
		$id = $_GET["id"];
		$data = model_admin_part::get_part_info($id);
		$part_arr = model_admin_part::get_part_course($id);
		if ($data["class_num"] == 1) {
			foreach ($part_arr as $key => $value) {
				if (!empty($value["id"])) {
					$arr = model_admin_course::get_course_list(4, 1, $value["id"], 0);
					$info = null;
					if ($arr["total"] > 4) {
						$part_arr[$key]["is_list"] = 1;
					} else {
						$part_arr[$key]["is_list"] = 0;
					}
					$part_arr[$key]["rows"] = $arr["rows"];
				}
			}
			base_cmshop::smarty() -> assign('p_id', $id);
			base_cmshop::smarty() -> assign('remark', $data["part_Remark"]);
		base_cmshop::smarty() -> assign('part_name', $data["part_name"]);

		} else {
			$p_id=$_GET["p_id"];
			$part_arr[0]["part_name"]=$data["part_name"];
			$data = model_admin_part::get_part_info($p_id);
			$arr = model_admin_course::get_course_list(1000, 1, $id, 0);
			$part_arr[0]["rows"] = $arr["rows"];
			base_cmshop::smarty() -> assign('remark', $data["part_Remark"]);
		base_cmshop::smarty() -> assign('part_name', $data["part_name"]);
		}
		
		base_cmshop::smarty() -> assign('info', $part_arr);
		base_cmshop::smarty() -> display('course.html');

	}

}
?>