<?php
/**
 * 联系我们model 数据层逻辑
 * @author	lxy
 * @date	2013-01-17
 */
class model_admin_volunteer extends model_base {
	
	public static function add_volunteer_info($sqlData = array()) {
		$sql = "
    	insert into `volunteer` (" . implode(",", array_keys($sqlData)) . ",raw_add_time,raw_update_time) values (" . static_base::str4insert_prepare($sqlData) . ",now(),now())
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
	
	 public static function get_volunteer_list($rows, $page) {
        $nextRows = $page == 1 ? $rows : (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        
        $sql_count = "select count(*) from volunteer";

        $rs = self::DB() -> prepare($sql_count);
        $rs -> execute();
        $return["total"] = $rs -> fetchColumn();
        $sql = "SELECT
			a.volunteer_id,
			a.fullname,
			a.gender,
			a.agenum,
			a.educational_level,
			a.convert_time
		FROM
			volunteer a
		 order by a.volunteer_id desc" . (empty($rows) ? "" : " limit " . $startRows . "," . $nextRows);

        $rs = self::DB() -> prepare($sql);
        $rs -> execute();
        $return["rows"] = $rs -> fetchAll();
        return $return;
    }
	 
	public static function del_volunteer($id){
		 $sql = "delete from `volunteer` where `volunteer_id`=:id";
        try {
            $arr =array("id"=>$id);
            $rs = self::DB() -> prepare($sql);
            $rs -> execute($arr);
            return array(
                "err" => 0,
                "msg" => "义工报名信息已删除！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee -> getMessage()
            );
        }
	}
	
	public static function volunteer_info($id){
		$sql="select volunteer_id,
		fullname,
		address,
		agenum,
		characteristic,
		convert_time,
		educational_level,
		farmington_tibetan,
		farmington_zh,
		gender,
		joined_flag,
		learning_start_time,
		profession,
		qqnum,
		self_descriptive,
		services_name,
		telnum,
		time_description,
		specialty,
		willing_service from volunteer where volunteer_id=:id";
		$arr =array("id"=>$id);
            $rs = self::DB() -> prepare($sql);
            $rs -> execute($arr);
			return $rs->fetch();
	}

}
?>