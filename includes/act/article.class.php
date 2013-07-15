<?php
/**
 * 栏目逻辑操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_article {
    /**
     * 栏目页面
     */
    public static function leftListDateFormat($data) {
        $i = 0;
        foreach ($data as $v) {
            $data[$i]['raw_add_time'] = date('m-d', strtotime($v['raw_add_time']));
            ++$i;
        }

        return $data;
    }

    public static function showHTML() {
        $id = $_GET["id"];
        model_admin_article::edit_click_num($id);
        $info = model_admin_article::get_article_info($id);
        $part_info = model_admin_part::get_part_info($info["part_id"]);
        $info["article_content"] = html_entity_decode($info["article_content"],ENT_COMPAT,'utf-8');

        // 学修动态右侧栏目 xxdtdata
        $xxdtData = model_admin_article::get_reception_article_list(10, 1, XXDT);
        $xxdtData = self::leftListDateFormat($xxdtData['rows']);
        base_cmshop::smarty() -> assign('xxdtdata', $xxdtData);

        $xxznData = model_admin_article::get_reception_article_list(10, 0, XXZN);
        $xxznData = self::leftListDateFormat($xxznData['rows']);
        base_cmshop::smarty() -> assign('xxzndata', $xxznData);

        $jtzxData = model_admin_article::get_reception_article_list(10, 1, JTZX);
        $jtzxData = self::leftListDateFormat($jtzxData['rows']);
        base_cmshop::smarty() -> assign('jtzxdata', $jtzxData);
        base_cmshop::smarty() -> assign('part_name', $part_info["part_name"]);
        base_cmshop::smarty() -> assign('info', $info);
        base_cmshop::smarty() -> assign('html_title', $info['article_title']);
        base_cmshop::smarty() -> display('article.html');

    }

}
?>