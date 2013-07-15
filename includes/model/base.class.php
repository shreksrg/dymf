<?php
/**
 * 数据层基类
 */
class model_base
{
    public static function DB($type = '')
    {
        $pdo = base_pdomysql::connect();
        $conn = $pdo->mConn;
        return $conn;
    }

    public static function returnLimit($page, $rows)
    {
        $start = ($page * $rows) - $rows;
        return " limit $start,$rows";
    }

}
