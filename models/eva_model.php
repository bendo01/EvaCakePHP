<?php
class EvaModel extends EvacakephpAppModel {
	var $name = 'EvaModel';
	var $useDbConfig = 'Evacakephp';
	//var $displayField = 'name';
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
			'unique'=> array(
				'rule' => array('isUnique'),
				'message' => 'This Name has already been taken',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'eva_db_connection_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'DB Connection Cannot Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*
		'deleted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Deleted Cannot Empty',
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
		'EvaDbConnection' => array(
			'className' => 'Evacakephp.EvaDbConnection',
			'foreignKey' => 'eva_db_connection_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'EvaBelongToAssociation' => array(
			'className' => 'Evacakephp.EvaBelongToAssociation',
			'foreignKey' => 'eva_model_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EvaHasAndBelongToManyAssociation' => array(
			'className' => 'Evacakephp.EvaHasAndBelongToManyAssociation',
			'foreignKey' => 'eva_model_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EvaHasManyAssociation' => array(
			'className' => 'Evacakephp.EvaHasManyAssociation',
			'foreignKey' => 'eva_model_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EvaHasOneAssociation' => array(
			'className' => 'Evacakephp.EvaHasOneAssociation',
			'foreignKey' => 'eva_model_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EvaModelColumn' => array(
			'className' => 'Evacakephp.EvaModelColumn',
			'foreignKey' => 'eva_model_id',
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
	/*
	function beforeSave(){
		if($this->data['EvaModel']['name'] === Inflector::tableize(Inflector::slug($this->data['EvaModel']['name']))){
			$this->data['EvaModel']['name'] = Inflector::tableize(Inflector::slug($this->data['EvaModel']['name']));
			if(!isset($this->data['EvaModel']['alias']) || $this->data['EvaModel']['alias'] == null){
				$this->data['EvaModel']['alias'] = Inflector::camelize(Inflector::tableize(Inflector::slug($this->data['EvaModel']['name'])));
			}
			return true;
		}
		else{
			return false;
		}
	}
	*/
	
	function beforeSave(){
		$this->data['EvaModel']['alias'] = Inflector::singularize(Inflector::tableize(Inflector::slug($this->data['EvaModel']['name'])));
		return true;
	}
	
	function getEvaAssociationModelName($id = null){
		if($id != null){
			$evatempdata = $this->find('first',array('conditions'=>array('EvaModel.id'=>$id),'recursive'=> -1));
			return $evatempdata['EvaModel']['name'];
		}
		else{
			return false;
		}
	}
	
	function setAssociatedName($evadata = array(), $associationType = null){
		if(!empty($evadata) && !is_null($associationType)){
			if(!empty($evadata[$associationType])){
				$evadata[$associationType]['associated_model_name'] = $this->getEvaAssociationModelName($evadata[$associationType]['associated_model_id']);
				return $evadata;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function setAssociatedNameView($evadata = array()){
		$counter = 0;
		if(!empty($evadata)){
			if(!empty($evadata['EvaBelongToAssociation'])){
				$counter = 0;
				foreach($evadata['EvaBelongToAssociation'] as $EvaBelongToAssociation){
					$evadata['EvaBelongToAssociation'][$counter]['associated_model_name'] = $this->getEvaAssociationModelName($EvaBelongToAssociation['associated_model_id']);
					$counter++;
				}
			}
			
			if(!empty($evadata['EvaHasAndBelongToManyAssociation'])){
				$counter = 0;
				foreach($evadata['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
					$evadata['EvaHasAndBelongToManyAssociation'][$counter]['associated_model_name'] = $this->getEvaAssociationModelName($EvaHasAndBelongToManyAssociation['associated_model_id']);
					$counter++;
				}
			}
			
			if(!empty($evadata['EvaHasManyAssociation'])){
				$counter = 0;
				foreach($evadata['EvaHasManyAssociation'] as $EvaHasManyAssociation){
					$evadata['EvaHasManyAssociation'][$counter]['associated_model_name'] = $this->getEvaAssociationModelName($EvaHasManyAssociation['associated_model_id']);
					$counter++;
				}
			}
			
			if(!empty($evadata['EvaHasOneAssociation'])){
				$counter = 0;
				foreach($evadata['EvaHasOneAssociation'] as $EvaHasOneAssociation){					
					$evadata['EvaHasOneAssociation'][$counter]['associated_model_name'] = $this->getEvaAssociationModelName($EvaHasOneAssociation['associated_model_id']);
					$counter++;
				}
			}
			return $evadata;
		}
		else{
			return false;
		}
	}

}
?>