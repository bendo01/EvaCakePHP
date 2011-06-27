<?php
class EvaApplicationsController extends AppController {

	var $name = 'EvaApplications';
	var $EvaPath = null;
	
	function index() {
		
		$this->EvaApplication->recursive = 0;
		$this->set('evaApplications', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eva application', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('evaApplication', $this->EvaApplication->read(null, $id));
	}
	
	function add() {
		if (!empty($this->data)) {
			//pr($this->data);
			//exit;
			$this->EvaApplication->create();
			if ($this->EvaApplication->save($this->data)) {
				$this->Session->setFlash(__('The eva application has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva application could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eva application', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EvaApplication->save($this->data)) {
				$this->Session->setFlash(__('The eva application has been saved', true),'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eva application could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EvaApplication->read(null, $id);
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eva application', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EvaApplication->delete($id)) {
			$this->Session->setFlash(__('Eva application deleted', true),'default', array('class' => 'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eva application was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/*
	function add() {
		$this->layout = 'ajax';
	}

	function edit($id = null) {
		$this->layout = 'ajax';
		if (empty($this->data)) {
			$this->data = $this->EvaApplication->read(null, $id);
		}
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
	
	function check_sequence_eva_application($id = null){
		if($id !==null){
			//return true;
			$EvaDatas = $this->EvaApplication->EvaGetAllInformationNeeded($id);
		}
		else{
			$this->Session->setFlash(__('Invalid Application', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function create_eva_application($id = null){
		//checking variiabels
		$EvaCreateApplication = null;
		$EvaCreateUserDatabasePostgres = null;
		$EvaCreateDbConfig = null;
		$EvaCreateDatabasePostgres = null;
		$EvaCreateSchemaInDatabasePostgres = null;
		$EvaCreateTableInDatabasePostgres = null;
		$EvaCheckCountColumnPrimaryKeyPostgres = null;
		$EvaCreateColumnTableInDatabasePostgres = null;
		$EvaBakeModel = null;
		$EvaBakeController = null;
		$EvaBakeView = null;
		$EvaMessages = array();
		$EvaMenus = array();
		$this->autoRender = false;
		//$EvaDbConnection['driver']
		if($id !==null){	
			$EvaDatas = $this->EvaApplication->EvaGetAllInformationNeeded($id);
			
			//check if admin enable
			$this->EvaApplication->EvaCheckIfAdminEnable($EvaDatas);
			/*create plugin*/
			/*note : check if plugin available not done yet*/
			//create user role in database
			if(!empty($EvaDatas['EvaDbConnection'])){
				foreach($EvaDatas['EvaDbConnection'] as $EvaDbConnection){
					//create user on DBMS
					$EvaCreateUserDatabasePostgres = $this->EvaApplication->EvaCreateUserDatabase($EvaDbConnection['driver'],$EvaDbConnection['login'],$EvaDbConnection['password']);
					//create Config on database.php
					$EvaCreateDbConfig = $this->EvaApplication->EvaCreateDbConfig($EvaDbConnection);
					//exit;
					//create database on DBMS
					$EvaCreateDatabasePostgres = $this->EvaApplication->EvaCreateDatabase($EvaDbConnection['driver'],$EvaDbConnection['database'],$EvaDbConnection['login']);
					if($EvaCreateDatabasePostgres == true){
						//create schema on database
						$EvaCreateSchemaInDatabasePostgres = $this->EvaApplication->EvaCreateSchemaInDatabase($EvaDbConnection['driver'],$EvaDbConnection['database'], $EvaDbConnection['schema'], $EvaDbConnection['login']);
						//create table on database
						if($EvaCreateSchemaInDatabasePostgres == true){
							if(!empty($EvaDbConnection['EvaModel'])){
								foreach($EvaDbConnection['EvaModel'] as $EvaModel){
									//create table in database
									$EvaCreateTableInDatabasePostgres = $this->EvaApplication->EvaCreateTableInDatabase($EvaDbConnection['driver'],$EvaDbConnection['database'], $EvaDbConnection['schema'], $EvaModel['name'], $EvaDbConnection['login']);
									if($EvaCreateTableInDatabasePostgres == true){
										if(!empty($EvaModel['EvaModelColumn'])){
											$EvaCheckCountColumnPrimaryKeyPostgres = $this->EvaApplication->EvaCheckCountColumnPrimaryKey($EvaModel['EvaModelColumn']);
											if($EvaCheckCountColumnPrimaryKeyPostgres == 1){
												//pr('EvaCheckCountColumnPrimaryKeyPostgres == 1');
												foreach($EvaModel['EvaModelColumn'] as $EvaModelColumn){
													$EvaCreateColumnTableInDatabasePostgres = $this->EvaApplication->EvaCreateColumnTableInDatabase($EvaDbConnection['driver'],$EvaDbConnection['database'], $EvaDbConnection['schema'], $EvaModel['name'], $EvaModelColumn['name'], $EvaModelColumn['type'], $EvaModelColumn['length'], $EvaModelColumn['allowNull'],$EvaModelColumn['primarykey']);
													if($EvaCreateColumnTableInDatabasePostgres == false){
														$EvaMessages[] = 'problem creating column '.$EvaModelColumn['name'].' on database';
													}
												}
												
											}
											else{
												if($EvaCheckCountColumnPrimaryKeyPostgres > 1){
													//pr('EvaCheckCountColumnPrimaryKeyPostgres > 1');
													$EvaMessages[] = 'Primary Columns Counted = '.$EvaCheckCountColumnPrimaryKeyPostgres;
												}
												else{
													//pr('EvaCheckCountColumnPrimaryKeyPostgres == false');
													$EvaMessages[] = 'problem counting primary column ';
												}
											}
										}
										else{
											$EvaMessages[] = 'this model '.$EvaModel['name'].' column empty';
										}
										//create model file
										
										$EvaBakeModel = $this->EvaApplication->EvaBakeModel($EvaDatas['EvaApplication']['name'],$EvaDbConnection['name'],$EvaModel);
										if($EvaBakeModel == false){
											$EvaMessages[] = 'problem when creating model '.$EvaModel;
										}
										
										if(!$this->EvaApplication->EvaCheckModelIsHABTM($EvaModel, $EvaDbConnection['EvaModel'])){
											$EvaBakeController = $this->EvaApplication->EvaBakeController($EvaDatas['EvaApplication']['name'],$EvaDbConnection['name'],$EvaModel,$EvaModel['admin_section']);
											if($EvaBakeController == false){
												$EvaMessages[] = 'problem when creating controller '.$EvaModel;
											}
											//exit;
											//create view file
											$EvaBakeView = $this->EvaApplication->EvaBakeView($EvaDatas['EvaApplication']['name'],$EvaDbConnection['name'],$EvaModel,$EvaModel['admin_section']);
											if($EvaBakeView == false){
												$EvaMessages[] = 'problem when creating view '.$EvaModel;
											}
										}
								
									}
									else{
										$EvaMessages[] = 'problem when creating EvaCreateTableInDatabasePostgres ';
									}
									$EvaMenus[] = $EvaModel['name'];
									if($EvaDbConnection['driver'] == 'mysql'){
										$this->EvaApplication->EvaDeleteColumnTemporaryTableMySql($EvaDbConnection['database'],$EvaModel['name']);
									}
								}
							}
							else{
								$EvaMessages[] = 'EvaDbConnection doesn\'t avaible';
							}
						}
						else{
							$EvaMessages[] = 'problem when creating schema '.$EvaModel;
						}
					}
					else{
						$EvaMessages[] = 'problem when creating database '.$EvaModel;
					}
					//exit;
				}	
			}
			else{
				$EvaMessages[] = 'there is no EvaConnection';
			}
			if(!empty($EvaMessages)){
				foreach($EvaMessages as $EvaMessage){
					$this->Session->setFlash(__($EvaMessage, true));
				}
				$this->redirect(array('action' => 'view',$id));
			}
			else{
				$this->Session->setFlash(__('Eva Application Created', true),'default',array('class' => 'success'));
				$this->redirect(array('action' => 'view',$id));
			}
			
			
		}
		else{
			$this->Session->setFlash(__('Invalid Application', true));
			$this->redirect(array('action' => 'index'));
		}
	}
}
?>