<?php
App::uses('AppController', 'Controller');
/**
 * Salaries Controller
 *
 * @property Salary $Salary
 * @property PaginatorComponent $Paginator
 */
class SalariesController extends AppController {

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
		$this->Salary->recursive = 0;
		$this->set('salaries', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Salary->exists($id)) {
			throw new NotFoundException(__('Invalid salary'));
		}
		$options = array('conditions' => array('Salary.' . $this->Salary->primaryKey => $id));
		$this->set('salary', $this->Salary->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
            $employee_id = $this->request->data['Salary']['employee_id'];
            $this->Salary->recursive = -1;

            $employee_name = $this->Salary->Employee->findById($employee_id);
            $this->request->data['Salary']['employee'] = $employee_name['Employee']['name'];
            //pr($this->request->data);die;
            $option = [
                'conditions' => [
                    'Salary.employee_id' => $employee_id,
                    'date(Salary.created) BETWEEN ? AND ?' => array(date('y-m-1'),date('y-m-t'))
                ],
                'recursive' => -1
            ];
            $exit = $this->Salary->find('all',$option);
            if(empty($exit)){

                //pr($employee_name);die;
                $this->Salary->create();
                if ($this->Salary->save($this->request->data)) {
                    $balance = $this->request->data['Salary']['salary']+$this->request->data['Salary']['bonus'];
                    $period_id = $this->plus_period('-'.$balance);
                    $data['Ledger'] = [
                        'period_id' => $period_id,
                        'salary_id' => $this->Salary->id,
                        'debit' => $balance
                    ];
                    $this->Salary->Ledger->create();
                    $this->Salary->Ledger->save($data);
                    $this->Session->setFlash(__('The salary has been saved.'), 'default', array('class' => 'alert alert-success text-center'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The salary could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center'));
                }
            } else {
                $this->Session->setFlash(__($employee_name['Employee']['name'].' already Paid this Month.'), 'default', array('class' => 'alert alert-danger text-center'));
            }

		}
		$employees = $this->Salary->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Salary->exists($id)) {
			throw new NotFoundException(__('Invalid salary'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $query = [
                'conditions' => [
                    'Salary.id' => $id
                ],
                'fields' => [
                    'Salary.salary',
                    'Salary.bonus'
                ],
                'recursive' => -1
            ];
            $old_amount_all = $this->Salary->find('first',$query);
            $old_amount = $old_amount_all['Salary']['salary']+$old_amount_all['Salary']['bonus'];
            $new_amount = $this->request->data['Salary']['salary'] + $this->request->data['Salary']['bonus'];
            if($this->edit($id,$new_amount,$old_amount,'salary_id')){
			if ($this->Salary->save($this->request->data)) {
				$this->Session->setFlash(__('The salary has been saved.'), 'default', array('class' => 'alert alert-success text-center'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salary could not be saved. Please, try again.'));
			}
            } else {
                $this->Session->setFlash(__('Something went worng.'), 'default', array('class' => 'alert alert-danger text-center'));
            }
		} else {
			$options = array('conditions' => array('Salary.' . $this->Salary->primaryKey => $id));
			$this->request->data = $this->Salary->find('first', $options);
		}
		$employees = $this->Salary->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Salary->id = $id;
		if (!$this->Salary->exists()) {
			throw new NotFoundException(__('Invalid salary'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Salary->delete()) {
			$this->Session->setFlash(__('The salary has been deleted.'));
		} else {
			$this->Session->setFlash(__('The salary could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    public function admin_logout()
    {
            $this->Auth->logout();
            $this->redirect('/admin');

    }
}
