<?php
class EvaModelColumn extends EvacakephpAppModel {
	var $name = 'EvaModelColumn';
	var $useDbConfig = 'Evacakephp';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Name Cannot Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Type Cannot Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'length' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Length : Please Insert Number Only',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'eva_model_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),/*
		'allowNull' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'primarykey' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_by' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Created By Cannot Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified_by' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Modified Cannot Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'EvaModel' => array(
			'className' => 'Evacakephp.EvaModel',
			'foreignKey' => 'eva_model_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'EvaColumnRule' => array(
			'className' => 'Evacakephp.EvaColumnRule',
			'foreignKey' => 'eva_model_column_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	function EvaCheckColumnExist($EvaColumnName = null, $EvaModelId = null){
		if($EvaColumnName !== null && $EvaModelId !== null){
			$EvaCount = $this->find('count',array('conditions'=>array('EvaModelColumn.name'=>$EvaColumnName,'EvaModelColumn.eva_model_id'=>$EvaModelId)));
			if($EvaCount >= 1){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCheckPrimaryKeyExist($EvaModelId = null){
		if($EvaModelId !== null){
			$EvaCount = $this->find('count',array('conditions'=>array('EvaModelColumn.eva_model_id'=>$EvaModelId,'EvaModelColumn.primarykey'=>1)));
			if($EvaCount >= 1){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function GenerateListWithParentName(){
		$this->recursive = 0;
		$EvaListTemps = $this->find('all');
		$EvaListWithParentNames = array();
		foreach($EvaListTemps as $EvaListTemp){
			//pr($EvaListTemp);
			if($EvaListTemp['EvaModelColumn']['name'] !=='id' && $EvaListTemp['EvaModelColumn']['name'] !=='created' && $EvaListTemp['EvaModelColumn']['name'] !=='modified'){
				$EvaListWithParentNames = array_merge($EvaListWithParentNames,array($EvaListTemp['EvaModelColumn']['id']  => $EvaListTemp['EvaModel']['name'].'.'.$EvaListTemp['EvaModelColumn']['name']));
			}
			
		}
		unset($EvaListTemps);
		return $EvaListWithParentNames;
	}

}
?>