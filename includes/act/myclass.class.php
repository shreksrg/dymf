<?php
/**
 * 栏目逻辑操作类
 * @author    jonah.fu
 * @date    2012-09-04
 */
class act_myclass
{
    /**
     * 栏目页面
     */
    public static function showHTML()
    {
        if (empty($_SESSION['user_name'])) {
            //static_function::jsMsg('请先登录！');
            echo 0;
            return false;
        }

        $type = isset($_GET["type"]) ? trim(mb_convert_encoding($_GET['type'], "UTF-8", "gb2312,,UTF-8")) : NULL;
        if (empty($type))
            exit('Type Err!');

        $part_arr = model_admin_part::get_part_course($type);

        foreach ($part_arr as $key => $value) {
            if (!empty($value["id"])) {
                $arr = model_admin_course::get_course_list(4, 1, $value["id"]);
                $info = null;
                if ($arr["total"] > 4) {
                    $part_arr[$key]["is_list"] = 1;
                } else {
                    $part_arr[$key]["is_list"] = 0;
                }
                $part_arr[$key]["rows"] = $arr["rows"];
            }
        }
        if ($type == 9) {
            base_cmshop::smarty()->assign('statistics', model_myclass::Statistics_9(1));
        }
        if ($type == 10) {
            base_cmshop::smarty()->assign('statistics', model_myclass::Statistics_10(1));
        }
        base_cmshop::smarty()->assign('id', $type);
        base_cmshop::smarty()->assign('info', $part_arr);
        base_cmshop::smarty()->display('jxb.html');
    }

    public static function showKS()
    {
        base_cmshop::smarty()->display('kesonggongde.html');
    }

}

?>