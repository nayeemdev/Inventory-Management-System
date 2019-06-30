<?php
App::uses('BykeModel', 'Model');

/**
 * BykeModel Test Case
 */
class BykeModelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.byke_model',
		'app.brand',
		'app.models_product',
		'app.product',
		'app.sell',
		'app.branch',
		'app.purchase',
		'app.supplier',
		'app.category',
		'app.stock',
		'app.customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BykeModel = ClassRegistry::init('BykeModel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BykeModel);

		parent::tearDown();
	}

}
