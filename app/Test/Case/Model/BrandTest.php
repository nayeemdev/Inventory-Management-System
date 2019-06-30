<?php
App::uses('Brand', 'Model');

/**
 * Brand Test Case
 */
class BrandTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.brand',
		'app.byke_model',
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
		$this->Brand = ClassRegistry::init('Brand');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Brand);

		parent::tearDown();
	}

}
