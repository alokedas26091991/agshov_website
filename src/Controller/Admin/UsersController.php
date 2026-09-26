<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->Auth->allow(['login', 'registration']);
        $this->viewBuilder()->setLayout('layout_admin');
    }
    public function dashboard()
    {

        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');

        $total_new_order = $Invoice->find("all")->contain(['Invoices', 'Users', 'Products'])->where(['InvoiceItems.order_status' => 0]);
        $this->set('total_new_order', $total_new_order->count());

        $total_new_order_amount = $Invoice->find("all")->contain(['Invoices', 'Users', 'Products'])->where(['InvoiceItems.order_status' => 2]);

        $abc = 0;
        //$total_products_sale=0;
        foreach ($total_new_order_amount as $a) {
            $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge = $chargeObj->find()->where(['is_active' => 1, 'type_id' => $a->product->type_id]);
            $total = 0;
            foreach ($charge as $c) {
                $cha = ($c->charge_type != 1) ? (($c->value * $a->product->offer_price / 100)) : $c->value;
                $total = $total + $cha;
            }
            $single_product_price = $a->product->offer_price - $total;
            $total_product_value = $single_product_price * $a->quantity;
            $abc = $abc + $total_product_value + ($a->quantity * $a->delivery_charge);
            //$total_products_sale1=$total_products_sale+$a->quantity;
        }
        $this->set('abc', $abc);
        $this->set('total_products_sale1', $total_new_order_amount->count());

        $Products = TableRegistry::getTableLocator()->get('Products');

        $total_outofstock = $Products->find("all")->where(['is_live' => 1, 'is_active' => 1, 'is_deleted' => 0, 'total_quantity' => 0]);

        $this->set('total_outofstock', $total_outofstock->count());

        $total_products = $Products->find("all")->where(['is_live' => 1, 'is_active' => 1, 'is_deleted' => 0]);

        $this->set('total_products', $total_products->count());

        $Users = TableRegistry::getTableLocator()->get('Users');

        $total_users = $Users->find("all")->where(['is_customer' => 1, 'is_deleted' => 0]);

        $this->set('total_users', $total_users->count());

        $invoice_confirm = $Invoice->find("all", [
            "order" => ["InvoiceItems.id" => "desc"]
        ])->contain(['Invoices', 'Users', 'Products'])->where(['InvoiceItems.order_status' => 0]);

        $this->paginate = [
            'contain' => []
        ];

        $invoice_confirm1 = $this->paginate($invoice_confirm);
        $this->set(compact('invoice_confirm1'));
        $this->set('_serialize', ['invoice_confirm1']);

        $order_completed = $Invoice->find("all", [
            "order" => ["InvoiceItems.id" => "desc"]
        ])->contain(['Invoices', 'Users', 'Products'])->where(['InvoiceItems.order_status' => 2]);
        $this->set('order_completed', $order_completed->count());

        $order_confirmed = $Invoice->find("all", [
            "order" => ["InvoiceItems.id" => "desc"]
        ])->contain(['Invoices', 'Users', 'Products'])->where(['InvoiceItems.order_status' => 4]);
        $this->set('order_confirmed', $order_confirmed->count());

        $order_cancelled = $Invoice->find("all", [
            "order" => ["InvoiceItems.id" => "desc"]
        ])->contain(['Invoices', 'Users', 'Products'])->where(['InvoiceItems.order_status' => 3]);
        $this->set('order_cancelled', $order_cancelled->count());



        $Review = TableRegistry::getTableLocator()->get('Reviews');
        $total_review = $Review->find("all")->where(['is_active' => 1]);
        $this->set('total_review', $total_review->count());

        $total_positive_review = $Review->find("all")->where(['is_active' => 1, 'rating' => 5]);
        $this->set('total_positive_review', $total_positive_review->count());

        $total_negative_review = $Review->find("all")->where(['is_active' => 1])->where(["OR" => ['rating' => 1, 'rating' => 2]]);
        $this->set('total_negative_review', $total_negative_review->count());

        $total_neutral_review = $Review->find("all")->where(['is_active' => 1, 'rating' => 3]);
        $this->set('total_neutral_review', $total_neutral_review->count());

        $user = TableRegistry::getTableLocator()->get('Users');
        //$user1=$user->find("all")->where(['id' => $this->Auth->user('id')])->first();

        //$seller_slug=$user1->slug;

        //$this->set('seller_id',$seller_slug);

        $page_view = TableRegistry::getTableLocator()->get('SellerPageViews');
        $total_page_view = $page_view->find("all");
        $this->set('total_view_count', $total_page_view->count());

        $total_return = $Invoice->find("all")->where(['InvoiceItems.return_status' => 3]);
        $this->set('total_return_count', $total_return->count());

        //$total_new_order_amount=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>2]);

        $total_rtd = $Invoice->find('all', array('conditions' => array('Invoices.creation_date BETWEEN InvoiceItems.order_confirm_date AND DATE_ADD(InvoiceItems.order_confirm_date, INTERVAL 2 DAY)')))->contain(['Invoices']);
        $this->set('total_rtd_count', $total_rtd->count());

        $Enquiries = TableRegistry::getTableLocator()->get('Enquiries');
        $total_enquiries = $Enquiries->find()->count();
        $recent_enquiries = $Enquiries->find()->order(['id' => 'DESC'])->limit(5)->all();
        $this->set('total_enquiries', $total_enquiries);
        $this->set('recent_enquiries', $recent_enquiries);

        $recent_products = $Products->find()->order(['id' => 'DESC'])->limit(5)->all();
        $this->set('recent_products', $recent_products);
    }
    public function login()
    {
        //$this->layout="";
        $this->viewBuilder()->setLayout('layout_registration');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                if ($this->Auth->user('user_type') == 2) {
                    return $this->redirect(['controller' => 'Branches', 'action' => 'index']);
                } else {
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
    $search = [];
    $this->set('placeholder', ['Search by Name, Email, Phone Number']);

    // Get the search query
    $search1 = $this->request->getQuery('search');

    // Apply search filter
    if (!empty($search1)) {
        $keyword = trim($search1);
        $search[] = [
            'OR' => [
                'Users.name LIKE' => "%$keyword%",
                'Users.email LIKE' => "%$keyword%",
                'Users.mobile LIKE' => "%$keyword%"
            ]
        ];
        $this->set('search', $keyword);
    }

    // Apply additional conditions for non-admin users
    if ($this->Auth->user('is_admin') != 1) {
        $search[] = ['Users.id' => $this->Auth->user('id')];
    }

    // Configure pagination
    $this->paginate = [
        'contain' => [],
        'conditions' => $search,
        'limit' => 10, // Adjust as needed
        'order' => ['Users.date_of_registration' => 'ASC'] // Default sorting
    ];

    $users = $this->paginate($this->Users->find());

    $this->set(compact('users'));
    $this->set('_serialize', ['users']);
}

    public function customerlist()
    {
        $this->viewBuilder()->setLayout('layout_admin');
        $search = [];
        $this->set('placeholder', ['Search by  Name , Email , Phone Number']);
        $search1 = $this->request->getQuery('search');
        if ($search1 != null) {
            $keyword = trim($search1);
            $search[] = ['OR' => ['Users.first_name LIKE' => "%$keyword%", 'Users.last_name LIKE' => "%$keyword%", 'Users.email LIKE' => "%$keyword%", "Users.mobile" => $keyword]];
            $this->set('search', $keyword);
        }
        if ($this->Auth->user('is_admin') != 1) {
            $search = ['id' => $this->Auth->user('id')];
        }
        $this->paginate = [
            'contain' => []
        ];
        $users = $this->paginate($this->Users->find()->where(['is_customer' => 1, $search]));

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
    public function registration()
    {

        $this->viewBuilder()->layout('layout_registration');
        $country = $this->Users->Countries->find('list', ['limit' => 200]);
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $code = $this->checkSponsorCode($this->request->data['sponsorcode']);

            if (!$code) {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                return false;
            }

            $this->request->data['is_active'] = 1;
            $this->request->data['user_type'] = 3;

            $this->request->data['block_no'] = $this->getNameRand(7);

            $this->endLeftRightUser($this->request->data['sponsorcode'], $this->request->data['position']);
            $this->request->data['upline_code'] = $this->endCode;
            $this->request->data['parent_id'] = $this->endCodeId;
            $this->request->data['sponsor_id'] = $code;

            $user = $this->Users->patchEntity($user, $this->request->data);

            //if($_FILES['photo']['name']!=''){

            //$user->image=$this->UploadImage->do_upload_profileimage('userProfile',$_FILES['photo'],'userProfile','ll');

            // }

            if ($this->Users->save($user)) {

                $spobj = (object)['user_id' => $user->id, 'sponsored_by' => $code, 'position' => $user->position, 'upline_code' => $user->upline_code, 'upline' => $this->endCodeId];
                $this->adduserSponsor($spobj);
                $wallet = $this->Users->UserWallets->newEmptyEntity();
                $wallet->user_id = $user->id;
                $this->Users->UserWallets->save($wallet);
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {

                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('user', 'country'));
        $this->set('_serialize', ['user']);
    }
    public function otp()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        $user->unique_code = mt_rand(100000, 999999);
        $this->Users->save($user);
        $this->loadComponent('SendEmail');
        $this->SendEmail->sendmailuser($user, ['subject' => 'Xlitex-Serect Code', 'body' => 'Your Code-' . $user->unique_code]);
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
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $this->request->data['is_active'] = isset($this->request->data['is_active']) ? $this->request->data['is_active'] : 0;
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($_FILES['photo']['name'] != '') {

                $user->image = $this->UploadImage->do_upload_profileimage('userProfile', $_FILES['photo'], 'userProfile', 'll');
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
    {
        //$this->autoRender = false;
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$this->request->data['is_active']=isset($this->request->data['is_active'])?$this->request->data['is_active']:0;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->is_active = $this->request->getData('is_active');
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

    public function changepassword($id)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->slug = $this->request->getData('slug');
            if ($this->Users->save($user)) {


                $this->Flash->success(__('The Slug change successfully.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function getNameRand($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $user = $this->Users->find()->where(['block_no' => $randomString]);
        if ($user->count() == 0) {
            return $randomString;
        } else {
            $this->getNameRand($n);
        }
    }

    public function role($user_id)
    {
        $userroles = $this->Users->UserRoles->find('all')->where(['user_id' => $user_id])->first();

        if (empty($userroles->id)) {
            $userRole = $this->Users->UserRoles->newEmptyEntity();
            if ($this->request->is('post')) {
                $userRole = $this->Users->UserRoles->patchEntity($userRole, $this->request->getData());
                $userRole->user_id = $user_id;
                if ($this->Users->UserRoles->save($userRole)) {
                    $this->Flash->success(__('The user role has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The user role could not be saved. Please, try again.'));
                }
            }
        } else {
            if ($this->request->is('post')) {
                $user = $this->Users->UserRoles->get($userroles->id);

                $user->role_id = $this->request->getData('role_id');
                if ($this->Users->UserRoles->save($user)) {
                    $this->Flash->success(__('The user role has been saved.'));
                } else {
                    $this->Flash->error(__('The user role could not be saved. Please, try again.'));
                }
            }
        }

        $roles = $this->Users->UserRoles->Roles->find();


        $this->set(compact('userroles',  'roles'));
        $this->set('_serialize', ['userroles', 'roles']);
    }
}
