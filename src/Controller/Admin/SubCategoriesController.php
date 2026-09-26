<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\Routing\Router;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
/**
 * SubCategories Controller
 *
 * @property \App\Model\Table\SubCategoriesTable $SubCategories
 */
class SubCategoriesController extends AppController
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
		 	$this->set('placeholder',['Search by  Category Name , Sub Category Name']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Categories.name LIKE' => "%$keyword%",'SubCategories.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => ['Categories']
					];
				   
					$subCategories = $this->paginate($this->SubCategories->find()->where($search));

					$this->set(compact('subCategories'));
					$this->set('_serialize', ['subCategories']);
		}

        
    }

    /**
     * View method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subCategory = $this->SubCategories->get($id, [
            'contain' => ['Categories', 'SearchUserDetails', 'Users']
        ]);

        $this->set('subCategory', $subCategory);
        $this->set('_serialize', ['subCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
     
    public function seodata($id = null)
    {
        $category = $this->SubCategories->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->SubCategories->patchEntity($category, $this->request->getData());
            if ($this->SubCategories->save($category)) {
                $this->Flash->success(__('The SEO Content has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The SEO Data could not be saved. Please, try again.'));
            }
        }
        

        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }
     
    public function add()
    {
        //echo $this->request->getData('image11');die;
        $subCategory = $this->SubCategories->newEmptyEntity();
        if ($this->request->is('post')) {

            $subCategory = $this->SubCategories->patchEntity($subCategory, $this->request->getData());
            if($_FILES['image11']['name']!=''){
					$this->loadComponent('UploadImage');
					$subCategory->image=$this->UploadImage->do_upload_image('headerimages',$_FILES['image11'],'headerimages','ll');
				 
			 }
             //$subCategory->is_active=$this->request->getData('is_active');
            if ($this->SubCategories->save($subCategory)) {
                $this->Flash->success(__('The sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sub category could not be saved. Please, try again.'));
            }
        }
        $categories = $this->SubCategories->Categories->find('list', ['limit' => 2000]);
          //pr($categories);;die;
        $this->set(compact('subCategory', 'categories'));
        $this->set('_serialize', ['subCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subCategory = $this->SubCategories->get($id, [
            'contain' => []
        ]);
        $page= $this->request->getSession()->read('SubCategories.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subCategory = $this->SubCategories->patchEntity($subCategory, $this->request->getData());
            //$subCategory->is_active=$this->request->getData('is_active');
            if($_FILES['image11']['name']!=''){
                	$headerimg=$this->SubCategories->find()->where(['id' => $id])->first();
					$subCategory->image=$headerimg->image;
					unlink("upload/headerimages/".$headerimg->image);
					$this->loadComponent('UploadImage');
                    
					$subCategory->image=$this->UploadImage->do_upload_image('headerimages',$_FILES['image11'],'headerimages','ll');
					if ($this->SubCategories->save($subCategory)) {
                                $this->Flash->success(__('The sub category has been saved.'));
                
                                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
                            } else {
                                $this->Flash->error(__('The sub category could not be saved. Please, try again.'));
                            }
                
            }
            else
            {
                            if ($this->SubCategories->save($subCategory)) {
                                $this->Flash->success(__('The sub category has been saved.'));
                
                                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
                            } else {
                                $this->Flash->error(__('The sub category could not be saved. Please, try again.'));
                            }
            }

        }
        $categories = $this->SubCategories->Categories->find('list', ['limit' => 20000]);
        $this->set(compact('subCategory', 'categories'));
        $this->set('_serialize', ['subCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

         $page= $this->request->getSession()->read('SubCategories.page');
        $this->request->allowMethod(['post', 'delete']);
        $category1 = $this->SubCategories->get($id);
        $category_id=$id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->SubCategories->patchEntity($category1, $this->request->getData());
            if($category1->is_active==1)
            {
                $category->is_active=0;
            }
            else
            {
                $category->is_active=1;
            }
             if ($this->SubCategories->save($category)) {
			 $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
             $Products = TableRegistry::getTableLocator()->get('Products');	                 
             $updateall=$Products->updateAll(
        ['is_active ' => $category->is_active ],
        ['sub_category_id IN' => $id]
         ); 
        $p=$Products->find('all')->Where(['sub_category_id'=>$id]);
        foreach($p as $product_id)
        {
            
            

            $query = $UserProducts->query();
            $result = $query->update()
                    ->set(['is_active' => $category->is_active])
                    ->where(['product_id' => $product_id->id])
                    ->execute();
        }
        
        
                 
			 $this->Flash->success(__('The Sub category has been Deactivated.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The Sub category could not be Deactivated. Please, try again.'));
			}
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
        
        
    }
}
