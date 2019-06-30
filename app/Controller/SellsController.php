<?php
App::uses('AppController', 'Controller');
/**
 * Sells Controller
 *
 * @property Sell $Sell
 * @property Invoice $Invoice
 * @property PaginatorComponent $Paginator
 */
class SellsController extends AppController {

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
		$conditions = array();
        $branch = @$this->params->query['branch'];
        if(!empty($branch)) {
            $conditions = am(
                $conditions, ['Sell.branch_id' => $branch]
            );
        }
        $customer = @$this->params->query['customer'];
        if(!empty($customer)) {
            $conditions = am(
                $conditions, ['Sell.customer_id' => $customer]
            );
        }
        $product = @$this->params->query['product'];
        if(!empty($product)) {
            $conditions = am(
                $conditions, ['Sell.product_id' => $product]
            );
        }

        $startDate = $this->request->query('startDate');
        $endDate = $this->request->query('endDate');

        if (!empty($startDate && $endDate)) {
            $conditions = am(
                $conditions, array(
                'DATE(Sell.sale_date) >=' => $startDate,
                'DATE(Sell.sale_date) <=' => $endDate
                
            )

            );
        }
        
        $options = [
            'conditions' => $conditions,
        ];

		$this->Paginator->settings = $options;
        $sells = $this->Paginator->paginate('Sell');
        
        $branches = $this->Sell->Branch->find('list');
		$customers = $this->Sell->Customer->find('list', ['fields' => 'Customer.fullname']);
		$products = $this->Sell->Product->find('list', ['fields' => 'Product.name']);
		$this->set(compact('branches', 'branch','customer', 'sells', 'customers', 'products', 'product', 'startDate', 'endDate'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Sell->exists($id)) {
			throw new NotFoundException(__('Invalid sell'));
		}
		$options = array('conditions' => array('Sell.' . $this->Sell->primaryKey => $id));
		$this->set('sell', $this->Sell->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
        $this->loadModel('Stock');
		if ($this->request->is('post')) {
			if(!empty($this->request->data['Sell']['sale_date'])){
                $this->request->data['Sell']['sale_date'] = date_format(date_create($this->request->data['Sell']['sale_date']), "Y-m-d H:i:s");
            } else $this->request->data['Sell']['sale_date'] = date("Y-m-d H:i:s");
            $paid_amount = $this->request->data['Invoice']['paidAmount'];

            $invoice_id = $this->_gen_invoice_no();
            $this->request->data['Sell']['invoice_id'] = $invoice_id;
            $this->request->data['Invoice']['id'] = $invoice_id;
            $this->request->data['Invoice']['customer_id'] = $this->request->data['Sell']['customer_id'];
            $no_of_product = count($this->request->data['Sell']['product_id']);

            $selected_products = $this->request->data['Sell']['product_id'];
            $selected_quantity = $this->request->data['Sell']['quantity'];
            $selected_rate = $this->request->data['Sell']['rate'];
            $selected_total_price = $this->request->data['Sell']['total_price'];

            $is_avail = true;
            for($i=0;$i<$no_of_product; $i++){

                $stock = $this->Stock->findByProductId($selected_products[$i]);
                $stk_qty = !empty($stock['Stock']['int_qty']) ? $stock['Stock']['int_qty'] : 0;
                if($stk_qty<$selected_quantity[$i]) {
                    $is_avail = false;
                    break;
                } else {
                    $this->request->data['Sell']['product_id'] = $selected_products[$i];
                    $this->request->data['Sell']['quantity'] = $selected_quantity[$i];
                    $this->request->data['Sell']['rate'] = $selected_rate[$i];
                    $this->request->data['Sell']['total_price'] = $selected_total_price[$i];
                    $this->Sell->create();
                    $this->Sell->save($this->request->data);

                    $data['Stock']['int_qty'] = $stk_qty - $selected_quantity[$i];
                    $this->Stock->id = $stock['Stock']['id'];
                    $this->Stock->save($data);
                    $is_avail = true;
                }
            }
            /*Saved into Invoice table*/
            $this->loadModel('Invoice');

            $this->Invoice->create();
            $this->Invoice->save($this->request->data);
            /* /Saved into Invoice table*/
            if($is_avail) {
                $this->_accountsUpdate($paid_amount, 'credit');
                $this->Session->setFlash(__('Order Confirmed.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                return $this->redirect(array('action' => 'invoice',$invoice_id));
            } else {
                $this->Session->setFlash(__('Some products are  Limited.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
                return $this->redirect(array('action' => 'add'));
            }
		}
		$branches = $this->Sell->Branch->find('list');
        $this->loadModel('Category');
		$categories = $this->Category->find('list');
		$customers = $this->Sell->Customer->find('list', ['fields' => 'Customer.fullname']);
		$products = $this->Sell->Product->find('list', ['fields' => 'Product.name', 'conditions' => ['Product.category_id' => 1]]);
        $last_prd_id = key($products);
        $prd_data = $this->Stock->findByProductId($last_prd_id, ['fields'=> 'Stock.int_price','Stock.cur_price']);
        $last_selling_rate = !empty($prd_data['Stock']['cur_price']) ? $prd_data['Stock']['cur_price']:0;

		$this->set(compact('branches', 'customers', 'products','categories','last_selling_rate'));
	}

    public function admin_invoice($invoice_id = null){
        $this->Sell->Invoice->Behaviors->load('Containable');
        $query = [
            'contain' => [
                'Invoice',
                'Sell' => [
                    'Product', 'Customer'
                ]
            ],
            //'recursive' => 2,
            'conditions' => [
                'Invoice.id' => $invoice_id
            ]
        ];
        $invoice_data = $this->Sell->Invoice->find('first', $query);
        #pr($invoice_data);die;
        $this->set(compact('invoice_data'));
    }
/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Sell->exists($id)) {
			throw new NotFoundException(__('Invalid sell'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sell->save($this->request->data)) {
				$this->Flash->success(__('The sell has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The sell could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sell.' . $this->Sell->primaryKey => $id));
			$this->request->data = $this->Sell->find('first', $options);
		}
		$branches = $this->Sell->Branch->find('list');
		$customers = $this->Sell->Customer->find('list', ['fields' => 'Customer.fullname']);
		$products = $this->Sell->Product->find('list', ['fields' => 'Product.name', 'conditions' => ['Product.category_id' => 1]]);
		$this->set(compact('branches', 'customers', 'products'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->Sell->exists($id)) {
			throw new NotFoundException(__('Invalid sell'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sell->delete($id)) {
			//$this->Flash->success(__('The sell has been deleted.'));
            $this->Session->setFlash(__('The sell has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
		} else {
            $this->Session->setFlash(__('The sell could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->error(__('The sell could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
