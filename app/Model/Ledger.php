<?php
App::uses('AppModel', 'Model');
/**
 * Ledger Model
 *
 * @property Period $Period
 * @property Credit $Credit
 * @property Salary $Salary
 * @property Expence $Expence
 */
class Ledger extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Period' => array(
			'className' => 'Period',
			'foreignKey' => 'period_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Credit' => array(
			'className' => 'Credit',
			'foreignKey' => 'credit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Salary' => array(
			'className' => 'Salary',
			'foreignKey' => 'salary_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Expence' => array(
			'className' => 'Expence',
			'foreignKey' => 'expence_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
