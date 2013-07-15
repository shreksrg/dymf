<?php
/**
 * 栏目逻辑操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_part {
    /**
     * 处理学修动态栏目页面
     */
    private static function showNormal($pid) {
        $info = model_admin_part::get_part_info($pid);
        $data = model_admin_article::get_reception_article_list(10, 1, $pid);
        $data = $data['rows'];

        // 学修动态右侧栏目 xxdtdata
        $xxdtData = model_admin_article::get_reception_article_list(10, 1, XXDT);
        $xxdtData = act_article::leftListDateFormat($xxdtData['rows']);
        base_cmshop::smarty() -> assign('xxdtdata', $xxdtData);
        $xxznData = model_admin_article::get_reception_article_list(10, 1, XXZN);
        $xxznData = act_article::leftListDateFormat($xxznData['rows']);
        base_cmshop::smarty() -> assign('xxzndata', $xxznData);
        $jtzxData = model_admin_article::get_reception_article_list(10, 1, JTZX);
        $jtzxData = act_article::leftListDateFormat($jtzxData['rows']);

        $i = 0;
        foreach ($data as $v) {
            $data[$i]['raw_add_time'] = date("Y年m月d日", strtotime($v['raw_add_time']));
            ++$i;

        }

        base_cmshop::smarty() -> assign('jtzxdata', $jtzxData);
        base_cmshop::smarty() -> assign('info', $info);
        base_cmshop::smarty() -> assign('data', $data);
        base_cmshop::smarty() -> assign('html_title', $info['part_name']);
        base_cmshop::smarty() -> display('part1.html');
    }

    /**
     * 栏目页面
     */
    public static function showHTML() {
        $pID = isset($_GET["pid"]) ? $_GET['pid'] * 1 : 0;
        if (empty($pID))
            exit("ID Err!");

        // 学修动态
        switch($pID) {
            case SSJY :
            case XXDT :
            case XXJC :
            case JTZX :
            case JTDT :
            case XXZN :
            case CKQZ :
            case YYYY :
            case QTYY :
                self::showNormal($pID);
                exit();
                break;
        }
        base_cmshop::smarty() -> display('part.html');
    }

}
?>