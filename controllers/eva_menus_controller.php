<?php
class EvaMenusController extends EvacakephpAppController {

	var $name = 'EvaMenus';



	/* function to check if current menu has child or not.
     * params: current element menu in array menus
     * return: boolean
     */
    function __hasChild( &$child ) {
        if ( $child && count($child) > 0 ) {
            return true;
        }
        return false;
    }

	function __generateMenu() {
		//$this->Menu->bindModel(array('hasAndBelongsToMany' => array('Group' => array('conditions'=>array('Group.id'=>$this->Session->read('Auth.User.group_id'))))));
		//$options['conditions']['Menu.enable'] = 1;
		$options['fields'] = array('id', 'name', 'url', 'parent_id','title');
		$options['order']['lft'] = 'asc';
		$this->EvaMenu->recursive = -1;
        $menus = $this->EvaMenu->find('threaded',$options);
        //pr($menus);
		//return $menus;
        //$this->loadModel('GroupsMenu');
        //$groupmenu = $this->GroupsMenu->find('list', array( 'conditions'=>array('group_id'=>$this->Myappuser->getGroupId()), 
                                                            //'fields'=>array('menu_id','group_id')));

        if ( $menus && count( $menus ) > 0 ) {
            $list_menus = "<ul class='sf-menu'>";
            foreach ( $menus as $menu ) {
                // only write menu for user group
                //if ( isset($groupmenu[$menu['EvaMenu']['id']]) ){
                    // if current top menu has children
                    if ( $this->__hasChild( &$menu['children'] ) ) {
                        // 1st li or top parent
                        if(isset($menu['EvaMenu']['title'])){
							$list_menus .= "<li class='current'><a href='" . Helper::url($menu['EvaMenu']['url']) ."' title='" . $menu['EvaMenu']['title'] ."'>" . $menu['EvaMenu']['name'] . "</a>";
						}
						if(!isset($menu['EvaMenu']['title'])){
							$list_menus .= "<li class='current'><a href='" . Helper::url($menu['EvaMenu']['url']) ."'>" . $menu['EvaMenu']['name'] . "</a>";
						}
                        //$list_menus .= "<li class='current'><a href='" . Helper::url($menu['EvaMenu']['url']) ."' title='" . $menu['EvaMenu']['name'] . "'>" . $menu['EvaMenu']['name'] . "</a>";
                        $this->__generateChildMenu( &$menu['children'], &$list_menus);
                    } else {
						if(isset($menu['EvaMenu']['title'])){
							$list_menus .= "<li><a href='" . Helper::url($menu['EvaMenu']['url']) ."' title='".$menu['EvaMenu']['title']. "'>" . $menu['EvaMenu']['name'] . "</a>";
						}
						if(!isset($menu['EvaMenu']['title'])){
							$list_menus .= "<li><a href='" . Helper::url($menu['EvaMenu']['url']) ."'>" . $menu['EvaMenu']['name'] . "</a>";
						}
                        //$list_menus .= "<li><a href='" . Helper::url($menu['EvaMenu']['url']) ."' title='" . $menu['EvaMenu']['name'] . "'>" . $menu['EvaMenu']['name'] . "</a>";
                    }

                    $list_menus .= "</li>";
                //}
            }
            $list_menus .= "</ul>";
            $list_menus .= "</li>";
			//pr($list_menus);
            return $list_menus . "</ul>";
        }
    }

    function __generateChildMenu( &$menus, &$list_menus) {
        $list_menus .= "<ul>";
        foreach ( $menus as $menu ) {            
            // only write menu for user group
            //if ( isset($groupmenu[$menu['EvaMenu']['id']]) ){
                // if child has children, iterate its childs!!
                if ( $this->__hasChild( &$menu['children'])) {
                    // first output its child parent
                    if(isset($menu['EvaMenu']['title'])){
						$list_menus .= "<li class='current'><a href='" . Helper::url($menu['EvaMenu']['url']) . "' title='" . $menu['EvaMenu']['title'] . "'>" .$menu['EvaMenu']['name'] . "</a>";
					}
					if(!isset($menu['EvaMenu']['title'])){
						$list_menus .= "<li class='current'><a href='" . Helper::url($menu['EvaMenu']['url']) . "'>" .$menu['EvaMenu']['name'] . "</a>";
					}
                    //$list_menus .= "<li class='current'><a href='" . Helper::url($menu['EvaMenu']['url']) . "' title='" . $menu['EvaMenu']['name'] . "'>" .$menu['EvaMenu']['name'] . "</a>";
                    // generate again
                    $this->__generateChildMenu( &$menu['children'], &$list_menus);

                } else {
					if(isset($menu['EvaMenu']['title'])){
						$list_menus .= "<li><a href='" . Helper::url($menu['EvaMenu']['url']) . "' title='" . $menu['EvaMenu']['title'] . "'>" .$menu['EvaMenu']['name'] . "</a>";
					}
					if(!isset($menu['EvaMenu']['title'])){
						$list_menus .= "<li><a href='" . Helper::url($menu['EvaMenu']['url']) . "'>" .$menu['EvaMenu']['name'] . "</a>";
					}
                    //$list_menus .= "<li><a href='" . Helper::url($menu['EvaMenu']['url']) . "' title='" . $menu['EvaMenu']['name'] . "'>" .$menu['EvaMenu']['name'] . "</a>";
                }
                $list_menus .= "</li>";
            //}
        }
        $list_menus .= "</ul>";
    }

    function show_menus() {
		$this->autoRender = false;
		$this->cacheAction = true;
        if ( isset($this->params['requested']) ) {
		   //pr($this->__generateMenu());
           return $this->__generateMenu();
        }
        return false;
        /*
        $this->Menu->bindModel(array('hasAndBelongsToMany' => array('Group' => array('conditions'=>array('Group.id'=>$this->Session->read('Auth.User.group_id'))))));
		$options['conditions']['Menu.enable'] = 1;
		$options['fields'] = array('id', 'name', 'url', 'parent_id');
		$options['order']['lft'] = 'asc';
        $menus = $this->Menu->find('threaded',$options);
        * */
		//return $menus;
    }
}
