<?php
class EvaMenu extends EvacakephpAppModel {
	var $name = 'EvaMenu';
	var $useDbConfig = 'Evacakephp';
	var $actsAs = array('Tree');
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique'=> array(
				'rule' => array('isUnique'),
				'message' => 'This Name has already been taken',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'enable' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	function generateMyParents(){
		$parents = null;
		$nodelist = $this->generatetreelist(null,null,null,"-");
		if($nodelist) {
			foreach ($nodelist as $key=>$value){
				$parents[$key] = $value;
			}
		}
		return $parents;
	}

	function enabled($id=null){
		$mymenu = $this->read(null,$id);
		if($mymenu['EvaMenu']['enable']==1){
			$mymenu['EvaMenu']['enable']=0;
		}
		else{
			$mymenu['EvaMenu']['enable']=1;
		}
		if($this->save($mymenu)){
			return true;
		}
		else{
			return false;
		}

	}
	
	function disabled($id=null){
		$mymenu = $this->read(null,$id);
		if($mymenu['EvaMenu']['enable']==0){
			$mymenu['EvaMenu']['enable']=1;
		}
		else{
			$mymenu['EvaMenu']['enable']=0;
		}
		if($this->save($mymenu)){
			return true;
		}
		else{
			return false;
		}

	}
}
