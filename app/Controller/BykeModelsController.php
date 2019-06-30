<?php
App::uses('AppController', 'Controller');
/**
 * BykeModels Controller
 *
 * @property BykeModel $BykeModel
 * @property PaginatorComponent $Paginator
 */
class BykeModelsController extends AppController {

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
        $conditions = array();
        if (!empty($this->request->data['keyword'])) {
            $keyword = $this->request->data['keyword'];
        } elseif (!empty($this->params['named']['keyword'])) {
            $keyword = $this->params['named']['keyword'];
        } elseif (!empty($this->params->query['keyword'])) {
            $keyword = $this->params->query['keyword'];
        }
        if (!empty($keyword)) {
            $conditions = am($conditions,
                ['BykeModel.name LIKE' => '%' . $keyword . '%']
            );
        }
        $brand = @$this->params->query['brand'];
        if(!empty($brand)) {
            $conditions = am(
                $conditions, ['BykeModel.brand_id' => $brand]
            );
        }
		$options = [
            'conditions' => $conditions,
        ];

        $this->Paginator->settings = $options;
        $bykeModels = $this->Paginator->paginate('BykeModel');

        $brands = $this->BykeModel->Brand->find('list');
        $this->set(compact('brands','bykeModels','brand', 'keyword'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BykeModel->exists($id)) {
			throw new NotFoundException(__('Invalid byke model'));
		}
		$options = array('conditions' => array('BykeModel.' . $this->BykeModel->primaryKey => $id));
		$this->set('bykeModel', $this->BykeModel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if(!empty($this->request->data['BykeModel']['image']['name'])) {
				$this->request->data['BykeModel']['image'] = $this->_upload($this->request->data['BykeModel']['image'], 'products_images/byke');
			} else {
				unset($this->request->data['BykeModel']['image']);
			}
			#pr($this->request->data);die;
			$this->BykeModel->create();
			if ($this->BykeModel->save($this->request->data)) {
                $this->Session->setFlash(__('The bike has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				//$this->Flash->success(__('The byke model has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The byke model could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Flash->error(__('The byke model could not be saved. Please, try again.'));
			}
		}
		$brands = $this->BykeModel->Brand->find('list');
		$this->set(compact('brands'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BykeModel->exists($id)) {
			throw new NotFoundException(__('Invalid byke model'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['BykeModel']['image']['name'])) {
				$this->request->data['BykeModel']['image'] = $this->_upload($this->request->data['BykeModel']['image'], 'products_images/byke');
			} else {
				unset($this->request->data['BykeModel']['image']);
			}
			if ($this->BykeModel->save($this->request->data)) {
                $this->Session->setFlash(__('The bike has been saved.'), 'default', array('class' => 'alert alert-success text-center msg-margin'));
				//$this->Flash->success(__('The byke model has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The byke model could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
				//$this->Flash->error(__('The byke model could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BykeModel.' . $this->BykeModel->primaryKey => $id));
			$this->request->data = $this->BykeModel->find('first', $options);
		}
		$brands = $this->BykeModel->Brand->find('list');
		$this->set(compact('brands'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->BykeModel->exists($id)) {
			throw new NotFoundException(__('Invalid byke model'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BykeModel->delete($id)) {
//			$this->Flash->success(__('The byke model has been deleted.'));
            $this->Session->setFlash(__('The byke model has been deleted.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
		} else {
            $this->Session->setFlash(__('The byke model could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger text-center msg-margin'));
			//$this->Flash->error(__('The byke model could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
