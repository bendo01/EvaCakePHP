<?php
class EvaHasAndBelongToManyAssociationsController extends AppController {

	var $name = 'EvaHasAndBelongToManyAssociations';

	function index() {
		$this->EvaHasAndBelongToManyAssociation->recursive = 0;
		$this->set('evaHasAndBelongToManyAssociations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eva has and belong to many association', true));
			$this->redirect(array('action' => 'index'));
		}
		$evadata = $this->EvaHasAndBelongToManyAssociation->read(null, $id);
		$evadata = $this->EvaHasAndBelongToManyAssociation->EvaModel->setAssociatedName($evadata,'EvaHasAndBelongToManyAssociation');
		$this->set('evaHasAndBelongToManyAssociation', $evadata);
		//$this->set('evaHasAndBelongToManyAssociation', $this->EvaHasAndBelongToManyAssociation->read(null, $id));
	}
	
	function add() {
		if (!empty($this->data)) {
			//pr($this->data);
			//$this->EvaHasAndBelongToManyAssociation->create_HABTM_On_Related_Model($this->data['EvaHasAndBelongToManyAssociation']['associated_model_id'] , $this->data['EvaHasAndBelongToManyAssociation']['eva_model_id']);
			//exit;
			$this->EvaHasAndBelongToManyAssociation->create();
			if ($this->EvaHasAndBelongToManyAssociation->save($this->data)) {
				$eva_has_and_belong_to_many_association_id = $this->EvaHasAndBelongToManyAssociation->getLastInsertID();
				$EvaDeleteData= $this->EvaHasAndBelongToManyAssociation->EvaHasAndBelongToManyAssociationDetail->find('first',array('recursive'=>-1,'conditions'=>array('EvaHasAndBelongToManyAssociationDetail.eva_has_and_belong_to_many_association_id'=>$eva_has_and_belong_to_many_association_id)));
				$this->EvaHasAndBelongToManyAssociation->EvaHasAndBelongToManyAssociationDetail->delete($EvaDeleteData['EvaHasAndBelongToManyAssociationDetail']['id']);
				if($this->EvaHasAndBelongToManyAssociation->SetAssociationDetail($this->data,$eva_has_and_belong_to_many_association_id)){
					if($this->EvaHasAndBelongToManyAssociation->create_HABTM_On_Related_Model($this->data['EvaHasAndBelongToManyAssociation']['associated_model_id'] , $this->data['EvaHasAndBelongToManyAssociation']['eva_model_id'])){
						$this->Session->setFlash(__('The eva has and belong to many association has been saved', true),'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					}
					else{
						$this->Session->setFlash(__('The eva has and belong to many association could not be saved. Please, try again.', true));
					}
				}
				else {
					$this->Session->setFlash(__('The eva has and belong to many association could not be saved. Please, try again.', true));
				}
			}
			else {
				$this->Session->setFlash(__('The eva has and belong to many association could not be saved. Please, try again.', true));
			}
		}
		$evaModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eva has and belong to many association', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EvaHasAndBelongToManyAssociation->save($this->data)) {
				$this->Session->setFlash(__('The eva has and belong to many association has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva has and belong to many association could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EvaHasAndBelongToManyAssociation->read(null, $id);
		}
		$evaModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva has and belong to many association', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaHasAndBelongToManyAssociation->delete($id)) {
			$this->Session->setFlash(__('Eva has and belong to many association deleted', true),'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva has and belong to many association was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/*
	function add() {
		$this->layout = 'ajax';
		$evaModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function edit($id = null) {
		$this->layout = 'ajax';
		if (empty($this->data)) {
			$this->data = $this->EvaHasAndBelongToManyAssociation->read(null, $id);
		}
		$evaModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaHasAndBelongToManyAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva has and belong to many association', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaHasAndBelongToManyAssociation->delete($id)) {
			$this->Session->setFlash(__('Eva has and belong to many association deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva has and belong to many association was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function ajax_add_validate(){
		Configure::write('debug', 0);
		$this->autoRender = false;
		$ret = "false";
		//$this->data = json_decode($_POST['data']);
		$this->data = $_POST['data'];
		//print_r ($this->data);
		if ($this->RequestHandler->isAjax()) {
			// If we have data, process it. If not send back an error.
			if(is_array($this->data[Inflector::singularize($this->name)])){
				// Validate the User, if it's ok, show no errors. If not ok, show errors
				$this->{Inflector::singularize($this->name)}->create();
				if ($this->{Inflector::singularize($this->name)}->save($this->data,array('validate'=>true))){
					$returns = true;
	            }
				else {
	            	$returns = $this->{Inflector::singularize($this->name)}->invalidFields();
	            }
			}
			echo json_encode($returns);
		}
		else {
			echo 'not_ajax';
		}
	}
	
	function ajax_edit_validate(){
		Configure::write('debug', 0);
		$this->autoRender = false;
		$ret = "false";
		$this->data = $_POST['data'];
		//print_r ($this->data);
		if ($this->RequestHandler->isAjax()) {
			// If we have data, process it. If not send back an error.
			if(is_array($this->data[Inflector::singularize($this->name)])){
				// Validate the User, if it's ok, show no errors. If not ok, show errors
				if ($this->{Inflector::singularize($this->name)}->save($this->data,array('validate'=>true))){
					$ret = true;
	            }
				else {
	            	$ret = $this->{Inflector::singularize($this->name)}->invalidFields();
	            }
			}
			echo json_encode($ret);
		}
		else {
			echo 'not_ajax';
		}
	}
	
	function ajax_delete_validate(){
		Configure::write('debug', 0);
		$this->autoRender = false;
		$ret = "false";
		$id = $_POST['DeleteId'];
		//print_r($_POST);
		if ($this->RequestHandler->isAjax()) {
			if($id){
				if ($this->{Inflector::singularize($this->name)}->delete($id)) {
					echo 'true';
				}
				else{
					echo 'false';
				}
			}
			else{
				echo 'false';
			}
		}
		else {
			echo 'not_ajax';
		}
	}*/
}
?>