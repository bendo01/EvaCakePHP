<?php
class EvaDbConnectionsController extends AppController {

	var $name = 'EvaDbConnections';

	function index() {
		$this->EvaDbConnection->recursive = 0;
		$this->set('evaDbConnections', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eva db connection', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('evaDbConnection', $this->EvaDbConnection->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			if($this->data['EvaDbConnection']['driver'] === 'postgres' && !empty($this->data['EvaDbConnection']['schema'])){
				$this->EvaDbConnection->create();
				if ($this->EvaDbConnection->save($this->data)) {
					$this->Session->setFlash(__('The eva db connection has been saved', true),'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The eva db connection could not be saved. Please, try again.', true));
				}
			}
			else{
				if($this->data['EvaDbConnection']['driver'] !== 'postgres' || !empty($this->data['EvaDbConnection']['schema'])){
					$this->EvaDbConnection->create();
					if ($this->EvaDbConnection->save($this->data)) {
						$this->Session->setFlash(__('The eva db connection has been saved', true),'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The eva db connection could not be saved. Please, try again.', true));
					}
				}
				else {
					$this->Session->setFlash(__('The eva db connection could not be saved. Set Schema Name When Using postgres Please, try again.', true));
				}	
			}	
		}
		$evaApplications = $this->EvaDbConnection->EvaApplication->find('list', array('fields' => array('EvaApplication.name')));
		$this->set(compact('evaApplications'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eva db connection', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data['EvaDbConnection']['driver'] === 'postgres' && !empty($this->data['EvaDbConnection']['schema'])){
				if ($this->EvaDbConnection->save($this->data)) {
					$this->Session->setFlash(__('The eva db connection has been saved', true),'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The eva db connection could not be saved. Please, try again.', true));
				}
			}
			else{
				if($this->data['EvaDbConnection']['driver'] !== 'postgres' || !empty($this->data['EvaDbConnection']['schema'])){
					if ($this->EvaDbConnection->save($this->data)) {
						$this->Session->setFlash(__('The eva db connection has been saved', true),'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The eva db connection could not be saved. Please, try again.', true));
					}
				}
				else {
					$this->Session->setFlash(__('The eva db connection could not be saved. Set Schema Name When Using postgres Please, try again.', true));
				}
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EvaDbConnection->read(null, $id);
		}
		$evaApplications = $this->EvaDbConnection->EvaApplication->find('list', array('fields' => array('EvaApplication.name')));
		$this->set(compact('evaApplications'));
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva db connection', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaDbConnection->delete($id)) {
			$this->Session->setFlash(__('Eva db connection deleted', true),'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva db connection was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	 /*
	function add() {
		$this->layout = 'ajax';
		$evaApplications = $this->EvaDbConnection->EvaApplication->find('list', array('fields' => array('EvaApplication.name')));
		$this->set(compact('evaApplications'));
	}

	function edit($id = null) {
		$this->layout = 'ajax';
		if (empty($this->data)) {
			$this->data = $this->EvaDbConnection->read(null, $id);
		}
		$evaApplications = $this->EvaDbConnection->EvaApplication->find('list', array('fields' => array('EvaApplication.name')));
		$this->set(compact('evaApplications'));
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
				//if dababase postgres check schema
				if($this->data[Inflector::singularize($this->name)]['driver'] == 'postgres' && !empty($this->data[Inflector::singularize($this->name)]['schema'])){
					// Validate the User, if it's ok, show no errors. If not ok, show errors
					//$this->{Inflector::singularize($this->name)}->create();
					if ($this->{Inflector::singularize($this->name)}->save($this->data,array('validate'=>true))){
						$returns = true;
		            }
					else {
		            	$returns = $this->{Inflector::singularize($this->name)}->invalidFields();
		            }
				}
				else{
					$returns = array('schema'=>'Fill Schema Name When Using postgres');
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
	**/
}
?>