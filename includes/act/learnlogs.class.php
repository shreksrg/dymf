<?php
class Act_LearnLogs extends Ctrl_Components_Controller
{
    private $clsCodes = array('ws', 'jt', 'jx');

    public function __construct()
    {
        $_SESSION['trainee_id'] = 1;
        parent::__construct();
    }

    public function actionTest()
    {
        //echo $this->filterLearnDate($_POST['year'], $_POST['month']);
        $model = new model_trainee();
        $data = array('stuno' => 'xj-009', 'buddhist' => '杨帆金尼', 'squadid' => 5);
        var_dump($model->addTrainee($data));
    }


    public function actionLogHasSubmitted()
    {
        $model = new model_test();
        $date = strtotime(date('Y-m'));
        $r = $model->inspectLogExists($date);
        echo $this->smarty->fetch('test.html');
    }

    /**
     * 过滤提交的记录时间
     *
     */
    public function  filterLearnDate($year, $month)
    {
        // 验证年份
        if (isset($year)) {
            $year = (int)$month;
            if ($year < 2000 || $year > (int)date('Y'))
                $year = date('Y');
        } else
            $year = date('Y');

        // 验证月份
        if (isset($month)) {
            $month = (int)$month;
            if ($month < 1 || $month > 12)
                $month = date('n'); //月份不补零
        } else
            $month = date('n');
        return $curMonth = strtotime("$year-$month");
    }

    /**
     * 学修组长提交学员学修记录
     *
     */
    public function actionCommitLearnLogs()
    {
        //根据学号和法号获取学员id
        // $stuno = $_POST['stuno'];
        // $buddhist = $_POST['buddhist'];
        $stuno = 's009s-009';
        $buddhist = '研发及尼';
        $squadid = 1;
        $clsCode = 'ws';
        $model = new model_trainee();
        $row = $model->findByAttribute('stuno=:stuno', array('stuno' => $stuno));
        if ($row) {
            $stuId = $row['id'];
        } else {
            $pasword = sha1($stuno); //设置新密码
            $data = array('username' => $stuno, 'password' => $pasword, 'stuno' => $stuno, 'buddhist' => $buddhist, 'squadid' => $squadid);
            $stuId = $model->addTrainee($data);
        }

        //获取学修记录时间
        $curMonth = $this->filterLearnDate($_POST['year'], $_POST['month']);

        //增加学修记录
        $modelOrg = new model_learnOrganization();
        $org = array('stuid' => $stuId, 'clscode' => $clsCode, 'squadid' => $squadid, 'learn_date' => $curMonth);

        isset($_POST['stats']) ? $stats = $_POST['stats'] : $this->responseJsonMsg(1, 'unknown stat items');
        $result = $modelOrg->addLearnLogs($org, $stats);
        if ($result === true) {
            $errCode = 0;
            $message = '提交成功';
        } else {
            $errCode = 1;
            $message = $result;
        }
        $this->responseJsonMsg($errCode, $message);
    }


    /**
     * 个人学员提交学修记录
     *
     */
    public function actionSubmitLearnLogs()
    {
        if ($this->isGuest())
            $this->responseJsonMsg(1, '登录超时');

        //获取学修记录时间
        $curMonth = $this->filterLearnDate($_POST['year'], $_POST['month']);

        // 判断当月记录是否已经录入
        $modelOrg = new model_learnOrganization();
        try {
            $r = $modelOrg->inspectLogExists($curMonth);
            if ($r)
                $this->responseJsonMsg(1, '当月学修记录已提交，不能重复提交');
        } catch (Exception $e) {
            $this->responseJsonMsg(1, '操作异常,请重新再试');
        }

        // 统计项登记入库
        $stuId = $_SESSION['trainee_id'];

        //验证班级编码
        $clsCode = $_POST['clscode']; //班级编码
        if (!in_array($clsCode, $this->clsCodes))
            $this->responseJsonMsg(1, '错误的班级编码');

        //获取学员小组id
        $modelTrainee = new model_trainee();
        $trainee = $modelTrainee->find('id', $stuId);
        $squadid = $trainee['squadid'];

        $org = array('stuid' => $stuId, 'clscode' => $clsCode, 'squadid' => $squadid, 'learn_date' => $curMonth);
        isset($_POST['stats']) ? $stats = $_POST['stats'] : $this->responseJsonMsg(1, '未知的统计项');

        #todo 此处请验证统计项编码

        $result = $modelOrg->addLearnLogs($org, $stats);
        if ($result === true) {
            $errCode = 0;
            $message = '提交成功';
        } else {
            $errCode = 1;
            $message = $result;
        }
        $this->responseJsonMsg($errCode, $message);
    }

    /**
     * 输出学修班统计项表单
     *
     */
    public function actionResponseForm()
    {
        if ($this->isGuest()) {
            $this->responseJsonMsg(1, '登录超时，请重新登录');
        }

        if (isset($_POST['clscode'])) {
            $code = $_POST['clscode'];
            if (!in_array($code, $this->clsCodes)) {
                $this->responseJsonMsg(1, '错误的班级编码');
            }
            $this->responseJsonMsg(0, $this->render("learnlogs/$code.html", array('rows' => 'shrek'), false));
        }
        $this->responseJsonMsg(1, '请选择学修班');
    }

    /**
     * 获取指定学修班统计项累计数记录
     *
     */
    public function actionClassStatsForSum()
    {
        if (isset($_POST['clscode'])) {
            $model = new model_learnOrganization();
            $rows = $model->getClassStatsForSum($_SESSION['trainee_id'], $_POST['clscode']);
            echo json_encode($rows);
        }
    }
}