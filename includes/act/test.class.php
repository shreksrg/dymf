<?php
class Act_Test extends Ctrl_Components_Controller
{
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
        $this->render('learnlogs/ws.html', array(), false);
        //echo $this->smarty->fetch('learnlogs/ws.html');
        var_dump($r);

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
        // return $model->inspect($date); // false=未提交，true=提交
    }

    /**
     * 个人学员提交学修记录
     *
     */

    public function actionSubmitLearnLogs()
    {
        if (isset($_POST)) {
            $postData = $_POST;
        } else
            return false;

        // 判断当月记录是否已经录入
        $model = new model_learnOrganization();
        try {
            $model->inspect($postData['date']);
        } catch (Exception $e) {
            base_cmshop::admin_msg("数据查询异常,请联系管理员！");
            return false;
        }

        $data = array();
        $data['stuId'] = $data['stuId'];
        $data['classId'] = $data['classId'];

        // 课程登记入库
        $course = array('id' => 1, 'classId' => 2, 'monthCount' => 10, 'sumCount' => 30);
        $courseList = array($course, $course, $course);
        $model = new model_learnLogs();
        $result = $model->addLearnsLogs($courseList);
        if ($result)
            echo 1;
        else
            echo 0;
    }

    private function addLogs()
    {

    }
}