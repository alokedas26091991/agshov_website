<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\Routing\Router;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class VendorsController extends AppController
{
 //use TraitData;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	 public $Users;
	 public function initialize(): void
    {
        parent::initialize();
        $this->Users=TableRegistry::getTableLocator()->get('Users');
			
    }
	
    public function index()
    {
		$this->viewBuilder()->setLayout('layout_admin');
		$search=[];
		$search[]=['is_vendor'=>1];
		 	$this->set('placeholder',['Search by  Name , Email , Phone Number']);
				$search1 = $this->request->getQuery('search');
				if($search1!=null){   
				$keyword= trim($search1);
				$search[]=['OR'=>['Users.first_name LIKE' => "%$keyword%",'Users.last_name LIKE' => "%$keyword%",'Users.email LIKE' => "%$keyword%","Users.mobile"=>$keyword]];
				$this->set('search',$keyword);
				}
				
        $this->paginate = [
            'contain' => []
        ];
        $users = $this->paginate($this->Users->find()->where(['is_vendor'=>1, $search]));

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
    
    public function reviewlist()
    {
		$Products = TableRegistry::getTableLocator()->get('Products');
		$Reviews = TableRegistry::getTableLocator()->get('Reviews');
		$pro=$Reviews->find("all")->contain(['Products']);
		$this->set('pro', $pro);
    }
    public function reviewchangestatus($id=null)
    {
		
		$Reviews = TableRegistry::getTableLocator()->get('Reviews');
        $state = $Reviews->get($id, [
            'contain' => []
        ]);
		$abc=$state->is_active;
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $state = $Reviews->patchEntity($state, $this->request->getData());
			if($abc==1)
			{
				$state->is_active=0;
			}
			else
			{
				$state->is_active=1;
			}
			
            if ($Reviews->save($state)) {
                $this->Flash->success(__('This Review has been Deactivated.'));

                return $this->redirect(['controller' => 'Vendors','action' => 'reviewlist']);
            } else {
                $this->Flash->error(__('This Review has not been Deactivated. Please, try again.'));
            }
        }

    }    
	
		public function requestlist(){
		  
		$vendors=$this->Vendors->find("all",[
		"order"=>["id"=>"asc"]
		])->where(['is_approved' => "0"]);
		
		$this->set(compact('vendors'));
        $this->set('_serialize', ['vendors']);
		  
		  }
		  
		public function shifttouser($id){
		  
		$vendors=$this->Vendors->find("all")->where(['id' => $id])->first();
		
		$vendors->is_approved="1";
		$vendors->approval_date=date('Y-m-d');
		
		$tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 =$tblUserObj1->newEmptyEntity();
		
		$user1->vendor_id=$vendors->id;
		$user1->email=$vendors->email;
		$user1->mobile=$vendors->phone_no;
		$user1->first_name=$vendors->name;
		$user1->address1=$vendors->address;
		
		$user1->date_of_registration=date('Y-m-d');
		$user1->is_vendor=1;
		$user1->is_mobile_verified=1;
		//$pass=$this->getPassword(6);
		 $user1->password=$vendors->password;
		
		
		$user_email=$tblUserObj1->find("all")->where(['email' => $vendors->email])->first();

		if(!empty($user_email->email))
		{
		    
                $query = $tblUserObj1->query();
                $query->update()
                    ->set(['is_vendor' => 1,'is_customer'=>0, 'vendor_id'=>$vendors->id,'password' => $vendors->password])
                    ->where(['email' => $vendors->email])
                    ->execute();
                    
                $this->loadComponent('SendMail');
                $this->SendMail->sendMail(2, $vendors->email, ['user_id' => $user1->id, 'password' => $vendors->password]);
                  // for otp
                
                
                
                
                //end
                	$roleObj = TableRegistry::getTableLocator()->get('UserRoles');
                                $new_role = $roleObj->newEmptyEntity();
                                $new_role->user_id = $user1->id;
                                $new_role->role_id = 2;
                              
                                $roleObj->save($new_role);
				$this->Flash->success(__('This Seller has been Activated.'));    
		}
		else
		{
		  if ($tblUserObj1->save($user1)) {
			  $this->loadComponent('SendMail');
                $this->SendMail->sendMail(2, $vendors->email, ['user_id' => $user1->id, 'password' => $vendors->password]);
                // for otp
                
               
                
                
                //end
                	$roleObj = TableRegistry::getTableLocator()->get('UserRoles');
                                $new_role = $roleObj->newEmptyEntity();
                                $new_role->user_id = $user1->id;
                                $new_role->role_id = 2;
                              
                                $roleObj->save($new_role);
				$this->Flash->success(__('This Seller has been Activated.'));

				
			} else {
				$this->Flash->error(__('This Seller has not been Activated'));
			}
		}
			
			
			$this->Vendors->save($vendors);
		
		   return $this->redirect(['controller' => 'Vendors','action' => 'requestlist']);
		  
		  }
		  public function documents($id){
			  		$vendors=$this->Vendors->find("all")->where(['id' => $id])->first();
					$this->set('vendors', $vendors);
		  }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	  public function registration(){
		  
		  $this->viewBuilder()->layout('layout_registration');
		   $country = $this->Users->Countries->find('list', ['limit' => 200]);
		 $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			
			$code=$this->checkSponsorCode($this->request->data['sponsorcode']);
			
			if(!$code){
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
				return false;
				}
			
				$this->request->data['is_active']=1;
				$this->request->data['user_type']=3;
				$this->request->data['usercode']='GBT'.$this->getName(7);
				$this->request->data['block_no']=$this->getNameRand(7);
				
				$this->endLeftRightUser($this->request->data['sponsorcode'],$this->request->data['position']);
				$this->request->data['upline_code']=$this->endCode;
				$this->request->data['parent_id']=$this->endCodeId;
				$this->request->data['sponsor_id']=$code;
			
            $user = $this->Users->patchEntity($user, $this->request->data);
			
			//if($_FILES['photo']['name']!=''){
				
				 		//$user->image=$this->UploadImage->do_upload_profileimage('userProfile',$_FILES['photo'],'userProfile','ll');
					 
				// }
			
            if ($this->Users->save($user)) {
				
				$spobj=(object)['user_id'=>$user->id,'sponsored_by'=>$code,'position'=>$user->position,'upline_code'=>$user->upline_code,'upline'=>$this->endCodeId];
				$this->adduserSponsor($spobj);
				$wallet=$this->Users->UserWallets->newEntity();
				$wallet->user_id=$user->id;
				$this->Users->UserWallets->save($wallet);
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
				
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
       
        $this->set(compact('user','country'));
        $this->set('_serialize', ['user']);
		  
		  }
	public function newchild($spId){
		  
		 
		   $country = $this->Users->Countries->find('list', ['limit' => 200]);
		 $user = $this->Users->newEntity();
        
       
        $this->set(compact('user','country'));
        $this->set('_serialize', ['user']);
		  
		  }	  
	private function checkSponsorCode($sponsoreCode){
		$user = $this->Users->find()->where(['usercode'=>$sponsoreCode,'is_active'=>1]);
		if($user->count()>0){
				$user=$user->first();
				return $user->id;
			}else{
				return false;
				}
		}	  
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Occupations', 'Cities', 'States', 'Countries', 'PreferenceLocations']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
	public function otp(){
		$user = $this->Users->get($this->Auth->user('id'));
		$user->unique_code= mt_rand(100000, 999999);
		$this->Users->save($user);
		$this->loadComponent('SendEmail');
		$this->SendEmail->sendmailuser($user,['subject'=>'Xlitex-Serect Code','body'=>'Your Code-'.$user->unique_code]);
		$this->Flash->success(__('secrect code send your register email .'));

                return $this->redirect(['action' => 'dashboard']);
		}

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->loadComponent('UploadImage');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			//$this->request->data['is_active']=isset($this->request->data['is_active'])?$this->request->data['is_active']:0;
            $user = $this->Users->patchEntity($user, $this->request->data);
			$user->is_vendor=1;
            $user->date_of_registration=date('Y-m-d');
				
            if ($this->Users->save($user)) {
				
				 				$roleObj = \Cake\ORM\TableRegistry::get('UserRoles');
                                $new_role = $roleObj->newEntity();
                                $new_role->user_id = $user->id;
                                $new_role->role_id = 2;
                              
                                $roleObj->save($new_role);
                $this->Flash->success(__('The Vendor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Vendor could not be saved. Please, try again.'));
            }
        }
       
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {	//$this->loadComponent('UploadImage');
    $vendors = TableRegistry::getTableLocator()->get('Vendors');
        $user = $vendors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			//$this->request->data['is_active']=isset($this->request->data['is_active'])?$this->request->data['is_active']:0;
            $user = $this->Users->patchEntity($user, $this->request->getData());
			/*if($_FILES['photo']['name']!=''){
				
				 		$user->image=$this->UploadImage->do_upload_profileimage('userProfile',$_FILES['photo'],'userProfile','ll');
					 
				 }*/
            if ($vendors->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $state = TableRegistry::getTableLocator()->get('States');
        $states_list = $state->find('list', ['limit' => 15000]);
        $this->set(compact('states_list'));
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	public function updatekyc($id = null){
			$user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			//$this->request->data['is_active']=isset($this->request->data['is_active'])?$this->request->data['is_active']:0;
            $user = $this->Users->patchEntity($user, $this->request->data);
			/*if($_FILES['photo']['name']!=''){
				
				 		$user->image=$this->UploadImage->do_upload_profileimage('userProfile',$_FILES['photo'],'userProfile','ll');
					 
				 }*/
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
       
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
		}

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Vendors->get($id);
        if ($this->Vendors->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'requestlist']);
    }
    

	public function assign($id = null){
		
        $userBranch = $this->Users->get($id, [
            'contain' => ['UserBranches']
        ]);
		
		$userBranchIds =[];
		foreach($userBranch->user_branches as $batch){
			$userBranchIds[]=$batch->brunch_id;
			
			}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$this->Users->UserBranches->deleteAll(['user_id'=>$id],false);
			foreach($this->request->data['branch_id'] as $branchId){
				$userBr = $this->Users->UserBranches->newEntity();
				$userBr->branch_id=$branchId;
				$userBr->user_id=$id;
				$this->Users->UserBranches->save($userBr);
				}
				$this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            
        }
		$branches=$this->Users->UserBranches->Branches->find('list', ['limit' => 200]);
        $this->set(compact('userBranch','branches','userBranchIds'));
        $this->set('_serialize', ['userBranch']);
		
		
	}
	public function changepassword($id){
		$user = $this->Users->get($id, [
            'contain' => []
        ]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
                $this->Flash->success(__('The password change successfully.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
		}
		$user->password="";
		 $this->set(compact('user'));
        $this->set('_serialize', ['user']);
		}
		// public function getName($n) { 
		// $characters = '0123456789'; 
		// $randomString = ''; 
	  
		// for ($i = 0; $i < $n; $i++) { 
		// 	$index = rand(0, strlen($characters) - 1); 
		// 	$randomString .= $characters[$index]; 
		// }
		
		// $user = $this->Users->find()->where(['usercode'=>$randomString]);
		// 	if($user->count()==0){
		// 			 return $randomString; 
		// 		}else{
		// 			$this->getName($n);
		// 			}
		 
		// 	}
			
	public function getPassword($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = ''; 
	  
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		
		return $randomString;
		 
			}		
			
	public function getNameRand($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = ''; 
	  
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		
		$user = $this->Users->find()->where(['block_no'=>$randomString]);
			if($user->count()==0){
					 return $randomString; 
				}else{
					$this->getNameRand($n);
					}
		 
			}		
	public function adduserSponsor($obj){
		
		$usp=$this->Users->UserSponsors->newEntity();
		$usp->user_id=$obj->user_id;
		$usp->sponsored_by=$obj->sponsored_by;
		$usp->position=$obj->position;
		$usp->upline==$obj->upline;
		$this->Users->UserSponsors->save($usp);
		
		//$this->Users->save($u);
		}
    public function changestatus($id = null)
    {
       
    
        $page= $this->request->getSession()->read('Users.page');
        $this->request->allowMethod(['post', 'delete']);
        $category1 = $this->Users->get($id);
        $category_id=$id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Users->patchEntity($category1, $this->request->getData());
            if($category1->is_active==1)
            {
                $category->is_active=0;
            }
            else
            {
                $category->is_active=1;
            }
             if ($this->Users->save($category)) {
			 $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
             $Products = TableRegistry::getTableLocator()->get('Products');	                 
             $updateall=$Products->updateAll(
        ['is_active ' => $category->is_active ],
        ['user_id IN' => $id]
         ); 
        $p=$Products->find('all')->Where(['user_id'=>$id]);
        foreach($p as $product_id)
        {
            
            

            $query = $UserProducts->query();
            $result = $query->update()
                    ->set(['is_active' => $category->is_active])
                    ->where(['product_id' => $product_id->id])
                    ->execute();
        }
        
        
                 
			 $this->Flash->success(__('The Seller has been Deactivated.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The Seller could not be Deactivated. Please, try again.'));
			}
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
        
        
    }
}
