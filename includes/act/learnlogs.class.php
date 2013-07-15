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
        if (!$this->isGuest()) {
            echo "请登录";
            return false;
        }
        $this->render('test.html', array('list' => array('shrek', 'jermyn')));
        $this->userLogout();
    }


    public function actionLogHasSubmitted()
    {
        $model = new model_test();
        $date = strtotime(date('Y-m'));
        $r = $model->inspectLogExists($date);

        echo $this->smarty->fetch('test.html');
        // var_dump($r);

    }


    public function actionInsert()
    {
        $model = new model_test();
        $model->addLearnLogs(1373694655);
    }

    /**
     * 检查学员日志当月是否提交
     *
     */

    private function inspectLearnLogs($date)
    {
        $model = new model_learnOrganization();
        try {
            $model->inspect($date);
        } catch (Exception $e) {
            base_cmshop::admin_msg("数据查询异常,请联系管理员！");
        }
    }

    /**
     * 个人学员提交学修记录
     *
     */

    public function actionSubmitLearnLogs()
    {
        if ($this->isGuest())
            $this->responseJsonMsg(1, '登录超时');

        // 判断当月记录是否已经录入
        $curMonth = strtotime(date('Y-m'));
        $modelOrg = new model_learnOrganization();
        try {
            $r = $modelOrg->inspectLogExists($curMonth);
            if ($r)
                $this->responseJsonMsg(1, 'repeat-当月学修记录已提交，不能重复提交');
        } catch (Exception $e) {
            $this->responseJsonMsg(1, '操作异常,请重新再试');
        }

        // 统计项登记入库
        $stuId = $_SESSION['trainee_id'];
        $clsCode = $_POST['clscode']; //班级编码


        $this->responseJsonMsg(1, $_POST);

        #todo 此处请验证班级编码

        //获取学员小组id
        $modelTrainee = new model_trainee();
        $trainee = $modelTrainee->find('id', $stuId);
        $squadid = $trainee['squadid'];


        $org = array('stuid' => $stuId, 'clscode' => $clsCode, 'squadid' => $squadid, 'learn_date' => $curMonth);
        $stats = $_POST['clscode'];

        $result = $modelOrg->addLearnLogs($org, $stats);

    }

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
            $this->responseJsonMsg(0, $this->render("learnlogs/$code.html", array(), false));
        }
        $this->responseJsonMsg(1, '请选择学修班');
    }
}