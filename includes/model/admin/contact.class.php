<?php
/**
 * 联系我们model 数据层逻辑
 * @author	lxy
 * @date	2013-01-17
 */
class model_admin_contact extends model_base {
	
	public static function add_contact_info($sqlData = array()) {
		$sql = "
    	insert into `contact` (" . implode(",", array_keys($sqlData)) . ",raw_add_time,raw_update_time) values (" . static_base::str4insert_prepare($sqlData) . ",now(),now())
    	";
		try {
			$rs = self::DB() -> prepare($sql);
			$rs -> execute($sqlData);
			return array(
				"err" => 0,
				"msg" => ""
			);
		} catch(exception $ee) {
			return array(
				"err" => 1,
				"msg" => $ee ->getTraceAsString()
			);
		}
	}
	
	 public static function get_contact_list($rows, $page) {
        $nextRows = $page == 1 ? $rows : (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        
        $sql_count = "select count(*) from contact";

        $rs = self::DB() -> prepare($sql_count);
        $rs -> execute();
        $return["total"] = $rs -> fetchColumn();
        $sql = "SELECT
			a.contact_id,
			a.content_type,
			a.content,
			a.raw_add_time
		FROM
			contact a
		 order by a.contact_id desc" . (empty($rows) ? "" : " limit " . $startRows . "," . $nextRows);

        $rs = self::DB() -> prepare($sql);
        $rs -> execute();
        $return["rows"] = $rs -> fetchAll();
        return $return;
    }

}
?>