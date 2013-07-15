<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-13
 * Time: 下午1:46
 * To change this template use File | Settings | File Templates.
 */


function getValue()
{
    $a = 0;
    return $a === 0;
}

$unixtime = strtotime('2013-07-17');

$u2 = strtotime(date('Y-m', $unixtime));
echo date('Y-m', $u2);

var_dump(getValue());