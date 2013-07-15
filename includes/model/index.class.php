<?php
/**
 * 栏目逻辑操作类
 * @author	jonah.fu
 * @date	2012-09-04
 */
class model_index extends model_base {
    public static function getUserClassInfo($userid) {
        $sql = "
    	select count(1) as num,l.part_name from learning l where l.user_id=$userid group by l.part_name
    	";
        return self::DB() -> query($sql) -> fetchAll();
    }

}
