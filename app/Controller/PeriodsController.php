<?php
App::uses('AppController', 'Controller');
/**
 * Periods Controller
 *
 * @property Period $Period
 * @property PaginatorComponent $Paginator
 */
class PeriodsController extends AppController {

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
		$this->Period->recursive = 0;
		$this->set('periods', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('Invalid period'));
		}
		$options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
		$this->set('period', $this->Period->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Period->create();
			if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('The period has been saved.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
               // $this->Session->setFlash(__('The period has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The period could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Session->setFlash(__('The period could not be saved. Please, try again.'));
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
		if (!$this->Period->exists($id)) {
			throw new NotFoundException(__('Invalid period'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('The period has been saved.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The period could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

			}
		} else {
			$options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
			$this->request->data = $this->Period->find('first', $options);
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
		$this->Period->id = $id;
		if (!$this->Period->exists()) {
			throw new NotFoundException(__('Invalid period'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Period->delete()) {
			//$this->Session->setFlash(__('The period has been deleted.'));
            $this->Session->setFlash(__('The period has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

        } else {
            $this->Session->setFlash(__('The period could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));

            //$this->Session->setFlash(__('The period could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    public function test(){
        pr($this->plus_period('100'));die;
    }
}
