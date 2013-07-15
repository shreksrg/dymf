<?php
/**
 * 实训小组model 数据层逻辑
 * @author	lxy
 * @date	2013-01-16
 */
class model_admin_group extends model_base {

	public static function set_group_info($arr) {
		$sql = "
    		insert into `ss_group` (`" . implode("`,`", array_keys($arr)) . "`,raw_add_time,status) 
    		values (" . static_base::str4insert_prepare($arr) . ",now(),0)";
		try {
			$rs = self::DB() -> prepare($sql);
			$rs -> execute($arr);
		return array(
                "err" => "0",
                "msg" => "信息提交成功！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => "1",
                "msg" => $ee->getMessage()
            );
        }
	}
	
	public static function set_app_group_info($arr) {
		$sql = "
    		insert into `app_group` (`" . implode("`,`", array_keys($arr)) . "`,raw_add_time,status) 
    		values (" . static_base::str4insert_prepare($arr) . ",now(),0)";
		try {
			$rs = self::DB() -> prepare($sql);
			$rs -> execute($arr);
		return array(
                "err" => "0",
                "msg" => "信息提交成功！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => "1",
                "msg" => $ee->getMessage()
            );
        }
	}
	
	
	public static function get_group_count($where) {
    	$where_sql=null;
		if(!empty($where["name"]))
		{
			$where_sql.=" and name like '%".$where["name"]."%' ";
		}
		if(!empty($where["startime"]))
		{
			$where_sql.=" and add_time='".$where["startime"]."'";
		}
        $sql_count = "select count(*) from `ss_group`  where 1=1 ".$where_sql;
        $rs = self::DB()->prepare($sql_count);
        $rs->execute();
        return $rs->fetchColumn();
    }

    public static function get_group_list($rows, $page,$where) {
    	$where_sql=null;
		if(!empty($where["name"]))
		{
			$where_sql.=" and userfullname like '%".$where["name"]."%' ";
		}
		if(!empty($where["startime"]))
		{
			$where_sql.=" and add_time='".$where["startime"]."'";
		}
        $nextRows = (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        $sql = "select ss_group_id,userfullname,getman,gettel1,getprofession,joinsheng,joinshi,joinqu,raw_add_time,status from `ss_group` where 1=1 ".$where_sql. (empty($rows) ? "" : " limit " . $startRows . "," . $nextRows);
        
        echo $sql;$rs = self::DB()->prepare($sql);
        $rs->execute();
        return $rs->fetchAll();
    }
	
	public static function get_group_info($id)
	{
		$sql="select ss_group_id,userfullname,getman,getbirthday,getmail,getqq,gettel1,gettle2,getfaming,getwhen,getcontent,getprofession,joinsheng,joinshi,joinqu,raw_add_time,`status` from `ss_group` where ss_group_id=?";
		$rs = self::DB()->prepare($sql);
        $rs->execute(array($id));
        return $rs->fetch();
	}
	
	
	public static function get_app_group_count() {
        $sql_count = "select count(*) from `app_group` ";
        $rs = self::DB()->prepare($sql_count);
        $rs->execute();
        return $rs->fetchColumn();
    }

    public static function get_app_group_list($rows, $page) {
        $nextRows = (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        $sql = "select app_group_id,userfullname,getman,gettel1,getprofession,joinsheng,joinshi,joinqu,raw_add_time,status from `app_group`";
        $rs = self::DB()->prepare($sql);
        $rs->execute();
        return $rs->fetchAll();
    }
	
	public static function get_app_group_info($id)
	{
		$sql="select app_group_id,userfullname,getman,getbirthday,getmail,getqq,gettel1,gettle2,getfaming,getwhen,getprofession,joinsheng,joinshi,joinqu,raw_add_time,`status`,crewnum,learning,groupname,getplace from `app_group` where app_group_id=?";
		$rs = self::DB()->prepare($sql);
        $rs->execute(array($id));
        return $rs->fetch();
	}

}
?>