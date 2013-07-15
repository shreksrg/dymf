<?php
/*
 * controller 基类
 * @version 0.1
 */
class ctrl_base {
    public $smarty;
    public function __construct($smarty, $fnName = '') {
        $this -> smarty = $smarty;
        if (!empty($fnName))
            $this -> $fnName();
    }

    /*
     * 渲染一个模板文件，并输出
     * 模板文件目录格式：$className/$className_$fnName.html
     * @param $className, 调用controller类名
     * @param $fnName, action方法
     */
    public function render($className, $fnName = '') {
        $className = str_replace("ctrl_", "", $className); 
        $fileName = $className . "/" . $className . "_" . $fnName . ".html";
        $this -> smarty -> display($fileName);
    }

    /*
     * 输出文件(可自定义模板文件目录)
     * @param $fileName,模板文件
     */
    public function display($fileName = '') {
        $this -> smarty -> display($fileName);
    }

}
?>