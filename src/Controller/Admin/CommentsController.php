<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\Routing\Router;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CommentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
        		$search=[];
		 	$this->set('placeholder',['Search by Post Name or User Name']);
				 $search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Posts.title LIKE' => "%$keyword%",'Comments.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => ['Posts']
					];
				   
					$comment = $this->paginate($this->Comments->find()->where($search));

					$this->set(compact('comment'));
					$this->set('_serialize', ['comment']);
		}

        
        
        

    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function seodata($id = null)
    {
        $category = $this->Comments->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Comments->patchEntity($category, $this->request->getData());
            if ($this->Comments->save($category)) {
                $this->Flash->success(__('The SEO Content has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The SEO Data could not be saved. Please, try again.'));
            }
        }
        

        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }
    public function view($id = null)
    {
        $category = $this->Comments->get($id, [
            'contain' => ['SearchUserDetails', 'SubCategories', 'Types', 'Users']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Comments->newEmptyEntity();
        if ($this->request->is('post')) {
            
           
			 
		
			 $category->name=$this->request->getData('name');
			
			 
			 
            if ($this->Comments->save($category)) {
                $this->Flash->success(__('The Comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Comment could not be saved. Please, try again.'));
            }
        
    }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Comments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            
            //$category = $this->Categories->patchEntity($category, $this->request->getData());
			
			$category->admin_reply=$this->request->getData('admin_reply');
		
			$category->admin_reply_date=date('Y-m-d');
	       $category->status=$this->request->getData('status');
          
			
			 
			
			
			 if ($this->Comments->save($category)) {
                $this->Flash->success(__('The Comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Comment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }
    
    

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
         $page= $this->request->getSession()->read('Comments.page');
        $this->request->allowMethod(['post', 'delete']);
        $category1 = $this->Comments->get($id);
        $category_id=$id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Comments->patchEntity($category1, $this->request->getData());
            if($category1->is_active==1)
            {
                $category->is_active=0;
            }
            else
            {
                $category->is_active=1;
            }
             if ($this->Comments->save($category)) {
			
        
        
                 
			 $this->Flash->success(__('The Comment has been Deactivated.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The Comment could not be Deactivated. Please, try again.'));
			}
        }

       return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
    }
    
    
}
