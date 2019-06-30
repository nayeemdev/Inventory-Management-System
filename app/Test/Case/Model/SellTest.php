<?php
App::uses('Sell', 'Model');

/**
 * Sell Test Case
 */
class SellTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sell',
		'app.branch',
		'app.purchase',
		'app.supplier',
		'app.category',
		'app.stock',
		'app.product',
		'app.customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sell = ClassRegistry::init('Sell');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sell);

		parent::tearDown();
	}

}
