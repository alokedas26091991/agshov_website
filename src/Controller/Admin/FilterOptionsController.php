<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * FilterOptions Controller
 *
 * @property \App\Model\Table\FilterOptionsTable $FilterOptions
 */
class FilterOptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
           if(isset($this->request->query['page'])){
            $this->request->getSession()->write('Products.page',$this->request->query['page']);
        }else{
            
            $this->request->getSession()->write('Products.page',0);
        }
        
        		$search=[];
		 	$this->set('placeholder',['Search by  Filter Name , FIlter Option']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Filters.name LIKE' => "%$keyword%",'FilterOptions.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => ['Filters']
					];
				   
					$filterOptions = $this->paginate($this->FilterOptions->find()->where($search));

					$this->set(compact('filterOptions'));
					$this->set('_serialize', ['filterOptions']);
		}

    
    }

    /**
     * View method
     *
     * @param string|null $id Filter Option id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filterOption = $this->FilterOptions->get($id, [
            'contain' => ['Filters', 'ProductFilterOptionValues']
        ]);

        $this->set('filterOption', $filterOption);
        $this->set('_serialize', ['filterOption']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filterOption = $this->FilterOptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $filterOption = $this->FilterOptions->patchEntity($filterOption, $this->request->getData());
            if ($this->FilterOptions->save($filterOption)) {
                $this->Flash->success(__('The filter option has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filter option could not be saved. Please, try again.'));
            }
        }
        $filters = $this->FilterOptions->Filters->find('list', [
            'keyField' => 'id',
            'valueField' => 'caption'
        ]);
        $this->set(compact('filterOption', 'filters'));
        $this->set('_serialize', ['filterOption']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Filter Option id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filterOption = $this->FilterOptions->get($id, [
            'contain' => []
        ]);
        $page= $this->request->getSession()->read('FilterOptions.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filterOption = $this->FilterOptions->patchEntity($filterOption, $this->request->getData());
            if ($this->FilterOptions->save($filterOption)) {
                $this->Flash->success(__('The filter option has been saved.'));

                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The filter option could not be saved. Please, try again.'));
            }
        }
        $filters = $this->FilterOptions->Filters->find('list', [
            'keyField' => 'id',
            'valueField' => 'caption'
        ]);
        $this->set(compact('filterOption', 'filters'));
        $this->set('_serialize', ['filterOption']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Filter Option id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filterOption = $this->FilterOptions->get($id);
        $page= $this->request->getSession()->read('FilterOptions.page');
        if ($this->FilterOptions->delete($filterOption)) {
            $this->Flash->success(__('The filter option has been deleted.'));
        } else {
            $this->Flash->error(__('The filter option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
    }
}
