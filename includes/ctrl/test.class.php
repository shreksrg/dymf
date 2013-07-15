<?php
class ctrl_test extends ctrl_base {
    
	public function aboutUs() {

		models_test::test();
		$this -> render(__CLASS__, __FUNCTION__);

	}

	public function index() {
		$arr = models_test::getSiteInfo();
		$this -> smarty -> assign('arr', $arr);
		$this->display('test/test_index.html');
	}

}
?>