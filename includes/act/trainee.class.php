<?php

class Act_Trainee extends Ctrl_Components_Controller
{
    private $modelTrainee;

    public function __construct()
    {
        $this->modelTrainee = new model_trainee();
    }

    //学员登录
    public function actionAjaxLogin()
    {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            $this->responseJsonMsg(1, '用户名或密码不能为空');
        }
        $loginData = trim($_POST);
        if ($this->modelTrainee->validateLogin($loginData)) {
            $trainee = $this->modelTrainee->getTraineeInfo($loginData['username']);
            $_SESSION['trainee_id'] = $trainee['id'];
            $this->responseJsonMsg(0, '登录成功');
        } else {
            $this->responseJsonMsg(1, '用户名或密码错误');
        }
    }

    //学员注册
    public function actionRegister()
    {

    }

    //学员登出
    public function actionLogout()
    {
        $_SESSION['trainee_id'] = null;
    }

    //学员修改密码
}