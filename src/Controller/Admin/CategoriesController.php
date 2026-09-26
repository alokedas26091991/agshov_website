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
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
        		$search=[];
		 	$this->set('placeholder',['Search by  Category Name']);
				 $search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Categories.name LIKE' => "%$keyword%",'Categories.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => []
					];
				   
					$categories = $this->paginate($this->Categories->find()->where($search));

					$this->set(compact('categories'));
					$this->set('_serialize', ['categories']);
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
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
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
        $category = $this->Categories->get($id, [
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
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            
            //$category = $this->Categories->patchEntity($category, $this->request->getData());
			$path = 'upload/headerimages/';
			if($_FILES['header_image']['name']){
					    $file_tmpname = $_FILES['header_image']['tmp_name'];
                        $file_name = $_FILES['header_image']['name'];
                    
                          
                            if(!empty($file_name)) {
                        $fileName = time().$file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
        
                        if(move_uploaded_file($file_tmpname, $uploadFile)) {
                           
                            $category->header_image = $fileName;
                            
                        }
							}
				 
			 }
			 $category->is_menu=$this->request->getData('is_menu');
			 $category->name=$this->request->getData('name');
			  $category->is_active=$this->request->getData('is_active');
			 $category->menu_order=$this->request->getData('menu_order');
			 
			 
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        
    }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }
    public function currency_rate()
    {
        $currency = TableRegistry::get('CurrencyRates');
        $currency1 = $currency->newEntity();
        if ($this->request->is('post')) {
            $category2 = $currency->patchEntity($currency1, $this->request->data);
			$category2->created_at=date('Y-m-d');
			$category2->updated_at=date('Y-m-d');
            if ($currency->save($category2)) {
                $this->Flash->success(__('The currency rate has been saved.'));

                return $this->redirect(['action' => 'currency_list']);
            } else {
                $this->Flash->error(__('The currency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('currency'));
        $this->set('_serialize', ['currency']);
    }
    public function currency_list()
    {
        
        		$currency = TableRegistry::get('CurrencyRates');
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => []
					];
				   
					$currency = $this->paginate($currency->find());

					$this->set(compact('currency'));
					$this->set('_serialize', ['currency']);
		}

        
        
        

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
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            
            //$category = $this->Categories->patchEntity($category, $this->request->getData());
			
			$category->name=$this->request->getData('name');
			$category->is_active=$this->request->getData('is_active');
	    	$category->is_menu=$this->request->getData('is_menu');
			$category->menu_order=$this->request->getData('menu_order');
          
			$path = 'upload/headerimages/';
			if($_FILES['header_image']['name']){
					    $file_tmpname = $_FILES['header_image']['tmp_name'];
                        $file_name = $_FILES['header_image']['name'];
                    
                          
                            if(!empty($file_name)) {
                        $fileName = time().$file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
        
                        if(move_uploaded_file($file_tmpname, $uploadFile)) {
                           
                            $category->header_image = $fileName;
                            
                        }
						else{
							
							$category->header_image = $category->header_image;
                            
						}
							}
				 
			 }
			 
			$category->name=$this->request->getData('name');
			$category->is_active=$this->request->getData('is_active');
	    	$category->is_menu=$this->request->getData('is_menu');
			$category->menu_order=$this->request->getData('menu_order');
			
			 if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }
    
    public function edit_currency($id = null)
    {
        $currency = TableRegistry::get('CurrencyRates');
        $currency1 = $currency->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currency1 = $currency->patchEntity($currency1, $this->request->data);
			
		
							 
				             if ($currency->save($currency1)) {
				                 
				                 
                        				                 
				                 
							 $this->Flash->success(__('The currency has been saved.'));

								return $this->redirect(['action' => 'currency_list']);
							} else {
								$this->Flash->error(__('The currency could not be saved. Please, try again.'));
							}
			 
			

        }
        $this->set(compact('currency1'));
        $this->set('_serialize', ['currency1']);
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
         $page= $this->request->getSession()->read('Categories.page');
        $this->request->allowMethod(['post', 'delete']);
        $category1 = $this->Categories->get($id);
        $category_id=$id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category1, $this->request->getData());
            if($category1->is_active==1)
            {
                $category->is_active=0;
            }
            else
            {
                $category->is_active=1;
            }
             if ($this->Categories->save($category)) {
			 $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
             $Products = TableRegistry::getTableLocator()->get('Products');	                 
             $updateall=$Products->updateAll(
        ['is_active ' => $category->is_active ],
        ['category_id IN' => $id]
         ); 
        $p=$Products->find('all')->Where(['category_id'=>$id]);
        foreach($p as $product_id)
        {
            
            

            $query = $UserProducts->query();
            $result = $query->update()
                    ->set(['is_active' => $category->is_active])
                    ->where(['product_id' => $product_id->id])
                    ->execute();
        }
        
        
                 
			 $this->Flash->success(__('The category has been Deactivated.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The category could not be Deactivated. Please, try again.'));
			}
        }

       return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
    }
    
    public function delete_currency($id = null)
    {
        $currency = TableRegistry::get('CurrencyRates');
        $this->request->allowMethod(['post', 'delete']);
        $city = $currency->get($id);
        if ($currency->delete($city)) {
            $this->Flash->success(__('The currency has been deleted.'));
        } else {
            $this->Flash->error(__('The currency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'currency_list']);
    }
}
