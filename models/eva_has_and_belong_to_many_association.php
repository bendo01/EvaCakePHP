<?php
class EvaHasAndBelongToManyAssociation extends EvacakephpAppModel {
	var $name = 'EvaHasAndBelongToManyAssociation';
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
		'EvaHasAndBelongToManyAssociationDetail' => array(
			'className' => 'Evacakephp.EvaHasAndBelongToManyAssociationDetail',
			'foreignKey' => 'eva_has_and_belong_to_many_association_id',
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
	

	function create_HABTM_On_Related_Model($associated_model_id = null, $eva_model_id = null){
		if($associated_model_id != null && $eva_model_id != null){
			$DataModel = $this->EvaModel->find('first',array('recursive'=>-1,'fields'=>array('EvaModel.id','EvaModel.name','EvaModel.alias'),'conditions'=>array('EvaModel.id'=>$eva_model_id)));
			$DataAssociatedModel = $this->EvaModel->find('first',array('recursive'=>-1,'fields'=>array('EvaModel.id','EvaModel.name','EvaModel.alias'),'conditions'=>array('EvaModel.id'=>$associated_model_id)));
			$EvaData['EvaHasAndBelongToManyAssociation']['name'] = $DataAssociatedModel['EvaModel']['name'].' Has And Belongs To Many '.$DataModel['EvaModel']['name'];
			$EvaData['EvaHasAndBelongToManyAssociation']['eva_model_id'] = $DataAssociatedModel['EvaModel']['id'];
			$EvaData['EvaHasAndBelongToManyAssociation']['associated_model_id'] = $DataModel['EvaModel']['id'];
			$EvaData['EvaHasAndBelongToManyAssociation']['description'] = $DataAssociatedModel['EvaModel']['name'].' Has And Belongs To Many '.$DataModel['EvaModel']['name'];
			$EvaData['EvaHasAndBelongToManyAssociation']['deleted'] = '';
			$EvaData['EvaHasAndBelongToManyAssociation']['deleted_date'] = '';
			$EvaData['EvaHasAndBelongToManyAssociation']['created_by'] = '';
			$EvaData['EvaHasAndBelongToManyAssociation']['modified_by'] = '';
			//pr($EvaData);
			//exit;
			$this->create();
			if($this->save($EvaData)){
				$eva_has_and_belong_to_many_association_id = $this->getLastInsertID();
				$EvaModelAssociationModelDetail = $this->name.'Detail';
				$EvaDataToSave = array( 
					$EvaModelAssociationModelDetail =>array(
						'name'=>Inflector::classify($DataModel['EvaModel']['name']),
						'className'=>Inflector::classify($DataModel['EvaModel']['name']),
						'joinTable' => Inflector::tableize($DataModel['EvaModel']['name']).'_'.Inflector::tableize($DataAssociatedModel['EvaModel']['name']),
						//'foreignKey' => Inflector::underscore($DataAssociatedModel['EvaModel']['alias']).'_id',
						'foreignKey' => Inflector::underscore($DataAssociatedModel['EvaModel']['alias']).'_id',
						'associationForeignKey' => Inflector::underscore($DataModel['EvaModel']['alias']).'_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'eva_has_and_belong_to_many_association_id'=>$eva_has_and_belong_to_many_association_id,
						'unique'=>1,
						'deleted'=>0,
						'deleted_date'=> '',
						'created_by'=> '',
						'modified_by'=> ''
					)
				);
				
				$this->EvaHasAndBelongToManyAssociationDetail->create();
				if($this->EvaHasAndBelongToManyAssociationDetail->save($EvaDataToSave,true)){
					return true;
				}
				/*
				else{
					pr('gagagalll save details');
					pr($EvaDataToSave);
					exit;
					return false;
				}*/
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	/*
	function afterSave(){
		//create another file HABTM for association ID
		
		//check if there is any data on table EvaBelongToAssociationDetail
		//if there is any data then delete and create new data
		//pr($this->data);
		$eva_has_and_belong_to_many_association_id = $this->getInsertID();
		if($eva_has_and_belong_to_many_association_id == null){
			$eva_has_and_belong_to_many_association_id = $this->data['EvaHasAndBelongToManyAssociation']['id'];
		}
		$EvaDeleteData= $this->EvaHasAndBelongToManyAssociationDetail->find('first',array('recursive'=>-1,'conditions'=>array('EvaHasAndBelongToManyAssociationDetail.eva_has_and_belong_to_many_association_id'=>$eva_has_and_belong_to_many_association_id)));
		$this->EvaHasAndBelongToManyAssociationDetail->delete($EvaDeleteData['EvaHasAndBelongToManyAssociationDetail']['id']);
		if($this->SetAssociationDetail($this->data,$eva_has_and_belong_to_many_association_id)){
			return true;
		}
		else{
			return false;
		}
	}
	*/
	function SetAssociationDetail($EvaData = array(),$eva_has_and_belong_to_many_association_id = null){
		if(!empty($EvaData) && $eva_has_and_belong_to_many_association_id){
			$EvaModel = $this->EvaModel->find('first',array('recursive'=>-1,'fields'=>array('EvaModel.name','EvaModel.alias'),'conditions'=>array('EvaModel.id'=>$EvaData[$this->name]['eva_model_id'])));
			$EvaAssociatedModel = $this->EvaModel->find('first',array('recursive'=>-1,'fields'=>array('EvaModel.name','EvaModel.alias'),'conditions'=>array('EvaModel.id'=>$EvaData[$this->name]['associated_model_id'])));
			$EvaModelAssociationModelDetail = $this->name.'Detail';
			$EvaDataToSave = array( 
				$EvaModelAssociationModelDetail =>array(
					'name'=>Inflector::classify($EvaAssociatedModel['EvaModel']['name']),
					'className'=>Inflector::classify($EvaAssociatedModel['EvaModel']['name']),
					'joinTable' => Inflector::tableize($EvaModel['EvaModel']['name']).'_'.Inflector::tableize($EvaAssociatedModel['EvaModel']['name']),
					//'foreignKey' => Inflector::underscore($EvaAssociatedModel['EvaModel']['alias']).'_id',
					'foreignKey' => Inflector::underscore($EvaModel['EvaModel']['alias']).'_id',
					'associationForeignKey' => Inflector::underscore($EvaAssociatedModel['EvaModel']['alias']).'_id',
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'eva_has_and_belong_to_many_association_id'=>$eva_has_and_belong_to_many_association_id,
					'unique'=>1,
					'deleted'=>0,
					'deleted_date'=> $EvaData[$this->name]['deleted_date'],
					'created_by'=>'',
					'modified_by'=>''
				)
			);
			$this->EvaHasAndBelongToManyAssociationDetail->create();
			$this->EvaHasAndBelongToManyAssociationDetail->save($EvaDataToSave,true);
			return true;
		}
		else{
			return false;
		}
	}
}
?>