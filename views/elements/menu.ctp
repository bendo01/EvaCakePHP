<div id="menu_block">
  	<?php
		//$menus = $this->requestAction('master/menus/getMyMenuThreaded');
		$menus = $this->requestAction('evacakephp/eva_menus/show_menus');
		//pr($menus);
		//$menus = $this->requestAction()
		echo $menus;
		//echo $tree->generate($menus); 
		//pr($menus);
	?>
  </div>