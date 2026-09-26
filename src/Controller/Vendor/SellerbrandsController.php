<?php
namespace App\Controller\Seller;
use Cake\Routing\Router;
use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 */
class SellerbrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'SubCategories', 'Types', 'Users', 'Brands']
        ];
        //$sellerbrands = $this->paginate($this->Sellerbrands->find()->where(['user_id' => $this->Auth->user('id')]));
        $sellerbrands = $this->paginate($this->Sellerbrands);
        $this->set(compact('sellerbrands'));
        $this->set('_serialize', ['sellerbrands']);
    }
	 public function documents($id){
			  		$brands=$this->Sellerbrands->find("all")->where(['id' => $id])->first();
					$this->set('brands', $brands);
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
        $sellerbrand = $this->Sellerbrands->newEntity();
        if ($this->request->is('post')) {
            $sellerbrand = $this->Sellerbrands->patchEntity($sellerbrand, $this->request->data);
			$sellerbrand->user_id=$this->Auth->user('id');
			$sellerbrand->request_date=date('Y-m-d');
			if($sellerbrand->is_new_brand==false)
			{
				            if ($this->Sellerbrands->save($sellerbrand)) {
								$this->Flash->success(__('The Brand has been saved.'));

								return $this->redirect(['action' => 'index']);
							} else {
								$this->Flash->error(__('The Brand could not be saved. Please, try again.'));
							}
			}
			else
			{
						if($_FILES['brand_logo']['name']!=''){
								$this->loadComponent('UploadImage');
								$sellerbrand->brand_logo=$this->UploadImage->do_upload_image('brandlogo',$_FILES['brand_logo'],'brandlogo','ll');
							 
						 }
						 if($_FILES['upload_doc']['name']!=''){
								$this->loadComponent('UploadImage');
								$sellerbrand->upload_doc=$this->UploadImage->do_upload_image('uploaddoc',$_FILES['upload_doc'],'uploaddoc','ll');
							 
						 }
							if ($this->Sellerbrands->save($sellerbrand)) {
								$this->Flash->success(__('The Brand has been saved.'));

								return $this->redirect(['action' => 'index']);
							} else {
								$this->Flash->error(__('The Brand could not be saved. Please, try again.'));
							}
			}
           
        }
        $categories = $this->Sellerbrands->Categories->find('list', ['limit' => 200]);
        $this->set(compact('sellerbrand', 'categories'));
        $this->set('_serialize', ['sellerbrand']);
        
        $SubCategories = $this->Sellerbrands->Subcategories->find('list', ['limit' => 200]);
        $this->set(compact('type1', 'SubCategories'));
        $this->set('_serialize', ['type1']);
		
		$Types = $this->Sellerbrands->Types->find('list', ['limit' => 200]);
        $this->set(compact('type2', 'Types'));
        $this->set('_serialize', ['type2']);
		
		$Brands = $this->Sellerbrands->Brands->find('list', ['limit' => 200]);
        $this->set(compact('type3', 'Brands'));
        $this->set('_serialize', ['type3']);
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
		$sellerbrands=$this->Sellerbrands->find("all")->where(['id' => $id])->first();
		$this->set('sellerbrands', $sellerbrands);
		$sellerbrands->is_approved="1";
		$sellerbrands->is_active="1";
		
		$sellerbrands->approval_date=date('Y-m-d');
		
		if($sellerbrands->is_new_brand==1)
		{
					$tblUserObj1 = TableRegistry::get('Brands');
					$user1 =$tblUserObj1->newEntity();
					
					$user1->user_id=$sellerbrands->user_id;
					$user1->name=$sellerbrands->name;
					$user1->slug=$sellerbrands->slug;
					$user1->category_id=$sellerbrands->category_id;
					$user1->sub_category_id=$sellerbrands->sub_category_id;
					$user1->type_id=$sellerbrands->type_id;
					
					$user1->created_date=date('Y-m-d');
					
					  if ($tblUserObj1->save($user1)) {
							$this->Flash->success(__('This Brand has been Activated.'));

							
						} else {
							$this->Flash->error(__('This Brand has not been Activated'));
						}
						$this->Sellerbrands->save($sellerbrands);
		}
		else{
			$this->Sellerbrands->save($sellerbrands);
		}
		

			
			
			
		
		   return $this->redirect(['controller' => 'Sellerbrands','action' => 'index']);
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
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Sellerbrands->get($id);
        if ($this->Sellerbrands->delete($type)) {
            $this->Flash->success(__('The Seller Brand has been deleted.'));
        } else {
            $this->Flash->error(__('The Seller Brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
