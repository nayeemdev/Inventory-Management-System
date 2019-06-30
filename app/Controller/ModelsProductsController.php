<?php
App::uses('AppController', 'Controller');
/**
 * ModelsProducts Controller
 *
 * @property ModelsProduct $ModelsProduct
 * @property PaginatorComponent $Paginator
 */
class ModelsProductsController extends AppController {

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
		$this->ModelsProduct->recursive = 0;
		$this->set('modelsProducts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ModelsProduct->exists($id)) {
			throw new NotFoundException(__('Invalid models product'));
		}
		$options = array('conditions' => array('ModelsProduct.' . $this->ModelsProduct->primaryKey => $id));
		$this->set('modelsProduct', $this->ModelsProduct->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ModelsProduct->create();
			if ($this->ModelsProduct->save($this->request->data)) {
//				$this->Flash->success(__('The models product has been saved.'));
                $this->Session->setFlash(__('The models product has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Flash->error(__('The models product could not be saved. Please, try again.'));
                $this->Session->setFlash(__('The models product could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			}
		}
		$products = $this->ModelsProduct->Product->find('list');
		$bykeModels = $this->ModelsProduct->BykeModel->find('list');
		$this->set(compact('products', 'bykeModels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ModelsProduct->exists($id)) {
			throw new NotFoundException(__('Invalid models product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ModelsProduct->save($this->request->data)) {
                $this->Session->setFlash(__('The models product has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
//				$this->Flash->success(__('The models product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The models product could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Flash->error(__('The models product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ModelsProduct.' . $this->ModelsProduct->primaryKey => $id));
			$this->request->data = $this->ModelsProduct->find('first', $options);
		}
		$products = $this->ModelsProduct->Product->find('list');
		$bykeModels = $this->ModelsProduct->BykeModel->find('list');
		$this->set(compact('products', 'bykeModels'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->ModelsProduct->exists($id)) {
			throw new NotFoundException(__('Invalid models product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ModelsProduct->delete($id)) {
            $this->Session->setFlash(__('The models product has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->success(__('The models product has been deleted.'));
		} else {
            $this->Session->setFlash(__('The models product could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->error(__('The models product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
