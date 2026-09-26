<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 */
class TypesController extends AppController
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
		 	$this->set('placeholder',['Search by  Name , Category , Sub Category']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Types.name LIKE' => "%$keyword%",'Categories.name LIKE' => "%$keyword%",'SubCategories.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
        $this->paginate = [
            'contain' => ['Categories', 'SubCategories']
        ];
        $types = $this->paginate($this->Types->find()->where($search));

        $this->set(compact('types'));
        $this->set('_serialize', ['types']);
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function seodata($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type1 = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type1)) {
                $this->Flash->success(__('The SEO Content has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The SEO Data could not be saved. Please, try again.'));
            }
        }
        

        $this->set(compact('type'));
        $this->set('_serialize', ['type']);
    }
     
    public function view($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => ['Categories', 'SearchUserDetails', 'Users']
        ]);

        $this->set('type', $type);
        $this->set('_serialize', ['type']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->Types->newEmptyEntity();
        if ($this->request->is('post')) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type could not be saved. Please, try again.'));
            }
        }

        

        $categories = $this->Types->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'])
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
                         
                        
                     
        $this->set(compact('categories','type'));
        $this->set('_serialize',['categories']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => []
        ]);
        $page= $this->request->getSession()->read('Types.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The type could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Types->Categories->find('list', ['limit' => 20000]);
        $this->set(compact('type', 'categories'));
        
        $subcategories = $this->Types->SubCategories->find('list', ['limit' => 20000]);
        $categories = $this->Types->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'])
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
        $this->set(compact('type', 'subcategories','categories'));
        $this->set('_serialize', ['type'],['categories']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       
    
        $page= $this->request->getSession()->read('Types.page');
        $this->request->allowMethod(['post', 'delete']);
        $category1 = $this->Types->get($id);
        $category_id=$id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Types->patchEntity($category1, $this->request->getData());
            if($category1->is_active==1)
            {
                $category->is_active=0;
            }
            else
            {
                $category->is_active=1;
            }
             if ($this->Types->save($category)) {
			 $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
             $Products = TableRegistry::getTableLocator()->get('Products');	                 
             $updateall=$Products->updateAll(
        ['is_active ' => $category->is_active ],
        ['type_id IN' => $id]
         ); 
        $p=$Products->find('all')->Where(['type_id'=>$id]);
        foreach($p as $product_id)
        {
            
            

            $query = $UserProducts->query();
            $result = $query->update()
                    ->set(['is_active' => $category->is_active])
                    ->where(['product_id' => $product_id->id])
                    ->execute();
        }
        
        
                 
			 $this->Flash->success(__('The Type has been Deactivated.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The type could not be Deactivated. Please, try again.'));
			}
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
        
        
    }
}
