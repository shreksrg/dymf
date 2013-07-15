<?php
/**
 * 文章model 数据层逻辑
 * @author	lxy
 * @date	2013-01-17
 */
class model_admin_article extends model_base {

    public static function get_article_list($rows, $page, $part_id) {

        $nextRows = $page == 1 ? $rows : (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        $sql_count = "select count(*) from article where  part_id=:part_id";
        $rs = self::DB() -> prepare($sql_count);
        $rs -> execute(array("part_id" => $part_id));
        $return["total"] = $rs -> fetchColumn();

        $sql = "select
        article_id,article_title,hide_flag,sort,raw_add_time,raw_update_time,set_top,article_content
        from article a where part_id=:part_id " . (empty($rows) ? "" : "limit " . $startRows . "," . $nextRows);

        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("part_id" => $part_id));
        $return["rows"] = $rs -> fetchAll();
        return $return;
    }

    /**
     * 前台获取文章列表
     * 过滤了不显示文章
     */
    public static function get_reception_article_list($rows, $page, $part_id) {
        $nextRows = (($rows * $page) - $rows);
        $startRows = ($rows * $page) - $rows;
        $sql_count = "select count(*) from article where  part_id=:part_id and hide_flag=0";
        $rs = self::DB() -> prepare($sql_count);
        $rs -> execute(array("part_id" => $part_id));
        $return["total"] = $rs -> fetchColumn();
        $sql = "select
        article_id,article_title,hide_flag,sort,raw_add_time,raw_update_time,set_top,article_content
        from article a where part_id=:part_id and hide_flag=0 order by raw_add_time desc limit $page,$rows";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("part_id" => $part_id));
        $return["rows"] = $rs -> fetchAll();
        return $return;
    }

    public function add_article_info($insertData) {
        $sql = "insert into article (article_content,article_title,sort,hide_flag,part_id,raw_add_time) values (:article_content,:article_title,:sort,:hide_flag,:part_id,NOW())";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute($insertData);
    }

    public static function add_article_top($insertData) {
        if (!empty($insertData['set_top'])) {
            $sql = "
        	update `article` set set_top='';
        	";
            self::DB() -> exec($sql);
        }
        unset($insertData['set_top']);
        $sql = "insert into article (article_content,article_title,part_id,raw_add_time,raw_update_time,set_top) values (:article_content,:article_title,:part_id,NOW(),NOW(),now())";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute($insertData);
    }

    public function edit_article_info($data) {
        $sql = "update article set article_content=:article_content,article_title=:article_title,sort=:sort,hide_flag=:hide_flag where article_id=:article_id";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array(
            "article_content" => $data["article_content"],
            "article_title" => $data["article_title"],
            "sort" => $data["sort"],
            "hide_flag" => $data["hide_flag"],
            "article_id" => $data["article_id"]
        ));
    }

    public static function edit_article_top($data, $set_top = 0) {
        $sqlDo = "update article set article_content=:article_content,set_top=now(),article_title=:article_title where article_id=:article_id";
        if ($set_top) {
            $data['set_top'] = 1;
            $sqlDo = "
            update article set set_top=now() where article_id=:article_id
            ";
        }
        if (!empty($data['set_top'])) {
            $sql = "
        	update `article` set set_top='';
        	";
            self::DB() -> exec($sql);
        }
        unset($data['set_top']);

        $rs = self::DB() -> prepare($sqlDo);
        $rs -> execute($data);
    }

    public static function get_article_info($id) {
        $sql = "select article_id,article_content,article_title,sort,hide_flag,click_num,set_top,part_id,raw_update_time from article where article_id=:article_id";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("article_id" => $id));
        return $rs -> fetch();
    }

    public static function edit_click_num($id) {
        $sql = "update article set click_num=click_num+1  where article_id=:article_id ";
        $rs = self::DB() -> prepare($sql);
        $rs -> execute(array("article_id" => $id));
    }

    public static function del_article_info($id) {
        $sql = "delete from `article`  where `article_id`=:article_id ";
        try {
            $arr["article_id"] = $id;
            $rs = self::DB() -> prepare($sql);
            $rs -> execute($arr);
            return array(
                "err" => 0,
                "msg" => "文章已删除！"
            );
        } catch(Exception $ee) {
            return array(
                "err" => 1,
                "msg" => $ee -> getMessage()
            );
        }
    }

}
?>