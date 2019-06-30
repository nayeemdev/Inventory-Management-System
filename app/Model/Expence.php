<?php
App::uses('AppModel', 'Model');
/**
 * Expence Model
 *
 * @property Ledger $Ledger
 */
class Expence extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ledger' => array(
			'className' => 'Ledger',
			'foreignKey' => 'expence_id',
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
