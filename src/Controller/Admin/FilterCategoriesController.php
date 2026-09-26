<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * FilterCategories Controller
 *
 * @property \App\Model\Table\FilterCategoriesTable $FilterCategories
 */
class FilterCategoriesController extends AppController
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
		 	$this->set('placeholder',['Search by  Filter , Category , Sub Category']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Filters.name LIKE' => "%$keyword%",'Categories.name LIKE' => "%$keyword%",'SubCategories.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => ['Filters', 'Categories', 'SubCategories']
					];
				   
					$filterCategories = $this->paginate($this->FilterCategories->find()->where($search));

					$this->set(compact('filterCategories'));
					$this->set('_serialize', ['filterCategories']);
		}

        

    }

    /**
     * View method
     *
     * @param string|null $id Filter Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filterCategory = $this->FilterCategories->get($id, [
            'contain' => ['Filters', 'Categories','SubCategories']
        ]);

        $this->set('filterCategory', $filterCategory);
        $this->set('_serialize', ['filterCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filterCategory = $this->FilterCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $filterCategory = $this->FilterCategories->patchEntity($filterCategory, $this->request->getData());
            //pr($filterCategory);
           // die;
            if ($this->FilterCategories->save($filterCategory)) {
                $this->Flash->success(__('The filter category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filter category could not be saved. Please, try again.'));
            }
        }
        $filters = $this->FilterCategories->Filters->find('list', [
            'keyField' => 'id',
            'valueField' => 'caption'
        ]);
       $categories = $this->FilterCategories->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'])
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
        
          
        $this->set(compact('filterCategory', 'filters', 'categories'));
        $this->set('_serialize', ['filterCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Filter Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filterCategory = $this->FilterCategories->get($id, [
            'contain' => []
        ]);
        $page= $this->request->getSession()->read('FilterCategories.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filterCategory = $this->FilterCategories->patchEntity($filterCategory, $this->request->getdata());
            if ($this->FilterCategories->save($filterCategory)) {
                $this->Flash->success(__('The filter category has been saved.'));

                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The filter category could not be saved. Please, try again.'));
            }
        }
        $filters = $this->FilterCategories->Filters->find('list', [
            'keyField' => 'id',
            'valueField' => 'caption'
        ]);
       $categories = $this->FilterCategories->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'])
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
        $this->set(compact('filterCategory', 'filters', 'categories'));
        $this->set('_serialize', ['filterCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Filter Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filterCategory = $this->FilterCategories->get($id);
         $page= $this->request->getSession()->read('FilterCategories.page');
        if ($this->FilterCategories->delete($filterCategory)) {
            $this->Flash->success(__('The filter category has been deleted.'));
        } else {
            $this->Flash->error(__('The filter category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
    }
}
