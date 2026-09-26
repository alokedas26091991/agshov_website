<?php
namespace App\Controller\Seller;

use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;
use App\Controller\TraitData;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
 use TraitData;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	 public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login','registration']);
			$this->viewBuilder()->layout('layout_admin');
    }
	public function test1(){
		die;
		$comobj=TableRegistry::get('UserCommissions');
		$query = $comobj->find();
		$query->select(['user_id','total' => $query->func()->sum('commision')])
    ->group(['user_id'])->where(['type'=>1]);
		foreach($query as $q){
			$walletobj=TableRegistry::get('UserWallets');
			$w=$walletobj->find()->where(['user_id'=>$q->user_id])->first();
			$w->main_wallet=$q->total;
			$w->cash_wallet=0;
			$w->total_wallet=$q->total;
			$walletobj->save($w);
			
			}
		die;
		}
	public function updatematching(){
		
		$this->dateForStatus();
		$users=$this->Users->find();
		$this->dateForStatus();
		foreach($users as $u){
			$this->resetAll();
			$this->currentAchivement($u->id);
			$this->lastupdaterecord($u->id);
			
			//$this->currentAchivement($u->id);
			/*$walletobj=TableRegistry::get('UserWallets');
			$w=$walletobj->find()->where(['user_id'=>$u->id])->first();
			$this->totalRightBusiness;
			$this->totalLeftBusiness;
				$w->total_left_business=$this->totalLeftBusiness;
				$w->total_right_business=$this->totalRightBusiness;
				$w->total_business=$this->totalLeftBusiness+$this->totalRightBusiness;;
				$w->last_commission=0;
				$w->last_update="0000-00-00";
				$walletobj->save($w);
				$uk=$this->Users->get($u->id);
				$uk->last_update=="0000-00-00";
				$this->Users->save($uk);*/
			
			
			}
		die;
		}
	public function dashboard(){
		
	
		}
		 public function login()
    {
		//$this->layout="";
		$this->viewBuilder()->layout('layout_registration');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
			
            if ($user) {
                $this->Auth->setUser($user);
               if($this->Auth->user('user_type')==2){
					 return $this->redirect(['controller'=>'Branches','action' => 'index']);
				}else{
                return $this->redirect($this->Auth->redirectUrl());
				}
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
	public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function index()
    {
		$this->viewBuilder()->layout('layout_admin');
		$search=[];
		 	$this->set('placeholder',['Search by  Name , Email , Phone Number']);
				if(isset($this->request->query['search'])){  
				$keyword= trim($this->request->query['search']);
				$search[]=['OR'=>['Users.first_name LIKE' => "%$keyword%",'Users.last_name LIKE' => "%$keyword%",'Users.email LIKE' => "%$keyword%","Users.phone_no"=>$keyword]];
				$this->request->data['search']=$this->request->query['search'];
				$this->set('search',$this->request->query['search']);
				}
				if($this->Auth->user('is_admin')!=1){
					$search=['id'=>$this->Auth->user('id')];
					}
        $this->paginate = [
            'contain' => []
        ];
        $users = $this->paginate($this->Users->find()->where($search));

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
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
			$this->request->data['is_active']=isset($this->request->data['is_active'])?$this->request->data['is_active']:0;
            $user = $this->Users->patchEntity($user, $this->request->data);
			
			if($_FILES['photo']['name']!=''){
				
				 		$user->image=$this->UploadImage->do_upload_profileimage('userProfile',$_FILES['photo'],'userProfile','ll');
					 
				 }
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
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {	$this->loadComponent('UploadImage');
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
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
		public function getName($n) { 
		$characters = '0123456789'; 
		$randomString = ''; 
	  
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		
		$user = $this->Users->find()->where(['usercode'=>$randomString]);
			if($user->count()==0){
					 return $randomString; 
				}else{
					$this->getName($n);
					}
		 
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
}
