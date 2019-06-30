<?php
App::uses('AppModel', 'Model');
/**
 * Credit Model
 *
 * @property Ledger $Ledger
 */
class Credit extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ledger' => array(
			'className' => 'Ledger',
			'foreignKey' => 'credit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
