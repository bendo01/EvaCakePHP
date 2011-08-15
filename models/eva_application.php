<?php
class EvaApplication extends EvacakephpAppModel {
	var $name = 'EvaApplication';
	var $useDbConfig = 'Evacakephp';
	//var $actsAs = array('Containable');
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
		/*
		'created_by' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Created Cannot Empty',
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

	var $hasMany = array(
		'EvaDbConnection' => array(
			'className' => 'Evacakephp.EvaDbConnection',
			'foreignKey' => 'eva_application_id',
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
	
	/**
	 * Find User In Database By UserName
	 *
	 * @param string $EvaDatabaseDriver Name to use as database driver type
	 * @param string $EvaUsername Name to use as name on username
	 * @return array Array of information of username.
	 * @access public
	 */
	
	function EvaFindUserInDatabaseByUsername($EvaDatabaseDriver = null ,$EvaUsername = null){
		if($EvaUsername !== null && $EvaDatabaseDriver !== null){
			if($EvaDatabaseDriver == 'postgres'){
				$new = array();
				$results = $this->query('SELECT rolname FROM pg_roles WHERE rolname=\''.$EvaUsername.'\';');
				foreach($results as $k=>$v) {
				    $new['login'] = $v[0]['rolname'];
				}
				return $new;
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				$new = array();
				$results = $this->query('SELECT user FROM mysql.user WHERE user=\''.$EvaUsername.'\';');
				$new['login'] = $results[0]['user']['user'];
				return $new;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	/**
	 * Check Database Exist
	 *
	 * @param string $EvaDatabaseDriver Name to use as database driver type
	 * @param string $EvaDatabaseName Name to use as name on database name
	 * @return boolean Success
	 * @access public
	 */
	
	function EvaCheckDatabaseExist($EvaDatabaseDriver = null ,$EvaDatabaseName = null){
		if($EvaDatabaseName !== null && $EvaDatabaseDriver !== null){
			if($EvaDatabaseDriver == 'postgres'){
				$EvaResults = $this->query('SELECT count(*) FROM pg_catalog.pg_database WHERE datname = \''.$EvaDatabaseName.'\' ;');
				if($EvaResults[0][0]['count'] == 1){
					return true;
				}
				if($EvaResults[0][0]['count'] == 0){
					return false;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				$EvaResults = $this->query('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = \'Temp\';');
				if(!empty($EvaResults)){
					return true;
				}
				else{
					return false;
				}
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
	function EvaSwitchDbConfig(){
		$EvaCakePhpMenuVarDriver =& ConnectionManager::create('EvaCakePhpMenuDriver', array(
			'driver' => 'postgres',
			'persistent' => false,
			'host' => 'localhost',
			'port' => 5432,
			'login' => 'admin',
			'password' => 'admin',
			'database' => 'EvaCakePhpPluginDb',
			'schema' => 'public'));
		
		if($EvaCakePhpMenuVarDriver){
			$this->setDataSource('EvaCakePhpMenuDriver');
			return true;
		}
		else{
			return false;
		}
	}
	*/
	
	function EvaSwitchDbConfig($DbConfigName = null){
		if($DbConfigName !== null){
			$this->useDbConfig = $DbConfigName;
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
	 * Get Current Config Database
	 * @return string String of Current Database.
	 * @access public
	 */
	
	function EvaGetCurrentConfigDatabaseName(){
		return $this->getDataSource()->config['database'];
	}
	
	function EvaSwitchDbConfigToDefault(){
		$this->useDbConfig = 'default';
		return true;
	}
	
	function EvaCreateDatabase($EvaDatabaseDriver = null, $EvaDatabaseName = null, $EvaUsername = null){
		if($EvaDatabaseDriver !== null && $EvaDatabaseName !== null && $EvaUsername !== null){
			if($EvaDatabaseDriver == 'postgres'){
				if($this->EvaCheckDatabaseExist($EvaDatabaseDriver,$EvaDatabaseName)){
					return true;
				}
				else{
					$this->query('CREATE DATABASE '.$EvaDatabaseName.' WITH ENCODING=\'UTF8\' OWNER='.$EvaUsername.' CONNECTION LIMIT=-1;');
					return true;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				$this->query('DROP DATABASE IF EXISTS '.$EvaDatabaseName.';');
				$this->query('CREATE DATABASE IF NOT EXISTS '.$EvaDatabaseName.';');
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaEditDatabaseName($EvaDatabaseDriver = null, $EvaDatabaseName = null, $EvaNewDatabaseName = null){
		if($EvaDatabaseDriver != null && $EvaDatabaseName != null && $EvaNewDatabaseName != null){
			if($EvaDatabaseDriver == 'postgres'){
				if($EvaDatabaseName !== null && $EvaNewDatabaseName !== null){
					return $this->query('ALTER DATABASE '.$EvaDatabaseName.' RENAME TO '.$EvaNewDatabaseName.';');
				}
				else{
					return false;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				if($EvaDatabaseName !== null && $EvaNewDatabaseName !== null){
					return $this->query('CREATE DATABASE '.$EvaNewDatabaseName.'; DROP DATABASE '.$EvaDatabaseName.';');
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaDeleteDatabase($EvaDatabaseDriver = null, $EvaDatabaseName = null){
		if($EvaDatabaseDriver !== null && $EvaDatabaseName !== null){
			if($EvaDatabaseName == 'postgres'){
				return $this->query('DROP DATABASE IF EXISTS '.$EvaDatabaseName.';');
			}
			elseif($EvaDatabaseName == 'mysql'){
				return $this->query('DROP DATABASE IF EXISTS '.$EvaDatabaseName.';');
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	}
	
	function EvaCheckSchemaInDatabase($EvaDatabaseDriver = null ,$EvaDatabaseName = null, $EvaSchemaName = null){
		if($EvaDatabaseDriver != null && $EvaDatabaseName != null && $EvaSchemaName != null){
			if($EvaDatabaseDriver == 'postgres'){
				$temp = $this->query('SELECT nspname FROM pg_namespace,pg_catalog.pg_database where nspowner = datdba and datname=\''.$EvaDatabaseName.'\' and nspname=\''.$EvaSchemaName.'\';');
				if(!empty($temp)){
					return true;
				}
				else{
					return false;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				$temp = $this->query('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = \''.$EvaDatabaseName.'\';');
				if(!empty($temp)){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCreateSchemaInDatabase($EvaDatabaseDriver = null , $EvaDatabaseName = null, $EvaSchemaName = null, $EvaUsername = null){
		//check current database if current connection doesn't match then switch connection
		//after that change back connection to default
		if($EvaDatabaseDriver !== null && $EvaDatabaseName !== null && $EvaUsername !== null){
			if($EvaDatabaseDriver == 'postgres' && $EvaSchemaName !== null){
				if($EvaDatabaseName === $this->EvaGetCurrentConfigDatabaseName()){
					if($EvaSchemaName != 'public'){
						$this->query('DROP SCHEMA IF EXISTS '.$EvaSchemaName.' CASCADE; CREATE SCHEMA '.$EvaSchemaName.' AUTHORIZATION "'.$EvaUsername.'";');
					}
					return true;
				}
				else{
					return false;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				$this->query('CREATE SCHEMA IF NOT EXISTS '.$EvaDatabaseName.';');
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaEditSchemaInDatabase($EvaDatabaseDriver = null ,$EvaDatabaseName = null, $EvaSchemaName = null, $EvaNewSchemaName = null, $EvaUsername = null){
		
	}
	
	function EvaDeleteSchemaInDatabase($EvaDatabaseDriver = null ,$EvaDatabaseName = null, $EvaSchemaName = null){
		
	}
	
	function EvaGetAllSchemaInDatabase($EvaDatabaseDriver = null ,$EvaDatabaseName = null){
		if($EvaDatabaseDriver!== null){
			if($EvaDatabaseDriver =='postgres' && $EvaDatabaseName!==null){
				return $this->query('SELECT nspname FROM pg_namespace,pg_catalog.pg_database where nspowner = datdba and datname=\''.$EvaDatabaseName.'\';');
			}
			elseif($EvaDatabaseDriver =='mysql'){
				return $this->query('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA');
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	}
	
	function EvaCountSchemaOnDatabase($EvaDatabaseDriverName = null,$EvaDatabaseName = null, $EvaSchemaName = null){
	}
	
	function EvaCheckTableInDatabaseExist($EvaDatabaseDriver = null, $EvaDatabaseName = null,$EvaSchemaName = null,$EvaTableName = null){
		
		if($EvaDatabaseDriver !== null && $EvaDatabaseName !== null && $EvaTableName !== null){
			$EvaTableCheck = array();
			if($EvaDatabaseDriver == 'postgres' && $EvaSchemaName != null){
				$EvaTableCheck = $this->query('SELECT * FROM information_schema.tables WHERE table_schema=\''.$EvaSchemaName.'\' and table_catalog=\''.$EvaDatabaseName.'\' and table_type=\'BASE TABLE\' and table_name = \''.$EvaTableName.'\'');
				if(!empty($EvaTableCheck)){
					return true;
				}
				else{
					return false;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				$EvaTableCheck = $this->query('SELECT table_name FROM information_schema.tables WHERE table_schema = \''.$EvaDatabaseName.'\' AND table_name = \'eva_applications\';');
				if(!empty($EvaTableCheck)){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCreateTableInDatabase($EvaDatabaseDriver = null, $EvaDatabaseName = null,$EvaSchemaName = null,$EvaTableName = null, $EvaUsername = null){
		if($EvaDatabaseDriver !== null && $EvaDatabaseName !== null && $EvaTableName !== null && $EvaUsername !== null){
			if($EvaDatabaseDriver == 'postgres' && $EvaSchemaName !== null){
				if(!$this->EvaCheckTableInDatabaseExist($EvaDatabaseName,$EvaSchemaName,$EvaTableName))
				{
					$this->query('DROP TABLE IF EXISTS '.$EvaSchemaName.'.'.$EvaTableName.' CASCADE; CREATE TABLE '.$EvaSchemaName.'.'.$EvaTableName.'() WITH (OIDS = FALSE); ALTER TABLE '.$EvaSchemaName.'.'.$EvaTableName.' OWNER TO "'.$EvaUsername.'";');
					return true;
				}
				else{
					return true;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				$this->query('CREATE TABLE IF NOT EXISTS '.$EvaDatabaseName.'.'.$EvaTableName.'(eva_temp_column INT(11) NULL);');
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCountTableOnDatabase($EvaDatabaseDriverName = null,$EvaDatabaseName = null, $EvaSchemaName = null){
	}
	
	function EvaEditTableInDatabasePostgres(){
		
	}
	
	function EvaDeleteTableInDatabasePostgres(){
		
	}
	
	function EvaDatabaseDriverColumnTypeConverter($EvaDatabaseDriverName = null, $EvaColumnType = null, $EvaColumnTypePrimaryKey = null){
		if($EvaDatabaseDriverName !== null && $EvaColumnType !== null){
			if($EvaDatabaseDriverName == 'postgres'){
				if($EvaColumnType == 'integer' && $EvaColumnTypePrimaryKey == true){
					return 'serial';
				}
				if($EvaColumnType == 'integer' && $EvaColumnTypePrimaryKey == false){
					return 'integer';
				}
				if($EvaColumnType == 'string'){
					return 'character varying';
				}
				if($EvaColumnType == 'text'){
					return 'text';
				}
				if($EvaColumnType == 'float'){
					return 'real';
				}
				if($EvaColumnType == 'datetime'){
					return 'time without time zone';
				}
				if($EvaColumnType == 'date'){
					return 'date';
				}
				if($EvaColumnType == 'time'){
					return 'time';
				}
				if($EvaColumnType == 'binary'){
					return 'bytea';
				}
				if($EvaColumnType == 'boolean'){
					return 'boolean';
				}
				if($EvaColumnType == 'number'){
					return 'numeric';
				}
				if($EvaColumnType == 'inet'){
					return 'inet';
				}
				else{
					return false;
				}
				
			}
			elseif($EvaDatabaseDriverName == 'mysql'){
				if($EvaColumnType == 'integer' && $EvaColumnTypePrimaryKey == true){
					return 'int';
				}
				if($EvaColumnType == 'integer' && $EvaColumnTypePrimaryKey == false){
					return 'int';
				}
				if($EvaColumnType == 'string'){
					return 'varchar';
				}
				if($EvaColumnType == 'text'){
					return 'text';
				}
				if($EvaColumnType == 'float'){
					return 'float';
				}
				if($EvaColumnType == 'datetime'){
					return 'datetime';
				}
				if($EvaColumnType == 'date'){
					return 'date';
				}
				if($EvaColumnType == 'time'){
					return 'time';
				}
				if($EvaColumnType == 'binary'){
					return 'blob';
				}
				if($EvaColumnType == 'BOOLEAN'){
					return 'boolean';
				}
				if($EvaColumnType == 'number'){
					return 'integer';
				}
				if($EvaColumnType == 'inet'){
					return 'varchar';
				}
				else{
					return false;
				}
			}
			//add new type of column here for different database driver
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	/*for mysql purpose only!!!*/
	function EvaDeleteColumnTemporaryTableMySql($EvaDatabaseName = null,$EvaTableName = null){
		if($EvaDatabaseName != null && $EvaTableName != null){
			$this->query('ALTER TABLE '.$EvaDatabaseName.'.'.$EvaTableName.' DROP COLUMN eva_temp_column;');
			return true;
		}
		else{
			return false;
		}
	}
	/*for mysql purpose only!!!*/
	function EvaCheckColumnTemporaryTableMySql($EvaDatabaseName = null,$EvaTableName = null){
		if($EvaDatabaseName != null && $EvaTableName != null){
			$EvaCheck = $this->query('SELECT COUNT(COLUMN_NAME) from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = \''.$EvaDatabaseName.'\' and TABLE_NAME = \''.$EvaTableName.'\' and COLUMN_NAME = \'eva_temp_column\';');
			//pr($EvaCheck);
			//exit;
			return $EvaCheck;
		}
		else{
			return false;
		}
	}
	
	function EvaCountColumnInTableOnDatabase($EvaDatabaseDriverName = null,$EvaDatabaseName = null, $EvaSchemaName = null, $EvaTableName = null){
		//postgres = select * from information_schema.columns where table_catalog = 'EvaCakePHP' and table_schema = 'evacakephp' and table_name = 'eva_applications'
		if($EvaDatabaseDriverName != null && $EvaDatabaseName != null && $EvaTableName != null){
			if($EvaDatabaseDriverName == 'postgres' && $EvaSchemaName != null){
				return $this->query('select count(column_name) from information_schema.columns where table_catalog = \''.$EvaDatabaseName.'\' and table_schema = \''.$EvaSchemaName.'\' and table_name = \''.$EvaTableName.'\';');
				
			}
			elseif($EvaDatabaseDriverName == 'mysql'){
				return $this->query('SELECT count(COLUMN_NAME) from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = \''.$EvaDatabaseName.'\' and TABLE_NAME = \''.$EvaTableName.'\' and COLUMN_NAME = \''.$EvaColumnName.'\';');
				
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCheckColumnAvaiableInTable($EvaDatabaseDriver = null , $EvaDatabaseName = null, $EvaDatabaseSchemaName = null, $EvaTableName = null,$EvaColumnName = null){
		if($EvaDatabaseDriver != null && $EvaDatabaseName !== null && $EvaTableName !== null && $EvaColumnName!==null){
			if($EvaDatabaseDriver == 'postgres' && $EvaDatabaseSchemaName!==null){
				$EvaTemp = $this->query('SELECT column_name FROM information_schema.columns where table_catalog = \''.$EvaDatabaseName.'\' and table_schema = \''.$EvaDatabaseSchemaName.'\' and table_name = \''.$EvaTableName.'\' and column_name = \''.$EvaColumnName.'\'');
				if(!empty($EvaTemp)){
					return true;
				}
				else{
					return false;
				}
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				/*select * from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = 'evacakephp' and TABLE_NAME = 'eva_applications' and COLUMN_NAME = 'id' and COLUMN_KEY = 'PRI'*/
				$EvaTemp = $this->query('SELECT COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = \''.$EvaDatabaseName.'\' and TABLE_NAME = \''.$EvaTableName.'\' and COLUMN_NAME = \''.$EvaColumnName.'\';');
				if(!empty($EvaTemp)){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCreateColumnTableInDatabase($EvaDatabaseDriver = null, $EvaDatabaseName = null, $EvaDatabaseSchemaName = null, $EvaTableName = null,$EvaColumnName = null, $EvaColumnType = null, $EvaColumnLength = null, $EvaColumnTypeNullOption = null,$EvaColumnPrimaryKey = null){
		//pr($EvaDatabaseName);pr($EvaDatabaseSchemaName); pr($EvaTableName); pr($EvaColumnName); pr($EvaColumnType); pr($EvaColumnTypeNullOption);
		//exit;
		if($EvaDatabaseDriver !== null && $EvaDatabaseName !== null && $EvaTableName !== null && $EvaColumnName !== null && $EvaColumnType !== null){
			if($EvaDatabaseDriver == 'postgres' && $EvaDatabaseSchemaName!==null){
				$EvaNullOption = 'Not NULL';
				if($EvaColumnTypeNullOption){
					$EvaNullOption = 'NULL';
				}
				$EvaColumnQueryString = 'ALTER TABLE '.$EvaDatabaseSchemaName.'.'.$EvaTableName.' DROP COLUMN IF EXISTS '.$EvaColumnName.' cascade;';
				$EvaNewColumnType = $this->EvaDatabaseDriverColumnTypeConverter($EvaDatabaseDriver, $EvaColumnType, $EvaColumnPrimaryKey);
				$EvaColumnQueryString .= 'ALTER TABLE '.$EvaDatabaseSchemaName.'.'.$EvaTableName.' ADD COLUMN '.$EvaColumnName.' '.$EvaNewColumnType;
				if($EvaColumnLength != null && $EvaNewColumnType != 'serial'){
					if($EvaNewColumnType !='integer'){
						$EvaColumnQueryString.='('.$EvaColumnLength.') ';
					}
				}
				$EvaColumnQueryString .= ' '.$EvaNullOption.';';
				//pr($EvaNewColumnType);
				//exit;
				
				if($EvaColumnPrimaryKey == 1){
					$EvaColumnQueryString .= ' ALTER TABLE '.$EvaDatabaseSchemaName.'.'.$EvaTableName.' ADD CONSTRAINT '.$EvaTableName.'_pk PRIMARY KEY ('.$EvaColumnName.');';
					$this->query($EvaColumnQueryString);
				}
				else{
					$this->query($EvaColumnQueryString);
				}
				return true;
			}
			elseif($EvaDatabaseDriver == 'mysql'){
				
					//ALTER TABLE `xxxx` ADD `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST 
					$EvaNullOption = 'Not NULL';
					if($EvaColumnTypeNullOption){
						$EvaNullOption = 'NULL';
					}
					
					$EvaNewColumnType = $this->EvaDatabaseDriverColumnTypeConverter($EvaDatabaseDriver, $EvaColumnType, $EvaColumnPrimaryKey);
					if($EvaColumnType == 'boolean'){
						pr($EvaNewColumnType);
					}
					$EvaColumnQueryString = 'ALTER TABLE '.$EvaDatabaseName.'.'.$EvaTableName.' ADD COLUMN '.$EvaColumnName.' '.$EvaNewColumnType.' ';
					//if($EvaNewColumnType!='text' && $EvaNewColumnType!='datetime' && $EvaNewColumnType!='BOOLEAN'){
					if($EvaNewColumnType!='text' && $EvaNewColumnType!='datetime' && $EvaNewColumnType!='BOOLEAN' && $EvaNewColumnType!='TIME' && $EvaNewColumnType!='float'){
						$EvaColumnQueryString.='('.$EvaColumnLength.') ';
					}
					$EvaColumnQueryString .=$EvaNullOption;
				
					if($EvaColumnPrimaryKey == 1 && $EvaNewColumnType == 'int'){
						$EvaColumnQueryString.=' AUTO_INCREMENT PRIMARY KEY';
						$this->query($EvaColumnQueryString);
					}
					elseif($EvaColumnPrimaryKey == 1 && $EvaNewColumnType != 'int'){
						$EvaColumnQueryString.=' PRIMARY KEY';
						$this->query($EvaColumnQueryString);
					}
					else{
						$this->query($EvaColumnQueryString);
					}
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function EvaEditColumnTableInDatabasePostgres($EvaDatabaseName = null, $EvaDatabaseSchemaName = null, $EvaTableName = null,$EvaColumnName = null, $EvaColumnType = null, $EvaColumnTypeNullOption = null,$EvaNewColumnName = null, $EvaNewColumnType = null, $EvaNewColumnTypeNullOption = null){
		
	}
	
	function EvaDeleteColumnTableInDatabasePostgres($EvaDatabaseName = null, $EvaDatabaseSchemaName = null, $EvaTableName = null,$EvaColumnName = null){
		
	}

	function EvaGetPrimaryKeyInTablePostgres($EvaDatabaseName = null, $EvaDatabaseSchemaName = null, $EvaTableName = null){
		if($EvaTableName !== null){
			return $this->query('select mymaster.table_catalog, mymaster.table_schema, mymaster.table_name,mymaster.column_name, mydetail.constraint_type from information_schema.key_column_usage mymaster, (SELECT * FROM information_schema.table_constraints WHERE table_name = \''.$EvaTableName.'\' and constraint_type = \'PRIMARY KEY\') mydetail where mymaster.constraint_catalog = mydetail.constraint_catalog and mymaster.constraint_schema = mydetail.constraint_schema and mymaster.table_catalog = mydetail.table_catalog and mymaster.table_schema = mydetail.table_schema and mymaster.table_catalog = \''.$EvaDatabaseName.'\' and mymaster.table_schema = \''.$EvaDatabaseSchemaName.'\' and mymaster.table_name = \''.$EvaTableName.'\';');
		}
		else{
			return false;
		}
	}
	
	function EvaCheckCountColumnPrimaryKey($EvaDataColumns = array()){
		if(!empty($EvaDataColumns)){
			//count primary key
			$count = 0;
			$EvaDetectedColumn = array();
			foreach($EvaDataColumns as $EvaDataColumn){
				if($EvaDataColumn['primarykey'] == 1){
					$count++;
					$EvaDetectedColumn[] = $EvaDataColumn['name'];
				}
			}
			if($count == 1){
				return true;
			}
			else{
				return $EvaDetectedColumn;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCreateFile($path, $contents) {
		$path = str_replace(DS . DS, DS, $path);
		if (!class_exists('File')) {
			require LIBS . 'file.php';
		}

		if ($File = new File($path, true)) {
			$data = $File->prepare($contents);
			$File->write($data);
			return true;
		} else {
			return false;
		}
	}
	
	/*nb : todo: edit database config and erase databaseconfig*/
	
	function EvaCleanConfigData($evaConfigData = array()){
		if(!empty($evaConfigData)){
			unset($evaConfigData['EvaModel']);
			unset($evaConfigData['id']);
			if(empty($evaConfigData['persistent']) || $evaConfigData['persistent']==null){
				$evaConfigData['persistent'] = 'false';
			}
			unset($evaConfigData['eva_application_id']);
			unset($evaConfigData['deleted']);
			unset($evaConfigData['deleted_date']);
			unset($evaConfigData['created_by']);
			unset($evaConfigData['modified_by']);
			unset($evaConfigData['created']);
			unset($evaConfigData['modified']);
			$evaConfigData['encoding'] = null;
			return $evaConfigData;
		}
		else{
			return false;
		}
	}
	
	function EvaSearchInDbConfig($oldConfigs = array(), $evaConfigData = array()){
		$oldConfigsIndex = 0;
		$keyOldConfigsIndex = null;
		if(!empty($oldConfigs) && !empty($evaConfigData)){
			foreach($oldConfigs as $oldConfig){
				if($oldConfig['name'] === $evaConfigData['name']){
					$keyOldConfigsIndex = $oldConfigsIndex;
				}
				$oldConfigsIndex++;
			}
			if($keyOldConfigsIndex !==null){
				return $keyOldConfigsIndex;
			}
			else{
				return -1;
			}
		}
		else{
			return -1;
		}
	}
	
	function EvaCreateDbConfig($evaConfigData = array()){
		$this->autoRender = false;
		$EvaDatabaseClassName = 'DATABASE_CONFIG';
		$EvaDefaultConfig = array(
			'name' => 'default', 'driver'=> 'mysql', 'persistent'=> 'false', 'host'=> 'localhost',
			'login'=> 'root', 'password'=> 'password', 'database'=> 'project_name',
			'schema'=> null, 'prefix'=> null, 'encoding' => null, 'port' => null
		);
		$EvaPath = APP.'config'.DS;
		$EvaNewConfigs = array();
		$counter = 0;
		$out = null;
		$filename = $EvaPath.'database.php';
		$keyOldConfigsIndex = null;

		//pr($evaConfigData);
		//exit;
		if(!empty($evaConfigData)){
			//get database file on app/config and set to old configs
			$filename = $EvaPath.'database.php';
			$oldConfigs = array();
			$evaConfigData = $this->EvaCleanConfigData($evaConfigData);
			
			if (file_exists($filename)) {
				config('database');
				$db = new $EvaDatabaseClassName;
				$temp = get_class_vars(get_class($db));

				foreach ($temp as $configName => $info) {
					$info = array_merge($EvaDefaultConfig, $info);

					if (!isset($info['schema'])) {
						$info['schema'] = null;
					}
					if (!isset($info['encoding'])) {
						$info['encoding'] = null;
					}
					if (!isset($info['port'])) {
						$info['port'] = null;
					}

					if ($info['persistent'] == false) {
						$info['persistent'] = 'false';
					}
					else {
						$info['persistent'] = 'true';
					}

					$oldConfigs[] = array(
						'name' => $configName,
						'driver' => $info['driver'],
						'persistent' => $info['persistent'],
						'host' => $info['host'],
						'port' => $info['port'],
						'login' => $info['login'],
						'password' => $info['password'],
						'database' => $info['database'],
						'prefix' => $info['prefix'],
						'schema' => $info['schema'],
						'encoding' => $info['encoding']
					);
				}
			}
			
			$keyOldConfigsIndex = $this->EvaSearchInDbConfig($oldConfigs,$evaConfigData);
			if($keyOldConfigsIndex != -1){
				$oldConfigs[$keyOldConfigsIndex] = $evaConfigData;
			}
			else{
				$oldConfigs[] = $evaConfigData;
			}
			$EvaNewConfigs = $oldConfigs;
			//pr($keyOldConfigsIndex);
			//pr($oldConfigs);
			//pr($EvaNewConfigs);
			//exit;
			$out = "<?php\n";
			$out .= "class DATABASE_CONFIG {\n\n";
		
			foreach ($EvaNewConfigs as $EvaNewConfig) {
					extract($EvaNewConfig);
					$out .= "\tvar \${$name} = array(\n";
					$out .= "\t\t'driver' => '{$driver}',\n";
					$out .= "\t\t'persistent' => {$persistent},\n";
					$out .= "\t\t'host' => '{$host}',\n";
					if ($port) {
						$out .= "\t\t'port' => {$port},\n";
					}
					$out .= "\t\t'login' => '{$login}',\n";
					$out .= "\t\t'password' => '{$password}',\n";
					$out .= "\t\t'database' => '{$database}',\n";

					if ($schema) {
						$out .= "\t\t'schema' => '{$schema}',\n";
					}

					if ($prefix) {
						$out .= "\t\t'prefix' => '{$prefix}',\n";
					}

					if ($encoding) {
						$out .= "\t\t'encoding' => '{$encoding}'\n";
					}

					$out .= "\t);\n";
			}
		
			$out .= "}\n";
			$out .= "?>";
			$this->EvaCreateFile($filename, $out);
			
			return true;
		}
		else{
			return false;
		}	
	}
	
	function EvaEditDbConfig(){
		
	}
	
	function EvaDeleteDbConfig(){
		
	}
	
	function EvaCreateUserDatabase($EvaDatabaseDriver = null,$EvaUserName = null,$EvaPassword = null){
		if($EvaDatabaseDriver == 'postgres'){
			if($EvaUserName !== null && $EvaPassword !== null){
				$EvaResultDatas = array();
				$EvaResultDatas = $this->EvaFindUserInDatabaseByUsername($EvaDatabaseDriver,$EvaUserName);
				//pr($EvaResultDatas);
				//compare if data is match then don't create user and continue
			
				if(!empty($EvaResultDatas)){
					if($EvaUserName === $EvaResultDatas['login']){
						return true;
					}
					else{
						return false;
					}
				}
				else{
					$this->query('CREATE ROLE '.$EvaUserName.' LOGIN ENCRYPTED PASSWORD \''.$EvaPassword.'\' SUPERUSER CREATEDB CREATEROLE VALID UNTIL \'infinity\';');
					return true;
				}
			}
			else{
				return false;
			}
		}
		elseif($EvaDatabaseDriver == 'mysql'){
			if($EvaUserName !== null && $EvaPassword !== null){
				$EvaResultDatas = array();
				$EvaResultDatas = $this->EvaFindUserInDatabaseByUsername($EvaDatabaseDriver,$EvaUserName);
				if(!empty($EvaResultDatas)){
					if($EvaUserName === $EvaResultDatas['login']){
						return true;
					}
					else{
						return false;
					}
				}
				else{
					$this->query('CREATE ROLE '.$EvaUserName.' LOGIN ENCRYPTED PASSWORD \''.$EvaPassword.'\' SUPERUSER CREATEDB CREATEROLE VALID UNTIL \'infinity\';');
					return true;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaGetAllInformationNeeded($id = null){
		if($id !== null){
			//pr($id); //'4ddbc199-1c9c-479e-907b-01dbc0a8014d'
			$EvaDatas = $this->find('first',
				array(
						'conditions'=>array('EvaApplication.id'=>$id),
						'contain'=>array(
							'EvaDbConnection'=> array(
								'EvaModel'=> array(
									'EvaBelongToAssociation'=>array(
										'EvaBelongToAssociationDetail'
									),
									'EvaHasAndBelongToManyAssociation'=>array(
										'EvaHasAndBelongToManyAssociationDetail'
									),
									'EvaHasManyAssociation'=>array(
										'EvaHasManyAssociationDetail'
									),
									'EvaHasOneAssociation'=>array(
										'EvaHasOneAssociationDetail'
									),
									'EvaModelColumn'=>array(
										'EvaColumnRule'=>array(
											'EvaModelColumnRuleDetail'
										)
									),
								)
							)
						)
					)
			);
			//pr($testdata);
			/*
			$EvaDatas=$this->find('first', 
				array('contain' => array(
											'EvaDbConnection' => array(
		    									'conditions' => array('EvaDbConnection.eva_application_id =' => $id),
												'EvaModel'=>array(
													'conditions' => array('EvaModel.eva_db_connection_id'=>'EvaDbConnection.id'),
													'EvaBelongToAssociation' => array(
														'conditions' => array('EvaBelongToAssociation.eva_model_id'=>'EvaModel.id'),
														'EvaBelongToAssociationDetail' => array(
															'conditions' => array('EvaBelongToAssociationDetail.eva_belong_to_association_id'=>'EvaBelongToAssociation.id'),
														),
													),
													'EvaHasAndBelongToManyAssociation' => array(
														'conditions' => array('EvaHasAndBelongToManyAssociation.eva_model_id'=>'EvaModel.id'),
														'EvaHasAndBelongToManyAssociationDetail' => array(
															'conditions' => array('EvaHasAndBelongToManyAssociation.id' => 'EvaHasAndBelongToManyAssociationDetail.eva_has_and_belong_to_many_association_id'),
														),
													),
													'EvaHasManyAssociation' => array(
														'conditions' => array('EvaHasManyAssociation.eva_model_id'=>'EvaModel.id'),
														'EvaHasManyAssociationDetail' => array(
															'conditions' => array('EvaHasManyAssociationDetail.eva_has_many_association_id'=>'EvaHasManyAssociation.id'),
														),
													),
													'EvaHasOneAssociation' => array(
														'conditions' => array('EvaHasOneAssociation.eva_model_id'=>'EvaModel.id'),
														'EvaHasOneAssociationDetail' => array(
															'conditions' => array('EvaBelongToAssociationDetail.eva_has_one_association_id'=>'EvaHasOneAssociation.id'),
														),
													),
													'EvaModelColumn' => array(
														'conditions' => array('EvaModelColumn.eva_model_id'=>'EvaModel.id'),
														'EvaColumnRule' => array(
															'conditions' => array('EvaColumnRule.eva_model_column_id'=>'EvaModelColumn.id'),
															'EvaModelColumnRuleDetail' => array(
																'conditions' => array('EvaModelColumnRuleDetail.eva_column_rule_id'=>'EvaColumnRule.id'),
															),
														),
													),
												)
											)
										)
				)
			);
			* */
			//pr($EvaDatas);
			//exit;
			/*
			if(!empty($EvaDatas['EvaDbConnection'])){
				$EvaDbConnectionCounter = 0;
				foreach($EvaDatas['EvaDbConnection'] as $EvaDbConnections){
					//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]);
					if(!empty($EvaDbConnections['EvaModel'])){
						$EvaModelsCounter = 0;
						foreach($EvaDbConnections['EvaModel'] as $EvaModels){

							if(!empty($EvaModels['EvaBelongToAssociation'])){
								$EvaBelongToAssociationCounter = 0;
								foreach($EvaModels['EvaBelongToAssociation'] as $EvaBelongToAssociations){
									//pr($EvaBelongToAssociations);
									$temp = $this->EvaDbConnection->EvaModel->EvaBelongToAssociation->EvaBelongToAssociationDetail->find('first',array('conditions'=>array('EvaBelongToAssociationDetail.eva_belong_to_association_id'=>$EvaBelongToAssociations['id']),'recursive'=>-1));
									//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaBelongToAssociation'][$EvaBelongToAssociationCounter]['EvaBelongToAssociationDetail']);
									//pr($temp['EvaBelongToAssociationDetail']);
									if(!empty($temp)){
										$EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaBelongToAssociation'][$EvaBelongToAssociationCounter]['EvaBelongToAssociationDetail'] = array_merge($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaBelongToAssociation'][$EvaBelongToAssociationCounter]['EvaBelongToAssociationDetail'], $temp['EvaBelongToAssociationDetail']);
									}
									
									//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaBelongToAssociation'][$EvaBelongToAssociationCounter]);
									//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaBelongToAssociation'][$EvaBelongToAssociationCounter]['EvaBelongToAssociationDetail']);
									//exit;
									$EvaBelongToAssociationCounter++;
								}
								unset($EvaBelongToAssociationCounter);
							}
							if(!empty($EvaModels['EvaHasAndBelongToManyAssociation'])){
								$EvaHasAndBelongToManyAssociationCounter = 0;
								foreach($EvaModels['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
									//pr($EvaBelongToAssociations);
									$temp = $this->EvaDbConnection->EvaModel->EvaHasAndBelongToManyAssociation->EvaHasAndBelongToManyAssociationDetail->find('first',array('conditions'=>array('EvaHasAndBelongToManyAssociationDetail.eva_has_and_belong_to_many_association_id'=>$EvaHasAndBelongToManyAssociation['id']),'recursive'=>-1));
						$EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaHasAndBelongToManyAssociation'][$EvaHasAndBelongToManyAssociationCounter]['EvaHasAndBelongToManyAssociationDetail'] = array_merge($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaHasAndBelongToManyAssociation'][$EvaHasAndBelongToManyAssociationCounter]['EvaHasAndBelongToManyAssociationDetail'], $temp['EvaHasAndBelongToManyAssociationDetail']);
									$EvaHasAndBelongToManyAssociationCounter++;
								}
								unset($EvaHasAndBelongToManyAssociationCounter);
							}
							if(!empty($EvaModels['EvaHasManyAssociation'])){
								$EvaHasManyAssociationCounter = 0;
								foreach($EvaModels['EvaHasManyAssociation'] as $EvaHasManyAssociations){
									//pr($EvaBelongToAssociations);
									$temp = $this->EvaDbConnection->EvaModel->EvaHasManyAssociation->EvaHasManyAssociationDetail->find('first',array('conditions'=>array('EvaHasManyAssociationDetail.eva_has_many_association_id'=>$EvaHasManyAssociations['id']),'recursive'=>-1));
									$EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaHasManyAssociation'][$EvaHasManyAssociationCounter]['EvaHasManyAssociationDetail'] = array_merge($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaHasManyAssociation'][$EvaHasManyAssociationCounter]['EvaHasManyAssociationDetail'], $temp['EvaHasManyAssociationDetail']);
									$EvaHasManyAssociationCounter++;
								}
								unset($EvaHasManyAssociationCounter);
							}
							if(!empty($EvaModels['EvaHasOneAssociation'])){
								$EvaHasOneAssociationCounter = 0;
								foreach($EvaModels['EvaHasOneAssociation'] as $EvaHasOneAssociations){
									//pr($EvaBelongToAssociations);
									$temp = $this->EvaDbConnection->EvaModel->EvaHasOneAssociation->EvaHasOneAssociationDetail->find('first',array('conditions'=>array('EvaHasOneAssociationDetail.eva_has_one_association_id'=>$EvaHasOneAssociations['id']),'recursive'=>-1));
									$EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaHasOneAssociation'][$EvaHasOneAssociationCounter]['EvaHasOneAssociationDetail'] = array_merge($EvaDatas['EvaDbConnection'][$EvaHasOneAssociationCounter]['EvaModel'][$EvaModelsCounter]['EvaHasOneAssociation'][$EvaHasOneAssociationCounter]['EvaHasOneAssociationDetail'], $temp['EvaHasOneAssociationDetail']);
									$EvaHasOneAssociationCounter++;
								}
								unset($EvaHasOneAssociationCounter);
							}

							if(!empty($EvaModels['EvaModelColumn'])){
								//pr($EvaModels['EvaModelColumn']);
								$EvaModelColumnCounter = 0;
								foreach($EvaModels['EvaModelColumn'] as $EvaModelColumns){
									//pr($EvaModelColumns['EvaColumnRule']);
									//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaModelColumn']);
									if(!empty($EvaModelColumns['EvaColumnRule'])){
										//pr($EvaModelColumns['EvaColumnRule']);
										//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaModelColumn'][$EvaModelColumnCounter]);
										$EvaColumnRuleCounter = 0;
										foreach($EvaModelColumns['EvaColumnRule'] as $EvaColumnRules){
											//pr($EvaColumnRules);
											//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaModelColumn'][$EvaModelColumnCounter]['EvaColumnRule']);
											if(!empty($EvaColumnRules['EvaModelColumnRuleDetail'])){
												//pr($EvaColumnRules['EvaModelColumnRuleDetail']);
												//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaModelColumn'][$EvaModelColumnCounter]['EvaColumnRule'][$EvaColumnRuleCounter]);
												$EvaModelColumnRuleDetailCounter = 0;
												foreach($EvaColumnRules['EvaModelColumnRuleDetail'] as $EvaModelColumnRuleDetails){

													//pr($EvaModelColumnRuleDetails);
													$EvaTempData = $this->EvaDbConnection->EvaModel->EvaModelColumn->EvaColumnRule->EvaModelColumnRuleDetail->EvaBasicRule->find('first',array('conditions'=>array('EvaBasicRule.id'=>$EvaModelColumnRuleDetails['eva_basic_rule_id']),'recursive'=>-1,'fields'=>array('EvaBasicRule.name')));
													//pr($EvaTempData);
													$EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaModelColumn'][$EvaModelColumnCounter]['EvaColumnRule'][$EvaColumnRuleCounter]['EvaModelColumnRuleDetail'][$EvaModelColumnRuleDetailCounter] = array_merge($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaModelColumn'][$EvaModelColumnCounter]['EvaColumnRule'][$EvaColumnRuleCounter]['EvaModelColumnRuleDetail'][$EvaModelColumnRuleDetailCounter],$EvaTempData);
													//pr($EvaDatas['EvaDbConnection'][$EvaDbConnectionCounter]['EvaModel'][$EvaModelsCounter]['EvaModelColumn'][$EvaModelColumnCounter]['EvaColumnRule'][$EvaColumnRuleCounter]['EvaModelColumnRuleDetail'][$EvaModelColumnRuleDetailCounter]);
													$EvaModelColumnRuleDetailCounter++;
												}
												unset($EvaModelColumnRuleDetailCounter);
											}
											$EvaColumnRuleCounter++;
										}
										unset($EvaColumnRuleCounter);
									}
									$EvaModelColumnCounter++;
								}
								unset($EvaModelColumnCounter);
							}
							$EvaModelsCounter++;
						}
						unset($EvaModelsCounter);
					}
					$EvaDbConnectionCounter++;
				}
				unset($EvaDbConnectionCounter);
			}
			//pr($EvaDatas);*/
			return $EvaDatas;
		}
		else{
			return false;
		}
	}
	
	/**
	 * Enables Configure::read('Routing.prefixes') in /app/config/core.php
	 *
	 * @param string $name Name to use as admin routing
	 * @return boolean Success
	 * @access public
	 */
	function EvaEnableCakeAdminRouting($name) {
		$path = (empty($this->configPath)) ? CONFIGS : $this->configPath;
		$File = new File($path . 'core.php');
		$contents = $File->read();
		if (preg_match('%([/\\t\\x20]*Configure::write\(\'Routing.prefixes\',[\\t\\x20\'a-z,\)\(]*\\);)%', $contents, $match)) {
			$result = str_replace($match[0], "\t" . 'Configure::write(\'Routing.prefixes\', array(\''.$name.'\'));', $contents);
			if ($File->write($result)) {
				Configure::write('Routing.prefixes', array($name));
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function EvaCheckIfAdminEnable($EvaDatas = array()){
		if(!empty($EvaDatas)){
			$EvaCountAdmin = 0;
			foreach($EvaDatas['EvaDbConnection'] as $EvaData){
				if(!empty($EvaData['EvaModel'])){
					foreach($EvaData['EvaModel'] as $EvaModel){
						if($EvaModel['admin_section']){
							//pr($EvaModel['name'].' is enable');
							$EvaCountAdmin++;
						}
					}
				}
			}
			if($EvaCountAdmin >=1){
				$this->EvaEnableCakeAdminRouting('admin');
			}
			return true;
		}
		else{
			return false;
		}
	}
	
	function EvaBakeTemplateFixture(){
		
	}
	
	function EvaBakeTemplateTest(){
		
	}
	
	function EvaBakeModel($EvaApplicationName = null, $EvaUseDbConfig = null,$EvaDataModel = array()){
		
		if(!empty($EvaDataModel) && $EvaApplicationName !== null){
			
			$EvaFileName = APP.'models'.DS.Inflector::singularize($EvaDataModel['name']).'.php';
			//pr($EvaFileName);
			//exit;
			//pr($EvaDataModel);
						
			//create template file
			$out = "<?php\n";
			$out.= "class ". Inflector::classify($EvaDataModel['name'])." extends AppModel{\n";
			$out.="\tvar \$name = '".Inflector::classify($EvaDataModel['name'])."';\n";
			if($EvaUseDbConfig !== null && empty($EvaDataModel['useDbConfig'])){
				if($EvaUseDbConfig != 'default'){
					$out.="\tvar \$useDbConfig = '".$EvaUseDbConfig."';\n";
				}
			}
			if($EvaUseDbConfig === null && !empty($EvaDataModel['useDbConfig'])){
				if($EvaDataModel['useDbConfig'] != 'default'){
					$out.="\tvar \$useDbConfig = '".$EvaDataModel['useDbConfig']."';\n";
				}
			}
			$out.="\tvar \$validate = array(\n";
				foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumns){
					
					if(!empty($EvaModelColumns['EvaColumnRule']) && is_array($EvaModelColumns['EvaColumnRule'])){
						//pr($EvaModelColumns['EvaColumnRule']);
						foreach($EvaModelColumns['EvaColumnRule'] as $EvaColumnRules){
							if(!empty($EvaColumnRules['EvaModelColumnRuleDetail'])){
								//pr($EvaColumnRules['EvaModelColumnRuleDetail']);
								$out.="\t\t'".$EvaModelColumns['name']."' => array(\n";
								foreach($EvaColumnRules['EvaModelColumnRuleDetail'] as $EvaModelColumnRuleDetails){
									//pr($EvaModelColumnRuleDetails);
									$EvaBasicRuleName = $this->EvaDbConnection->EvaModel->EvaModelColumn->EvaColumnRule->EvaModelColumnRuleDetail->EvaBasicRule->find('first',array('conditions' => array('EvaBasicRule.id' => $EvaModelColumnRuleDetails['eva_basic_rule_id']),'recursive' => -1,'fields' => array('EvaBasicRule.name')));
									//pr($EvaBasicRuleName);
									//exit;
									//pr($EvaModelColumnRuleDetails);
									$out.="\t\t\t'".$EvaModelColumnRuleDetails['name']."' => array(\n";
									//$out.="\t\t\t\t'rule' => array('".$EvaModelColumnRuleDetails['EvaBasicRule']['name']."'),\n";
									$out.="\t\t\t\t'rule' => array('".$EvaBasicRuleName['EvaBasicRule']['name']."'),\n";
									$out.="\t\t\t\t'message' => '".$EvaModelColumnRuleDetails['message']."',\n";
									if($EvaModelColumnRuleDetails['allowEmpty'] == true){
										$out.="\t\t\t\t'allowEmpty' => true,\n";
									}
									if($EvaModelColumnRuleDetails['allowEmpty'] === false && !empty($EvaModelColumnRuleDetails['allowEmpty'])){
										$out.="\t\t\t\t'allowEmpty' => false,\n";
									}
									if($EvaModelColumnRuleDetails['required'] === true){
										$out.="\t\t\t\t'required' => true,\n";
									}
									if($EvaModelColumnRuleDetails['required'] === false && !empty($EvaModelColumnRuleDetails['required'])){
										$out.="\t\t\t\t'required' => false,\n";
									}
									if($EvaModelColumnRuleDetails['last'] === true){
										$out.="\t\t\t\t'last' => true, // Stop validation after this rule\n";
									}
									if($EvaModelColumnRuleDetails['last'] === false && !empty($EvaModelColumnRuleDetails['last'])){
										$out.="\t\t\t\t'last' => false, // Stop validation after this rule\n";
									}
									if($EvaModelColumnRuleDetails['on'] === 'create'){
										$out.="\t\t\t\t'on' => 'create', // Limit validation to 'create' or 'update' operations\n";
									}
									if($EvaModelColumnRuleDetails['on'] === 'update'){
										$out.="\t\t\t\t'on' => 'update', // Limit validation to 'create' or 'update' operations\n";
									}
									if(empty($EvaModelColumnRuleDetails['allowEmpty']) && empty($EvaModelColumnRuleDetails['required']) && empty($EvaModelColumnRuleDetails['last']) && empty($EvaModelColumnRuleDetails['on'])){
										$out.="\t\t\t\t//'required' => false,\n";
										$out.="\t\t\t\t//'last' => false, // Stop validation after this rule\n";
										$out.="\t\t\t\t//'on' => 'create', // Limit validation to 'create' or 'update' operations\n";
									}
									$out.="\t\t\t),\n";
								}
								
								$out.="\t\t),\n";
							}
						}
						
					}
				}
			$out.="\t);\n";
			$out.="\n\t//The Associations below have been created with all possible keys, those that are not needed can be removed\n";
			
			if(!empty($EvaDataModel['EvaBelongToAssociation'])){
				//pr($EvaDataModel['EvaBelongToAssociation']);
				$out.= "\tvar \$belongsTo = array(\n";
				foreach($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociations){
					//pr($EvaBelongToAssociations);
					//exit;
					//pr($EvaHasManyAssociations);
					// .Inflector::classify($EvaApplicationName).".".$EvaHasManyAssociations['EvaHasManyAssociationDetail']['className'].
					$out.="\t\t'".str_replace (" ", "",$EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])."' => array(\n";
						$out.="\t\t\t'className' => '".str_replace (" ", "", $EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])."',\n";
						$out.="\t\t\t'foreignKey' => '".str_replace (" ", "",$EvaBelongToAssociations['EvaBelongToAssociationDetail']['foreignKey'])."',\n";
						if(!empty($EvaBelongToAssociations['EvaBelongToAssociationDetail']['dependent']) && $EvaBelongToAssociations['EvaBelongToAssociationDetail']['dependent'] == true){
							$out.="\t\t\t'dependent' => true,\n";
						}
						if(empty($EvaBelongToAssociations['EvaBelongToAssociationDetail']['dependent'])){
							$out.="\t\t\t'dependent' => false,\n";
						}
						$out.="\t\t\t'conditions' => '',\n";
						$out.="\t\t\t'fields' => '',\n";
						$out.="\t\t\t'order' => '',\n";
					$out.="\t\t),\n\n";
				}
				$out.="\t);\n";
			}
			
			if(!empty($EvaDataModel['EvaHasOneAssociation'])){
				//pr($EvaDataModel['EvaHasOneAssociation']);
				$out.= "\tvar \$hasOne = array(\n";
				foreach($EvaDataModel['EvaHasOneAssociation'] as $EvaHasOneAssociations){
					//pr($EvaHasManyAssociations);
					$out.="\t\t'".$EvaHasOneAssociations['EvaHasOneAssociationDetail']['className']."' => array(\n";
						$out.="\t\t\t'className' => '".str_replace (" ", "", $EvaHasOneAssociations['EvaHasOneAssociationDetail']['className'])."',\n";
						$out.="\t\t\t'foreignKey' => '".str_replace (" ", "",$EvaHasOneAssociations['EvaHasOneAssociationDetail']['foreignKey'])."',\n";
						$out.="\t\t\t'conditions' => '',\n";
						$out.="\t\t\t'fields' => '',\n";
						$out.="\t\t\t'order' => '',\n";
						if($EvaHasOneAssociations['EvaHasOneAssociationDetail']['dependent'] == true){
							$out.="\t\t\t'dependent' => true,\n";
						}
						if(empty($EvaHasOneAssociations['EvaHasOneAssociationDetail']['dependent'])){
							$out.="\t\t\t'dependent' => false,\n";
						}
					$out.="\t\t),\n";
				}
				$out.="\t);\n";
			}
			
			if(!empty($EvaDataModel['EvaHasManyAssociation'])){
				//pr($EvaDataModel['EvaHasManyAssociation']);
				$out.= "\tvar \$hasMany = array(\n";
				foreach($EvaDataModel['EvaHasManyAssociation'] as $EvaHasManyAssociations){
					//pr($EvaHasManyAssociations);
					// .Inflector::classify($EvaApplicationName).".".$EvaHasManyAssociations['EvaHasManyAssociationDetail']['className'].
					$out.="\t\t'".str_replace (" ", "", $EvaHasManyAssociations['EvaHasManyAssociationDetail']['className'])."' => array(\n";
						$out.="\t\t\t'className' => '".str_replace (" ", "", $EvaHasManyAssociations['EvaHasManyAssociationDetail']['className'])."',\n";
						$out.="\t\t\t'foreignKey' => '".str_replace (" ", "",$EvaHasManyAssociations['EvaHasManyAssociationDetail']['foreignKey'])."',\n";
						if($EvaHasManyAssociations['EvaHasManyAssociationDetail']['dependent'] == true){
							$out.="\t\t\t'dependent' => true,\n";
						}
						if(empty($EvaHasManyAssociations['EvaHasManyAssociationDetail']['dependent'])){
							$out.="\t\t\t'dependent' => false,\n";
						}
						$out.="\t\t\t'conditions' => '',\n";
						$out.="\t\t\t'fields' => '',\n";
						$out.="\t\t\t'order' => '',\n";
						$out.="\t\t\t'limit' => '',\n";
						$out.="\t\t\t'offset' => '',\n";
						$out.="\t\t\t'exclusive' => '',\n";
						$out.="\t\t\t'finderQuery' => '',\n";
						$out.="\t\t\t'counterQuery' => ''\n";
					$out.="\t\t),\n";
				}
				$out.="\t);\n";
			}
			
			if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
				//pr($EvaDataModel['EvaHasAndBelongToManyAssociation']);
				$out.= "\tvar \$hasAndBelongsToMany = array(\n";
				foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociations){
					//pr($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']);
					
					//pr($EvaHasManyAssociations);
					$out.="\t\t'".str_replace (" ", "",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['name'])."' => array(\n";
						$out.="\t\t\t'className' => '".str_replace (" ", "", $EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])."',\n";
						$out.="\t\t\t'joinTable' => '".str_replace (" ", "",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['joinTable'])."',\n";
						$out.="\t\t\t'foreignKey' => '".str_replace (" ", "",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['foreignKey'])."',\n";
						$out.="\t\t\t'associationForeignKey' => '".str_replace (" ", "",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['associationForeignKey'])."',\n";
						$out.="\t\t\t'unique' => true,\n";
						$out.="\t\t\t'conditions' => '',\n";
						$out.="\t\t\t'fields' => '',\n";
						$out.="\t\t\t'order' => '',\n";
						$out.="\t\t\t'limit' => '',\n";
						$out.="\t\t\t'offset' => '',\n";
						$out.="\t\t\t'finderQuery' => '',\n";
						$out.="\t\t\t'deleteQuery' => '',\n";
						$out.="\t\t\t'insertQuery' => '',\n";
						
					$out.="\t\t),\n";
				}
				$out.="\t);\n";
			}
			$out.= "\n}\n";
			$out.= "?>";
			
			//pr($out);
			//exit;
			//change folder permisson
			
			$this->EvaCreateFile($EvaFileName, $out);
			return true;
		}
		else{
			return false;
		}
	}
	
	function EvaCheckModelIsHABTM($EvaModelName = null, $EvaListModel = array()){
		if($EvaModelName !=null && !empty($EvaListModel)){
			$EvaTempModelList = array();
			$EvaModelName = $EvaModelName['name'];
			$EvaTempModelName = explode('_',$EvaModelName);
			if(count($EvaTempModelName) === 2){
				pr($EvaModelName);
				pr($EvaTempModelName);
				foreach($EvaListModel as $EvaModel){
					$EvaTempModelList[] = $EvaModel['name'];
				}
				if(in_array($EvaTempModelName[0], $EvaTempModelList, true) && in_array($EvaTempModelName[1], $EvaTempModelList, true)) {
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
			
		}
		else{
			return false;
		}
	}

	function EvaBakeController($EvaApplicationName = null, $EvaUseDbConfig = null,$EvaDataModel = array(),$EvaAdminEnable = false){
		//pr($EvaDataModel);
		$compacts = array();
		if(!empty($EvaDataModel) && $EvaApplicationName !== null){
			
			$EvaFileName = APP.'controllers'.DS.$EvaDataModel['name'].'_controller.php';
			$out = "<?php\n";
			$out.= "class ". Inflector::pluralize(Inflector::classify($EvaDataModel['name']))."Controller extends AppController{\n";
			$out.="\n";
			
			//create index function
			$out.="\tvar \$name = '".Inflector::pluralize(Inflector::classify($EvaDataModel['name']))."';\n";
			//$out.="\tvar \$uses = array('".$plugin.".".Inflector::singularize(Inflector::classify($EvaDataModel['name']))."');\n";
			$out.="\n";
			//start of index function
			$out.="\tfunction index(){\n";
			$out.="\t\t\$this->".Inflector::classify($EvaDataModel['name'])."->recursive = 0;\n";
			$out.="\t\t\$this->set('".Inflector::pluralize($EvaDataModel['name'])."',\$this->paginate());\n";
			$out.="\t}\n";
			$out.="\n";
			//if admin enable
			if($EvaAdminEnable){
				$out.="\tfunction admin_index(){\n";
				$out.="\t\t\$this->".Inflector::classify($EvaDataModel['name'])."->recursive = 0;\n";
				$out.="\t\t\$this->set('".Inflector::pluralize($EvaDataModel['name'])."',\$this->paginate());\n";
				$out.="\t}\n";
				$out.="\n";
			}
			//end of index function
			
			//start of view function
			$out.="\tfunction view(\$id = null){\n";
				$out.="\t\tif(!\$id){\n";
					$out.="\t\t\t\$this->Session->setFlash(__('Invalid ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."', true));\n";
					$out.="\t\t\t\$this->redirect(array('action' => 'index'));\n";
				$out.="\t\t}\n";
				$out.="\t\t\$this->set('".Inflector::singularize($EvaDataModel['name'])."', \$this->".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."->read(null, \$id));\n";
			$out.="\t}\n";
			$out.="\n";
			
			//if admin enable
			if($EvaAdminEnable){
				$out.="\tfunction admin_view(\$id = null){\n";
					$out.="\t\tif(!\$id){\n";
						$out.="\t\t\t\$this->Session->setFlash(__('Invalid ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."', true));\n";
						$out.="\t\t\t\$this->redirect(array('action' => 'index','admin'=>true));\n";
					$out.="\t\t}\n";
					$out.="\t\t\$this->set('".Inflector::singularize($EvaDataModel['name'])."', \$this->".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."->read(null, \$id));\n";
				$out.="\t}\n";
				$out.="\n";
			}
			//end of view function
			
			//start of add function
			$out.="\tfunction add(){\n";
				$out.="\t\tif(!empty(\$this->data)){\n";
					$out.="\t\t\t\$this->".Inflector::classify($EvaDataModel['name'])."->create();\n";
					$out.="\t\t\tif(\$this->".Inflector::classify($EvaDataModel['name'])."->save(\$this->data)){\n";
						$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." has been saved', true));\n";
						$out.="\t\t\t\t\$this->redirect(array('action' => 'index'));\n";
					$out.="\t\t\t}\n";
					$out.="\t\t\telse{\n";
						$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." could not be saved. Please, try again.', true));\n";
					$out.="\t\t\t}\n";
				$out.="\t\t}\n";
				//set association list
				//check if there is belongsto associations or HABTM associations
				if(!empty($EvaDataModel['EvaBelongToAssociation'])){
					foreach ($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociations){
						//pr($EvaBelongToAssociations);
						$compacts[] = Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className']));
						$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])."->find('list');\n";
					}
				}
				if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
					foreach ($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociations){
						//pr($EvaBelongToAssociations);
						$compacts[] = Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className']));
						$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])."->find('list');\n";
					}
				}
				if(!empty($compacts)){
					foreach($compacts as $compact){
						$out.="\t\t\$this->set('".str_replace(" ","",$compact)."',\$".str_replace(" ","",$compact).");\n";
					}
					
				}
			$out.="\t}\n";
			$out.="\n";
			//if admin enable
			if($EvaAdminEnable){
				$out.="\tfunction admin_add(){\n";
					$out.="\t\tif(!empty(\$this->data)){\n";
						$out.="\t\t\t\$this->".Inflector::classify($EvaDataModel['name'])."->create();\n";
						$out.="\t\t\tif(\$this->".Inflector::classify($EvaDataModel['name'])."->save(\$this->data)){\n";
							$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." has been saved', true));\n";
							$out.="\t\t\t\t\$this->redirect(array('action' => 'index','admin'=>true));\n";
						$out.="\t\t\t}\n";
						$out.="\t\t\telse{\n";
							$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." could not be saved. Please, try again.', true));\n";
						$out.="\t\t\t}\n";
					$out.="\t\t}\n";
					//set association list
					//check if there is belongsto associations or HABTM associations
					if(!empty($EvaDataModel['EvaBelongToAssociation'])){
						foreach ($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociations){
							//pr($EvaBelongToAssociations);
							$compacts[] = Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className']));
							$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])."->find('list');\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
						foreach ($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociations){
							//pr($EvaBelongToAssociations);
							$compacts[] = Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className']));
							$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])."->find('list');\n";
						}
					}
					if(!empty($compacts)){
						foreach($compacts as $compact){
							$out.="\t\t\$this->set('".str_replace(" ","",$compact)."',\$".str_replace(" ","",$compact).");\n";
						}

					}
				$out.="\t}\n";
				$out.="\n";
			}
			//reset compacts array
			$compacts = array();
			//end of add function
			
			//start of edit function
			$out.="\tfunction edit(\$id = null){\n";
				$out.="\t\tif(!\$id && empty(\$this->data)){\n";
					$out.="\t\t\t\$this->Session->setFlash(__('Invalid eva model', true));\n";
					$out.="\t\t\t\$this->redirect(array('action' => 'index'));\n";
				$out.="\t\t}\n";
				
				$out.="\t\tif(!empty(\$this->data)){\n";
					$out.="\t\t\tif(\$this->".Inflector::classify($EvaDataModel['name'])."->save(\$this->data)){\n";
						$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." has been saved', true));\n";
						$out.="\t\t\t\t\$this->redirect(array('action' => 'index'));\n";
					$out.="\t\t\t}\n";
					$out.="\t\t\telse{\n";
						$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." could not be saved. Please, try again.', true));\n";
					$out.="\t\t\t}\n";
				$out.="\t\t}\n";
				
				$out.="\t\tif(empty(\$this->data)) {\n";
					$out.="\t\t\t\$this->data = \$this->".Inflector::classify($EvaDataModel['name'])."->read(null, \$id);\n";
				$out.="\t\t}\n";
				//set association list
				//check if there is belongsto associations or HABTM associations
				if(!empty($EvaDataModel['EvaBelongToAssociation'])){
					foreach ($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociations){
						//pr($EvaBelongToAssociations);
						$compacts[] = Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className']));
						$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])."->find('list');\n";
					}
				}
				if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
					foreach ($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociations){
						//pr($EvaBelongToAssociations);
						$compacts[] = Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className']));
						$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])."->find('list');\n";
					}
				}
				if(!empty($compacts)){
					foreach($compacts as $compact){
						$out.="\t\t\$this->set('".str_replace(" ","",$compact)."',\$".str_replace(" ","",$compact).");\n";
					}
				}
			$out.="\t}\n";
			$out.="\n";
			$compacts = array();
			//if admin enable
			if($EvaAdminEnable){
				$out.="\tfunction admin_edit(\$id = null){\n";
					$out.="\t\tif(!\$id && empty(\$this->data)){\n";
						$out.="\t\t\t\$this->Session->setFlash(__('Invalid eva model', true));\n";
						$out.="\t\t\t\$this->redirect(array('action' => 'index','admin'=>true));\n";
					$out.="\t\t}\n";

					$out.="\t\tif(!empty(\$this->data)){\n";
						$out.="\t\t\tif(\$this->".Inflector::classify($EvaDataModel['name'])."->save(\$this->data)){\n";
							$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." has been saved', true));\n";
							$out.="\t\t\t\t\$this->redirect(array('action' => 'index','admin'=>true));\n";
						$out.="\t\t\t}\n";
						$out.="\t\t\telse{\n";
							$out.="\t\t\t\t\$this->Session->setFlash(__('The ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." could not be saved. Please, try again.', true));\n";
						$out.="\t\t\t}\n";
					$out.="\t\t}\n";

					$out.="\t\tif(empty(\$this->data)) {\n";
						$out.="\t\t\t\$this->data = \$this->".Inflector::classify($EvaDataModel['name'])."->read(null, \$id);\n";
					$out.="\t\t}\n";
					//set association list
					//check if there is belongsto associations or HABTM associations
					if(!empty($EvaDataModel['EvaBelongToAssociation'])){
						foreach ($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociations){
							//pr($EvaBelongToAssociations);
							$compacts[] = Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className']));
							$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaBelongToAssociations['EvaBelongToAssociationDetail']['className'])."->find('list');\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
						foreach ($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociations){
							//pr($EvaBelongToAssociations);
							$compacts[] = Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className']));
							$out.="\t\t\$".str_replace(" ","",Inflector::pluralize(Inflector::variable($EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])))." =\$this->".Inflector::classify($EvaDataModel['name'])."->".str_replace(" ","",$EvaHasAndBelongToManyAssociations['EvaHasAndBelongToManyAssociationDetail']['className'])."->find('list');\n";
						}
					}
					if(!empty($compacts)){
						foreach($compacts as $compact){
							$out.="\t\t\$this->set('".str_replace(" ","",$compact)."',\$".str_replace(" ","",$compact).");\n";
						}
					}
				$out.="\t}\n";
				$out.="\n";
				$compacts = array();
			}
			//end of edit function
			
			//start of delete function
			$out.="\tfunction delete(\$id = null){\n";
				$out.="\t\tif(!\$id){\n";
					$out.="\t\t\t\$this->Session->setFlash(__('Invalid id for ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."', true));\n";
					$out.="\t\t\t\$this->redirect(array('action'=>'index'));\n";
				$out.="\t\t}\n";
				$out.="\t\tif(\$this->".Inflector::classify($EvaDataModel['name'])."->delete(\$id)){\n";
					$out.="\t\t\t\$this->Session->setFlash(__('".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." deleted', true));\n";
					$out.="\t\t\t\$this->redirect(array('action'=>'index'));\n";
				$out.="\t\t}\n";
				$out.="\t\t\$this->Session->setFlash(__('".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." was not deleted', true));\n";
				$out.="\t\t\$this->redirect(array('action' => 'index'));\n";
			$out.="\t}\n";
			$out.="\n";
			//end of delete function
			
			
			//if admin enable
			if($EvaAdminEnable){
				$out.="\tfunction admin_delete(\$id = null){\n";
					$out.="\t\tif(!\$id){\n";
						$out.="\t\t\t\$this->Session->setFlash(__('Invalid id for ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."', true));\n";
						$out.="\t\t\t\$this->redirect(array('action'=>'index'));\n";
					$out.="\t\t}\n";
					$out.="\t\tif(\$this->".Inflector::classify($EvaDataModel['name'])."->delete(\$id)){\n";
						$out.="\t\t\t\$this->Session->setFlash(__('".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." deleted', true));\n";
						$out.="\t\t\t\$this->redirect(array('action'=>'index','admin'=>true));\n";
					$out.="\t\t}\n";
					$out.="\t\t\$this->Session->setFlash(__('".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." was not deleted', true));\n";
					$out.="\t\t\$this->redirect(array('action' => 'index','admin'=>true));\n";
				$out.="\t}\n";
				$out.="\n";
			}
			$out.= "\n}\n";
			$out.= "?>";
			$this->EvaCreateFile($EvaFileName, $out);
			//exit;
			return true;
		}
		else{
			return false;
		}
	}

	function EvaGetAssociatedModelData($name = null){
		if($name !== null){
			$EvaData=$this->EvaDbConnection->EvaModel->find('first', array('conditions'=>array('EvaModel.name'=>$name),'contain'=>'EvaModelColumn'));
			return $EvaData;
		}
		else{
			return null;
		}
	}
	
	function EvaGetAssociatedModelDataById($id = null){
		if($id !== null){
			$EvaData=$this->EvaDbConnection->EvaModel->find('first', array('conditions'=>array('EvaModel.id'=>$id),'contain'=>'EvaModelColumn'));
			return $EvaData;
		}
		else{
			return null;
		}
	}
	
	function EvaGetDisplayFieldOnModel($EvaDataModel = array()){
		if(!empty($EvaDataModel)){
			if(!empty($EvaDataModel['EvaModel']['displayField'])){
				return $EvaDataModel['EvaModel']['displayField'];
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	function EvaCheckFieldNameOnModel($EvaDataModel = array(), $EvaModelFieldName = null){
		$EvaFoundFieldName = false;
		if(!empty($EvaDataModel) && $EvaModelFieldName !== null){
			if(!empty($EvaDataModel['EvaModelColumn'])){
				foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumn){
					if($EvaModelColumn['name'] === $EvaModelFieldName){
						$EvaFoundFieldName = true;
					}
				}	
			}	
		}
		return $EvaFoundFieldName;
	}
	
	function EvaFieldGuest($EvaTempDisplayField = null,$EvaTempCheckFieldName = null, $EvaTempCheckFieldTitle = null){
		if(!empty($EvaTempDisplayField) && !empty($EvaTempCheckFieldName) && !empty($EvaTempCheckFieldTitle)){
			return 'displayField';
		}
		
		if(!empty($EvaTempDisplayField) && empty($EvaTempCheckFieldName) && !empty($EvaTempCheckFieldTitle)){
			return 'displayField';
		}
		
		if(!empty($EvaTempDisplayField) && !empty($EvaTempCheckFieldName) && empty($EvaTempCheckFieldTitle)){
			
			return 'displayField';
		}
		
		if(!empty($EvaTempDisplayField) && empty($EvaTempCheckFieldName) && empty($EvaTempCheckFieldTitle)){
			
			return 'displayField';
		}
		if(empty($EvaTempDisplayField) && !empty($EvaTempCheckFieldName) && !empty($EvaTempCheckFieldTitle)){
			//use name field
			return 'name';
		}
		if(empty($EvaTempDisplayField) && !empty($EvaTempCheckFieldName) && empty($EvaTempCheckFieldTitle)){
			return 'name';
		}
		if(empty($EvaTempDisplayField) && empty($EvaTempCheckFieldName) && !empty($EvaTempCheckFieldTitle)){
			return 'title';
		}
		if(empty($EvaTempDisplayField) && empty($EvaTempCheckFieldName) && empty($EvaTempCheckFieldTitle)){
			return 'foreignkey';
		}
	}
	
	function EvaCheckIfForeignKeyBelongToAssociation($foreignKey = null, $EvaBelongToAssociations = array()){
		if($foreignKey !==null && !empty($EvaBelongToAssociations)){
			//pr($foreignKey);
			//pr($EvaBelongToAssociations);
			foreach($EvaBelongToAssociations as $EvaBelongToAssociation){
				if(strcmp(trim($EvaBelongToAssociation['EvaBelongToAssociationDetail']['foreignKey'],' '),$foreignKey) == 0){
					//pr('check');
					return true;
				}
			}
			return false;
		}
		else{
			return false;
		}
	}
	
	function EvaBakeViewForm($EvaFileName = null, $EvaDataModel = array(), $EvaAdminEnable = false,$FormAction=null){
		if(!empty($EvaDataModel) && $EvaFileName!==null && $FormAction!==null){
			if($EvaAdminEnable){
				//pr($EvaDataModel);
				//start create add file
				$out ="<div class=\"".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." form\">\n";
				$out.="<?php echo \$this->Form->create('".Inflector::singularize(Inflector::classify($EvaDataModel['name']))."');?>\n";
				$out.="\t<fieldset>\n";
					$out.="\t\t<legend><?php __('".$FormAction." ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."'); ?></legend>\n";
					$out.="\t\t<?php\n";
				
					foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumns){
						if($EvaModelColumns['name'] == 'id' && $EvaModelColumns['primarykey'] == true && $FormAction == 'edit'){
							$out.="\t\t\techo \$this->Form->input('".$EvaModelColumns['name']."');\n";
						}
						elseif($EvaModelColumns['name']!='id' && $EvaModelColumns['name']!='created' && $EvaModelColumns['name']!='modified'){
							$out.="\t\t\techo \$this->Form->input('".$EvaModelColumns['name']."');\n";
						}
					}
				
					if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
						//pr($EvaDataModel);
						foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
							$out.="\t\t\techo \$this->Form->input('".$EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['className']."');\n";
						}
					}
					$out.="\t\t?>\n";
				$out.="\t</fieldset>\n";
				$out.="<?php echo \$this->Form->end(__('Submit', true));?>\n";
				$out.="</div>\n";
				$out.="<div class=\"actions\">\n";
					$out.="\t<h3><?php __('Actions'); ?></h3>\t\n";
					$out.="\t<ul>\n";
						$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."', true), array('action' => 'index','admin'=>true));?></li>\n";
					$out.="\t</ul>\n";
				$out.="</div>\n";
				//end create add file
				$this->EvaCreateFile($EvaFileName, $out);
			}
			else{
				$out ="<div class=\"".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))." form\">\n";
				$out.="<?php echo \$this->Form->create('".Inflector::singularize(Inflector::classify($EvaDataModel['name']))."');?>\n";
				$out.="\t<fieldset>\n";
					$out.="\t\t<legend><?php __('".$FormAction." ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."'); ?></legend>\n";
					$out.="\t\t<?php\n";
				
					foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumns){
						if($EvaModelColumns['name'] == 'id' && $EvaModelColumns['primarykey'] == true && $FormAction == 'edit'){
							$out.="\t\t\techo \$this->Form->input('".$EvaModelColumns['name']."');\n";
						}
						elseif($EvaModelColumns['name']!='id' && $EvaModelColumns['name']!='created' && $EvaModelColumns['name']!='modified'){
							$out.="\t\t\techo \$this->Form->input('".$EvaModelColumns['name']."');\n";
						}
					}
				
					if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
						//pr($EvaDataModel);
						foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
							$out.="\t\t\techo \$this->Form->input('".$EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['className']."');\n";
						}
					}
					$out.="\t\t?>\n";
				$out.="\t</fieldset>\n";
				$out.="<?php echo \$this->Form->end(__('Submit', true));?>\n";
				$out.="</div>\n";
				$out.="<div class=\"actions\">\n";
					$out.="\t<h3><?php __('Actions'); ?></h3>\t\n";
					$out.="\t<ul>\n";
						$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize(Inflector::singularize($EvaDataModel['name']))."', true), array('action' => 'index'));?></li>\n";
					$out.="\t</ul>\n";
				$out.="</div>\n";
				//end create add file
				$this->EvaCreateFile($EvaFileName, $out);
			}
			return true;
		}
		else{
			return false;
		}
	}
	
	function EvaBakeViewIndex($EvaFileName = null, $EvaDataModel = array(), $EvaAdminEnable = false){
		if(!empty($EvaDataModel) && $EvaFileName!==null){
			//pr($EvaDataModel);
			if($EvaAdminEnable){
				$out="<div class=\"".$EvaDataModel['name'].' index'."\">\n";
				$out.="\t<h2><?php __('".$EvaDataModel['name']."');?></h2>\n";
				$out.="\t<table cellspacing=\"0\" cellpadding=\"0\">\n";
					$out.="\t\t<thead>\n";
						$out.="\t\t\t<tr>\n";
							foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumns){
								$out.="\t\t\t\t<th><?php echo \$this->Paginator->sort('".$EvaModelColumns['name']."');?></th>\n";
							}
								$out.="\t\t\t\t<th class=\"actions\"><?php __('Actions');?></th>\n";
						$out.="\t\t\t</tr>\n";
					$out.="\t\t</thead>\n";
					$out.="\t\t<tbody>\n";
						$out.="\t\t\t<?php\n";
						$out.="\t\t\t\t\$i = 0;\n";
						$out.="\t\t\t\tforeach (\$".$EvaDataModel['name']." as \$".Inflector::singularize($EvaDataModel['name'])."):\n";
							$out.="\t\t\t\t\t\$class = null;\n";
							$out.="\t\t\t\t\tif (\$i++ % 2 == 0) {\n";
								$out.="\t\t\t\t\t\t\$class = 'class=\"altrow\"';\n";
							$out.="\t\t\t\t\t}\n";

						$out.="\t\t\t?>\n";
						$out.="\t\t\t<tr<?php echo \$class;?>>\n";
							//pr($EvaDataModel['EvaModelColumn']);
							foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumns){
								if(preg_match('/_id$/',$EvaModelColumns['name'])){
									$EvaTempModelData = false;
									preg_match('/_id$/', $EvaModelColumns['name'], $length, PREG_OFFSET_CAPTURE, 3);
									$EvaTempModelName = Inflector::tableize(substr($EvaModelColumns['name'],0,$length[0][1]));
									$EvaTempModelData = $this->EvaGetAssociatedModelData($EvaTempModelName);
									//pr($EvaTempModelData);
									
									if($EvaTempModelData != false){
										$EvaTempDisplayField = $this->EvaGetDisplayFieldOnModel($EvaTempModelData);
										$EvaTempCheckFieldName = $this->EvaCheckFieldNameOnModel($EvaTempModelData,'name');
										$EvaTempCheckFieldTitle = $this->EvaCheckFieldNameOnModel($EvaTempModelData,'title');
										$EvaGuestField = $this->EvaFieldGuest($EvaTempDisplayField,$EvaTempCheckFieldName,$EvaTempCheckFieldTitle);
										
										//pr($EvaTempModelData);
										
										if($EvaGuestField === 'displayField' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['displayField']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'displayField' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['displayField']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										if($EvaGuestField === 'name' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['name'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'name' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['name'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										if($EvaGuestField === 'title' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['title'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'title' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['title'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										if($EvaGuestField === 'foreignkey' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'foreignkey' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										unset($EvaTempDisplayField, $EvaTempCheckFieldName, $EvaTempCheckFieldTitle,$EvaGuestField);
									}
									else{
										$out.="\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."']; ?></td>\n";
									}
									unset($EvaTempModelData,$EvaTempModelName);
								}
								else{
									$out.="\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."']; ?></td>\n";
								}
							}
							
							$out.="\t\t\t\t<td class=\"actions\">\n";
							if(!empty($EvaDataModel['primaryKey'])){
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('action' => 'view', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."'],'admin'=>true)); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."'],'admin'=>true)); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."']), null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."'],'admin'=>true)); ?>\n";
							}
							else{
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('action' => 'view', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id'],'admin'=>true)); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id'],'admin'=>true)); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id'],'admin'=>true), null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id'])); ?>\n";
							}
							$out.="\t\t\t\t</td>\n";
						$out.="\t\t\t</tr>\n";
						$out.="\t\t\t<?php endforeach; ?>\n";
					$out.="\t\t</tbody>\n";
				$out.="\t</table>\n";
				
				
				$out.="\t<p>\n";
				$out.="\t<?php\n";
					$out.="\t\techo \$this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));\n";
				$out.="\t?></p>\n";
				
				$out.="\t<div class=\"paging\">\n";
					$out.="\t\t<?php echo \$this->Paginator->prev('<<'.__('previous', true), array(), null, array('class'=>'disabled'));?>\n";
				  	$out.="\t\t|<?php echo \$this->Paginator->numbers();?>|\n";
					$out.="\t\t<?php echo \$this->Paginator->next(__('next', true). ' >>', array(), null, array('class' => 'disabled'));?>\n";
				$out.="\t</div>\n";
				$out.="</div>\n";
				$out.="<div class=\"actions\">\n";
					$out.="\t<h3><?php __('Actions'); ?></h3>\n";
					$out.="\t<ul>\n";
						$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'add')); ?></li>\n";
						if(!empty($EvaDataModel['EvaBelongToAssociation'])){
							foreach($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['className'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'add','admin'=>true)); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['className'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'index','admin'=>true)); ?></li>\n";
							}
						}
						if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
							foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'add','admin'=>true)); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'index','admin'=>true)); ?></li>\n";
							}
						}
						if(!empty($EvaDataModel['EvaHasManyAssociation'])){
							foreach($EvaDataModel['EvaHasManyAssociation'] as $EvaHasManyAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['className'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'add','admin'=>true)); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['className'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'index','admin'=>true)); ?></li>\n";
							}
						}
						if(!empty($EvaDataModel['EvaHasOneAssociation'])){
							foreach($EvaDataModel['EvaHasOneAssociation'] as $EvaHasOneAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'add','admin'=>true)); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'index','admin'=>true)); ?></li>\n";
							}
						}
					$out.="\t</ul>\n";
				$out.="</div>\n";
				$this->EvaCreateFile($EvaFileName, $out);
			}
			else{
				$out="<div class=\"".$EvaDataModel['name'].' index'."\">\n";
				$out.="\t<h2><?php __('".$EvaDataModel['name']."');?></h2>\n";
				$out.="\t<table cellspacing=\"0\" cellpadding=\"0\">\n";
					$out.="\t\t<thead>\n";
						$out.="\t\t\t<tr>\n";
							foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumns){
								$out.="\t\t\t\t<th><?php echo \$this->Paginator->sort('".$EvaModelColumns['name']."');?></th>\n";
							}
								$out.="\t\t\t\t<th class=\"actions\"><?php __('Actions');?></th>\n";
						$out.="\t\t\t</tr>\n";
					$out.="\t\t</thead>\n";
					$out.="\t\t<tbody>\n";
						$out.="\t\t\t<?php\n";
						$out.="\t\t\t\t\$i = 0;\n";
						$out.="\t\t\t\tforeach (\$".$EvaDataModel['name']." as \$".Inflector::singularize($EvaDataModel['name'])."):\n";
							$out.="\t\t\t\t\t\$class = null;\n";
							$out.="\t\t\t\t\tif (\$i++ % 2 == 0) {\n";
								$out.="\t\t\t\t\t\t\$class = 'class=\"altrow\"';\n";
							$out.="\t\t\t\t\t}\n";

						$out.="\t\t\t?>\n";
						$out.="\t\t\t<tr<?php echo \$class;?>>\n";
							//pr($EvaDataModel['EvaModelColumn']);
							foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumns){
								if(preg_match('/_id$/',$EvaModelColumns['name'])){
									$EvaTempModelData = false;
									preg_match('/_id$/', $EvaModelColumns['name'], $length, PREG_OFFSET_CAPTURE, 3);
									$EvaTempModelName = Inflector::tableize(substr($EvaModelColumns['name'],0,$length[0][1]));
									$EvaTempModelData = $this->EvaGetAssociatedModelData($EvaTempModelName);
									//pr($EvaTempModelData);
									
									if($EvaTempModelData != false){
										$EvaTempDisplayField = $this->EvaGetDisplayFieldOnModel($EvaTempModelData);
										$EvaTempCheckFieldName = $this->EvaCheckFieldNameOnModel($EvaTempModelData,'name');
										$EvaTempCheckFieldTitle = $this->EvaCheckFieldNameOnModel($EvaTempModelData,'title');
										$EvaGuestField = $this->EvaFieldGuest($EvaTempDisplayField,$EvaTempCheckFieldName,$EvaTempCheckFieldTitle);
										
										//pr($EvaTempModelData);
										
										if($EvaGuestField === 'displayField' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['displayField']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'displayField' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['displayField']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										if($EvaGuestField === 'name' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['name'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'name' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['name'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										if($EvaGuestField === 'title' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['title'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'title' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['title'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										if($EvaGuestField === 'foreignkey' && !empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['".$EvaTempModelData['EvaModel']['primaryKey']."']));?></td>\n";
										}
										if($EvaGuestField === 'foreignkey' && empty($EvaTempModelData['EvaModel']['primaryKey'])){
											$out.="\t\t\t\t<td><?php echo \$this->Html->link(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."'], array('controller' => '".$EvaTempModelData['EvaModel']['name']."','action' => 'view',\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModelData['EvaModel']['name']))."']['id']));?></td>\n";
										}
										unset($EvaTempDisplayField, $EvaTempCheckFieldName, $EvaTempCheckFieldTitle,$EvaGuestField);
									}
									else{
										$out.="\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."']; ?></td>\n";
									}
									unset($EvaTempModelData,$EvaTempModelName);
								}
								else{
									$out.="\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaModelColumns['name']."']; ?></td>\n";
								}
							}
							
							$out.="\t\t\t\t<td class=\"actions\">\n";
							if(!empty($EvaDataModel['primaryKey'])){
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('action' => 'view', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."'])); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."'])); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."']), null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['".$EvaDataModel['primaryKey']."'])); ?>\n";
							}
							else{
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('action' => 'view', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id'])); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id'])); ?>\n";
								$out.="\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaDataModel['name']))."']['id'])); ?>\n";
							}
							$out.="\t\t\t\t</td>\n";
						$out.="\t\t\t</tr>\n";
						$out.="\t\t\t<?php endforeach; ?>\n";
					$out.="\t\t</tbody>\n";
				$out.="\t</table>\n";
				
				
				$out.="\t<p>\n";
				$out.="\t<?php\n";
					$out.="\t\techo \$this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)));\n";
				$out.="\t?></p>\n";
				
				$out.="\t<div class=\"paging\">\n";
					$out.="\t\t<?php echo \$this->Paginator->prev('<<'.__('previous', true), array(), null, array('class'=>'disabled'));?>\n";
				  	$out.="\t\t|<?php echo \$this->Paginator->numbers();?>|\n";
					$out.="\t\t<?php echo \$this->Paginator->next(__('next', true). ' >>', array(), null, array('class' => 'disabled'));?>\n";
				$out.="\t</div>\n";
				$out.="</div>\n";
				$out.="<div class=\"actions\">\n";
					$out.="\t<h3><?php __('Actions'); ?></h3>\n";
					$out.="\t<ul>\n";
						$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'add')); ?></li>\n";
						if(!empty($EvaDataModel['EvaBelongToAssociation'])){
							foreach($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['className'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'add')); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['className'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'index')); ?></li>\n";
							}
						}
						if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
							foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'add')); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'index')); ?></li>\n";
							}
						}
						if(!empty($EvaDataModel['EvaHasManyAssociation'])){
							foreach($EvaDataModel['EvaHasManyAssociation'] as $EvaHasManyAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['className'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'add')); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['className'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'index')); ?></li>\n";
							}
						}
						if(!empty($EvaDataModel['EvaHasOneAssociation'])){
							foreach($EvaDataModel['EvaHasOneAssociation'] as $EvaHasOneAssociation){
								$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'add')); ?></li>\n";
								$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'index')); ?></li>\n";
							}
						}
					$out.="\t</ul>\n";
				$out.="</div>\n";
				$this->EvaCreateFile($EvaFileName, $out);
			}
			return true;
		}
		else{
			return false;
		}
	}
	
	function EvaBakeViewView($EvaFileName = null, $EvaDataModel = array(), $EvaAdminEnable = false){
		
		if(!empty($EvaDataModel) && $EvaFileName!==null){
			if($EvaAdminEnable){
				//pr($EvaDataModel);
				$out="<div class=\"".Inflector::humanize($EvaDataModel['name'])." view\">\n";
				$out.="<h2><?php __('".$EvaDataModel['name']."');?></h2>\n";
					$out.="\t<dl><?php \$i = 0; \$class = ' class=\"altrow\"';?>\n";
					if(!empty($EvaDataModel['EvaModelColumn'])){
						foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumn){
							//check if $EvaModelColumn['name'] is in belongsTo Association
							if(preg_match('/_id$/',$EvaModelColumn['name'],$match,PREG_OFFSET_CAPTURE)){
								//pr(preg_match('/_id$/',$EvaModelColumn['name']));
								if($this->EvaCheckIfForeignKeyBelongToAssociation($EvaModelColumn['name'],$EvaDataModel['EvaBelongToAssociation'])){
									$out.="\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('".$EvaModelColumn['name']."'); ?></dt>\n";
									$out.="\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n";
										//pr($EvaModelColumn['name']);
										/*$out.="\t\t\t\t<?php echo \$this->Html->link(__(\$comment['Post']['name'],true),array('controller'=>'posts','action'=>'view',\$comment['Post']['id']))?>\n";*/
										//getmodeldata
										$EvaTempModel = $this->EvaGetAssociatedModelData(Inflector::pluralize(substr($EvaModelColumn['name'],0,$match[0][1])));
										$EvaTempDisplayField = $this->EvaGetDisplayFieldOnModel($EvaTempModel);
										$EvaTempCheckFieldName = $this->EvaCheckFieldNameOnModel($EvaTempModel,'name');
										$EvaTempCheckFieldTitle = $this->EvaCheckFieldNameOnModel($EvaTempModel,'title');
										$EvaGuestField = $this->EvaFieldGuest($EvaTempDisplayField,$EvaTempCheckFieldName,$EvaTempCheckFieldTitle);
										/*
										if($EvaDataModel['name'] == 'userprofiles'){
											pr($EvaGuestField);
											//pr($EvaDataModel);
											//pr($EvaTempModel);
											exit;
										}
										*/
										if(!empty($EvaTempModel['EvaModel']['primaryKey'])){
											$out.="\t\t\t<?php echo \$this->Html->link(__(\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaGuestField."'],true),array('controller'=>'".$EvaTempModel['EvaModel']['name']."','action'=>'view',\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true))?>\n";
										}
										elseif(empty($EvaTempModel['EvaModel']['primaryKey']) && $EvaGuestField == 'foreignkey'){
											$out.="\t\t\t<?php echo \$this->Html->link(__(\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['id'],true),array('controller'=>'".$EvaTempModel['EvaModel']['name']."','action'=>'view',\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['id'],'admin'=>true))?>\n";
										}
										else{
											$out.="\t\t\t<?php echo \$this->Html->link(__(\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaGuestField."'],true),array('controller'=>'".$EvaTempModel['EvaModel']['name']."','action'=>'view',\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['id'],'admin'=>true))?>\n";
										}
									
										$out.="\t\t\t&nbsp;\n";
									$out.="\t\t</dd>\n";
								}
							}
							else{
								$out.="\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('".$EvaModelColumn['name']."'); ?></dt>\n";
								$out.="\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n";
									$out.="\t\t\t\t<?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaModelColumn['name']."']; ?>\n";
									$out.="\t\t\t&nbsp;\n";
								$out.="\t\t</dd>\n";
							}
						}
					}
					$out.="\t</dl>\n";
				$out.="</div>\n";
			
				$out.="<div class=\"actions\">\n";
				$out.="<h3><?php __('Actions'); ?></h3>\n";
					$out.="\t<ul>\n";
					if(!empty($EvaDataModel['primaryKey'])){
						$out.="\t\t<li><?php echo \$this->Html->link(__('Edit ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaDataModel['primaryKey']."'],'admin'=>true)); ?> </li>\n";
						$out.="\t\t<li><?php echo \$this->Html->link(__('Delete ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaDataModel['primaryKey']."'],'admin'=>true),null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaDataModel['primaryKey']."'])); ?> </li>\n";
					}
					else{	
						$out.="\t\t<li><?php echo \$this->Html->link(__('Edit ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['id'],'admin'=>true)); ?> </li>\n";
						$out.="\t\t\t<li><?php echo \$this->Html->link(__('Delete ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['id'],'admin'=>true),null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['id'])); ?> </li>\n";
					}
					$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'index','admin'=>true)); ?> </li>\n";
					$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'add','admin'=>true)); ?> </li>\n";
					if(!empty($EvaDataModel['EvaBelongToAssociation'])){
						foreach($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['name'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'index','admin'=>true)); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['name'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'add','admin'=>true)); ?> </li>\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
						foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'index','admin'=>true)); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'add','admin'=>true)); ?> </li>\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasManyAssociation'])){
						foreach($EvaDataModel['EvaHasManyAssociation'] as $EvaHasManyAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['name'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'index','admin'=>true)); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['name'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'add','admin'=>true)); ?> </li>\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasOneAssociation'])){
						foreach($EvaDataModel['EvaHasOneAssociation'] as $EvaHasOneAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasOneAssociation['EvaHasOneAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'index','admin'=>true)); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasOneAssociation['EvaHasOneAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'add','admin'=>true)); ?> </li>\n";
						}
					}
					$out.="\t</ul>\n";
				$out.="</div>\n";
			
				//start of associations table
				if(!empty($EvaDataModel['EvaHasOneAssociation']) || !empty($EvaDataModel['EvaHasAndBelongToManyAssociation']) || !empty($EvaDataModel['EvaHasManyAssociation'])){
					$out.="<div class=\"related\">\n";
					
						if(!empty($EvaDataModel['EvaHasOneAssociation'])){
							foreach($EvaDataModel['EvaHasOneAssociation'] as $EvaHasOneAssociation){
								//get associated data
								$EvaTempModel = $this->EvaGetAssociatedModelDataById($EvaHasOneAssociation['associated_model_id']);
							
								if(!empty($EvaTempModel)){
									//pr($EvaTempModel);
									//exit;
									$out.="\t<?php if (!empty(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."'])):?>\n";
									$out.="\t<h3><?php __('Related ".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."');?></h3>\n";
										$out.="\t\t<dl><?php \$i = 0; \$class = ' class=\"altrow\"';?>\n";
										if(!empty($EvaTempModel['EvaModelColumn'])){
											//pr($EvaTempModel['EvaModelColumn']);
											foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
											
												$out.="\t\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('".$EvaModelColumn['name']."'); ?></dt>\n";
												$out.="\t\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n";
													$out.="\t\t\t\t<?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaModelColumn['name']."']; ?>\n";
													$out.="\t\t\t\t&nbsp;\n";
												$out.="\t\t\t</dd>\n";
											}
											//exit;
										}
										$out.="\t\t</dl>\n";
										$out.="\t\t<br />\n";
										$out.="\t\t<div class=\"actions\">\n";
											$out.="\t\t\t<ul>\n";
												$out.="\t\t\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaTempModel['EvaModel']['name'])."', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'add','admin'=>true));?> </li>\n";
											$out.="\t\t\t</ul>\n";
										$out.="\t\t</div>\n";
									$out.="\t<?php endif; ?>\n";
								
								}
							}
						}
				
						if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
							foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
								//get associated data
								$EvaTempModel = $this->EvaGetAssociatedModelDataById($EvaHasAndBelongToManyAssociation['associated_model_id']);
								if(!empty($EvaTempModel)){
									//pr($EvaTempModel);
									$out.="\t<?php if (!empty(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."'])):?>\n";
									$out.="\t<h3><?php __('Related ".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."');?></h3>\n";
								
									if(!empty($EvaTempModel['EvaModelColumn'])){
										$out.="\t\t<table cellspacing=\"0\" cellpadding=\"0\" >\n";
											$out.="\t\t\t<thead>\n";
												$out.="\t\t\t\t<tr>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<th><?php __('".$EvaModelColumn['name']."'); ?></th>\n";
												}
													$out.="\t\t\t\t\t<th class=\"actions\"><?php __('Actions');?></th>\n";
												$out.="\t\t\t\t</tr>\n";
											$out.="\t\t\t</thead>\n";
											$out.="\t\t\t<tbody>\n";
												$out.="\t\t\t\t<?php\n";
													$out.="\t\t\t\t\t\$i = 0;\n";
													$out.="\t\t\t\t\tforeach (\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."'] as \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."):\n";
														$out.="\t\t\t\t\t\t\$class = null;\n";
														$out.="\t\t\t\t\t\tif (\$i++ % 2 == 0) {\n";
															$out.="\t\t\t\t\t\t\t\$class = ' class=\"altrow\"';\n";
														$out.="\t\t\t\t\t\t}\n";
												$out.="\t\t\t\t?>\n";
												$out.="\t\t\t\t<tr<?php echo \$class;?>>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaModelColumn['name']."'];?></td>\n";
												}
													$out.="\t\t\t\t\t<td class=\"actions\">\n";
													if(!empty($EvaTempModel['EvaModel']['primaryKey'])){
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'])); ?>\n";
													}
													else{
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'],'admin'=>true),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
													}
												
													$out.="\t\t\t\t\t</td>\n";
												$out.="\t\t\t\t</tr>\n";
													$out.="\t\t\t\t<?php endforeach; ?>\n";
											$out.="\t\t\t</tbody>\n";
										$out.="\t\t</table>\n";
										$out.="\t\t<div class=\"actions\">\n";
											$out.="\t\t\t<ul>\n";
												$out.="\t\t\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaTempModel['EvaModel']['name'])."', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'add'));?> </li>\n";
											$out.="\t\t\t</ul>\n";
										$out.="\t\t</div>\n";
									}
								
									$out.="\t<?php endif; ?>\n";
								}
							}
						}
				
						if(!empty($EvaDataModel['EvaHasManyAssociation'])){
							foreach($EvaDataModel['EvaHasManyAssociation'] as $EvaHasManyAssociation){
								//get associated data
								$EvaTempModel = $this->EvaGetAssociatedModelDataById($EvaHasManyAssociation['associated_model_id']);
								if(!empty($EvaTempModel)){
									//pr($EvaTempModel);
									$out.="\t<?php if (!empty(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."'])):?>\n";
									$out.="\t<h3><?php __('Related ".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."');?></h3>\n";
								
									if(!empty($EvaTempModel['EvaModelColumn'])){
										$out.="\t\t<table cellspacing=\"0\" cellpadding=\"0\">\n";
											$out.="\t\t\t<thead>\n";
												$out.="\t\t\t\t<tr>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<th><?php __('".$EvaModelColumn['name']."'); ?></th>\n";
												}
													$out.="\t\t\t\t\t<th class=\"actions\"><?php __('Actions');?></th>\n";
												$out.="\t\t\t\t</tr>\n";
											$out.="\t\t\t</thead>\n";
											$out.="\t\t\t<tbody>\n";
												$out.="\t\t\t\t<?php\n";
													$out.="\t\t\t\t\t\$i = 0;\n";
													$out.="\t\t\t\t\tforeach (\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."'] as \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."):\n";
														$out.="\t\t\t\t\t\t\$class = null;\n";
														$out.="\t\t\t\t\t\tif (\$i++ % 2 == 0) {\n";
															$out.="\t\t\t\t\t\t\t\$class = ' class=\"altrow\"';\n";
														$out.="\t\t\t\t\t\t}\n";
												$out.="\t\t\t\t?>\n";
												$out.="\t\t\t\t<tr<?php echo \$class;?>>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaModelColumn['name']."'];?></td>\n";
												}
													$out.="\t\t\t\t\t<td class=\"actions\">\n";
													if(!empty($EvaTempModel['EvaModel']['primaryKey'])){
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'])); ?>\n";
													}
													else{
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'],'admin'=>true),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
													}
												
													$out.="\t\t\t\t\t</td>\n";
												$out.="\t\t\t\t</tr>\n";
													$out.="\t\t\t\t<?php endforeach; ?>\n";
											$out.="\t\t\t</tbody>\n";
										$out.="\t\t</table>\n";
										$out.="\t\t<div class=\"actions\">\n";
											$out.="\t\t\t<ul>\n";
												$out.="\t\t\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaTempModel['EvaModel']['name'])."', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'add','admin'=>true));?> </li>\n";
											$out.="\t\t\t</ul>\n";
										$out.="\t\t</div>\n";
									}
								
									$out.="\t<?php endif; ?>\n";
								}
							}
						}
					$out.="</div>\n";
				}
				//end of associations table
				$this->EvaCreateFile($EvaFileName, $out);
			}
			else{
				//pr($EvaDataModel);
				$out="<div class=\"".Inflector::humanize($EvaDataModel['name'])." view\">\n";
				$out.="<h2><?php __('".$EvaDataModel['name']."');?></h2>\n";
					$out.="\t<dl><?php \$i = 0; \$class = ' class=\"altrow\"';?>\n";
					if(!empty($EvaDataModel['EvaModelColumn'])){
						foreach($EvaDataModel['EvaModelColumn'] as $EvaModelColumn){
							//check if $EvaModelColumn['name'] is in belongsTo Association
							if(preg_match('/_id$/',$EvaModelColumn['name'],$match,PREG_OFFSET_CAPTURE)){
								//pr(preg_match('/_id$/',$EvaModelColumn['name']));
								if($this->EvaCheckIfForeignKeyBelongToAssociation($EvaModelColumn['name'],$EvaDataModel['EvaBelongToAssociation'])){
									$out.="\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('".$EvaModelColumn['name']."'); ?></dt>\n";
									$out.="\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n";
										//pr($EvaModelColumn['name']);
										/*$out.="\t\t\t\t<?php echo \$this->Html->link(__(\$comment['Post']['name'],true),array('controller'=>'posts','action'=>'view',\$comment['Post']['id']))?>\n";*/
										//getmodeldata
										$EvaTempModel = $this->EvaGetAssociatedModelData(Inflector::pluralize(substr($EvaModelColumn['name'],0,$match[0][1])));
										$EvaTempDisplayField = $this->EvaGetDisplayFieldOnModel($EvaTempModel);
										$EvaTempCheckFieldName = $this->EvaCheckFieldNameOnModel($EvaTempModel,'name');
										$EvaTempCheckFieldTitle = $this->EvaCheckFieldNameOnModel($EvaTempModel,'title');
										$EvaGuestField = $this->EvaFieldGuest($EvaTempDisplayField,$EvaTempCheckFieldName,$EvaTempCheckFieldTitle);
										/*
										if($EvaDataModel['name'] == 'userprofiles'){
											pr($EvaGuestField);
											//pr($EvaDataModel);
											//pr($EvaTempModel);
											exit;
										}
										*/
										if(!empty($EvaTempModel['EvaModel']['primaryKey'])){
											$out.="\t\t\t<?php echo \$this->Html->link(__(\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaGuestField."'],true),array('controller'=>'".$EvaTempModel['EvaModel']['name']."','action'=>'view',\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaTempModel['EvaModel']['primaryKey']."']))?>\n";
										}
										elseif(empty($EvaTempModel['EvaModel']['primaryKey']) && $EvaGuestField == 'foreignkey'){
											$out.="\t\t\t<?php echo \$this->Html->link(__(\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['id'],true),array('controller'=>'".$EvaTempModel['EvaModel']['name']."','action'=>'view',\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['id']))?>\n";
										}
										else{
											$out.="\t\t\t<?php echo \$this->Html->link(__(\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaGuestField."'],true),array('controller'=>'".$EvaTempModel['EvaModel']['name']."','action'=>'view',\$".$EvaDataModel['alias']."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['id']))?>\n";
										}
									
										$out.="\t\t\t&nbsp;\n";
									$out.="\t\t</dd>\n";
								}
							}
							else{
								$out.="\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('".$EvaModelColumn['name']."'); ?></dt>\n";
								$out.="\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n";
									$out.="\t\t\t\t<?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaModelColumn['name']."']; ?>\n";
									$out.="\t\t\t&nbsp;\n";
								$out.="\t\t</dd>\n";
							}
						}
					}
					$out.="\t</dl>\n";
				$out.="</div>\n";
			
				$out.="<div class=\"actions\">\n";
				$out.="<h3><?php __('Actions'); ?></h3>\n";
					$out.="\t<ul>\n";
					if(!empty($EvaDataModel['primaryKey'])){
						$out.="\t\t<li><?php echo \$this->Html->link(__('Edit ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaDataModel['primaryKey']."'])); ?> </li>\n";
						$out.="\t\t<li><?php echo \$this->Html->link(__('Delete ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaDataModel['primaryKey']."']),null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['".$EvaDataModel['primaryKey']."'])); ?> </li>\n";
					}
					else{	
						$out.="\t\t<li><?php echo \$this->Html->link(__('Edit ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'edit', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['id'])); ?> </li>\n";
						$out.="\t\t\t<li><?php echo \$this->Html->link(__('Delete ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'delete', \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['id']),null, sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaDataModel['name'])."']['id'])); ?> </li>\n";
					}
					$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'index')); ?> </li>\n";
					$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaDataModel['name'])."', true), array('action' => 'add')); ?> </li>\n";
					if(!empty($EvaDataModel['EvaBelongToAssociation'])){
						foreach($EvaDataModel['EvaBelongToAssociation'] as $EvaBelongToAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['name'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'index')); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaBelongToAssociation['EvaBelongToAssociationDetail']['name'])."', true), array('controller'=>'".$EvaBelongToAssociation['EvaBelongToAssociationDetail']['name']."','action' => 'add')); ?> </li>\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
						foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'index')); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::tableize($EvaHasAndBelongToManyAssociation['EvaHasAndBelongToManyAssociationDetail']['name'])."','action' => 'add')); ?> </li>\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasManyAssociation'])){
						foreach($EvaDataModel['EvaHasManyAssociation'] as $EvaHasManyAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['name'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'index')); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasManyAssociation['EvaHasManyAssociationDetail']['name'])."', true), array('controller'=>'".$EvaHasManyAssociation['EvaHasManyAssociationDetail']['name']."','action' => 'add')); ?> </li>\n";
						}
					}
					if(!empty($EvaDataModel['EvaHasOneAssociation'])){
						foreach($EvaDataModel['EvaHasOneAssociation'] as $EvaHasOneAssociation){
							$out.="\t\t<li><?php echo \$this->Html->link(__('List ".Inflector::humanize($EvaHasOneAssociation['EvaHasOneAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'index')); ?> </li>\n";
							$out.="\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaHasOneAssociation['EvaHasOneAssociationDetail']['name'])."', true), array('controller'=>'".Inflector::pluralize(Inflector::underscore($EvaHasOneAssociation['EvaHasOneAssociationDetail']['className']))."','action' => 'add')); ?> </li>\n";
						}
					}
					$out.="\t</ul>\n";
				$out.="</div>\n";
			
				//start of associations table
				if(!empty($EvaDataModel['EvaHasOneAssociation']) || !empty($EvaDataModel['EvaHasAndBelongToManyAssociation']) || !empty($EvaDataModel['EvaHasManyAssociation'])){
					$out.="<div class=\"related\">\n";
					
						if(!empty($EvaDataModel['EvaHasOneAssociation'])){
							foreach($EvaDataModel['EvaHasOneAssociation'] as $EvaHasOneAssociation){
								//get associated data
								$EvaTempModel = $this->EvaGetAssociatedModelDataById($EvaHasOneAssociation['associated_model_id']);
							
								if(!empty($EvaTempModel)){
									//pr($EvaTempModel);
									//exit;
									$out.="\t<?php if (!empty(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."'])):?>\n";
									$out.="\t<h3><?php __('Related ".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."');?></h3>\n";
										$out.="\t\t<dl><?php \$i = 0; \$class = ' class=\"altrow\"';?>\n";
										if(!empty($EvaTempModel['EvaModelColumn'])){
											//pr($EvaTempModel['EvaModelColumn']);
											foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
											
												$out.="\t\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('".$EvaModelColumn['name']."'); ?></dt>\n";
												$out.="\t\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n";
													$out.="\t\t\t\t<?php echo \$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."']['".$EvaModelColumn['name']."']; ?>\n";
													$out.="\t\t\t\t&nbsp;\n";
												$out.="\t\t\t</dd>\n";
											}
											//exit;
										}
										$out.="\t\t</dl>\n";
										$out.="\t\t<br />\n";
										$out.="\t\t<div class=\"actions\">\n";
											$out.="\t\t\t<ul>\n";
												$out.="\t\t\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaTempModel['EvaModel']['name'])."', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'add'));?> </li>\n";
											$out.="\t\t\t</ul>\n";
										$out.="\t\t</div>\n";
									$out.="\t<?php endif; ?>\n";
								
								}
							}
						}
				
						if(!empty($EvaDataModel['EvaHasAndBelongToManyAssociation'])){
							foreach($EvaDataModel['EvaHasAndBelongToManyAssociation'] as $EvaHasAndBelongToManyAssociation){
								//get associated data
								$EvaTempModel = $this->EvaGetAssociatedModelDataById($EvaHasAndBelongToManyAssociation['associated_model_id']);
								if(!empty($EvaTempModel)){
									//pr($EvaTempModel);
									$out.="\t<?php if (!empty(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."'])):?>\n";
									$out.="\t<h3><?php __('Related ".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."');?></h3>\n";
								
									if(!empty($EvaTempModel['EvaModelColumn'])){
										$out.="\t\t<table cellspacing=\"0\" cellpadding=\"0\" >\n";
											$out.="\t\t\t<thead>\n";
												$out.="\t\t\t\t<tr>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<th><?php __('".$EvaModelColumn['name']."'); ?></th>\n";
												}
													$out.="\t\t\t\t\t<th class=\"actions\"><?php __('Actions');?></th>\n";
												$out.="\t\t\t\t</tr>\n";
											$out.="\t\t\t</thead>\n";
											$out.="\t\t\t<tbody>\n";
												$out.="\t\t\t\t<?php\n";
													$out.="\t\t\t\t\t\$i = 0;\n";
													$out.="\t\t\t\t\tforeach (\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."'] as \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."):\n";
														$out.="\t\t\t\t\t\t\$class = null;\n";
														$out.="\t\t\t\t\t\tif (\$i++ % 2 == 0) {\n";
															$out.="\t\t\t\t\t\t\t\$class = ' class=\"altrow\"';\n";
														$out.="\t\t\t\t\t\t}\n";
												$out.="\t\t\t\t?>\n";
												$out.="\t\t\t\t<tr<?php echo \$class;?>>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaModelColumn['name']."'];?></td>\n";
												}
													$out.="\t\t\t\t\t<td class=\"actions\">\n";
													if(!empty($EvaTempModel['EvaModel']['primaryKey'])){
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'])); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'],'admin'=>true)); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."']),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'])); ?>\n";
													}
													else{
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id']),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
													}
												
													$out.="\t\t\t\t\t</td>\n";
												$out.="\t\t\t\t</tr>\n";
													$out.="\t\t\t\t<?php endforeach; ?>\n";
											$out.="\t\t\t</tbody>\n";
										$out.="\t\t</table>\n";
										$out.="\t\t<div class=\"actions\">\n";
											$out.="\t\t\t<ul>\n";
												$out.="\t\t\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaTempModel['EvaModel']['name'])."', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'add'));?> </li>\n";
											$out.="\t\t\t</ul>\n";
										$out.="\t\t</div>\n";
									}
								
									$out.="\t<?php endif; ?>\n";
								}
							}
						}
				
						if(!empty($EvaDataModel['EvaHasManyAssociation'])){
							foreach($EvaDataModel['EvaHasManyAssociation'] as $EvaHasManyAssociation){
								//get associated data
								$EvaTempModel = $this->EvaGetAssociatedModelDataById($EvaHasManyAssociation['associated_model_id']);
								if(!empty($EvaTempModel)){
									//pr($EvaTempModel);
									$out.="\t<?php if (!empty(\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."'])):?>\n";
									$out.="\t<h3><?php __('Related ".Inflector::classify(Inflector::singularize($EvaTempModel['EvaModel']['name']))."');?></h3>\n";
								
									if(!empty($EvaTempModel['EvaModelColumn'])){
										$out.="\t\t<table cellspacing=\"0\" cellpadding=\"0\">\n";
											$out.="\t\t\t<thead>\n";
												$out.="\t\t\t\t<tr>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<th><?php __('".$EvaModelColumn['name']."'); ?></th>\n";
												}
													$out.="\t\t\t\t\t<th class=\"actions\"><?php __('Actions');?></th>\n";
												$out.="\t\t\t\t</tr>\n";
											$out.="\t\t\t</thead>\n";
											$out.="\t\t\t<tbody>\n";
												$out.="\t\t\t\t<?php\n";
													$out.="\t\t\t\t\t\$i = 0;\n";
													$out.="\t\t\t\t\tforeach (\$".Inflector::singularize($EvaDataModel['name'])."['".Inflector::classify($EvaTempModel['EvaModel']['name'])."'] as \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."):\n";
														$out.="\t\t\t\t\t\t\$class = null;\n";
														$out.="\t\t\t\t\t\tif (\$i++ % 2 == 0) {\n";
															$out.="\t\t\t\t\t\t\t\$class = ' class=\"altrow\"';\n";
														$out.="\t\t\t\t\t\t}\n";
												$out.="\t\t\t\t?>\n";
												$out.="\t\t\t\t<tr<?php echo \$class;?>>\n";
												foreach($EvaTempModel['EvaModelColumn'] as $EvaModelColumn){
													$out.="\t\t\t\t\t<td><?php echo \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaModelColumn['name']."'];?></td>\n";
												}
													$out.="\t\t\t\t\t<td class=\"actions\">\n";
													if(!empty($EvaTempModel['EvaModel']['primaryKey'])){
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'])); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'])); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."']),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['".$EvaTempModel['EvaModel']['primaryKey']."'])); ?>\n";
													}
													else{
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('View', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'view', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'edit', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
														$out.="\t\t\t\t\t\t<?php echo \$this->Html->link(__('Delete', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'delete', \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id']),null,sprintf(__('Are you sure you want to delete # %s?', true), \$".Inflector::singularize($EvaTempModel['EvaModel']['name'])."['id'])); ?>\n";
													}
												
													$out.="\t\t\t\t\t</td>\n";
												$out.="\t\t\t\t</tr>\n";
													$out.="\t\t\t\t<?php endforeach; ?>\n";
											$out.="\t\t\t</tbody>\n";
										$out.="\t\t</table>\n";
										$out.="\t\t<div class=\"actions\">\n";
											$out.="\t\t\t<ul>\n";
												$out.="\t\t\t\t<li><?php echo \$this->Html->link(__('New ".Inflector::humanize($EvaTempModel['EvaModel']['name'])."', true), array('controller' => '".$EvaTempModel['EvaModel']['name']."', 'action' => 'add'));?> </li>\n";
											$out.="\t\t\t</ul>\n";
										$out.="\t\t</div>\n";
									}
								
									$out.="\t<?php endif; ?>\n";
								}
							}
						}
					$out.="</div>\n";
				}
				//end of associations table
				$this->EvaCreateFile($EvaFileName, $out);
			}
			return true;
		}
		else{
			return false;
		}
	}
	
	function EvaBakeView($EvaApplicationName = null, $EvaUseDbConfig = null,$EvaDataModel = array(),$EvaAdminEnable = false){
		if(!empty($EvaDataModel) && $EvaApplicationName !== null){
			//create folder for view
			//$Folder = new Folder(APP.'views');
			//$Folder->create(APP.'views'.$EvaDataModel['name'],0777);
			//sorting base on created
			$EvaDataModel['EvaModelColumn'] = Set::sort($EvaDataModel['EvaModelColumn'],'{n}.created','asc');
			//start create add file
			$this->EvaBakeViewForm(APP.'views'.DS.$EvaDataModel['name'].DS.'add.ctp', $EvaDataModel,false,'add');
			//start create edit file
			$this->EvaBakeViewForm(APP.'views'.DS.$EvaDataModel['name'].DS.'edit.ctp', $EvaDataModel,false,'edit');
			//start create index file
			$this->EvaBakeViewIndex(APP.'views'.DS.$EvaDataModel['name'].DS.'index.ctp', $EvaDataModel,false);
			//start create view file
			$this->EvaBakeViewView(APP.'views'.DS.$EvaDataModel['name'].DS.'view.ctp', $EvaDataModel,false);
			
			if($EvaAdminEnable){
				$this->EvaBakeViewForm(APP.'views'.DS.$EvaDataModel['name'].DS.'admin_add.ctp', $EvaDataModel,true,'add');
				//start create edit file
				$this->EvaBakeViewForm(APP.'views'.DS.$EvaDataModel['name'].DS.'admin_edit.ctp', $EvaDataModel,true,'edit');
				//start create index file
				$this->EvaBakeViewIndex(APP.'views'.DS.$EvaDataModel['name'].DS.'admin_index.ctp', $EvaDataModel,true);
				//start create view file
				$this->EvaBakeViewView(APP.'views'.DS.$EvaDataModel['name'].DS.'admin_view.ctp', $EvaDataModel,true);
			}
			return true;
		}
		else{
			return false;
		}
	}
}
?>