<?php
/**
 * 栏目model 数据层逻辑
 * @author	lxy
 * @date	2013-01-16
 */
class model_admin_part extends model_base {
	public static function get_part_list($status = 0, $parent_id = 0) {
		
		if($parent_id==6){
			$str=" or status=3 ";
		}
		$sql = "select a.id,a.part_name,a.parent_id,a.class_num from part a where a.is_deleted=0 and status=:status and parent_id=:parent_id".$str;
		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array("parent_id" => $parent_id, "status" => $status));
		return $rs -> fetchAll();
	}

	public static function add_part_info($insertData) {
		$sql = "insert into part (part_name,class_num,parent_id,status,part_Remark) value (:part_name,:class_num,:parent_id,:status,:part_Remark)";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute($insertData);
	}

	public static function edit_part_info($name, $id, $part_Remark) {
		$sql = "update part set part_name=:part_name,part_Remark=:part_Remark where id=:id";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array("part_name" => $name, "part_Remark" => $part_Remark, "id" => $id));
	}

	public static function del_part_info($id) {
		$sql = "update part set is_deleted=1 where id=:id";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array("id" => $id));
	}

	public static function get_part_info($id) {
		$sql = "select a.id,a.part_name,class_num,status,is_lock,part_Remark from part a where a.is_deleted=0 and id=:id";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array("id" => $id));
		return $rs -> fetch();
	}

	public static function get_part_course($id) {
		$sql = "select c.id,c.part_name,b.id as semester_id,b.part_name as semester_name,a.part_name as class_name from part a left join part b on b.parent_id=a.id left join part c on c.parent_id=b.id where a.is_deleted=0 and a.id=:id";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array("id" => $id));
		return $rs -> fetchAll();
	}

}
?>