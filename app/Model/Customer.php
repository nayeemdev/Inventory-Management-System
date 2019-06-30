<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 * @property Sell $Sell
 */
class Customer extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Sell' => array(
			'className' => 'Sell',
			'foreignKey' => 'customer_id',
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


    public  function getData($conditions=array(), $having= array()){
        $this->Behaviors->load('Containable');
        $query = [
            'fields' => [
                'Customer.id',
                'Customer.fullname',
                'Customer.phone',
                'Customer.address',
                'Customer.image',
                'SUM(Invoice.dueAmount) as due_amount',
            ],
            'joins' => array(
                array(
                    'table' => 'invoices',
                    'alias' => 'Invoice',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Customer.id = Invoice.customer_id'
                    )
                )
            ),
            /*'contain'=>[
                'Customer'
            ],*/
            'conditions'=>$conditions,
            'group' => ['Customer.id'],
            'having' => $having,
            'limit' => 20
        ];
        return $query;
    }

}
