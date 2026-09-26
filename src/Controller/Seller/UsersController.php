<?php
declare(strict_types=1);
namespace App\Controller\Seller;

use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;
use App\Controller\TraitData;
use Cake\Routing\Router;
use Cake\Utility\Security;

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
	 public function initialize():void
    {
        parent::initialize();
        $this->Auth->allow(['login','registration','forget_password','gst','vendorregister','resetpassword','restpasswordwithoutlogin']);
		$this->viewBuilder()->setLayout('layout_admin');
    }


	public function dashboard(){
		
	
		}
	

	public function login()
    {
         $currentDate = date('Y-m-d');
		$Sliders = TableRegistry::getTableLocator()->get('Sliders');
		$slideralls=$Sliders->find("all")->where(['valid_from <= ' => "$currentDate" , 'valid_to >= ' => "$currentDate" , 'is_deleted' => "0",'image_type'=>2])->orderDesc("id");
		
		$this->set('slideralls', $slideralls);
		
		
	$this->viewBuilder()->enableAutoLayout(false);
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            
			
            if ($user) {
                $this->Auth->setUser($user);
               
                return $this->redirect($this->Auth->redirectUrl());
				
            }
           $this->Flash->error(__('Invalid username or password, try again'));
//            echo ("<script LANGUAGE='JavaScript'>
//                window.alert('Invalid username or password, try again');
//                window.location.href='https://www.pickallure.com/vendor/';
//                </script>");
        }
    }
	 public function vendorregister() {
	     
	     $this->autoRender = FALSE;
		 $tblUserObj1 = TableRegistry::getTableLocator()->get('Vendors');
		 
		 $Users = TableRegistry::getTableLocator()->get('Users');
		 $User = $Users->find('all')->where(['email' => $this->request->getData('email')]);
		 $User1 = $Users->find('all')->where(['mobile' => $this->request->getData('phone_no')]);
		 
		 $count_mobile_email=$User->count()+$User1->count();

         if ($count_mobile_email > 0) {
             
                $this->Flash->error(__('Email or Mobile is already exists'));
                return $this->redirect(['controller' => 'Users','action' => 'login']);
         }
        else
        {
        $vendor =$tblUserObj1->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendor = $tblUserObj1->patchEntity($vendor, $this->request->getData());
			
			//pr($vendor);
			//die;
            if ($tblUserObj1->save($vendor)) {
                $this->loadComponent('SendMail');
                $this->SendMail->sendMail(1, $vendor->email, ['name' =>$vendor->company_name]);
                
                // for otp
                
                $msg = "This is to inform you that we have received your Registration Request for Joining with us as a Febino Seller. We will intimate you shortly on your Registration Request. Confirmed by Team-Febino.";
                $this->SendMail->sendOTP($msg, $this->request->getData('phone_no'));
                
                
                //end
                $this->Flash->success(__('We have Received Your Registration.Please Wait for Admin Approval'));
                
               
	            
	           // echo ("<script LANGUAGE='JavaScript'>
            //     window.alert('We have Received Your Registration.Please Wait for Admin Approval');
            //     window.location.href='https://www.multivendor.febino.com/seller/';
            //     </script>");

                return $this->redirect(['controller' => 'Users','action' => 'login']);
            } else {
                $this->Flash->error(__('Data could not be saved. Please, try again.'));
                return $this->redirect(['controller' => 'Users','action' => 'login']);
                 
                //  echo ("<script LANGUAGE='JavaScript'>
                // window.alert('Data could not be saved. Email or GST No is already exist, try again.');
                // window.location.href='https://www.multivendor.febino.com/seller/';
                // </script>");
            }
        }
        }
	
	 }

	
	
	
	public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    public function index()
    {

    }

	public function gst($g){
				$this->loadComponent('Search');
				$p=$this->Search->gst($g);
				echo $p;
				$this->autoRender=false;
				}
   public function forget_password() {
       //$this->autoRender = FALSE;
        $currentDate = date('Y-m-d');
		$Sliders = TableRegistry::getTableLocator()->get('Sliders');
		$slideralls=$Sliders->find("all",[
		"order"=>["id"=>"desc"]
		])->where(['valid_from <= ' => "$currentDate" , 'valid_to >= ' => "$currentDate" , 'is_deleted' => "0",'image_type'=>2 ] );
		
		$this->set('slideralls', $slideralls);
       
      $this->viewBuilder()->enableAutoLayout(false);
       $Users = TableRegistry::getTableLocator()->get('Users');
       if ($this->request->is('post')) {
           $email = $this->request->getData('email');
           if (!empty($email)) {
               $User = $Users->find('all')->where(['email' => $email,'is_vendor' => 1]);

               if ($User->count() > 0) {
                   $row = $User->first();
                   
                   $uid = \Firebase\JWT\JWT::encode([
                               'sub' => $row->id,
                               'exp' => time() + 3600 * 10
                                   ], Security::getSalt());
                   $validation_url = \Cake\Routing\Router::url([
                               "controller" => "Users",
                               "action" => "resetpassword",
                               "?" => [
                                   'eid' => $uid
                               ],
                               'escape'=>FALSE
                                   ], true);
                                   

                   $this->loadComponent('SendMail');
                   $this->SendMail->sendMail(14, $this->request->getData('email'), ['user_id' => $row->id, 'act_link' => $validation_url]);
                   echo "<script type='text/javascript'>alert('Please Check your Email.We have Sent you a Link to Change Password.');</script>";
                   
               } else {
                         echo "<script type='text/javascript'>alert('This Email ID is not Registered With Us.');</script>";
                 
               }
           } else {
               
           }
       } else {

         
       }
   }
public function restpasswordwithoutlogin()
   {
       if($this->request->is('post')){
           if($this->request->getData('password') === $this->request->getData('confirm_password')){
               $tblUsersObj = TableRegistry::getTableLocator()->get('Users');
              
               $user_id = \Firebase\JWT\JWT::decode($this->request->getQuery('eid'), Security::getSalt(), ['HS256']);
               $user_info = $tblUsersObj->get($user_id->sub);
               $user_info->password = $this->request->getData('password');
               if($tblUsersObj->save($user_info))
               {
                   
                   
                   $this->Flash->success(__('Password Changed. Please login now'));
                  
                  
                   return $this->redirect(['controller'=>'Users','action'=>'login']);
               }
           }
           else{
                
                 $this->Flash->success(__('Confirm password does not match with choosen password '));
               
           }
           return $this->redirect(['controller'=>'Users','action'=>'resetpassword',"?" => ['eid' => $this->request->getAttribute('eid')]]);
       }
       return $this->redirect(['controller'=>'Users','action'=>'resetpassword',"?" => ['eid' => $this->request->getAttribute('eid')]]);
   }
    public function resetpassword()
    {
        $this->viewBuilder()->enableAutoLayout(false);
          $currentDate = date('Y-m-d');
		$Sliders = TableRegistry::get('Sliders');
		$slideralls=$Sliders->find("all",[
		"order"=>["id"=>"desc"]
		])->where(['valid_from <= ' => "$currentDate" , 'valid_to >= ' => "$currentDate" , 'is_deleted' => "0",'image_type'=>2 ] );
		
		$this->set('slideralls', $slideralls);
       $this->set('eid', $this->request->getQuery('eid'));
       
        
    }				
				
}
