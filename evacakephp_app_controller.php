<?php

class EvacakephpAppController extends AppController {
	var $components = array('RequestHandler','Session','Cookie','DebugKit.Toolbar');
	var $helpers = array('Session','Js' => array('Jquery'),'Form', 'Html');
}

?>