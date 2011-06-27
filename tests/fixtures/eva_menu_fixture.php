<?php
/* EvaMenu Fixture generated on: 2011-06-17 21:36:12 : 1308314172 */
class EvaMenuFixture extends CakeTestFixture {
	var $name = 'EvaMenu';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => true),
		'name' => array('type' => 'string', 'null' => false),
		'enable' => array('type' => 'boolean', 'null' => false),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => '11'),
		'url' => array('type' => 'string', 'null' => false),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => '11'),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => '11'),
		'created_by' => array('type' => 'string', 'null' => true, 'length' => 36),
		'modified_by' => array('type' => 'string', 'null' => true, 'length' => 36),
		'created' => array('type' => 'datetime', 'null' => true),
		'modified' => array('type' => 'datetime', 'null' => true),
		'indexes' => array('PRIMARY' => array('unique' => true, 'column' => 'id')),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'enable' => 1,
			'parent_id' => 1,
			'url' => 'Lorem ipsum dolor sit amet',
			'lft' => 1,
			'rght' => 1,
			'created_by' => 'Lorem ipsum dolor sit amet',
			'modified_by' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-06-17 21:36:12',
			'modified' => '2011-06-17 21:36:12'
		),
	);
}
