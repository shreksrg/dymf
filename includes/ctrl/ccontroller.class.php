<?php
class Ctrl_CController
{
    protected $smarty;

    public function __construct()
    {
        $this->smarty = base_cmshop::smarty();
    }

    public function __call($fn, $args)
    {
        $fn = 'action' . $fn;
        $this->$fn();
    }

    public function render($viewFile, Array $varsArray = null, $boolean = true)
    {
        foreach ($varsArray as $k => $v) {
            $this->smarty->assign($k, $v);
        }

        if ($boolean)
            $this->smarty->display($viewFile);
        else
            return $this->smarty->fetch($viewFile);
    }

    public function isGuest()
    {

    }

    public function responseJsonMsg($errCode = 1, $message)
    {
        echo json_encode(array('err' => $errCode, 'content' => $message));
        die();
    }

    public function getSession($id)
    {
        return $_SESSION[$id];
    }
}