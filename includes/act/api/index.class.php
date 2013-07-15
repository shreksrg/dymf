<?php
/**
 * index api 输出
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_api_index {
    /**
     * AJAX调用接口
     */
    public static function showSS() {
        $id = isset($_POST['id']) ? $_POST['id'] * 1 : 0;
        if (empty($id))
            exit('ID Err!');
        $ssjy = model_admin_article::get_reception_article_list($rows, $page, SSJY);
        $ssjy = static_function::set_row_key('article_id', $ssjy['rows']);
        $ssjy_keys = array_keys($ssjy);
        $i = 0;
        $nextKey = 0;
        foreach ($ssjy_keys as $v) {
            if ($v == $id) {
                $nextKey = isset($ssjy_keys[$i + 1]) ? $ssjy_keys[$i + 1] : $ssjy_keys[0];
                break;
            }
            ++$i;
        }
        $return = array();
        $return['id'] = $nextKey;
        $return['msg'] = $ssjy[$nextKey]['article_content'];
        static_function::output_json($return);

    }

    /**
     * AJAX调用接口
     */
    public static function show_course() {
        $class_id = $_POST["class_id"];
        $arr = model_admin_course::get_course_index($class_id);
        foreach ($arr as $key => $value) {
            $date = strtotime($arr[$key]["course_date"]);
            if (!empty($date)) {
                $arr[$key]["course_date"] = date("m月d日", strtotime($arr[$key]["course_date"]));
            } else {
                $arr[$key]["course_date"] = "";
            }
        }
        static_function::output_json($arr);
    }

}
?>