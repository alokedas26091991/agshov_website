<?php
declare(strict_types=1);
namespace App\Controller\Seller;
use Cake\Routing\Router;
use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 */
class BrandrequestsController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Brands']
        ];
        $sellerbrands1 = $this->Brandrequests->find("all")->where(['Brandrequests.user_id' => $this->Auth->user('id')]);
        $sellerbrands = $this->paginate($sellerbrands1);
        $this->set(compact('sellerbrands'));
        $this->set('_serialize', ['sellerbrands']);
    }
	 public function documents($id){
			  		$brands=$this->Sellerbrands->find("all")->where(['id' => $id])->first();
					$this->set('brands', $brands);
		  }
	public function brand() {
		  $this->paginate = [
            'contain' => ['Categories', 'SubCategories', 'Types', 'Users', 'Brands']
        ];
        $sellerbrands1 = $this->Sellerbrands->find("all")->where(['Sellerbrands.user_id' => $this->Auth->user('id')]);
        $sellerbrands = $this->paginate($sellerbrands1);
        $this->set(compact('sellerbrands'));
        $this->set('_serialize', ['sellerbrands']);
		
		//$numBrands = sizeof($sellerbrands);
	
		//$this->set('numBrands', $numBrands);
		
		$sellerbrands2 = $this->Sellerbrands->find("all")->where(['Sellerbrands.is_approved' => 1,'Sellerbrands.user_id' => $this->Auth->user('id')]);
		 $sellerbrands1 = $this->paginate($sellerbrands2);
        $this->set(compact('sellerbrands1'));
        $this->set('_serialize', ['sellerbrands1']);
		
		//$numBrands1 = sizeof($sellerbrands1);
	
		//$this->set('numBrands1', $numBrands1);

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
         $brands = TableRegistry::getTableLocator()->get('Brands');
        $sellerbrand = $this->Brandrequests->newEmptyEntity();
        if ($this->request->is('post')) {
            $sellerbrand = $this->Brandrequests->patchEntity($sellerbrand, $this->request->getData());
			$sellerbrand->user_id=$this->Auth->user('id');
			$sellerbrand->request_date=date('Y-m-d');
			//$sellerbrand->id=$this->request->data['brand_id'];
			$brand_name=$brands->find("all")->where(['id' => $this->request->getdata('brand_id')])->first();
			$sellerbrand->brand_name=$brand_name->name;
			

						
							if ($this->Brandrequests->save($sellerbrand)) {
								$this->Flash->success(__('Your Brand Request has been Sent.'));

								return $this->redirect(
                                                ['controller' => 'Brandrequests', 'action' => 'add']
                                            );
							} else {
								$this->Flash->error(__('Your Brand Request has not been sent. Please, try again.'));
								return $this->redirect(
                                                ['controller' => 'Brandrequests', 'action' => 'add']
                                            );
							}
			
           
        }
        $brand = $this->Brandrequests->Brands->find('list', ['limit' => 200])->where(['is_active'=>1]);
        $this->set(compact('sellerbrand','brand'));
        $this->set('_serialize', ['sellerbrand']);
        

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
