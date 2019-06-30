<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');
App::uses('Period', 'Model');
App::uses('Credit', 'Model');
App::uses('Expence', 'Model');
App::uses('Salary', 'Model');
App::uses('Sell', 'Model');
App::uses('Cashbook', 'Model');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
    static function last_period($now){
        $last = $now-1;
        $obj = new Period();
        $data = $obj->find('first',['conditions' =>['Period.id' => $last],'recursive' => -1]);
        return @$data['Period'];
    }
    static function last_cashbook($last_date_of_last_month){
        $s = date('Y-m-d',strtotime($last_date_of_last_month));
        $e = date('Y-m-t',strtotime($last_date_of_last_month));
        $obj = new Cashbook();
        $data = $obj->find('first',['fields'=> ['Cashbook.amount'],'conditions' =>['date(Cashbook.created) BETWEEN ? AND ?' => array($s,$e)],'recursive' => -1, 'order' => 'Cashbook.id DESC']);
        return !empty($data['Cashbook']['amount']) ? $data['Cashbook']['amount'] : 0;
    }
    static function credit_description($id){
        $obj = new Credit();
        $data = $obj->find('first',['conditions' => ['Credit.id' => $id],'fields' => ['Credit.description']]);
        return @$data['Credit']['description'];
    }
    static function expence_description($id){
        $obj = new Expence();
        $data = $obj->find('first',['conditions' => ['Expence.id' => $id],'fields' => ['Expence.description']]);
        return @$data['Expence']['description'];
    }
    static function employee_name($salary_id){
        $obj = new Salary();
        $data = $obj->find('first',['conditions' => ['Salary.id' => $salary_id],'fields' => ['Employee.name']]);
        return @$data['Employee']['name'];
    }
    static function client_due($client_id){
        $obj = new Sell();
        $query = [
            'conditions' => [
                'Sell.customer_id' => $client_id
            ],
            'fields' => [
                'SUM(DISTINCT Sell.dueAmount) as due_amount',
            ],
            'group' => ['Sell.invoiceId'],
            'recursive' => -1
        ];
        $data = $obj->find('all',$query);
        //pr($data);
        return @$data['0']['0']['due_amount'];
    }
}
