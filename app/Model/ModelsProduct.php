<?php
App::uses('AppModel', 'Model');
/**
 * ModelsProduct Model
 *
 * @property Product $Product
 * @property BykeModel $BykeModel
 */
class ModelsProduct extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BykeModel' => array(
			'className' => 'BykeModel',
			'foreignKey' => 'byke_model_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
