<?php
/**
 * 小组操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_group {
	/**
	 * 栏目页面
	 */
	public static function showHTML() {
		$id=$_GET["id"];
		$info=model_admin_group::get_group_info($id);
		base_cmshop::smarty() -> assign('info',$info);
		base_cmshop::smarty() -> assign('ss_id',$id);
		base_cmshop::smarty() -> assign('msg',"");
		base_cmshop::smarty() -> display('group.html');
	}

	public static function add_group_info() {
		$arr = array(
			"userfullname" => $_POST["getname"],
			"getman" => $_POST["getman"],
			"getbirthday" => $_POST["getbirthday"],
			"getmail" => $_POST["getmail"],
			"getqq" => $_POST["getqq"],
			"gettle2" => $_POST["gettle2"],
			"gettel1" => $_POST["gettel1"],
			"getfaming" => $_POST["getfaming"],
			"getwhen" => $_POST["getwhen"],
			"getprofession" => $_POST["getprofession"],
			"getcontent" => $_POST["getcontent"],
			"joinsheng" => $_POST["joinsheng"],
			"joinshi" => $_POST["joinshi"],
			"joinqu" => $_POST["joinqu"]
		);

		$ret = model_admin_group::set_group_info($arr);
		base_cmshop::smarty() -> assign('msg', $ret["msg"]);
		base_cmshop::smarty() -> display('group.html');
	}
	

	public static function show_app_group() {
		$id=$_GET["id"];
		$info=model_admin_group::get_app_group_info($id);
		base_cmshop::smarty() -> assign('info',$info);
		base_cmshop::smarty() -> assign('ss_id',$id);
		base_cmshop::smarty() -> assign('msg',"");
		base_cmshop::smarty() -> display('app_group.html');
	}
	
	public static function app_group_info() {
		$arr = array(
			"userfullname" => $_POST["getname"],
			"getman" => $_POST["getman"],
			"getbirthday" => $_POST["getbirthday"],
			"getmail" => $_POST["getmail"],
			"getqq" => $_POST["getqq"],
			"gettle2" => $_POST["gettle2"],
			"gettel1" => $_POST["gettel1"],
			"getfaming" => $_POST["getfaming"],
			"getwhen" => $_POST["getwhen"],
			"getprofession" => $_POST["getprofession"],
			"getplace" => $_POST["getplace"],
			"joinsheng" => $_POST["joinsheng"],
			"joinshi" => $_POST["joinshi"],
			"joinqu" => $_POST["joinqu"],
			"crewnum" => $_POST["crewnum"],
			"learning" => $_POST["learning"],
			"groupname" => $_POST["groupname"]
		);

		$ret = model_admin_group::set_app_group_info($arr);
		base_cmshop::smarty() -> assign('msg', $ret["msg"]);
		base_cmshop::smarty() -> display('app_group.html');
	}
	

}
?>