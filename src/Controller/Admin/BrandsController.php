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
class BrandsController extends AppController
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
		 	$this->set('placeholder',['Search by Brand Name']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Brands.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => []
					];
				   
					$brands = $this->paginate($this->Brands->find()->where($search));

					$this->set(compact('brands'));
					$this->set('_serialize', ['brands']);
		}

        
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
        $brand = $this->Brands->newEmptyEntity();
        if ($this->request->is('post')) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
			
			
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The Brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Brand could not be saved. Please, try again.'));
            }
        }
                
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
        $brand = $this->Brands->get($id, [
            'contain' => []
        ]);
        $page= $this->request->getSession()->read('Brands.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The Brand has been saved.'));

                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The Brand could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('brand'));
        $this->set('_serialize', ['brand']);
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

       
       
       $page= $this->request->getSession()->read('Brands.page');
        $this->request->allowMethod(['post', 'delete']);
        $category1 = $this->Brands->get($id);
        $category_id=$id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Brands->patchEntity($category1, $this->request->getData());
            if($category1->is_active==1)
            {
                $category->is_active=0;
            }
            else
            {
                $category->is_active=1;
            }
             if ($this->Brands->save($category)) {
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
        
        
                 
			 $this->Flash->success(__('The Brands has been Deactivated.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The Brands could not be Deactivated. Please, try again.'));
			}
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
        
    }
}
