<?php
class EvaModelColumnsController extends AppController {

	var $name = 'EvaModelColumns';

	function index() {
		$this->EvaModelColumn->recursive = 0;
		$this->set('evaModelColumns', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eva model column', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('evaModelColumn', $this->EvaModelColumn->read(null, $id));
	}
	
	function add() {
		if (!empty($this->data)) {
			
			//check if colomn name already exits in same table
			
			if($this->EvaModelColumn->EvaCheckColumnExist($this->data['EvaModelColumn']['name'],$this->data['EvaModelColumn']['eva_model_id'])){
				$this->Session->setFlash(__('The eva model column name already exist, The eva model column could not be saved. Please, try again.', true));
			}
			else{
				//check if primary key already exits in same table
				
				if($this->EvaModelColumn->EvaCheckPrimaryKeyExist($this->data['EvaModelColumn']['eva_model_id']) && $this->data['EvaModelColumn']['primarykey'] == 1){
					$this->Session->setFlash(__('The Primary Key already exist, The eva model column could not be saved. Please, try again.', true));
				}
				else{
					if($this->data['EvaModelColumn']['primarykey'] == 1 && $this->data['EvaModelColumn']['allowNull'] == 0){
						$this->EvaModelColumn->create();
						if ($this->EvaModelColumn->save($this->data)) {
							$this->Session->setFlash(__('The eva model column has been saved', true),'default', array('class' => 'success'));
							$this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The eva model column could not be saved. Please, try again.', true));
						}
					}
					else{
						if($this->data['EvaModelColumn']['primarykey'] == 1 && $this->data['EvaModelColumn']['allowNull'] == 1){
							$this->Session->setFlash(__('Primary Key Cannot set to null The eva model column could not be saved. Please, try again.', true));
						}
						else{
							$this->EvaModelColumn->create();
							if ($this->EvaModelColumn->save($this->data)) {
								$this->Session->setFlash(__('The eva model column has been saved', true),'default', array('class' => 'success'));
								$this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash(__('The eva model column could not be saved. Please, try again.', true));
							}
						}
					}
				}
			}
		}
		$evaModels = $this->EvaModelColumn->EvaModel->find('list');
		$this->set(compact('evaModels'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eva model column', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//check if colomn name already exits in same table
			/*
			pr($this->data);
			$this->EvaModelColumn->recursive = -1;
			pr($this->EvaModelColumn->read(null, $id));
			exit;*/
				
				if($this->EvaModelColumn->EvaCheckColumnExist($this->data['EvaModelColumn']['name'],$this->data['EvaModelColumn']['eva_model_id'])){
					//$this->Session->setFlash(__('The eva model column name already exist EvaCheckColumnExist, The eva model column could not be saved. Please, try again.', true));
					if($this->data['EvaModelColumn']['primarykey'] == 1 && $this->data['EvaModelColumn']['allowNull'] == 0){
						//$this->EvaModelColumn->create();
						if ($this->EvaModelColumn->save($this->data)) {
							$this->Session->setFlash(__('The eva model column has been saved', true),'default', array('class' => 'success'));
							$this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The eva model column could not be saved. Please, try again.', true));
						}
					}
					else{
						if($this->data['EvaModelColumn']['primarykey'] == 1 && $this->data['EvaModelColumn']['allowNull'] == 1){
							$this->Session->setFlash(__('Primary Key Cannot set to null The eva model column could not be saved. Please, try again.', true));
						}
						else{
							//$this->EvaModelColumn->create();
							if ($this->EvaModelColumn->save($this->data)) {
								$this->Session->setFlash(__('The eva model column has been saved', true),'default', array('class' => 'success'));
								$this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash(__('The eva model column could not be saved. Please, try again.', true));
							}
						}
					}
				}
				else{
					//check if primary key already exits in same table
				
					if($this->EvaModelColumn->EvaCheckPrimaryKeyExist($this->data['EvaModelColumn']['eva_model_id']) && $this->data['EvaModelColumn']['primarykey'] == 1){
						$this->Session->setFlash(__('The Primary Key already exist EvaCheckPrimaryKeyExist, The eva model column could not be saved. Please, try again.', true));
					}
					else{
						if($this->data['EvaModelColumn']['primarykey'] == 1 && $this->data['EvaModelColumn']['allowNull'] == 0){
							//$this->EvaModelColumn->create();
							if ($this->EvaModelColumn->save($this->data)) {
								$this->Session->setFlash(__('The eva model column has been saved', true),'default', array('class' => 'success'));
								$this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash(__('The eva model column could not be saved. Please, try again.', true));
							}
						}
						else{
							if($this->data['EvaModelColumn']['primarykey'] == 1 && $this->data['EvaModelColumn']['allowNull'] == 1){
								$this->Session->setFlash(__('Primary Key Cannot set to null The eva model column could not be saved. Please, try again.', true));
							}
							else{
								//$this->EvaModelColumn->create();
								if ($this->EvaModelColumn->save($this->data)) {
									$this->Session->setFlash(__('The eva model column has been saved', true),'default', array('class' => 'success'));
									$this->redirect(array('action' => 'index'));
								} else {
									$this->Session->setFlash(__('The eva model column could not be saved. Please, try again.', true));
								}
							}
						}
					}
				}
		}
		if (empty($this->data)) {
			$this->data = $this->EvaModelColumn->read(null, $id);
		}
		$evaModels = $this->EvaModelColumn->EvaModel->find('list');
		$this->set(compact('evaModels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva model column', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaModelColumn->delete($id)) {
			$this->Session->setFlash(__('Eva model column deleted', true),'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva model column was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	/*
	function add() {
		$this->layout = 'ajax';
		$evaModels = $this->EvaModelColumn->EvaModel->find('list');
		$this->set(compact('evaModels'));
	}

	function edit($id = null) {
		$this->layout = 'ajax';
		if (empty($this->data)) {
			$this->data = $this->EvaModelColumn->read(null, $id);
		}
		$evaModels = $this->EvaModelColumn->EvaModel->find('list');
		$this->set(compact('evaModels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva model column', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaModelColumn->delete($id)) {
			$this->Session->setFlash(__('Eva model column deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva model column was not deleted', true));
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