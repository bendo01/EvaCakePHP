<?php
/* EvaApplications Test cases generated on: 2011-06-17 16:33:56 : 1308296036*/
App::import('Controller', 'Evacakephp.EvaApplications');

class TestEvaApplicationsController extends EvaApplicationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EvaApplicationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('');

	function startTest() {
		$this->EvaApplications =& new TestEvaApplicationsController();
		$this->EvaApplications->constructClasses();
	}

	function endTest() {
		unset($this->EvaApplications);
		ClassRegistry::flush();
	}

}
