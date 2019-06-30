<?php
App::uses('AppController', 'Controller');
/**
 * Stocks Controller
 *
 * @property Stock $Stock
 * @property PaginatorComponent $Paginator
 */
class StocksController extends AppController {

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
        $category = '';
        $product = '';
        $category = @$this->params->query['category_id'];
        $product = @$this->params->query['product_id'];

        if (!empty($category)) {
            $cat_cnd = ['Product.category_id'=>$category];
            $conditions = am($conditions, [
                'Stock.category_id' => $category
            ]);
        } else {
            $cat_cnd = [];
        }
        if(!empty($product)) {
            $conditions = am($conditions, [
                    'Stock.product_id' => $product
                ]
            );
        }
        $options = [
            'conditions'=>$conditions,
        ];
        $this->Paginator->settings = $options;
        $stocks = $this->Paginator->paginate('Stock');
        $categories = $this->Stock->Category->find('list');
        $products = $this->Stock->Product->find('list', ['conditions'=> $cat_cnd, 'order' => 'Product.name ASC']);
        //pr($products);die;
        $this->set(compact('stocks','categories','products','category','product'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
		$options = array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id));
		$this->set('stock', $this->Stock->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Stock->create();
			if ($this->Stock->save($this->request->data)) {
				$this->Flash->success(__('The stock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The stock could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Stock->Category->find('list');
		$products = $this->Stock->Product->find('list');
		$branches = $this->Stock->Branch->find('list');
		$this->set(compact('products', 'branches'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Stock->save($this->request->data)) {
                $this->Session->setFlash(__('The stock has been updated.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The stock could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			}
		} else {
			$options = array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id));
			$this->request->data = $this->Stock->find('first', $options);
		}
		$products = $this->Stock->Product->find('list');
		$categories = $this->Stock->Category->find('list');
		$this->set(compact('products', 'categories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Stock->delete($id)) {
			$this->Flash->success(__('The stock has been deleted.'));
		} else {
			$this->Flash->error(__('The stock could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    public function admin_is_available(){
        if ($this->request->is('post')) {
            $product_id = $this->request->data['product_id'];
            $amount = $this->request->data['amount'];
            $stock = $this->Stock->findByProductId($product_id);
            if(@$stock['Stock']['int_qty']<$amount) {
                die(json_encode(['success'=>false, 'msg'=>'Stock Limited.']));
            } else die(json_encode(['success'=>true]));
        }
    }
}
