<?php
class ctrl_user extends ctrl_base {
    
	public function list_html() {

		$this -> render(__CLASS__ , __FUNCTION__);
	}
    
    public function index() {
        $this->display('user/user_index.html');
    }

}
?>