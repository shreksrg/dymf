<?php
/**
 * UC房间model 数据层逻辑
 * @author	lxy
 * @date	2013-01-20
 */
class model_admin_room extends model_base  {
	public static function get_room_list($rows, $page)
	{
		$nextRows = (($rows * $page) - $rows);
		$startRows = ($rows * $page) - $rows;
		$sql_count = "select count(*) from room where is_deleted=0";
		$rs = self::DB() -> prepare($sql_count);
		$rs -> execute();
		$return["total"] = $rs -> fetchColumn();
		$sql = "select id,room_name,room_url,room_img,room_content from room where is_deleted=0";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute();
		$return["rows"] = $rs -> fetchAll();
		return $return;
	}
	
	public static function add_room_info($insertData)
	{
		$sql="insert into room (room_name,room_url,room_img,room_content,add_time) 
		values (:room_name,:room_url,:room_img,:room_content,now())";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute($insertData);
	}
	
	public static function edit_room_info($insertData){
		$sql="update room set 
		room_name=:room_name,
		room_url=:room_url,
		room_img=:room_img,
		room_content=:room_content where id=:id";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute($insertData);
	}
	
	public static function del_room_info($id)
	{
		$sql="update room set is_deleted=1 where id=:id";
		$rs = self::DB() -> prepare($sql);
		$rs -> execute(array("id"=>$id));
	}
	
	public static function get_room_info($id)
	{
		$sql="select id,room_name,room_url,room_img,room_content,add_time from room where is_deleted=0 and id=:id";
		$rs = self::DB() -> prepare($sql);
        $rs -> execute(array("id"=>$id));
        return $rs -> fetch();
	}
}
?>