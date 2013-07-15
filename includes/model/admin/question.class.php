<?php
/**
 * UC房间model 数据层逻辑
 * @author    lxy
 * @date    2013-01-20
 */
class model_admin_question extends model_base
{
    public static function get_question_list($rows, $page, $status)
    {
        $nextRows = (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        $where = $status < 2 ? (" and status=" . $status) : "";
        $sql_count = "select count(*) from question where is_deleted=0 " . $where;
        $rs = self::DB()->prepare($sql_count);
        $rs->execute();
        $return["total"] = $rs->fetchColumn();
        $sql = "select id,ask,answer,ask_time,answer_time,status from question where is_deleted=0 " . $where;
        $rs = self::DB()->prepare($sql);
        $rs->execute();
        $return["rows"] = $rs->fetchAll();
        return $return;
    }

    public function add_question_info($insertData)
    {
        $sql = "insert into question (ask,status,ask_time)
		values (:ask,0,now())";
        try {
            $rs = self::DB()->prepare($sql);
            return $rs->execute($insertData);
        } catch (Exception $ee) {
            return FALSE;
        }
    }

    public function edit_question_info($insertData)
    {
        $sql = "update question set
		answer=:answer,
		answer_time=now(),
		status=1 where id=:id";
        $rs = self::DB()->prepare($sql);
        $rs->execute($insertData);
    }

    public function del_question_info($id)
    {
        $sql = "update question set is_deleted=1 where id=:id";
        $rs = self::DB()->prepare($sql);
        $rs->execute(array("id" => $id));
    }

    static public function get_question_info($id)
    {
        $sql = "select id,ask,answer,ask_time,answer_time,status from question where is_deleted=0 and id=:id";
        $rs = self::DB()->prepare($sql);
        $rs->execute(array("id" => $id));
        return $rs->fetch();
    }

}

?>