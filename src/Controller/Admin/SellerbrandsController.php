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
class SellerbrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
            $brand = TableRegistry::getTableLocator()->get('Installations');
				   
		$sellerbrands = $this->paginate($brand->find("all",[
		"order"=>["id"=>"desc"]]));

					$this->set(compact('sellerbrands'));
					$this->set('_serialize', ['sellerbrands']);
		

    }
    public function allsellerbrands()
    {
        	$brand = TableRegistry::getTableLocator()->get('Brandrequests');
        	$brand11=$brand->find("all")->contain('Users');
        	$brand1=$this->paginate($brand11);
        	$this->set(compact('brand1'));
			$this->set('_serialize', ['brand1']);
        
    }
    public function approvesellerbrand($id=null)
    {
        $brand = TableRegistry::getTableLocator()->get('Brandrequests');
        $brand1 = $brand->get($id);
            
          
           
           if($brand1->is_approve=="1")
           {
               $brand1->is_approve=0;
               
           }
           else
            {
                $brand1->is_approve=1;
                
            }
            if ($brand->save($brand1)) {
             
                $this->Flash->success(__('Changed the Approve status'));

                return $this->redirect(['action' => 'allsellerbrands']);
            } else {
                $this->Flash->error(__('Not Changed the Approve status'));
            }
       

            return $this->redirect(['action' => 'allsellerbrands']);
        
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
        $brand = TableRegistry::getTableLocator()->get('Installations');
		$question = $brand->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $brand->patchEntity($question, $this->request->getData());
           
            if ($brand->save($question)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Data could not be saved. Please, try again.'));
            }
        }
        

        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
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
