<?php
App::uses('AppController', 'Controller');
/**
 * Expences Controller
 *
 * @property Expence $Expence
 * @property PaginatorComponent $Paginator
 */
class ExpencesController extends AppController {

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
		$this->Expence->recursive = 0;
		$this->set('expences', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Expence->exists($id)) {
			throw new NotFoundException(__('Invalid expence'));
		}
		$options = array('conditions' => array('Expence.' . $this->Expence->primaryKey => $id));
		$this->set('expence', $this->Expence->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Expence->create();
			if ($this->Expence->save($this->request->data)) {
                $period_id = $this->plus_period('-'.$this->request->data['Expence']['amount']);
                $expence_id = $this->Expence->id;
                $data['Ledger'] = [
                    'period_id' => $period_id,
                    'expence_id' => $expence_id,
                    'debit' => $this->request->data['Expence']['amount']
                ];
                $this->Expence->Ledger->create();
                if ($this->Expence->Ledger->save($data)) {
                    $this->Session->setFlash(__('The credit has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
                   // $this->Flash->success(__('The credit has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    //$this->Flash->success(__('The credit could not be saved. Please, try again.'));
                    $this->Session->setFlash(__('The credit could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
                }
			} else {
				$this->Flash->success(__('The expence could not be saved. Please, try again.'));
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
		if (!$this->Expence->exists($id)) {
			throw new NotFoundException(__('Invalid expence'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $query = [
                'conditions' => [
                    'Expence.id' => $id
                ],
                'fields' => [
                    'Expence.amount'
                ],
                'recursive' => -1
            ];
            $old_amount = $this->Expence->find('first',$query);
            if($this->edit($id,$this->request->data['Expence']['amount'],$old_amount['Expence']['amount'],'expence_id')){
			if ($this->Expence->save($this->request->data)) {
				$this->Session->setFlash(__('The expence has been saved.'), 'default', array('class' => 'alert alert-success text-center'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expence could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center'));
			}
            } else {
                $this->Session->setFlash(__('Something went worng.'), 'default', array('class' => 'alert alert-danger text-center'));
            }
		} else {
			$options = array('conditions' => array('Expence.' . $this->Expence->primaryKey => $id));
			$this->request->data = $this->Expence->find('first', $options);
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
		$this->Expence->id = $id;
		if (!$this->Expence->exists()) {
			throw new NotFoundException(__('Invalid expence'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Expence->delete()) {
            $this->Session->setFlash(__('The credit has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Session->setFlash(__('The expence has been deleted.'));
		} else {
            $this->Session->setFlash(__('The expence could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Session->setFlash(__('The expence could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
