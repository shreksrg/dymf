<?php
/**
 * 皈依入学model 数据层逻辑
 * @author	lxy
 * @date	2013-01-17
 */
class model_convert extends model_base {

    public static function set_info($arr) {
        //$sql = "
        //insert into `convert` (`" . implode("`,`", array_keys($arr)) . "`,raw_add_time)
        //values (" . static_base::str4insert_prepare($arr) . ",now())";
        //print_r($sql);
        //exit ;

        //exit(static_base::str4prepare($arr));
        $sql = "insert into `convert` 
		(`name`,`sex`,`hometown`,`date_birth`,`profession`,`QQ`,`UC`,`tel`,`address`,`zip_code`,`addressee`,`user_id`,`add_time`,`reason`,`sources`,`school_type`,`family`,`origin`,`situation`,`learning_time`,`family_environment`,`eating_habits`,`status`) 
		values 
		(:c_name,:sex,:hometown,:date_birth,:profession,:QQ,:UC,:tel,:address,:zip_code,:addressee,:user_id,now(),:reason,:sources,:school_type,:family,:origin,:situation,
		:learning_time,:family_environment,:eating_habits,0)";

        try {
            $rs = self::DB() -> prepare($sql);
            $rs -> bindParam("c_name", $arr["c_name"]);
            $rs -> bindParam("sex", $arr["sex"]);
            $rs -> bindParam("hometown", $arr["hometown"]);
            $rs -> bindParam("date_birth", $arr["date_birth"]);
            $rs -> bindParam("profession", $arr["profession"]);
            $rs -> bindParam("QQ", $arr["QQ"]);
            $rs -> bindParam("UC", $arr["UC"]);
            $rs -> bindParam("tel", $arr["tel"]);
            $rs -> bindParam("address", $arr["address"]);
            $rs -> bindParam("zip_code", $arr["zip_code"]);
            $rs -> bindParam("addressee", $arr["addressee"]);
            $rs -> bindParam("user_id", $arr["user_id"]);
            $rs -> bindParam("reason", $arr["reason"]);
            $rs -> bindParam("sources", $arr["sources"]);
            $rs -> bindParam("school_type", $arr["school_type"]);
            $rs -> bindParam("family", $arr["family"]);
            $rs -> bindParam("origin", $arr["origin"]);
            $rs -> bindParam("situation", $arr["situation"]);
            $rs -> bindParam("learning_time", $arr["learning_time"]);
            $rs -> bindParam("family_environment", $arr["family_environment"]);
            $rs -> bindParam("eating_habits", $arr["eating_habits"]);
            $rs -> execute();
            return array(
                "err" => "0",
                "msg" => "随喜您发心皈依，我们会尽快处理，请在一周后从网络学院我的皈依信息里查看处理状态！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => "1",
                "msg" => $ee -> getMessage()
            );
        }

    }

    public static function get_convert_count($where) {
        $where_sql = null;
        if (!empty($where["name"])) {
            $where_sql .= " and name like '%" . $where["name"] . "%' ";
        }
        if (!empty($where["startime"])) {
            $where_sql .= " and add_time=" . $where["startime"];
        }
        $sql_count = "select count(*) from `convert`  where 1=1 " . $where_sql;
        $rs = self::DB() -> prepare($sql_count);
        $rs -> execute();
        return $rs -> fetchColumn();
    }

    public static function get_convert_list($rows, $page, $where) {
        $where_sql = null;
        if (!empty($where["name"])) {
            $where_sql .= " and name like '%" . $where["name"] . "%' ";
        }
        if (!empty($where["startime"])) {
            $where_sql .= " and add_time='" . $where["startime"] . "'";
        }
        $nextRows = $page == 1 ? $rows : (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        $sql = "select id,name,add_time,status,tel from `convert` where 1=1 " . $where_sql . (empty($rows) ? "" : " limit " . $startRows . "," . $nextRows);

        $rs = self::DB() -> prepare($sql);
        $rs -> execute();
        return $rs -> fetchAll();
    }

    public static function get_convert_list_all() {
        $sql = "
    	select * from `convert`
    	";

        return self::DB() -> query($sql) -> fetchAll();
    }

    public static function get_convert_info($id) {
        $sql = "select `id`,`name`,`sex`,`hometown`,`date_birth`,`profession`,`QQ`,`UC`,`tel`,`address`,`zip_code`,`addressee`,`user_id`,`add_time`,`reason`,`sources`,`school_type`,`family`,`origin`,`situation`,`learning_time`,`family_environment`,`eating_habits`,`farmington`,`status` from `convert` where id=?";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array($id));
        return $rs -> fetch();
    }

    public static function edit_convert_status($id, $farmington, $status) {
        $sql = "update `convert` set farmington=:farmington,status=:status where id=:id";
        try {
            $arr["id"] = $id;
            $arr["status"] = $status;
            $arr["farmington"] = $farmington;
            $rs = self::DB() -> prepare($sql);
            $rs -> execute($arr);
            return array(
                "err" => 0,
                "msg" => "信息已处理！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee -> getMessage()
            );
        }
    }

    public static function edit_convert_info($arr, $id) {
        $sql = "update `convert` set " . static_base::str4prepare($arr) . " where id=:id";
        try {
            $arr["id"] = $id;
            $rs = self::DB() -> prepare($sql);
            $rs -> execute($arr);
            return array(
                "err" => 0,
                "msg" => "信息已处理！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee -> getMessage()
            );
        }
    }

    public static function get_my_convert_list($user_id) {
        $sql = "
        select
        	id,name,sex,date_birth,add_time,farmington,status
        from `convert`
        where user_id=:user_id";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("user_id" => $user_id));
        return $rs -> fetchAll();
    }

    public static function del_convert_info($id) {
        $sql = "delete from `convert` where `id`=:id";
        try {
            $arr["id"] = $id;
            $rs = self::DB() -> prepare($sql);
            $rs -> execute($arr);
            return array(
                "err" => 0,
                "msg" => "皈依信息已删除！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee -> getMessage()
            );
        }
    }

}