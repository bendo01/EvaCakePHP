<?php
/* EvaMenu Test cases generated on: 2011-06-17 21:36:19 : 1308314179*/
App::import('Model', 'Evacakephp.EvaMenu');

class EvaMenuTestCase extends CakeTestCase {
	var $fixtures = array('');

	function startTest() {
		$this->EvaMenu =& ClassRegistry::init('EvaMenu');
	}

	function endTest() {
		unset($this->EvaMenu);
		ClassRegistry::flush();
	}

}
