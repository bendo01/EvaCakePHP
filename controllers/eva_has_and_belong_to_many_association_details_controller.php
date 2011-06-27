<?php
class EvaHasAndBelongToManyAssociationDetailsController extends AppController {

	var $name = 'EvaHasAndBelongToManyAssociationDetails';

	function index() {
		$this->EvaHasAndBelongToManyAssociationDetail->recursive = 0;
		$this->set('evaHasAndBelongToManyAssociationDetails', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eva has and belong to many association detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('evaHasAndBelongToManyAssociationDetail', $this->EvaHasAndBelongToManyAssociationDetail->read(null, $id));
	}
	
	function add() {
		if (!empty($this->data)) {
			$this->EvaHasAndBelongToManyAssociationDetail->create();
			if ($this->EvaHasAndBelongToManyAssociationDetail->save($this->data)) {
				$this->Session->setFlash(__('The eva has and belong to many association detail has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva has and belong to many association detail could not be saved. Please, try again.', true));
			}
		}
		$evaHasAndBelongToManyAssociations = $this->EvaHasAndBelongToManyAssociationDetail->EvaHasAndBelongToManyAssociation->find('list');
		$this->set(compact('evaHasAndBelongToManyAssociations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eva has and belong to many association detail', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EvaHasAndBelongToManyAssociationDetail->save($this->data)) {
				$this->Session->setFlash(__('The eva has and belong to many association detail has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva has and belong to many association detail could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EvaHasAndBelongToManyAssociationDetail->read(null, $id);
		}
		$evaHasAndBelongToManyAssociations = $this->EvaHasAndBelongToManyAssociationDetail->EvaHasAndBelongToManyAssociation->find('list');
		$this->set(compact('evaHasAndBelongToManyAssociations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva has and belong to many association detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaHasAndBelongToManyAssociationDetail->delete($id)) {
			$this->Session->setFlash(__('Eva has and belong to many association detail deleted', true),'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva has and belong to many association detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/*
	function add() {
		$this->layout = 'ajax';
		$evaHasAndBelongToManyAssociations = $this->EvaHasAndBelongToManyAssociationDetail->EvaHasAndBelongToManyAssociation->find('list');
		$this->set(compact('evaHasAndBelongToManyAssociations'));
	}

	function edit($id = null) {
		$this->layout = 'ajax';
		if (empty($this->data)) {
			$this->data = $this->EvaHasAndBelongToManyAssociationDetail->read(null, $id);
		}
		$evaHasAndBelongToManyAssociations = $this->EvaHasAndBelongToManyAssociationDetail->EvaHasAndBelongToManyAssociation->find('list');
		$this->set(compact('evaHasAndBelongToManyAssociations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva has and belong to many association detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaHasAndBelongToManyAssociationDetail->delete($id)) {
			$this->Session->setFlash(__('Eva has and belong to many association detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva has and belong to many association detail was not deleted', true));
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