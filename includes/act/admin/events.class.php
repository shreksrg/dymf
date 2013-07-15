<?php
/**
 * 事件操作
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_admin_events {
    private static $htmlDir = 'events';
    /**
     * 事件列表
     */
    public static function showHTML() {

        base_cmshop::smarty() -> assign('html_title', '事件管理');
        base_cmshop::smarty() -> display(self::$htmlDir . '/events_showHTML.html');
    }

    public static function actionAdd() {
        $data = array();
        $data['event_id'] = isset($_POST['event_id']) ? $_POST['event_id'] * 1 : 0;
        $data['event_title'] = isset($_POST['event_title']) ? trim($_POST['event_title']) : NULL;
        $data['event_datetime'] = isset($_POST['event_datetime']) ? trim($_POST['event_datetime']) . " 00:00:00" : NULL;

        if (empty($data['event_title']))
            base_cmshop::admin_msg("请填写标题！");

        if (empty($data['event_datetime']))
            base_cmshop::admin_msg("请选择日期！");

        $modelReturn = $data['event_id'] > 0 ? model_admin_events::actionEdit($data) : model_admin_events::actionAdd($data);
        if ($modelReturn) {
            base_cmshop::admin_msg("操作成功！", 2, array( array(
                    'text' => '事件列表',
                    'href' => '?act=admin_events&st=showHTML'
                )));

        } else {
            base_cmshop::admin_msg("操作出错！");
        }

    }

    public static function actionDel() {
        $data = array();
        $data['event_id'] = isset($_GET['id']) ? $_GET['id'] * 1 : 0;
        if (model_admin_events::actionDel($data))
            base_cmshop::admin_msg("操作成功！", 2, array( array(
                    'text' => '事件列表',
                    'href' => '?act=admin_events&st=showHTML'
                )));
    }

    public static function addHTML() {
        base_cmshop::smarty() -> assign('formAction', 'actionAdd');
        base_cmshop::smarty() -> assign('html_title', '添加事件');
        base_cmshop::smarty() -> display(self::$htmlDir . '/events_addHTML.html');
    }

    public static function editHTML() {
        base_cmshop::smarty() -> assign('id', $_GET['id'] * 1);
        base_cmshop::smarty() -> assign('formAction', 'actionAdd');
        base_cmshop::smarty() -> assign('html_title', '编辑事件');
        base_cmshop::smarty() -> display(self::$htmlDir . '/events_addHTML.html');
    }

    public static function ezuiGetInfo() {
        $data = array();
        $data['event_id'] = $_GET['id'] * 1;
        $return = model_admin_events::ezuiGetInfo($data);
        $return['event_datetime'] = str_replace(" 00:00:00", "", $return['event_datetime']);
        return static_function::output_json($return);
    }

    public static function ezuiGetList() {
        /**
         * page	1
         * rows	10
         */
        $page = isset($_POST['page']) ? $_POST['page'] * 1 : 1;
        $rows = isset($_POST['rows']) ? $_POST['rows'] * 1 : 20;

        $data = array();
        $data['page'] = $page;
        $data['rows'] = $rows;

        $returnData = model_admin_events::ezuiGetList($data);

        static_function::output_json($returnData);
    }

}
?>