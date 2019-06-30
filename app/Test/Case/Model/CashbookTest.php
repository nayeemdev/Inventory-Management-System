<?php
App::uses('Cashbook', 'Model');

/**
 * Cashbook Test Case
 */
class CashbookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cashbook'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cashbook = ClassRegistry::init('Cashbook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cashbook);

		parent::tearDown();
	}

}
