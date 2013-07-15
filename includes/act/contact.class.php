<?php
/**
 * 联系我们
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_contact {
	private static $classDIR = 'contact';
	/**
	 * 栏目页面
	 */
	public static function showHTML() {
		base_cmshop::smarty() -> assign('webtitle', '联系我们');
		$filePath = self::$classDIR . "/" . self::$classDIR . '_' . __FUNCTION__ . '.html';
		base_cmshop::smarty() -> display($filePath);

	}

	public static function add_contact() {
		base_cmshop::smarty() -> assign('webtitle', '联系我们');
		$info = array(
			"content_type" => $_POST["content_type"],
			"content" => $_POST["content"]
		);
		$ret = model_admin_contact::add_contact_info($info);
		if ($ret["err"] == "0") {
			base_cmshop::smarty() -> assign('msg', '感恩您对网络坛城的关心与支持，我们会尽快处理，祝您早日成就！！');
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