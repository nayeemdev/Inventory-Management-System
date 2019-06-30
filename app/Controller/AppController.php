<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package        app.Controller
 * @link        https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

/**
 * Purchases Controller
 *
 * @property Purchase $Purchase
 * @property Expence $Expence
 * @property Period $Period
 * @property Stock $Stock
 * @property Ledger $Ledger
 */
class AppController extends Controller
{
    public $components = array(

        'Session', 'Cookie', 'RequestHandler',

        'Auth' => array(

            'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => true),

            'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard', 'admin' => true),

            'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => true),

            'authError' => 'You are not allowed',

            'authenticate' => array(

                'Form' => array(

                    'fields' => array('username' => 'email', 'password' => 'password')

                )

            )

        )

    );


    public function beforeFilter()
    {
        if ($this->params['admin']) {
            $this->layout = 'admin';
        }

    }

    /*File Upload*/
    public function _upload($file, $folder = '')
    {
        App::import('Vendor', 'phpthumb', array('file' => 'phpthumb' . DS . 'phpthumb.class.php'));
        if (is_uploaded_file($file['tmp_name'])) {
            $img_arr = explode('.', $file['name']);
            $ext = strtolower(array_pop($img_arr));
            if ($ext == 'txt') $ext = 'jpg';
            $fileName = time() . rand(1, 999) . '.' . $ext;
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'pdf' || $ext == 'doc' || $ext == 'docx') {
                $uplodFile = WWW_ROOT . 'files' . DS . $folder . DS . $fileName;
                if (move_uploaded_file($file['tmp_name'], $uplodFile)) {
                    $dest_small = WWW_ROOT . 'files' . DS . $folder . DS . 'thumb' . DS . $fileName;
                    if ($this->_resize($uplodFile, $dest_small)) {
                        return $fileName;
                    } else die(json_encode(array('success' => false, 'msg' => "Image couldn't resize.")));
                }
            }
        }
    }

    //image resize
    public function _resize($src, $dest_small)
    {
        $phpThumb = new phpThumb();
        $phpThumb->resetObject();
        $capture_raw_data = false;
        $phpThumb->setSourceFilename($src);
        $phpThumb->setParameter('w', 200);
        //$phpThumb->setParameter('w', 1184);
        //$phpThumb->setParameter('h', 852);
        $phpThumb->setParameter('h', 150);
        //$phpThumb->setParameter('zc', 1);
        $phpThumb->GenerateThumbnail();
        $phpThumb->RenderToFile($dest_small);
        return true;
    }

    public function plus_period($amount)
    {
        $this->cash_book_period($amount);
        $this->loadModel('Period');
        $this->Period->recursive = -1;
        $last_period = $this->Period->find('first', array('order' => array('id' => 'DESC')));
        $today_date = date('F,Y');
        if (!empty($last_period)) {
            $formatted_date = date_format(date_create($last_period['Period']['created']), 'F,Y');
            $balance = $last_period['Period']['amount'] + $amount;
            if ($formatted_date == $today_date) {
                $this->Period->id = $last_period['Period']['id'];
                if ($this->Period->saveField('amount', $balance)) {
                    return $last_period['Period']['id'];
                }

            } else {
                $data['Period'] = [
                    'period' => $today_date,
                    'amount' => $balance
                ];
                $this->Period->create();
                if ($this->Period->save($data)) {
                    return $this->Period->id;
                }
            }
        } else {
            $data['Period'] = [
                'period' => $today_date,
                'amount' => $amount
            ];
            $this->Period->create();
            if ($this->Period->save($data)) {
                return $this->Period->id;
            }
        }
    }
    private function cash_book_period($amount)
    {
        $this->loadModel('Cashbook');
        $this->Cashbook->recursive = -1;
        $last_period = $this->Cashbook->find('first', array('order' => array('id' => 'DESC')));
        $today_date = date('d M Y');
        if (!empty($last_period)) {
            $formatted_date = date_format(date_create($last_period['Cashbook']['created']), 'd M Y');
            $balance = $last_period['Cashbook']['amount'] + $amount;
            if ($formatted_date == $today_date) {
                $this->Cashbook->id = $last_period['Cashbook']['id'];
                $this->Cashbook->saveField('amount', $balance);
            } else {
                $data['Cashbook'] = [
                    'period' => $today_date,
                    'amount' => $balance
                ];
                $this->Cashbook->create();
                $this->Cashbook->save($data);
            }
        } else {
            $data['Cashbook'] = [
                'period' => $today_date,
                'amount' => $amount
            ];
            $this->Cashbook->create();
            $this->Cashbook->save($data);
        }
    }
    public function _stockUpdate($stock_data = array(), $model_class = 'Purchase'){
        $category_id = $stock_data[$model_class]['category_id'];
        $product_id = $stock_data[$model_class]['product_id'];
        $int_qty = $stock_data[$model_class]['numberReceived'];
        $buying_price = $stock_data[$model_class]['purchase_price'];
        $selling_price = $stock_data[$model_class]['cur_price'];
        $branch_id = $stock_data[$model_class]['branch_id'];

        $is_exist = $this->Stock->findByProductIdAndBranchId($product_id, $branch_id);
        $data['Stock'] = [
            'category_id' => $category_id,
            'product_id' => $product_id,
            'int_qty' => $int_qty,
            'int_price' => $buying_price,
            'cur_price' => $selling_price,
            'branch_id' => $branch_id,
        ];

        if(empty($is_exist)) {
            $this->Stock->create();
            $this->Stock->save($data);
        } else {
            $data['Stock']['int_qty'] = $is_exist['Stock']['int_qty'] + $int_qty;
            $this->Stock->id = $is_exist['Stock']['id'];
            $this->Stock->save($data);
        }
    }

    public function _accountsUpdate($paid_amount = 0, $trans_type = 'credit')
    {
        $this->loadModel('Expence');
        $this->loadModel('Ledger');
        $this->loadModel('Credit');
        if ($trans_type == 'credit') {
            $model = 'Credit';
            $period_sign = '';
            $trans_field = 'credit_id';
            $trans_field_2 = 'credit';
            $trans_data['Credit'] = [
                'description' => 'Sell Product',
                'amount' => $paid_amount,
            ];
        } else {
            $model = 'Expence';
            $period_sign = '-';
            $trans_field = 'expence_id';
            $trans_field_2 = 'debit';
            $trans_data['Expence'] = [
                'description' => 'Purchased Product',
                'amount' => $paid_amount,
            ];
        }

        $this->$model->create();
        if ($this->$model->save($trans_data)) {
            $trans_id = $this->$model->id;
            $period_id = $this->plus_period($period_sign . $paid_amount);
        }
        $data['Ledger'] = [
            $trans_field => $trans_id,
            'period_id' => $period_id,
            $trans_field_2 => $paid_amount
        ];
        $this->Ledger->create();
        if ($this->Ledger->save($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function _gen_invoice_no()
    {
        $id = 'A';
        for ($i = 1; $i <= 5; $i++) {
            if (rand(0, 1)) {
                // letter
                $id .= chr(rand(65, 90));
            } else {
                // number;
                $id .= rand(0, 9);
            }
        }
        return $id;
    }
}


