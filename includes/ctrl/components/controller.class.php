<?php
class Ctrl_Components_Controller extends Ctrl_CController
{
    public function isGuest()
    {
        if ($_SESSION['trainee_id']) {
            return false;
        }
        return true;
    }

    public function stuLogout()
    {
        $_SESSION['stuid'] = null;
    }



}