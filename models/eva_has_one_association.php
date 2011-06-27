<?php
class EvaHasOneAssociation extends EvacakephpAppModel {
	var $name = 'EvaHasOneAssociation';
	var $useDbConfig = 'Evacakephp';
	var $displayField = 'name';
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
		'eva_model_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'associated_model_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),/*
		'deleted' => array(
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
				'message' => 'Modified By Cannot Empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasOne = array(
		'EvaHasOneAssociationDetail' => array(
			'className' => 'Evacakephp.EvaHasOneAssociationDetail',
			'foreignKey' => 'eva_has_one_association_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent'=>true
		)
	);

	var $belongsTo = array(
		'EvaModel' => array(
			'className' => 'Evacakephp.EvaModel',
			'foreignKey' => 'eva_model_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function afterSave(){
		//check if there is any data on table EvaBelongToAssociationDetail
		//if there is any data then delete and create new data
		//pr($this->data);
		$eva_has_one_association_id = $this->getInsertID();
		if($eva_has_one_association_id == null){
			$eva_has_one_association_id = $this->data['EvaHasOneAssociation']['id'];
		}
		$EvaDeleteData= $this->EvaHasOneAssociationDetail->find('first',array('recursive'=>-1,'conditions'=>array('EvaHasOneAssociationDetail.eva_has_one_association_id'=>$eva_has_one_association_id)));
		$this->EvaHasOneAssociationDetail->delete($EvaDeleteData['EvaHasOneAssociationDetail']['id']);
		if($this->SetAssociationDetail($this->data,$eva_has_one_association_id)){
			return true;
		}
		else{
			return false;
		}
	}
	
	function SetAssociationDetail($EvaData = array(),$eva_has_one_association_id = null){
		//pr($EvaData);
		//pr($eva_has_one_association_id);
		//exit;
		if(!empty($EvaData) && $eva_has_one_association_id){
			$EvaModel = $this->EvaModel->find('first',array('recursive'=>-1,'fields'=>array('EvaModel.name'),'conditions'=>array('EvaModel.id'=>$EvaData[$this->name]['eva_model_id'])));
			$EvaAssociatedModel = $this->EvaModel->find('first',array('recursive'=>-1,'fields'=>array('EvaModel.name','EvaModel.alias'),'conditions'=>array('EvaModel.id'=>$EvaData[$this->name]['associated_model_id'])));
			$EvaModelAssociationModelDetail = $this->name.'Detail';
			$EvaDataToSave = array( 
				$EvaModelAssociationModelDetail =>array(
					'name'=>Inflector::classify($EvaAssociatedModel['EvaModel']['name']),
					'className'=>Inflector::classify($EvaAssociatedModel['EvaModel']['name']),
					'foreignKey' => Inflector::singularize($EvaModel['EvaModel']['name']).'_id',
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'eva_has_one_association_id'=>$eva_has_one_association_id,
					'deleted'=>0,
					'deleted_date'=> $EvaData[$this->name]['deleted_date'],
					'created_by'=>'',
					'modified_by'=>''
				)
			);
			//pr($EvaDataToSave);
			//exit;
			$this->EvaHasOneAssociationDetail->create();
			$this->EvaHasOneAssociationDetail->save($EvaDataToSave,true);
			return true;
		}
		else{
			return false;
		}
	}
}
?>