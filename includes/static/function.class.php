<?php
/**
 * 静态 function
 */
class static_function {
    private static $numLength = 14;
    /**
     * 远程获取文件
     */
    public static function curl_file_get_contents($durl) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, trim($durl));
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        // curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
        curl_setopt($ch, CURLOPT_REFERER, _REFERER_);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        // print_r(curl_getinfo($ch));exit;
        // var_dump(curl_error($ch));
        curl_close($ch);
        // var_dump($data);
        // exit;
        return $data;
    }

    /**
     * 获取page URL
     */
    public static function curPageURL() {
        if (SERVER_GET_IP)
            $_SERVER["SERVER_NAME"] = isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : $_SERVER["SERVER_NAME"];
        $pageURL = 'http';

        if (isset($_SERVER["HTTPS"])) {
            if ($_SERVER["HTTPS"] == "on")
                $pageURL .= "s";
        }
        $pageURL .= "://";

        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    /**
     * 获取 URL
     */
    public static function curURL() {
        $pageURLArr = explode("/", self::curPageURL());
        unset($pageURLArr[count($pageURLArr) - 1]);
        return implode("/", $pageURLArr) . "/";
    }

    /**
     * 导出csv
     */
    public static function exportToCsv($csv_data, $filename = 'export.csv') {
        $csv_terminated = "\n";
        $csv_separator = ",";
        $csv_enclosed = '"';
        $csv_escaped = "\\";

        // Gets the data from the database
        $schema_insert = '';

        $out = '';

        // Format the data
        foreach ($csv_data as $row) {
            $schema_insert = '';
            $fields_cnt = count($row);
            //printr($row);
            $tmp_str = '';
            foreach ($row as $v) {
                $tmp_str .= $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $v) . $csv_enclosed . $csv_separator;
            }// end for

            $tmp_str = substr($tmp_str, 0, -1);
            $schema_insert .= $tmp_str;

            $out .= $schema_insert;
            $out .= $csv_terminated;
        }// end while

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Length: " . strlen($out));
        header("Content-type: text/x-csv");
        header("Content-Disposition:filename=$filename");

        echo mb_convert_encoding($out, "gbk", "utf-8");
    }

    /**
     * 获取 CSV
     */
    public static function getCSVdata($filename) {
        $row = 1;
        //第一行开始
        if (($handle = fopen($filename, "r")) !== false) {
            while (($dataSrc = fgetcsv($handle)) !== false) {
                $num = count($dataSrc);
                for ($c = 0; $c < $num; $c++)//列 column
                {
                    if ($row === 1)//第一行作为字段
                    {
                        $dataName[] = $dataSrc[$c];
                        //字段名称
                    } else {
                        foreach ($dataName as $k => $v) {
                            if ($k == $c)//对应的字段
                            {
                                $data[$v] = $dataSrc[$c];
                            }
                        }
                    }
                }
                if (!empty($data)) {
                    $dataRtn[] = $data;
                    unset($data);
                }
                $row++;
            }
            fclose($handle);
            return $dataRtn;
        }
    }

    public static function jsMsg($msg, $url = '') {
        $outputStr = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $outputStr .= "<script type='text/javascript'>alert('$msg');";
        if (empty($url)) {
            $outputStr .= "history.go(-1);";
        } else {
            $outputStr .= "window.location.href='$url';";
        }
        $outputStr .= '</script>';
        exit($outputStr);
    }

    /**
     * 检查文件夹
     */
    public static function mkdirs($path, $mode = 0777) {
        $dirs = explode('/', $path);
        $pos = strrpos($path, ".");
        if ($pos === false) {
            // note: three equal signs
            // not found, means path ends in a dir not file
            $subamount = 0;
        } else {
            $subamount = 1;
        }

        for ($c = 0; $c < count($dirs) - $subamount; $c++) {
            $thispath = "";
            for ($cc = 0; $cc <= $c; $cc++) {
                $thispath .= $dirs[$cc] . '/';
            }
            // echo $thispath . "<br />";
            if (!file_exists($thispath)) {
                //print "$thispath<br>";
                mkdir($thispath, $mode);
            }
        }
    }

    /**
     * 输出标准json
     *
     * @access	public
     * @param   array    $array      输入数据
     * @author	jonah.fu
     * @date	2012-04-19
     *
     * @return   string
     */
    public static function output_json($array, $num = 0) {
        header("Expires: Mon, 26 Jul 1970 01:00:00 GMT");
        header('Content-type: application/json;charset=utf-8');
        header("Pramga: no-cache");
        header("Cache-Control: no-cache");
        if ($num) {
            exit(json_encode((array)($array), JSON_NUMERIC_CHECK));
        } else {
            exit(json_encode((array)($array)));
        }
    }

    public static function set_row_key($keyNam, $arr) {
        $return = array();
        foreach ($arr as $k => $v) {
            $return[$v[$keyNam]] = $v;
        }

        return $return;

    }

    /**
     * 魔术引号
     */
    public static function strip_array($var) {
        return is_array($var) ? array_map("self::strip_array", $var) : addslashes($var);
    }

    /**
     * 圆周计算
     *
     */
    public static function rad($d) {
        return bcmul($d, (bcdiv('3.1415926535898', '180', self::$numLength)), self::$numLength);
    }

    public static function time_tran($the_time) {
        $now_time = date("Y-m-d H:i:s");
        $now_time = strtotime($now_time);
        $show_time = strtotime($the_time);
        $dur = $now_time - $show_time;
        if ($dur < 60) {
            return $dur . '秒前';
        } else {
            if ($dur < 3600) {
                return floor($dur / 60) . '分钟前';
            } else {
                if ($dur < 86400) {
                    return floor($dur / 3600) . '小时前';
                } else {
                    if ($dur < 259200) {//3天内
                        return floor($dur / 86400) . '天前';
                    } else {
                        return $the_time;
                    }
                }
            }
        }
    }

    /**
     * 经纬度之间获取距离
     */
    public static function GetDistance($lat1, $lng1, $lat2, $lng2) {
        $EARTH_RADIUS = 6378.137;
        $radLat1 = self::rad($lat1);
        //echo $radLat1;
        $radLat2 = self::rad($lat2);
        $a = bcsub($radLat1, $radLat2, self::$numLength);
        $b = bcsub(self::rad($lng1), self::rad($lng2), self::$numLength);
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $s = bcmul($s, $EARTH_RADIUS, self::$numLength);
        $s = round($s * 10000) / 10000;
        return $s;
    }

}
