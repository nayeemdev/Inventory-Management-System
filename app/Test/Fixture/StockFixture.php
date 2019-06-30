<?php
/**
 * Stock Fixture
 */
class StockFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'cur_qty' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'cur_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'branch_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'int_qty' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'int_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'cur_qty' => 1,
			'cur_price' => 1,
			'branch_id' => 1,
			'int_qty' => 1,
			'int_price' => 1,
			'created' => '2019-03-20 10:08:45',
			'modified' => '2019-03-20 10:08:45'
		),
	);

}
