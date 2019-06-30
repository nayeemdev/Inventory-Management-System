<?php
App::uses('ModelsProduct', 'Model');

/**
 * ModelsProduct Test Case
 */
class ModelsProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.models_product',
		'app.product',
		'app.sell',
		'app.branch',
		'app.purchase',
		'app.supplier',
		'app.category',
		'app.stock',
		'app.customer',
		'app.byke_model',
		'app.brand'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ModelsProduct = ClassRegistry::init('ModelsProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModelsProduct);

		parent::tearDown();
	}

}
