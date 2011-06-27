<?php
class EvaHasManyAssociationDetailsController extends AppController {

	var $name = 'EvaHasManyAssociationDetails';

	function index() {
		$this->EvaHasManyAssociationDetail->recursive = 0;
		$this->set('evaHasManyAssociationDetails', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eva has many association detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('evaHasManyAssociationDetail', $this->EvaHasManyAssociationDetail->read(null, $id));
	}
	
	function add() {
		if (!empty($this->data)) {
			$this->EvaHasManyAssociationDetail->create();
			if ($this->EvaHasManyAssociationDetail->save($this->data)) {
				$this->Session->setFlash(__('The eva has many association detail has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva has many association detail could not be saved. Please, try again.', true));
			}
		}
		$evaHasManyAssociations = $this->EvaHasManyAssociationDetail->EvaHasManyAssociation->find('list');
		$this->set(compact('evaHasManyAssociations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eva has many association detail', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EvaHasManyAssociationDetail->save($this->data)) {
				$this->Session->setFlash(__('The eva has many association detail has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva has many association detail could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EvaHasManyAssociationDetail->read(null, $id);
		}
		$evaHasManyAssociations = $this->EvaHasManyAssociationDetail->EvaHasManyAssociation->find('list');
		$this->set(compact('evaHasManyAssociations'));
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva has many association detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaHasManyAssociationDetail->delete($id)) {
			$this->Session->setFlash(__('Eva has many association detail deleted', true),'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva has many association detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/*
	function add() {
		$evaHasManyAssociations = $this->EvaHasManyAssociationDetail->EvaHasManyAssociation->find('list');
		$this->set(compact('evaHasManyAssociations'));
	}

	function edit($id = null) {
		if (empty($this->data)) {
			$this->data = $this->EvaHasManyAssociationDetail->read(null, $id);
		}
		$evaHasManyAssociations = $this->EvaHasManyAssociationDetail->EvaHasManyAssociation->find('list');
		$this->set(compact('evaHasManyAssociations'));
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