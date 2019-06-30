<?php
App::uses('AppController', 'Controller');
/**
 * Ledgers Controller
 *
 * @property Ledger $Ledger
 * @property PaginatorComponent $Paginator
 */
class LedgersController extends AppController {

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
        if (!empty($this->request->data['start'])) {
            $start = $this->request->data['start'];
            $end = $this->request->data['end'];
        } elseif (!empty($this->params['named']['start'])) {
            $start = $this->params['named']['start'];
            $end = $this->params['named']['end'];
        } elseif (!empty($this->params->query['start'])) {
            $start = $this->params->query['start'];
            $end = $this->params->query['end'];
        }
        if (!empty($start)&&!empty($end)) {
            $s = date('y-m-d',strtotime($start));
            $e = date('y-m-t',strtotime($end));
        } else {
            $s = date('y-m-1');
            $e = date('y-m-t');
        }

        $date = date('y-m-t');
        //pr($date);die;
        $options = [
            'conditions' => [
                'date(Period.created) BETWEEN ? AND ?' => array($s,$e)
            ]
        ];
        $ledgers = $this->Ledger->Period->find('all',$options);
        //pr($ledgers);die;
        $this->set(compact('ledgers'));
	}

    public function admin_cash_book(){
        if (!empty($this->request->data['start'])) {
            $start = $this->request->data['start'];
            $end = $this->request->data['end'];
        } elseif (!empty($this->params['named']['start'])) {
            $start = $this->params['named']['start'];
            $end = $this->params['named']['end'];
        } elseif (!empty($this->params->query['start'])) {
            $start = $this->params->query['start'];
            $end = $this->params->query['end'];
        }
        if (!empty($start)&&!empty($end)) {
            $s = date('Y-m-d',strtotime($start));
            $e = date('Y-m-t',strtotime($end));
        } else {
            $s = date('Y-m-1');
            $e = date('Y-m-t');
        }
        //pr($date);die;
        $options = [
            'conditions' => [
                'date(Cashbook.created) BETWEEN ? AND ?' => array($s,$e)
            ],
            /*'group' => [
                'Ledger.created'
            ]*/
        ];
        $this->loadModel('Cashbook');
        $ledgers = $this->Cashbook->find('all',$options);
        //pr($ledgers);die;
        $this->set(compact('ledgers'));
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Ledger->exists($id)) {
			throw new NotFoundException(__('Invalid ledger'));
		}
		$options = array('conditions' => array('Ledger.' . $this->Ledger->primaryKey => $id));
		$this->set('ledger', $this->Ledger->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ledger->create();
			if ($this->Ledger->save($this->request->data)) {
				$this->Session->setFlash(__('The ledger has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ledger could not be saved. Please, try again.'));
			}
		}
		$credits = $this->Ledger->Credit->find('list');
		$salaries = $this->Ledger->Salary->find('list');
		$expences = $this->Ledger->Expence->find('list');
		$this->set(compact('credits', 'salaries', 'expences'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Ledger->exists($id)) {
			throw new NotFoundException(__('Invalid ledger'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ledger->save($this->request->data)) {
				$this->Session->setFlash(__('The ledger has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ledger could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ledger.' . $this->Ledger->primaryKey => $id));
			$this->request->data = $this->Ledger->find('first', $options);
		}
		$credits = $this->Ledger->Credit->find('list');
		$salaries = $this->Ledger->Salary->find('list');
		$expences = $this->Ledger->Expence->find('list');
		$this->set(compact('credits', 'salaries', 'expences'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Ledger->id = $id;
		if (!$this->Ledger->exists()) {
			throw new NotFoundException(__('Invalid ledger'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ledger->delete()) {
			$this->Session->setFlash(__('The ledger has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ledger could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
