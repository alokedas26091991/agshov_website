<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Filters Controller
 *
 * @property \App\Model\Table\FiltersTable $Filters
 */
class FiltersController extends AppController
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
		 	$this->set('placeholder',['Search by  Filter Name']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Filters.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => []
					];
				   
					$filters = $this->paginate($this->Filters->find()->where($search));

					$this->set(compact('filters'));
					$this->set('_serialize', ['filters']);
		}

        
        
        
        
        
        

    }

    /**
     * View method
     *
     * @param string|null $id Filter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filter = $this->Filters->get($id, [
            'contain' => ['FilterCategories', 'FilterOptions']
        ]);

        $this->set('filter', $filter);
        $this->set('_serialize', ['filter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filter = $this->Filters->newEmptyEntity();
        if ($this->request->is('post')) {
            $filter = $this->Filters->patchEntity($filter, $this->request->getData());
            
            
            
            if ($this->Filters->save($filter)) {
                $this->Flash->success(__('The filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('filter'));
        $this->set('_serialize', ['filter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Filter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filter = $this->Filters->get($id, [
            'contain' => []
        ]);
         $page= $this->request->getSession()->read('Filters.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filter = $this->Filters->patchEntity($filter, $this->request->getData());
            if ($this->Filters->save($filter)) {
                $this->Flash->success(__('The filter has been saved.'));

                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The filter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('filter'));
        $this->set('_serialize', ['filter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Filter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filter = $this->Filters->get($id);
        $page= $this->request->getSession()->read('Filters.page');
        if ($this->Filters->delete($filter)) {
            $this->Flash->success(__('The filter has been deleted.'));
        } else {
            $this->Flash->error(__('The filter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
    }
}
