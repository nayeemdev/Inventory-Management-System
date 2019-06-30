<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {

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
        $keyword = "";
        $conditions = array();
        if (!empty($this->request->data['keyword'])) {
            $keyword = $this->request->data['keyword'];
        } elseif (!empty($this->params['named']['keyword'])) {
            $keyword = $this->params['named']['keyword'];
        } elseif (!empty($this->params->query['keyword'])) {
            $keyword = $this->params->query['keyword'];
        }
        if (!empty($keyword)) {
            $conditions = am($conditions,
                array(
                    'OR' =>
                        array(
                            'Customer.email LIKE' => '%' . $keyword . '%',
                            'Customer.address LIKE' => '%' . $keyword . '%',
                            'Customer.fullname LIKE' => '%' . $keyword . '%',
                            'Customer.phone LIKE' => '%' . $keyword . '%',
                        ),
                )
            );
        }
        $payment_status = @$this->params->query['payment_status'];
        $having = '';
        if (!empty($payment_status)) {
            if($payment_status=='Due') {
                $having = 'due_amount > 0';
            } else {
                $having = 'due_amount <= 0';
            }
        } else {
            $payment_status = '';
        }
        $options = $this->Customer->getData($conditions, $having);
        $this->Paginator->settings = $options;
        $customers = $this->Paginator->paginate('Customer');
        //pr($customers);die;
		$this->set(compact('customers','keyword','payment_status'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array(
            'recursive' => 2,
            'conditions' => array('Customer.' . $this->Customer->primaryKey => $id)
        );
        $this->Paginator->settings = $options;
        $customer_data = $this->Paginator->paginate('Customer');
        $customer = $customer_data[0];
        //pr($customer);die;
		$this->set(compact('customer'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if(!empty($this->request->data['Customer']['image']['name'])) {
				$this->request->data['Customer']['image'] = $this->_upload($this->request->data['Customer']['image'], 'customer_images');
			} else {
				unset($this->request->data['Customer']['image']);
			}
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
                $this->Session->setFlash(__('The customer has been created, You may make a sell now.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				//$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(array('controller'=>'sells','action' => 'add',$this->Customer->id));
			} else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Flash->error(__('The customer could not be saved. Please, try again.'));
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
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if(!empty($this->request->data['Customer']['image']['name'])) {
				$this->request->data['Customer']['image'] = $this->_upload($this->request->data['Customer']['image'], 'customer_images');
			} else {
				unset($this->request->data['Customer']['image']);
			}
			if ($this->Customer->save($this->request->data)) {
				//$this->Flash->success(__('The customer has been saved.'));
                $this->Session->setFlash(__('The customer has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
//				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
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
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Customer->delete($id)) {
            $this->Session->setFlash(__('The customer has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->success(__('The customer has been deleted.'));
		} else {
//			$this->Flash->error(__('The customer could not be deleted. Please, try again.'));
            $this->Session->setFlash(__('The customer could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
