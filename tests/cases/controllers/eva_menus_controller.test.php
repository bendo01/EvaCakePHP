<?php
/* EvaMenus Test cases generated on: 2011-06-17 21:37:02 : 1308314222*/
App::import('Controller', 'Evacakephp.EvaMenus');

class TestEvaMenusController extends EvaMenusController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EvaMenusControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->EvaMenus =& new TestEvaMenusController();
		$this->EvaMenus->constructClasses();
	}

	function endTest() {
		unset($this->EvaMenus);
		ClassRegistry::flush();
	}

}
