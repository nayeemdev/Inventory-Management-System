<?php
/**
 * Purchase Fixture
 */
class PurchaseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'branch_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'supplier_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'numberReceived' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'purchaseDate' => array('type' => 'date', 'null' => true, 'default' => null),
		'category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'purchase_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'total_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'paid_amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'payment_status' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'due_amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'payment_method' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'note' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'supplier_id' => 1,
			'numberReceived' => 'Lorem ipsum dolor sit amet',
			'purchaseDate' => '2019-03-20',
			'category_id' => 1,
			'type' => 'Lorem ipsum dolor sit amet',
			'purchase_price' => 1,
			'total_price' => 1,
			'paid_amount' => 1,
			'payment_status' => 'Lorem ipsum dolor sit amet',
			'due_amount' => 1,
			'payment_method' => 'Lorem ipsum dolor sit amet',
			'note' => 'Lorem ipsum dolor sit amet',
			'created' => '2019-03-20 10:08:44',
			'modified' => '2019-03-20 10:08:44'
		),
	);

}
