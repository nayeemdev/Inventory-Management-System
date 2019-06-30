<?php
App::uses('AppController', 'Controller');
/**
 * Branches Controller
 *
 * @property Branch $Branch
 * @property PaginatorComponent $Paginator
 */
class BranchesController extends AppController {

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
		$this->Branch->recursive = 0;
		$this->set('branches', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Branch->exists($id)) {
			throw new NotFoundException(__('Invalid branch'));
		}
		$options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
		$this->set('branch', $this->Branch->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Branch->create();
			if ($this->Branch->save($this->request->data)) {
				//$this->Flash->success(__('The branch has been saved.'));
                $this->Session->setFlash(__('The branch has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));

                return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The branch could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

                //$this->Flash->error(__('The branch could not be saved. Please, try again.'));
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
		if (!$this->Branch->exists($id)) {
			throw new NotFoundException(__('Invalid branch'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Branch->save($this->request->data)) {
				//$this->Flash->success(__('The branch has been saved.'));
                $this->Session->setFlash(__('The branch has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The branch could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
                //$this->Flash->error(__('The branch could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
			$this->request->data = $this->Branch->find('first', $options);
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
		if (!$this->Branch->exists($id)) {
			throw new NotFoundException(__('Invalid branch'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Branch->delete($id)) {
            $this->Session->setFlash(__('The branch has been deleted.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
           // $this->Flash->success(__('The branch has been deleted.'));
		} else {
            $this->Session->setFlash(__('The branch could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

            //$this->Flash->error(__('The branch could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
