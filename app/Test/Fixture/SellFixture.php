<?php
/**
 * Sell Fixture
 */
class SellFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'branch_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'customer_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'sale_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'rate' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'total_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'branch_id' => 1,
			'customer_id' => 1,
			'product_id' => 1,
			'sale_date' => '2019-03-20 10:08:45',
			'quantity' => 1,
			'rate' => 1,
			'total_price' => 1,
			'created' => '2019-03-20 10:08:45',
			'modified' => '2019-03-20 10:08:45'
		),
	);

}
