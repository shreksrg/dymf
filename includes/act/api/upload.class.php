<?php
class act_upload {
    private static $startImagePath = 'public/files/images/start_img/';
    private static $maxSize = 1000000;
    private static $extArr = array(
        'image' => array(
            'gif' => 1,
            'jpg' => 1,
            'jpeg' => 1,
            'png' => 1
        ),
        'flash' => array(
            'swf',
            'flv'
        ),
        'media' => array(
            'swf',
            'flv',
            'mp3',
            'wav',
            'wma',
            'wmv',
            'mid',
            'avi',
            'mpg',
            'asf',
            'rm',
            'rmvb'
        ),
        'file' => array(
            'doc',
            'docx',
            'xls',
            'xlsx',
            'ppt',
            'htm',
            'html',
            'txt',
            'zip',
            'rar',
            'gz',
            'bz2'
        ),
    );

    /**
     * 获得文件扩展名
     */
    private static function get_file_ext($fileName) {
        $arr = explode(".", $fileName);
        return strtolower($arr[count($arr) - 1]);

    }

    private static function output_err($error) {
        exit(json_encode(array(
            'error' => 1,
            'message' => $error
        )));
    }

    private static function show_err() {
        if (!empty($_FILES['imgFile']['error'])) {
            $error = '';
            switch($_FILES['imgFile']['error']) {
                case '1' :
                    $error = '超过php.ini允许的大小。';
                    break;
                case '2' :
                    $error = '超过表单允许的大小。';
                    break;
                case '3' :
                    $error = '图片只有部分被上传。';
                    break;
                case '4' :
                    $error = '请选择图片。';
                    break;
                case '6' :
                    $error = '找不到临时目录。';
                    break;
                case '7' :
                    $error = '写文件到硬盘出错。';
                    break;
                case '8' :
                    $error = 'File upload stopped by extension。';
                    break;
                case '999' :
                default :
                    $error = '未知错误。';
            }
            self::output_err($_FILES['imgFile']['error']);
        }

    }

    private static function upload($savePath, $urlPath) {
        if (empty($_FILES) !== false)
            exit ;

        $fileName = $_FILES['imgFile']['name'];
        $tmpName = $_FILES['imgFile']['tmp_name'];
        $fileSize = $_FILES['imgFile']['size'];
        if (!$fileName)
            self::output_err("请选择文件。");

        //检查目录
        if (is_dir($savePath) === false)
            self::output_err("上传目录不存在。");

        //检查目录写权限
        if (is_writable($savePath) === false)
            self::output_err("上传目录没有写权限。");
        //检查是否已上传
        if (is_uploaded_file($tmpName) === false)
            self::output_err("上传失败。");
        //检查文件大小
        if ($fileSize > self::$maxSize)
            self::output_err("上传文件大小超过限制。");
        // //检查目录名
        $dirName = empty($_GET['dir']) ? NULL : trim($_GET['dir']);
        // if (empty($ext_arr[$dir_name])) {
        // alert("目录名不正确。");
        // }

        //获得文件扩展名
        $fileExt = self::get_file_ext($fileName);
        //检查扩展名
        if (array_key_exists($fileExt, self::$extArr[$dirName]) === false)
            self::output_err("上传文件扩展名是不允许的扩展名。");

        // //创建文件夹
        // if (!empty($dir_name)) {
        // $save_path .= $dir_name . "/";
        // $save_url .= $dir_name . "/";
        // if (!file_exists($save_path)) {
        // mkdir($save_path);
        // }
        // }
        $ymd = date("Ymd");
        $savePath .= $ymd . "/";
        // $save_url .= $ymd . "/";

        if (!file_exists($savePath)) {
            static_base::make_dir($savePath);
        }
        //新文件名
        $newFileName = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $fileExt;
        //移动文件
        $filePath = $savePath . $newFileName;
        if (move_uploaded_file($tmpName, $filePath) === false) {
            self::output_err("上传文件失败。");
        }
        chmod($filePath, 0644);
        $fileUrl = $urlPath . $ymd . '/' . $newFileName;
        echo json_encode(array(
            'error' => 0,
            'url' => $fileUrl
        ));
    }

    public static function startImage() {
        self::show_err();
        self::upload(ROOT_PATH . self::$startImagePath, '/' . self::$startImagePath);
        echo ROOT_PATH;
        exit ;
    }

}
?>