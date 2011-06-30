<?php

class EvacakephpAppController extends AppController {
	//uncomment this if your using toolbar component
	//var $components = array('RequestHandler','Session','Cookie','DebugKit.Toolbar');
	var $components = array('RequestHandler','Session','Cookie');
	var $helpers = array('Session','Js' => array('Jquery'),'Form', 'Html');
}

?>