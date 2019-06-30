<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

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
        if (!empty($this->request->data['keyword'])) {
            $keyword = $this->request->data['keyword'];
        } elseif (!empty($this->params['named']['keyword'])) {
            $keyword = $this->params['named']['keyword'];
        } elseif (!empty($this->params->query['keyword'])) {
            $keyword = $this->params->query['keyword'];
        }
        if (!empty($keyword)) {
            $conditions = array('OR' => array('Product.name LIKE' => '%' . $keyword . '%',
            								  'Product.colour LIKE' => '%' . $keyword . '%',
            								  'Product.code LIKE' => '%' . $keyword . '%',
            								  'Product.partsNo LIKE' => '%' . $keyword . '%',
            	)
        	);
        }
        $category = @$this->params->query['category'];
        if(!empty($category)) {
            $conditions = am(
                $conditions, ['Product.category_id' => $category]
            );
        }
		$options = [
            'conditions' => $conditions,
        ];


		$this->Paginator->settings = $options;
        $products = $this->Paginator->paginate('Product');

        $categories = $this->Product->Category->find('list');
		$this->set(compact('categories', 'category', 'products', 'keyword'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if(!empty($this->request->data['Product']['image']['name'])) {
				$this->request->data['Product']['image'] = $this->_upload($this->request->data['Product']['image'],'products_images');
			} else {
				unset($this->request->data['Product']['image']);
			}
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				//$this->Flash->success(__('The product has been saved.'), 'default', ['class' => 'alert alert-primary']);
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
                //$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}

    public function admin_upload_product(){
        set_time_limit(0);
        if ($this->request->is('post')) {
            if(!empty($this->request->data['Product']['file_upload']['name'])) {
                #pr($this->request->data['Product']);die;
                $filename=$this->request->data['Product']['file_upload']["tmp_name"];
                if($this->request->data['Product']['file_upload']["size"] > 0)
                {
                    $file = fopen($filename, "r");
                    $count = 0;
                    while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                    {
                        #pr($getData);
                        if($count>0) {
                            if($this->request->data['Product']['category_id']==2) {
                                $parts_data_p['Product'] = [
                                    'category_id' => $this->request->data['Product']['category_id'],
                                    'code' => $getData[0],
                                    'name' => $getData[1],
                                    'partsNo' => $getData[2]
                                ];
                                $parts_data_s['cur_price'] = $getData[5];
                            } else {
                                $parts_data_p['Product'] = [
                                    'category_id' => $this->request->data['Product']['category_id'],
                                    'name' => $getData[0],
                                    'colour' => $getData[1],
                                ];
                                $parts_data_s['int_price'] = $getData[2];
                                $parts_data_s['cur_price'] = $getData[3];
                            }
                            $this->Product->create();
                            $this->Product->save($parts_data_p);

                            $parts_data_s = am($parts_data_s,[
                                'category_id' => $this->request->data['Product']['category_id'],
                                'product_id' => $this->Product->id,
                            ]);
                            $this->loadModel('Stock');
                            //pr($parts_data_s);die;
                            $this->Stock->create();
                            $this->Stock->save($parts_data_s);
                        }
                        $count++;
                    }

                    fclose($file);
                }
                $this->Session->setFlash(__('The product has been uploaded.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                return $this->redirect(array('action' => 'index'));
            } else {
                unset($this->request->data['Product']['file_upload']);
            }
        }
        $this->Product->Category->recursive = -1;
        $categories = $this->Product->Category->find('list');
        $this->set(compact('categories'));
    }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['Product']['image']['name'])) {
				$this->request->data['Product']['image'] = $this->_upload($this->request->data['Product']['image'],'products_images');
			} else {
				unset($this->request->data['Product']['image']);
			}
			if ($this->Product->save($this->request->data)) {
				//$this->Flash->success(__('The product has been saved.'));
                $this->Session->setFlash(__('The product has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-warning text-center msg-margin'));
               // $this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete($id)) {
			//$this->Flash->success(__('The product has been deleted.'));
            $this->Session->setFlash(__('The product has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

        } else {
            $this->Session->setFlash(__('The product could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-warning text-center msg-margin'));

            //$this->Flash->error(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function admin_get_product(){
        $this->autoLayout = false;
        if ($this->request->is('post')) {
            $cat_id = $this->request->data['cat_id'];
            $model = $this->request->data['model_name'];
            $products = $this->Product->find('list', [
                'fields' => 'Product.name',
                'conditions' => ['Product.category_id' => $cat_id],
                'order' => 'Product.name ASC'
            ]);
            $this->set(compact('products','model'));
        }
    }
}
