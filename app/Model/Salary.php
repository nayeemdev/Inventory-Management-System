<?php
App::uses('AppModel', 'Model');
/**
 * Salary Model
 *
 * @property Employee $Employee
 */
class Salary extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(

		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    public $hasMany = array(
        'Ledger' => array(
            'className' => 'Ledger',
            'foreignKey' => 'salary_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );
}
