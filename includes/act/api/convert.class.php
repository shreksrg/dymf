<?php
/**
 * convert api 输出
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_api_convert {
    /**
     * AJAX调用接口
     */
    public static function get_convert_info() {
        $convertID = isset($_GET["id"]) ? trim($_GET["id"]) * 1 : 0;
        if (empty($convertID))
            exit("ID Err!");
        $dataArr = model_convert::get_convert_info($convertID);
        $dataArr["c_name"] = $dataArr['name'];
		$dataArr["c_sex"] = $dataArr['sex'];
		$dataArr["c_home"] = $dataArr['hometown'];
		$dataArr["c_birth"] = $dataArr['date_birth'];
		$dataArr["c_prof"] = $dataArr['profession'];
		$dataArr["c_qq"] = $dataArr['QQ'];
		$dataArr["c_uc"] = $dataArr['UC'];
		// school_type
        static_function::output_json($dataArr);
    }

}
?>