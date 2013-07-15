<?php
/**
 * 义工操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_volunteer {
	private static $classDIR = 'volunteer';
	/**
	 * 栏目页面
	 */
	public static function showHTML() {

		base_cmshop::smarty() -> assign('webtitle', '义工报名');
		$filePath = self::$classDIR . "/" . self::$classDIR . '_showHTML.html';
		base_cmshop::smarty() -> display($filePath);

	}

	public static function add_volunteer_info() {
		base_cmshop::smarty() -> assign('webtitle', '联系我们');
		$info = array(
			"address" => $_POST["address"],
			"agenum" => $_POST["agenum"],
			"characteristic" => $_POST["characteristic"],
			"convert_time" => $_POST["convert_time"],
			"educational_level" => $_POST["educational_level"],
			"farmington_tibetan" => $_POST["farmington_tibetan"],
			"farmington_zh" => $_POST["farmington_zh"],
			"fullname" => $_POST["fullname"],
			"gender" => $_POST["gender"],
			"joined_flag" => $_POST["joined_flag"],
			"learning_start_time" => $_POST["learning_start_time"],
			"profession" => $_POST["profession"],
			"qqnum" => $_POST["qqnum"],
			"self_descriptive" => $_POST["self_descriptive"],
			"services_name" => $_POST["services_name"],
			"telnum" => $_POST["telnum"],
			"time_description" => $_POST["time_description"],
			"specialty" => implode(",", $_POST["specialty"]),
			"willing_service" => json_encode($_POST["willing_service"])//self::arr_str($_POST["willing_service"])
		);

		$ret = model_admin_volunteer::add_volunteer_info($info);
		if ($ret["err"] == "0") {
			base_cmshop::smarty() -> assign('msg', '随喜感恩您的发心，我们会尽快处理，祝您早日成就！');
			$filePath = self::$classDIR . "/" . self::$classDIR . '_showHTML.html';
			base_cmshop::smarty() -> display($filePath);
		} else {
			base_cmshop::smarty() -> assign('msg', $ret["msg"]);
			$filePath = self::$classDIR . "/" . self::$classDIR . '_showHTML.html';
			base_cmshop::smarty() -> display($filePath);
		}
	}

	
}
?>