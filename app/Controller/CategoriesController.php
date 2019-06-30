<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

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
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				//$this->Flash->success(__('The category has been saved.'));
                $this->Session->setFlash(__('The category model has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Flash->error(__('The category could not be saved. Please, try again.'));
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
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
//				$this->Flash->success(__('The category has been saved.'));
                $this->Session->setFlash(__('The category model has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				return $this->redirect(array('action' => 'index'));
			} else {
//				$this->Flash->error(__('The category could not be saved. Please, try again.'));
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
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
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete($id)) {
            $this->Session->setFlash(__('The category has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->success(__('The category has been deleted.'));
		} else {
			//$this->Flash->error(__('The category could not be deleted. Please, try again.'));
            $this->Session->setFlash(__('The category could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
