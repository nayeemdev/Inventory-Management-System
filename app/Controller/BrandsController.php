<?php
App::uses('AppController', 'Controller');
/**
 * Brands Controller
 *
 * @property Brand $Brand
 * @property Flash $Flash
 * @property PaginatorComponent $Paginator
 */
class BrandsController extends AppController {

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
		$this->Brand->recursive = 0;
		$this->set('brands', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
		$this->set('brand', $this->Brand->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {
				//$this->Flash->success(__('The brand has been saved.'),'default',['class' => 'alert alert-primary']);
                $this->Session->setFlash(__('The brand has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The brand could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

               // $this->Flash->error(__('The brand could not be saved. Please, try again.'));
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
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Brand->save($this->request->data)) {
                $this->Session->setFlash(__('The brand has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
               // $this->Flash->success(__('The brand has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The brand could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
                //$this->Flash->error(__('The brand could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
			$this->request->data = $this->Brand->find('first', $options);
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
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Brand->delete($id)) {
            $this->Session->setFlash(__('The brand has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
            //$this->Flash->success(__('The brand has been deleted.'));
		} else {
            $this->Session->setFlash(__('The brand could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

           // $this->Flash->error(__('The brand could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
