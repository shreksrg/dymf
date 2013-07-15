<?php
/**
 * convert api 输出
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_api_myclass {
    /**
     * AJAX调用接口
     */
    public static function save_learning() {
        $return = array(
            "err" => 0,
            "msg" => CLASS_OK_MSG
        );
        $integral = isset($_GET['integral']) ? $_GET['integral'] : 0;
        $isComplete = isset($_GET['is_complete']) ? $_GET["is_complete"] : -1;
        if ($isComplete == 0) {
            $return["err"] = 1;
            static_function::output_json($return);
        }

        $classType = isset($_GET['type']) ? $_GET['type'] : NULL;
        $classID = isset($_GET['class_id']) ? $_GET["class_id"] : 0;

        $return = array(
            "err" => 0,
            "msg" => CLASS_OK_MSG
        );
        $learningType = base_cmshop::get_json_config('learningType');        // $learningType = static_function::set_row_key('part_name', model_admin_part::get_part_list(2, CJZL)));
        if (!empty($integral)) {
            $learning_type = isset($_GET['typeCode']) ? trim(mb_convert_encoding($_GET['typeCode'], "UTF-8", "gb2312,,UTF-8")) : NULL;
        } else {
            $learning_type = $isComplete > 0 ? "作业" : $learningType[$classID]["class"][$classType]["name"];
            $integral = $isComplete > 0 ? 0 : $learningType[$classID]["class"][$classType]["integral"];
        }

        // echo $integral;
        // exit;
        $data = array();

        $data["part_id"] = $classID;
        $data["user_id"] = $_SESSION['user_id'];
        $data["user_fullname"] = $_SESSION['user_fullname'];
        $data["part_name"] = $learningType[$classID]['name'];
        $data["is_complete"] = $isComplete == -1 ? 0 : $isComplete;
        $data["learning_type"] = $learning_type;
        $data["integral"] = $integral;
        // $learningType[$classID]['class'][$classType]
        if (model_myclass::add_integral($data))
            static_function::output_json($return);
    }

    public static function save_kesong() {
        $return = array(
            "err" => 0,
            "msg" => CLASS_OK_MSG
        );

        $data = array();
        $data['part_id'] = 39;
        $partyInfo = model_admin_part::get_part_info($data['part_id']);
        $data['part_name'] = $partyInfo['part_name'];
        $data["user_id"] = $_SESSION['user_id'];
        $data["user_fullname"] = $_SESSION['user_fullname'];
        $data["is_complete"] = 0;
        $data["learning_type"] = trim(mb_convert_encoding($_GET['learning_type'], "UTF-8", "gb2312,,UTF-8"));
        $data["integral"] = $_GET['integral'] * 1;
        if (model_myclass::add_integral($data))
            static_function::output_json($return);

    }

}
?>