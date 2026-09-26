<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\Utility\Security;
use Cake\Core\Configure;


class LoginController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->_display_meta = FALSE;
        $this->Auth->allow(['login', 'register']);
    }

    public function index()
    {

        $Users = TableRegistry::getTableLocator()->get('Users');
        if ($this->request->is('post')) {
            if ($this->Auth->user('id')) {
                return $this->redirect('/home/index');
            }
            // $userInputCaptcha = $this->request->getData('captcha_input');
            // $generatedCaptcha = $this->request->getSession()->read('captcha');

            // if ($userInputCaptcha !== $generatedCaptcha) {
            //     $this->Flash->error(__('Incorrect CAPTCHA'));
            //     return;
            // }

            $user = $this->Auth->identify();
            if ($user) {

                $this->Auth->setUser($user);
                /* save last login date */
                $tblUserObj = TableRegistry::getTableLocator()->get('Users');
                $query = $tblUserObj->query();
                $query->update()
                    ->set(['last_login_date' => date('Y-m-d h:i:s')])
                    ->where(['id' => $this->Auth->user('id')])
                    ->execute();
                    
            $referrer = $this->request->referer();
            
            // Redirect back to the referrer or a default URL
            return $this->redirect($referrer ?: ['controller' => 'Home', 'action' => 'myaccount']);    


                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
            }
        }
    }

    public function myaccount()
    {
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);

        $Invoice = TableRegistry::getTableLocator()->get('Invoices');
        $invoice1 = $Invoice->find("all")->where(['user_id' => $this->Auth->user('id')]);
        $this->set('invoice1', $invoice1);
        foreach ($invoice1 as $inv) {
            $Invoice_Item = TableRegistry::getTableLocator()->get('Invoice_Items');
            $Invoice_Item1 = $Invoice_Item->find("all")->where(['invoice_id' => $inv->id]);
            $this->set('Invoice_Item1', $Invoice_Item1);
            foreach ($Invoice_Item1 as $inv_item) {
                $Products = TableRegistry::getTableLocator()->get('Products');
                $Product1 = $Products->find("all")->where(['item_id' => $inv_item->item_id])->first();
                $this->set('Product1', $Product1);
            }
        }



        $staticPage = $tblUserObj1->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersave = $tblUserObj1->patchEntity($staticPage, $this->request->data);
            if ($tblUserObj1->save($usersave)) {
                $this->Flash->success(__('User Information is Successfully Updated.'));

                return $this->redirect(['action' => 'myaccount']);
            } else {
                $this->Flash->error(__('User Information is not Successfully Updated.'));
            }
        }
    }

    public function vendorregister()
    {
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Vendors');

        $vendor = $tblUserObj1->newEmptyEntity();
        if ($this->request->is('post')) {
            $vendor1 = $tblUserObj1->patchEntity($vendor, $this->request->data);

            if ($_FILES['address_proof']['name'] != '') {
                $this->loadComponent('UploadImage');
                $vendor1->address_proof = $this->UploadImage->do_upload_image('vendor2', $_FILES['address_proof'], 'vendor', 'll');
            }
            if ($_FILES['gst_proof']['name'] != '') {
                $this->loadComponent('UploadImage');
                $vendor1->gst_proof = $this->UploadImage->do_upload_image('vendor3', $_FILES['gst_proof'], 'vendor', 'l1');
            }
            if ($_FILES['aadhaar_proof']['name'] != '') {
                $this->loadComponent('UploadImage');
                $vendor1->aadhaar_proof = $this->UploadImage->do_upload_image('vendor4', $_FILES['aadhaar_proof'], 'vendor', 'l1');
            }
            if ($_FILES['pan_card']['name'] != '') {
                $this->loadComponent('UploadImage');
                $vendor1->pan_card = $this->UploadImage->do_upload_image('vendor5', $_FILES['pan_card'], 'vendor', 'l1');
            }


            if ($tblUserObj1->save($vendor1)) {
                $this->Flash->success(__('We have Received Your Registration.'));

                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Data could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * Method For Normal User Registration
     * Method Name doUserRegister
     * @param \Cake\ORM\Table $table The table class to use.
     * @param post user input data.
     */
    public function register()
    {





        $Users = TableRegistry::getTableLocator()->get('Users');
        $User = $Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $User = $Users->patchEntity($User, $this->request->getData(), ['validate' => false]);
            $User->date_of_registration = date('Y-m-d');
            $User->is_active = 1;
            $User->is_customer = 1;
            $User->is_mobile_verified = 1;
            $password = $this->request->getData('password');
            $email = $this->request->getData('email');
            $User->name = $this->request->getData('name');



            if ($Users->save($User)) {
                $this->Auth->setUser($User->toArray());
                $userBr = $Users->UserRoles->newEmptyEntity();
                $userBr->role_id = 4;
                $userBr->user_id = $User->id;

                $Users->UserRoles->save($userBr);
                //$this->sendotpdata();
                $this->loadComponent('SendMail');
                $this->SendMail->sendMail(4, $User->email, ['name' => $User->name, 'password' => $password, 'email' => $email]);
                //$this->Flash->success(__('Your Registration has been Successfully Completed.'));

                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Your Registration has not been Successfully Completed. Please, try again.'));
                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
            }
        }
    }

    /**
     * Method For create randam string
     */
    protected function random_string($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $Users = TableRegistry::getTableLocator()->get('Users');
        $Users = $Users->find('all')->where(['email_verification_code' => $key]);
        if ($Users->count() > 0) {
            $this->random_string($length);
            return true;
        }

        return $key;
    }

    /**
     * Method For email Validation
     */

    /**
     * logout user
     * @return type
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * logout user
     * @return type
     */
    public function thankyou()
    {
        $is_new_register = $this->Cookie->read('is_new_register');

        if (intval($is_new_register) == 0) {
            return $this->redirect($this->request->referer());
        }
        $this->Cookie->write('is_new_register', 0);
    }

    /**
     * forget password
     */
    //change mobile

    public function changemobilesendotplogin()
    {
        $this->autoRender = FALSE;

        $jsonvars = $this->request->input('json_decode');
        $uniqueCode = $this->uniqueCode();

        $mobile_verification_code = $uniqueCode;

        $tblUserObj = TableRegistry::getTableLocator()->get('Users');

        $us = $tblUserObj->find()->where(["mobile" => $jsonvars->mobile]);
        if ($us->count() > 0) {

            echo json_encode(['success' => false, 'msg' => 'Mobile no Already exists.']);
        } else {
            $query = $tblUserObj->query();
            $query->update()
                ->set(['change_mobile' => $jsonvars->mobile, 'change_mobile_verification_code' => $mobile_verification_code])
                ->where(['id' => $this->Auth->user('id')])
                ->execute();


            $this->loadComponent('SendMail');
            //$msg = "Hi, Welcome to Pickallure, Your login OTP is $mobile_verification_code. Valid for 10 minutes.";
            $msg = "Your OTP for Registration at Febino Shopping Portal is $mobile_verification_code. Please do not share this OTP. Regards, Team Febino";
            $this->SendMail->sendOTP($msg, $jsonvars->mobile);
            echo json_encode(['success' => true, 'msg' => 'Your Registration has been Successfully Completed.', "otp" => $mobile_verification_code]);
        }
    }

    public function changemobileverifyotp()
    {
        $this->autoRender = FALSE;

        $u2 = TableRegistry::getTableLocator()->get('Users');
        $jsonvars = $this->request->input('json_decode');



        $u = $u2->find()->where(['id' => $this->Auth->user('id'), "change_mobile_verification_code" => $jsonvars->otp]);
        if ($u->count() > 0) {

            $query = $u2->query();
            $query->update()
                ->set(['mobile' => $jsonvars->mobile])
                ->where(['id' => $this->Auth->user('id')])
                ->execute();



            echo json_encode(['success' => true, 'msg' => ' success']);
        } else {
            echo json_encode(['success' => false, 'msg' => 'Phone no does not exist']);
        }
    }

    //change mobile

    public function forgetpassword()
    {

        $Users = TableRegistry::getTableLocator()->get('Users');
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            if (!empty($email)) {
                $User = $Users->find('all')->where(['email' => $email, 'is_customer' => 1]);

                if ($User->count() > 0) {
                    $row = $User->first();

                    $uid = \Firebase\JWT\JWT::encode([
                        'sub' => $row->id,
                        'exp' => time() + 3600 * 10
                    ], Configure::read('Security.salt'));
                    $validation_url = \Cake\Routing\Router::url([
                        "controller" => "Login",
                        "action" => "resetpassword",
                        "?" => [
                            'eid' => $uid
                        ],
                        'escape' => FALSE
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

    /**
     * modal registration
     */
    public function ajaxregisterfromtopnav()
    {
        $this->autoRender = FALSE;
        $Users = TableRegistry::getTableLocator()->get('Users');
        $User = $Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $this->request->data['is_student'] = 1;
            $this->request->data['password'] = $this->random_string(6);
            $User = $Users->patchEntity($User, $this->request->data, ['validate' => false]);
            $User->date_of_registration = date('Y-m-d');
            $uniqueCode = $this->request->data['uniquecode'];

            $User->email_verification_code = $uniqueCode;
            $User->ipaddress = $this->request->clientIp();
            $validation_url = \Cake\Routing\Router::url([
                "controller" => "Login",
                "action" => "email_validation_url",
                $uniqueCode
            ], true);

            if ($Users->save($User)) {
                /* add to user role */
                $tblUserRolesObj = TableRegistry::getTableLocator()->get('UserRoles');
                $new_entity = $tblUserRolesObj->newEmptyEntity();
                $new_entity->user_id = $User->id;
                $new_entity->role_id = 5;
                $tblUserRolesObj->save($new_entity);
                $this->loadComponent('Cookie');
                $this->Cookie->write('is_new_register', 1);
                $this->loadComponent('SendMail');
                //$this->SendMail->sendMail(4, $this->request->data['email_id'], ['user_id' => $User->id, 'password' => $this->request->data['password'], 'act_link' => $validation_url]);
                $msg = (__('Now click on the verification link that has been sent to your e-mail address and verify your account.'));
            } else {
                $msg = (__('The user could not be saved. Please, try again.'));
            }
        }
        echo json_encode(['msg' => $msg]);
    }

    public function seller()
    {
        $this->viewBuilder()->layout(false);
    }

    public function searchGST($gstno)
    {
        $this->loadComponent('Search');
        $r = $this->Search->gst($gstno);
        pr(json_decode($r));
        die;
    }

    public function sendotp()
    {
        //$this->viewBuilder()->layout('layout_registration');

        if ($this->request->is('post')) {
            $ul = TableRegistry::getTableLocator()->get('UserLogins');
            $u = $ul->find()->where(['user_id' => $this->Auth->user('id'), 'is_used' => 0]);
            if ($u->count() > 0) {
                $u = $u->first();
                if ($this->request->data['otp'] == $u->otp) {
                    $u->is_used = 1;
                    $u->submit_date = date('Y-m-d H:i:s');
                    $ul->save($u);
                    $this->Cookie->write('is_valid_otp', 1);
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
        }
    }

    public function forgetsendotplogin()
    {
        $this->autoRender = FALSE;
        $ul = TableRegistry::getTableLocator()->get('UserLogins');
        $u2 = TableRegistry::getTableLocator()->get('Users');
        $jsonvars = $this->request->input('json_decode');
        $us = $u2->find()->where(["OR" => ['email' => $jsonvars->email, "mobile" => $jsonvars->email]])->Andwhere(["is_mobile_verified" => 1]);
        if ($us->count() > 0) {
            $usd = $us->first();
            $u = $ul->find()->where(['user_id' => $usd->id, 'is_used' => 0]);
            foreach ($u as $v) {
                $w = $v;

                $w->is_used = 1;
                $w->submit_date = date('Y-m-d H:i:s');
                $ul->save($w);
            }
            $userl = $ul->newEmptyEntity();
            $userl->user_id = $usd->id;
            $userl->otp = mt_rand(100000, 999999);
            $ul->save($userl);

            $this->loadComponent('SendMail');

            $this->SendMail->sendMail(5, $usd->email, ['name' => $usd->first_name, 'otp_code' => $userl->otp]);
            $msg = "Your Password Reset OTP for your Febino Shopping Portal Account is: $userl->otp. Please do not share this OTP. Regards, Team Febino";
            $this->SendMail->sendOTP($msg, $usd->mobile);
            echo json_encode(['success' => true, 'msg' => ' exist', "otp" => $userl->otp]);
        } else {


            echo json_encode(['success' => false, 'msg' => 'Please Enter Mobile No']);
        }
    }

    public function forgetverifyotp()
    {
        $this->autoRender = FALSE;
        $ul = TableRegistry::getTableLocator()->get('UserLogins');
        $u2 = TableRegistry::getTableLocator()->get('Users');
        $jsonvars = $this->request->input('json_decode');
        $us = $u2->find()->where(["OR" => ['email' => $jsonvars->email, "mobile" => $jsonvars->email]]);
        if ($us->count() > 0) {
            $usd = $us->first();

            $u = $ul->find()->where(['user_id' => $usd->id, "otp" => $jsonvars->otp, 'is_used' => 0]);
            if ($u->count() > 0) {

                $password1 = $jsonvars->password;

                $hasher = new DefaultPasswordHasher();
                $password = $hasher->hash($password1);



                $query = $u2->query();
                $query->update()
                    ->set(['password' => $password])
                    ->where(['id' => $usd->id])
                    ->execute();

                $this->Auth->setUser($usd);

                echo json_encode(['success' => true, 'msg' => ' success']);
            } else {
                echo json_encode(['success' => false, 'msg' => 'Phone no does not exist']);
            }
        } else {
            echo json_encode(['success' => false, 'msg' => 'Phone no does not exist']);
        }
    }

    private function sendotpdata()
    {

        $ul = TableRegistry::getTableLocator()->get('UserLogins');
        $u = $ul->find()->where(['user_id' => $this->Auth->user('id'), 'is_used' => 0]);
        foreach ($u as $v) {
            $w = $v;

            $w->is_used = 1;
            $w->submit_date = date('Y-m-d H:i:s');
            $ul->save($w);
        }
        $userl = $ul->newEmptyEntity();
        $userl->user_id = $this->Auth->user('id');
        $userl->otp = mt_rand(100000, 999999);
        $ul->save($userl);

        $this->loadComponent('SendMail');

        $this->SendMail->sendMail(5, $this->request->data["email"], ['name' => $this->request->data["email"], 'otp_code' => $userl->otp]);
        $this->SendMail->sendOTP($userl->otp, $this->Auth->user('mobile'));
    }

    public function verifyotp()
    {
        $this->autoRender = FALSE;
        $ul = TableRegistry::getTableLocator()->get('UserLogins');
        $u2 = TableRegistry::getTableLocator()->get('Users');
        $jsonvars = $this->request->input('json_decode');
        $us = $u2->find()->where(["OR" => ['email' => $jsonvars->email, "mobile" => $jsonvars->email]]);
        if ($us->count() > 0) {
            $usd = $us->first();

            $u = $ul->find()->where(['user_id' => $usd->id, "otp" => $jsonvars->otp, 'is_used' => 0]);
            if ($u->count() > 0) {

                $this->Auth->setUser($usd);

                echo json_encode(['success' => true, 'msg' => ' success']);
            } else {
                echo json_encode(['success' => false, 'msg' => 'Phone no does not exist']);
            }
        } else {
            echo json_encode(['success' => false, 'msg' => 'Phone no does not exist']);
        }
    }

    public function login()
    {



        $Users = TableRegistry::getTableLocator()->get('Users');
        $this->autoRender = FALSE;

        if ($this->Auth->user('id')) {

            $link = Router::url(
                [
                    'controller' => 'Home',
                    'action' => 'index',
                    'prefix' => false
                ],
                TRUE
            );
            $jsonReturn = ['status' => 1, 'message' => 'already login', 'redirect' => $link];
        } else {

            if (!filter_var($this->request->getData('email'), FILTER_VALIDATE_EMAIL)) {
                $this->request = $this->request->withData('mobile', $this->request->getData('email'));


                $this->Auth->setConfig('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'mobile']
                    ]
                ]);
            }
            $user = $this->Auth->identify();

            if ($user) {

                $this->Auth->setUser($user);
                /* save last login date */
                $tblUserObj = TableRegistry::getTableLocator()->get('Users');
                $query = $tblUserObj->query();
                $query->update()
                    ->set(['last_login_date' => date('Y-m-d h:i:s')])
                    ->where(['id' => $this->Auth->user('id')])
                    ->execute();

                $link = $this->referer();
                $mobile_otp_needed = 0;
                $jsonReturn = ['status' => 1, 'msg' => 'successfully login', 'redirect' => $link];
            } else {

                $jsonReturn = ['status' => 0, 'msg' => 'Invalid username or password, try again', 'redirect' => false];
            }
        }
        //pr($jsonReturn);
        $this->returnJson($jsonReturn);
    }

    public function returnJson($return_data)
    {
        $json = json_encode($return_data);
        $this->response = $this->response
            ->withType('application/json')
            ->withStringBody($json);

        return $this->response;
    }

    public function sendotplogin()
    {
        $this->autoRender = FALSE;
        $ul = TableRegistry::getTableLocator()->get('UserLogins');
        $u2 = TableRegistry::getTableLocator()->get('Users');
        $jsonvars = $this->request->input('json_decode');
        $us = $u2->find()->where(["is_mobile_verified" => 1, "mobile" => $jsonvars->email]);
        if ($us->count() > 0) {
            $usd = $us->first();
            $u = $ul->find()->where(['user_id' => $usd->id, 'is_used' => 0]);
            foreach ($u as $v) {
                $w = $v;

                $w->is_used = 1;
                $w->submit_date = date('Y-m-d H:i:s');
                $ul->save($w);
            }
            $userl = $ul->newEmptyEntity();
            $userl->user_id = $usd->id;
            $userl->otp = mt_rand(100000, 999999);
            $ul->save($userl);

            $this->loadComponent('SendMail');

            $this->SendMail->sendMail(5, $usd->email, ['name' => $usd->first_name, 'otp_code' => $userl->otp]);
            $msg = "Your OTP for Registration at Febino Shopping Portal is $userl->otp. Please do not share this OTP. Regards, Team Febino";


            $this->SendMail->sendOTP($msg, $usd->mobile);
            echo json_encode(['success' => true, 'msg' => ' exist', "otp" => $userl->otp]);
        } else {


            echo json_encode(['success' => false, 'msg' => 'Please Enter Mobile No']);
        }
    }

    public function sendotpregb()
    {
        $this->autoRender = FALSE;

        $u2 = TableRegistry::getTableLocator()->get('Users');
        $jsonvars = $this->request->input('json_decode');

        //echo $jsonvars->email;die;

        $us = $u2->find()->where(["email" => $jsonvars->email]);
        if ($us->count() > 0) {
            $usd = $us->first();


            $mobile_verification_code = mt_rand(100000, 999999);


            $query = $u2->query();
            $query->update()
                ->set(['mobile_verification_code' => $mobile_verification_code])
                ->where(['email' => $usd->email])
                ->execute();

            $this->loadComponent('SendMail');


            $msg = "Your OTP for Registration at Febino Shopping Portal is $mobile_verification_code. Please do not share this OTP. Regards, Team Febino";
            $this->SendMail->sendOTP($msg, $usd->mobile);
            $json = json_encode(['success' => true, 'msg' => 'exist', "otp" => $mobile_verification_code]);

            $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

            return $this->response;
        } else {


            $json = json_encode(['success' => false, 'msg' => 'Please Enter Mobile No']);

            $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

            return $this->response;
        }
    }

    public function registrationwithotp()
    {

        $this->autoRender = FALSE;

        $jsonvars = $this->request->input('json_decode');

        $Users = TableRegistry::getTableLocator()->get('Users');
        $User = $Users->newEmptyEntity();


        $User = $Users->patchEntity($User, (array) $jsonvars, ['validate' => false]);
        $User->date_of_registration = date('Y-m-d');
        $User->is_active = 0;
        $User->is_customer = 1;
        $password = $jsonvars->password;
        $email = $jsonvars->email;

        $mobile = $jsonvars->mobile;

        $uniqueCode = $this->uniqueCode();

        $User->mobile_verification_code = $uniqueCode;

        $us1 = $Users->find("all")->where(["OR" => ["email" => $jsonvars->email, "mobile" => $jsonvars->mobile]]);
        $t_count = $us1->count();




        if ($t_count > 0) {
            $ot = $us1->first();
            $this->loadComponent('SendMail');
            $msg = "Your OTP for Registration at Febino Shopping Portal is $ot->mobile_verification_code. Please do not share this OTP. Regards, Team Febino";

            $this->SendMail->sendOTP($msg, $mobile);
            $json =  json_encode(['success' => true, 'msg' => 'Your Registration has been Successfully Completed.', "otp" => $ot->mobile_verification_code]);
            $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

            return $this->response;
        } else {


            if ($Users->save($User)) {

                $userBr = $Users->UserRoles->newEmptyEntity();
                $userBr->role_id = 4;
                $userBr->user_id = $User->id;

                $Users->UserRoles->save($userBr);

                $this->loadComponent('SendMail');


                //$this->SendMail->sendMail(5, $jsonvars->email, ['name' => $jsonvars->first_name, 'otp_code' => $uniqueCode]);
                $msg = "Your OTP for Registration at Febino Shopping Portal is $uniqueCode. Please do not share this OTP. Regards, Team Febino";

                $this->SendMail->sendOTP($msg, $jsonvars->mobile);

                $json =  json_encode(['success' => true, 'msg' => 'Your Registration has been Successfully Completed.', "otp" => $uniqueCode]);
                $this->response = $this->response
                    ->withType('application/json')
                    ->withStringBody($json);

                return $this->response;
            } else {
                $json =  json_encode(['success' => false, 'msg' => 'Your Registration has not been Successfully Completed. Please, try again.', "otp" => $t_count]);
                $this->response = $this->response
                    ->withType('application/json')
                    ->withStringBody($json);

                return $this->response;
            }
        }
    }

    private function uniqueCode()
    {
        $Users = TableRegistry::getTableLocator()->get('Users');
        $code = mt_rand(100000, 999999);
        $user = $Users->find()->where(["mobile_verification_code" => $code]);
        if ($user->count() > 0) {
            $this->uniqueCode();
        } else {
            return $code;
        }
    }

    public function mobileOtpVarification()
    {
        $this->autoRender = FALSE;
        $jsonvars = $this->request->input('json_decode');
        if (!empty($jsonvars->verification_code)) {
            $Users = TableRegistry::getTableLocator()->get('Users');
            $User = $Users->find('all')->where(['mobile_verification_code' => $jsonvars->verification_code, "mobile" => $jsonvars->mobile]);
            if ($User->count() > 0) {
                $row = $User->first();
                $row->is_active = 1;
                $row->is_mobile_verified = 1;
                $row->mobile_verification_code = '';
                $Users->save($row);
                $this->Auth->setUser($row->toArray());
                $this->loadComponent('SendMail');
                $msg1 = "This is to inform you that you have successfully registered with Febino. Keep shopping with us and explore the deals for you.";
                $this->SendMail->sendOTP($msg1, $jsonvars->mobile);
                echo json_encode(['success' => true, 'msg' => 'Your mobile no has been successfully validated!.']);
            } else {

                echo json_encode(['success' => false, 'msg' => 'Please enter varification code!.']);
            }
        }
    }
}
