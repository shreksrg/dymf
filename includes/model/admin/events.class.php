<?php
/**
 * 事件操作
 * @author	jonah.fu
 * @date	2012-09-04
 */
class model_admin_events extends model_base {
    private static $tableName = 'events';

    public static function actionAdd($sqlData = array()) {
        $sql = "
    	insert into `events` (" . implode(",", array_keys($sqlData)) . ",raw_add_time,raw_udpate_time) values (" . static_base::str4insert_prepare($sqlData) . ",now(),now())
    	";
        $rs = self::DB() -> prepare($sql);
        return $rs -> execute($sqlData);
    }

    public static function actionDel($sqlData = array()) {
        $sql = "
		delete from `events` where event_id=:event_id
		";
        $rs = self::DB() -> prepare($sql);
        return $rs -> execute($sqlData);
    }

    public static function actionEdit($sqlData = array()) {
        $ID = $sqlData['event_id'];
        unset($sqlData['event_id']);

        $sql = "update events set " . static_base::str4prepare($sqlData) . " where event_id=:event_id";
        $sqlData['event_id'] = $ID;
        $rs = self::DB() -> prepare($sql);
        return $rs -> execute($sqlData);
    }

    public static function ezuiGetList($sqlData = array()) {
        $returnData = array();
        $sqlWhere = '';
        $limitSQL = '';
        if (array_key_exists('page', $sqlData))
            $limitSQL = self::returnLimit($sqlData['page'], $sqlData['rows']);
        $sqlField = " count(1) ";

        $sql = "
        select
		$sqlField
		from `events`
		$sqlWhere
        ";
        $returnData['total'] = self::DB() -> query($sql) -> fetchcolumn();

        $sqlField = "
		  `event_id`,
		  `event_title`,
		  `event_datetime`
		";

        $sql = "
        select
		$sqlField
		from `events`
		$sqlWhere order by raw_add_time desc
		$limitSQL 
        ";
        $returnData['rows'] = self::DB() -> query($sql) -> fetchAll();

        return $returnData;

    }

    public static function ezuiGetInfo($sqlData = array()) {
        $sql = "
    	select 
    	  `event_id`,
		  `event_title`,
		  `event_datetime`
		from `events` where event_id=:event_id
    	";

        $rs = self::DB() -> prepare($sql);
        $rs -> execute($sqlData);
        return $rs -> fetch();
    }

    public static function getEvents($startDay, $endDay) {
        $startDay = $startDay . ' 00:00:00';
        $endDay = $endDay . ' 23:59:59';
        $sql = "
    	select 
    	`event_title`,
    	date_format(event_datetime,'%Y-%c-%e') as `event_datetime`
    	from `events` where 1=1 
    	and event_datetime>=:event_datetime_start
    	and event_datetime<=:event_datetime_end
    	order by event_datetime
    	";

        $data = array();
        $data['event_datetime_start'] = $startDay;
        $data['event_datetime_end'] = $endDay;
        $rs = self::DB() -> prepare($sql);
        $rs -> execute($data);

        return $rs -> fetchAll();
    }

}
?>