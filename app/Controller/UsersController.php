<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    public function admin_login(){
        if ($this->request->is('post')) {
            #print_r(AuthComponent::password($this->request->data['User']['password']));die;
            #print_r($this->request->data); exit;
            if (($this->Auth->login())) {
                //print_r($this->Auth->user()); exit;
                $this->redirect($this->Auth->redirect());
            } else {
                //print_r(AuthComponent::user()); exit;
                $this->Auth->logout();
                $this->Session->setFlash(__('Incorrect Email or Password.'), 'default', array('class' => 'alert alert-danger text-center'));
            }
        }
    }
    public function admin_dashboard(){
        $this->loadModel('Period');
        $this->Period->recursive = -1;
        $month = $this->Period->find('first',['order' => ['Period.id' => 'DESC'],'fields' => ['Period.amount']]);

        $this->loadModel('Credit');
        $this->Credit->recursive = -1;
        $credit = $this->Credit->find('all',['fields' => 'SUM(Credit.amount) as amount']);

        $this->loadModel('Purchase');
        $this->Purchase->recursive = -1;
        $purchase = $this->Purchase->find('all',['fields' => 'SUM(Purchase.total_price) as amount']);

        $this->loadModel('Invoice');
        $this->Invoice->recursive = -1;
        $sell = $this->Invoice->find('all',[
            'fields' => [
                'SUM(Invoice.paidAmount) as amount',
                'SUM( Invoice.dueAmount) as due_amount',

            ],
            //'group' => 'Sell.invoiceId'
        ]);
        //pr($sell);die;

        $today_cash = $this->Credit->find('all',[
            'fields' => 'SUM(Credit.amount) as amount',
            'conditions' => [
                'DATE(created) = CURDATE()'
            ]
        ]);

        $this->loadModel('Expence');
        $this->Expence->recursive = -1;
        $grossexpence = $this->Expence->find('all',['fields' => 'SUM(Expence.amount) as amount']);

        $this->loadModel('Salary');
        $this->Salary->recursive = -1;
        $grossSalary = $this->Salary->find('all',['fields' => ['SUM(Salary.salary) as salary','SUM(Salary.bonus) as bonus']]);

        $salary = $grossSalary['0']['0']['salary'] + $grossSalary['0']['0']['bonus'];


        $expence = $grossexpence['0']['0']['amount'] + $salary;
        $this->loadModel('Customer');
        $customers = $this->Customer->find('count');

        /*Start Stock*/
        $this->loadModel('Stock');
        $conditions_lub = array(
            'Stock.category_id' => 3
        );
        $conditions_parts = array(
            'Stock.category_id' => 2
        );
        $conditions_bike = array(
            'Stock.category_id' => 1
        );


        $product = '';
        $cat_id = @$this->params->query['cat_id'];
        $product = @$this->params->query['product_id'];


        if(!empty($product)) {
            if($cat_id==3) {
                $conditions_lub = am($conditions_lub, [
                        'Stock.product_id' => $product
                    ]
                );
            } elseif($cat_id==2){
                $conditions_parts = am($conditions_parts, [
                        'Stock.product_id' => $product
                    ]
                );
            } else {
                $conditions_bike = am(
                    $conditions_bike, [
                        'Stock.product_id' => $product
                    ]
                );
            }
        }
        $options_lub = [
            'conditions'=>$conditions_lub,
        ];
        $options_parts = [
            'conditions'=>$conditions_parts,
            'order' => 'rand()'
        ];
        $options_bike = [
            'conditions'=>$conditions_bike,
        ];
        $this->Paginator->settings = $options_lub;
        $stocks_lub = $this->Paginator->paginate('Stock');
        #pr($stocks_lub);die;

        $this->Paginator->settings = $options_parts;
        $stocks_parts = $this->Paginator->paginate('Stock');
        $this->Paginator->settings = $options_bike;
        $stocks_bike = $this->Paginator->paginate('Stock');

        $products_lubricant = $this->Stock->Product->find('list', ['conditions'=> am(['Product.category_id' => '3']),'order' => 'Product.name']);
        $products_parts = $this->Stock->Product->find('list', ['conditions'=> am(['Product.category_id' => '2']),'order' => ['Product.name ASC']]);
        $products_bike = $this->Stock->Product->find('list', ['conditions'=> am(['Product.category_id' => '1']),'order' => 'Product.name']);
        //pr($products);die;
        $this->set(compact('stocks_lub','stocks_parts','stocks_bike','categories','products','category','product','products_lubricant','products_bike','products_parts'));

        /*End Stock*/

//        $month = $this->number_format_short($month['Period']['amount']);
//        $salary = $this->number_format_short($salary);
//        $credit = $this->number_format_short($credit['0']['0']['amount']);
//        $expence = $this->number_format_short($expence);

        $this->set(compact('month','credit','salary','expence','today_cash','customers','purchase','sell'));
        //pr($totalExpence);die;
    }
    // Shortens a number and attaches K, M, B, etc. accordingly
//    function number_format_short( $n, $precision = 1 ) {
//        if ($n < 900) {
//            // 0 - 900
//            $n_format = number_format($n, $precision);
//            $suffix = '';
//        } else if ($n < 900000) {
//            // 0.9k-850k
//            $n_format = number_format($n / 1000, $precision);
//            $suffix = 'K';
//        } else if ($n < 900000000) {
//            // 0.9m-850m
//            $n_format = number_format($n / 1000000, $precision);
//            $suffix = 'M';
//        } else if ($n < 900000000000) {
//            // 0.9b-850b
//            $n_format = number_format($n / 1000000000, $precision);
//            $suffix = 'B';
//        } else {
//            // 0.9t+
//            $n_format = number_format($n / 1000000000000, $precision);
//            $suffix = 'T';
//        }
//        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
//        // Intentionally does not affect partials, eg "1.50" -> "1.50"
//        if ( $precision > 0 ) {
//            $dotzero = '.' . str_repeat( '0', $precision );
//            $n_format = str_replace( $dotzero, '', $n_format );
//        }
//        return $n_format . $suffix;
//    }
    public function admin_logout()
    {
        $this->redirect($this->Auth->logout());

    }

    public function forget_password()
    {
        $this->autoLayout = false;
        $this->autoRender = false;
        $to = 'mukul.hosen.526@gmail.com';
            $new_passkey = $this->_generate_password(8);
            $hash_passkey = AuthComponent::password($new_passkey);
            $this->User->id = '1';
            if ($this->User->saveField('password', $hash_passkey)) {
                try {
                    App::uses('CakeEmail', 'Network/Email');
                    $email = new CakeEmail();
                    $email->config('smtp');
                    $email->subject("Office Management System - Password reset!");
                    $email->to($to);
                    $url = Router::url('/reset_password/'.$new_passkey, true);
                    //die($url);
                    $body = '<!DOCTYPE html>
<html>
<head>
</head>

<body style="font-family: Arial; font-size: 12px;">
<div>
Hi Admin, <p>
                            You have requested a password reset. Your new password is
                        </p>
                        <p>
                            '.$new_passkey.'
                        </p>
                        <p>
                            Please ignore this email if you did not request a password change.
                        </p>
                        <br/>Regards,<br/><br/>Office Management System
                    </div>
                    </body>
                    </html>';
                    $email->send($body);

                    /*$this->_send_email(
                        $email,
                        "Welcome to Islamic App!",
                        "Dear " . $is_user['User']['fullname'] . ",<br/>Your account  password has been reset. Your new password is <b>".$new_passkey."<br/><br/>Regards,<br/><br/>The Islamic App Team",
                        'welcome',
                        array('title' => 'Reseted your password')
                    );*/
                } catch (Exception $e) {
                    //echo($e);
                    $this->Session->setFlash(__($e), 'default', array('class' => 'alert alert-danger text-center'));
                }
                $this->Session->setFlash(__('New Password sent to your email'), 'default', array('class' => 'alert alert-success text-center'));
            } else {
                $this->Session->setFlash(__('Sorry! something went wrong'), 'default', array('class' => 'alert alert-success text-center'));
            }
        return $this->redirect(array('action' => 'admin_dashboard'));

    }


    private function _generate_password($length = 9, $add_dashes = false, $available_sets = 'luds')
    {
        $sets = array();
        if (strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if (strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if (strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if (strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';

        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];

        $password = str_shuffle($password);

        if (!$add_dashes)
            return $password;

        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }
    public function admin_reset_password(){
        if ($this->request->is('post')) {
            //pr($this->request->data);die;
            $old = AuthComponent::password($this->request->data['User']['old_password']);
            $exit = $this->User->findByIdAndPassword(AuthComponent::user()['id'],$old);
            if(!empty($exit)){
                $password = AuthComponent::password($this->request->data['User']['new_password']);
                //pr($password);die;
                $this->User->id = AuthComponent::user()['id'];
                if($this->User->saveField('password',$password)){

                    $this->Session->setFlash(__('Your Password Changed.'), 'default', array('class' => 'alert alert-primary text-center'));
                    $this->redirect($this->Auth->logout());
                } else {
                    $this->Session->setFlash(__('Something Went Wrong.'), 'default', array('class' => 'alert alert-danger text-center'));
                }
            } else {
                $this->Session->setFlash(__('Your Old Password is incorrect.'), 'default', array('class' => 'alert alert-danger text-center'));
            }
        }
    }

}
