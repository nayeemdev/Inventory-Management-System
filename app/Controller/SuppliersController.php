<?php
App::uses('AppController', 'Controller');
/**
 * Suppliers Controller
 *
 * @property Supplier $Supplier
 * @property PaginatorComponent $Paginator
 */
class SuppliersController extends AppController {

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
		$this->Supplier->recursive = 0;
		$this->set('suppliers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Supplier->exists($id)) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		$options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
		$this->set('supplier', $this->Supplier->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if(!empty($this->request->data['Supplier']['image']['name'])) {
				$this->request->data['Supplier']['image'] = $this->_upload($this->request->data['Supplier']['image'],'products_images/supplier');
			} else {
				unset($this->request->data['Supplier']['image']);
			}
			$this->Supplier->create();
			if ($this->Supplier->save($this->request->data)) {
                $this->Session->setFlash(__('The supplier has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				//$this->Flash->success(__('The supplier has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The supplier could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Flash->error(__('The supplier could not be saved. Please, try again.'));
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
		if (!$this->Supplier->exists($id)) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['Supplier']['image']['name'])) {
				$this->request->data['Supplier']['image'] = $this->_upload($this->request->data['Supplier']['image'],'products_images/supplier');
			} else {
				unset($this->request->data['Supplier']['image']);
			}
			if ($this->Supplier->save($this->request->data)) {
//				$this->Flash->success(__('The supplier has been saved.'));
                $this->Session->setFlash(__('The supplier has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The supplier could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Flash->error(__('The supplier could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
			$this->request->data = $this->Supplier->find('first', $options);
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
		if (!$this->Supplier->exists($id)) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Supplier->delete($id)) {
            $this->Session->setFlash(__('The supplier has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->success(__('The supplier has been deleted.'));
		} else {
            $this->Session->setFlash(__('The supplier could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
