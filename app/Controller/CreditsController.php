<?php
App::uses('AppController', 'Controller');
/**
 * Credits Controller
 *
 * @property Credit $Credit
 * @property PaginatorComponent $Paginator
 */
class CreditsController extends AppController {

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
		$this->Credit->recursive = 0;
		$this->set('credits', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Credit->exists($id)) {
			throw new NotFoundException(__('Invalid credit'));
		}
		$options = array('conditions' => array('Credit.' . $this->Credit->primaryKey => $id));
		$this->set('credit', $this->Credit->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
            //die($this->request->data);
            //pr($this->request->data);die;
			$this->Credit->create();
			if ($this->Credit->save($this->request->data)) {
                $period_id = $this->plus_period($this->request->data['Credit']['amount']);
                $credit_id = $this->Credit->id;
                $data['Ledger'] = [
                    'period_id' => $period_id,
                    'credit_id' => $credit_id,
                    'credit' => $this->request->data['Credit']['amount']
                ];
                $this->Credit->Ledger->create();
                if ($this->Credit->Ledger->save($data)) {
                    $this->Session->setFlash(__('The credit has been saved.'), 'default', array('class' => 'alert alert-success text-center'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The credit could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center'));
                }


			} else {
				$this->Session->setFlash(__('The credit could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center'));
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
		if (!$this->Credit->exists($id)) {
			throw new NotFoundException(__('Invalid credit'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $query = [
                'conditions' => [
                    'Credit.id' => $id
                ],
                'fields' => [
                    'Credit.amount'
                ],
                'recursive' => -1
            ];
            $old_amount = $this->Credit->find('first',$query);
            if($this->edit($id,$this->request->data['Credit']['amount'],$old_amount['Credit']['amount'],'credit_id')){
                //pr($this->request->data);die;
                if ($this->Credit->save($this->request->data)) {
                    $this->Session->setFlash(__('The credit has been saved.'), 'default', array('class' => 'alert alert-success text-center'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The credit could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center'));
                }
            } else {
                $this->Session->setFlash(__('Something went worng.'), 'default', array('class' => 'alert alert-danger text-center'));
            }

		} else {
			$options = array('conditions' => array('Credit.' . $this->Credit->primaryKey => $id));
			$this->request->data = $this->Credit->find('first', $options);
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
		$this->Credit->id = $id;
		if (!$this->Credit->exists()) {
			throw new NotFoundException(__('Invalid credit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Credit->delete()) {
			$this->Session->setFlash(__('The credit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The credit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
