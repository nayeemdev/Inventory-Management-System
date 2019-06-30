<?php
App::uses('AppController', 'Controller');

/**
 * Purchases Controller
 *
 * @property Purchase $Purchase
 * @property Expence $Expence
 * @property Stock $Stock
 * @property PaginatorComponent $Paginator
 */
class PurchasesController extends AppController
{

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
    public function admin_index()
    {
        $conditions = array();
        if (!empty($this->request->data['keyword'])) {
            $keyword = $this->request->data['keyword'];
        } elseif (!empty($this->params['named']['keyword'])) {
            $keyword = $this->params['named']['keyword'];
        } elseif (!empty($this->params->query['keyword'])) {
            $keyword = $this->params->query['keyword'];
        }
        
        $branch = @$this->params->query['branch'];
        if(!empty($branch)) {
            $conditions = am(
                $conditions, ['Purchase.branch_id' => $branch]
            );
        }
        $supplier = @$this->params->query['supplier'];
        if(!empty($supplier)) {
            $conditions = am(
                $conditions, ['Purchase.supplier_id' => $supplier]
            );
        }

        $startDate = $this->request->query('startDate');
        $endDate = $this->request->query('endDate');

        if (!empty($startDate && $endDate)) {
            $conditions = am(
                $conditions,array(
                'DATE(Purchase.purchaseDate) >=' => $startDate,
                'DATE(Purchase.purchaseDate) <=' => $endDate
                )
            );
            
        
        }
        
        $options = [
            'conditions' => $conditions,
        ];

        $this->Paginator->settings = $options;
        $purchases = $this->Paginator->paginate('Purchase');

        $branches = $this->Purchase->Branch->find('list');
        $suppliers = $this->Purchase->Supplier->find('list', ['fields' => ['Supplier.supplier_name']]);
        $categories = $this->Purchase->Category->find('list');
        $this->set(compact('purchases','branches','branch', 'suppliers','supplier', 'categories', 'products','last_buying_rate','last_selling_rate','startDate','endDate'));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->Purchase->exists($id)) {
            throw new NotFoundException(__('Invalid purchase'));
        }
        $options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
        $this->set('purchase', $this->Purchase->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        $this->loadModel('Stock');
        if ($this->request->is('post')) {
            //pr($this->request->data);die;
            if(!empty($this->request->data['Purchase']['purchaseDate'])){
                $this->request->data['Purchase']['purchaseDate'] = date_format(date_create($this->request->data['Purchase']['purchaseDate']), "Y-m-d H:i:s");
            } else $this->request->data['Purchase']['purchaseDate'] = date("Y-m-d H:i:s");
            $this->Purchase->create();
            if ($this->Purchase->save($this->request->data)) {
                /*Stock Update*/
                $this->_stockUpdate($this->request->data);
                /*End Stock Update*/
                /*Accounts Update*/
                $paid_amount = $this->request->data['Purchase']['paid_amount'];
                if($this->_accountsUpdate($paid_amount, 'debit')){
//                  $this->Flash->success(__('The purchase has been saved and stock updated.'));
                    $this->Session->setFlash(__('The purchase has been saved and stock updated.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                    return $this->redirect(array('action' => 'index'));
                } else $this->Session->setFlash(__('Something Went wrong! please try again.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                /*End Accounts Update*/
            } else {
                $this->Session->setFlash(__('The purchase could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
               // $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
            }
        }
        $products = $this->Purchase->Product->find('list', ['fields' => 'Product.name', 'conditions' => ['Product.category_id' => 1]]);
        $last_prd_id = key($products);
        $prd_data = $this->Stock->findByProductId($last_prd_id, ['fields'=> 'Stock.int_price']);
        $last_buying_rate = !empty($prd_data['Stock']['int_price']) ? $prd_data['Stock']['int_price'] :0;
        $last_selling_rate = !empty($prd_data['Stock']['cur_price']) ? $prd_data['Stock']['cur_price']:0;

        $branches = $this->Purchase->Branch->find('list');
        $suppliers = $this->Purchase->Supplier->find('list', ['fields' => ['Supplier.supplier_name']]);
        $categories = $this->Purchase->Category->find('list');
        $this->set(compact('branches', 'suppliers', 'categories', 'products','last_buying_rate','last_selling_rate'));
    }

    public function admin_get_last_buying_price($product_id = null){
        $this->autoLayout = false;
        $this->autoRender = false;
        $this->loadModel('Stock');
        $prd_data = $this->Stock->findByProductId($product_id, ['fields'=> 'Stock.int_price','Stock.cur_price']);
        $last_buying_rate = !empty($prd_data['Stock']['int_price']) ? $prd_data['Stock']['int_price'] : 0;
        $last_selling_rate = !empty($prd_data['Stock']['cur_price']) ? $prd_data['Stock']['cur_price'] : 0;
        die(json_encode([
            'last_buying_rate' =>$last_buying_rate,
            'last_selling_rate' =>$last_selling_rate,
        ]));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->Purchase->exists($id)) {
            throw new NotFoundException(__('Invalid purchase'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Purchase->save($this->request->data)) {
//                $this->Flash->success(__('The purchase has been saved.'));
                $this->Session->setFlash(__('The purchase has been saved and stock updated.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
                $this->Session->setFlash(__('The purchase could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
            }
        } else {
            $options = array('conditions' => array('Purchase.' . $this->Purchase->primaryKey => $id));
            $this->request->data = $this->Purchase->find('first', $options);
        }
        $branches = $this->Purchase->Branch->find('list');
        $suppliers = $this->Purchase->Supplier->find('list');
        $categories = $this->Purchase->Category->find('list');
        $this->set(compact('branches', 'suppliers', 'categories'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        if (!$this->Purchase->exists($id)) {
            throw new NotFoundException(__('Invalid purchase'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Purchase->delete($id)) {
            $this->Session->setFlash(__('The purchase has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
            //$this->Flash->success(__('The purchase has been deleted.'));
        } else {
            $this->Session->setFlash(__('The purchase could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
            //$this->Flash->error(__('The purchase could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
