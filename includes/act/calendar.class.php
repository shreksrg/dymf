<?php
/**
 * 日历操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class act_calendar {
    private static $htmlDir = 'calendar';
    /**
     * 用户列表
     */
    public static function showHTML() {
        $m = isset($_GET['m']) ? $_GET['m'] * 1 : 0;
        $dataCalendarMaxDay = !empty($m) ? date('t', strtotime(date('Y') . '-' . $m)) : date('t');

        $dataCalendarArr = array();
        for ($i = 1; $i <= $dataCalendarMaxDay; $i++) {
            $temp = array();
            $temp['dateNum'] = $i;
            $dateStr = !empty($m) ? (date('Y') . '-' . $m . '-' . $i) . '' : (date('Y') . '-' . date('n') . '-' . $i) . '';
            $temp['dateTime'] = strtotime($dateStr);
            $temp['event_title'] = '';
            $temp['show'] = 0;
            $dataCalendarArr[$dateStr] = $temp;
        }
		
        $dataCalendarArr_temp = array_values($dataCalendarArr);
        if (!empty($m)) {
            $dataCalendarFirstDay = date('Y-m-d', $dataCalendarArr_temp[0]['dateTime']);
            $dataCalendarLastDay = date('Y-m-d', $dataCalendarArr_temp[count($dataCalendarArr_temp) - 1]['dateTime']);
        } else {
            $dataCalendarFirstDay = date('Y-m-d', $dataCalendarArr_temp[0]['dateTime']);
            $dataCalendarLastDay = date('Y-m-d', $dataCalendarArr_temp[count($dataCalendarArr_temp) - 1]['dateTime']);
        }
        $events = model_admin_events::getEvents($dataCalendarFirstDay, $dataCalendarLastDay);
        if (!empty($events))
            foreach ($events as $v) {
                $dataCalendarArr[$v['event_datetime']]['event_title'] = $v['event_title'];
                $dataCalendarArr[$v['event_datetime']]['show'] = 1;
            }
        base_cmshop::smarty() -> assign('dataCalendarArr', $dataCalendarArr);
        base_cmshop::smarty() -> assign('html_title', '日历');
        base_cmshop::smarty() -> display(self::$htmlDir . '/' . self::$htmlDir . '_' . __FUNCTION__ . '.html');
    }

    public static function user_addAction() {
        act_admin_user::user_addAction(1);
    }

}
?>