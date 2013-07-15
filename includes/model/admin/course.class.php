<?php
/**
 * 课程model 数据层逻辑
 * @author	lxy
 * @date	2013-01-16
 */
class model_admin_course extends model_base {
    public static function get_course_list($rows, $page, $part_id, $show = 0) {
        $nextRows = $page == 1 ? $rows : (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        $where = " and index_show=" . $show;
        if (!empty($part_id)) {
            $where .= " and part_id=" . $part_id;
        } else {
            $where .= " and part_id<>" . JCKC;
        }

        $sql_count = "select count(*) from course a
		LEFT JOIN part b ON a.part_id = b.id
		LEFT JOIN part c ON b.PARENT_ID=c.id
		LEFT JOIN part d on c.PARENT_ID=d.id
		WHERE
			a.is_deleted = 0" . $where;

        $rs = self::DB() -> prepare($sql_count);
        $rs -> execute();
        $return["total"] = $rs -> fetchColumn();
        $sql = "SELECT
			a.id,
			a.course_title,
			a.video_link,
			a.audio_link,
			a.doc_link,
			a.online_link,
			a.course_content,
			a.course_date,
			a.open_link,
			a.part_id,
			b.Part_Name as category,
			c.Part_Name as semester,
			d.Part_Name as class
		FROM
			course a
		LEFT JOIN part b ON a.part_id = b.id
		LEFT JOIN part c ON b.PARENT_ID=c.id
		LEFT JOIN part d on c.PARENT_ID=d.id
		WHERE
			a.is_deleted = 0 " . $where . " order by a.id desc" . (empty($rows) ? "" : " limit " . $startRows . "," . $nextRows);

        $rs = self::DB() -> prepare($sql);
        $rs -> execute();
        $return["rows"] = $rs -> fetchAll();
        return $return;
    }

    public function add_course_info($insertData) {
        $sql = "insert into course (course_title,video_link,audio_link,doc_link,online_link,course_content,course_date,open_link,part_id,index_show,add_time) 
		values (:course_title,:video_link,:audio_link,:doc_link,:online_link,:course_content,:course_date,:open_link,:part_id,:index_show,now())";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute($insertData);
    }

    public function edit_course_info($insertData) {
        $sql = "update course set 
		course_title=:course_title,
		video_link=:video_link,
		audio_link=:audio_link,
		doc_link=:doc_link,
		online_link=:online_link,
		course_content=:course_content,
		course_date=:course_date,
		index_show=:index_show,
		open_link=:open_link where id=:id";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute($insertData);
    }

    public function del_course_info($id) {
        $sql = "update course set is_deleted=1 where id=:id";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("id" => $id));
    }

    public function get_course_info($id) {
        $sql = "select course_title,video_link,audio_link,doc_link,online_link,course_content,course_date,open_link,part_id,add_time,index_show from course where is_deleted=0 and id=:id";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("id" => $id));
        return $rs -> fetch();
    }

    public static function get_course_index($class_id) {
        $sql = "select a.course_title,a.video_link,a.audio_link,a.doc_link,a.online_link,a.course_content,a.course_date,a.open_link,a.part_id from course a
		LEFT JOIN part b ON a.part_id = b.id
		LEFT JOIN part c ON b.PARENT_ID=c.id
		LEFT JOIN part d on c.PARENT_ID=d.id
		 where d.id=:id and a.index_show=1 limit 0,5";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("id" => $class_id));
        return $rs -> fetchAll();
    }

}
?>