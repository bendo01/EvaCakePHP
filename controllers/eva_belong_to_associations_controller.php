<?php
class EvaBelongToAssociationsController extends AppController {

	var $name = 'EvaBelongToAssociations';

	function index() {
		$this->EvaBelongToAssociation->recursive = 0;
		$this->set('evaBelongToAssociations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eva belong to association', true));
			$this->redirect(array('action' => 'index'));
		}
		$evadata = $this->EvaBelongToAssociation->read(null, $id);
		$evadata = $this->EvaBelongToAssociation->EvaModel->setAssociatedName($evadata,'EvaBelongToAssociation');
		$this->set('evaBelongToAssociation', $evadata);
	}
	
	function add() {
		if (!empty($this->data)) {
			//pr($this->data);
			//exit;
			$this->EvaBelongToAssociation->create();
			if ($this->EvaBelongToAssociation->save($this->data)) {
				$this->Session->setFlash(__('The eva belong to association has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva belong to association could not be saved. Please, try again.', true));
			}
		}
		$evaModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eva belong to association', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EvaBelongToAssociation->save($this->data)) {
				$this->Session->setFlash(__('The eva belong to association has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva belong to association could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EvaBelongToAssociation->read(null, $id);
		}
		$evaModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva belong to association', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaBelongToAssociation->delete($id)) {
			$this->Session->setFlash(__('Eva belong to association deleted', true),'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva belong to association was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/*
	function add() {
		$this->layout = 'ajax';
		$evaModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function edit($id = null) {
		$this->layout = 'ajax';
		if (empty($this->data)) {
			$this->data = $this->EvaBelongToAssociation->read(null, $id);
		}
		$evaModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$associatedModels = $this->EvaBelongToAssociation->EvaModel->find('list');
		$this->set(compact('evaModels','associatedModels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva belong to association', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaBelongToAssociation->delete($id)) {
			$this->Session->setFlash(__('Eva belong to association deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva belong to association was not deleted', true));
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
	}
	*/
}
?>