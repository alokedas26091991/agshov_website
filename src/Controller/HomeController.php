<?php

declare(strict_types=1);
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

date_default_timezone_set('Asia/Kolkata');

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();
    }

    public function demopage() {}
    public function booking_list()
    {

        $booking = TableRegistry::getTableLocator()->get('Bookings');
        $bookingobj = $booking->find('all')->contain(['Users', 'Packages'])->where(['Bookings.user_id' => $this->Auth->user('id')]);
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);
        $this->set('book', $bookingobj);
    }
    public function booking_details($id)
    {
        //->order(['ord' => 'ASC'])
        $booking = TableRegistry::getTableLocator()->get('BookingDetails');
        $bookingobj = $booking->find('all')->where(['booking_id' => $id])->order(['id' => 'DESC']);
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);
        $this->set('book', $bookingobj);
    }
    public function bookingsave()
    {
        $input = $this->request->input('json_decode');
        $booking = TableRegistry::getTableLocator()->get('Bookings');
        $booking_details = TableRegistry::getTableLocator()->get('BookingDetails');
        $package = TableRegistry::getTableLocator()->get('Packages');
        //$packageObj = $package->get($input->package_id);



        $input->booking_type = 0; // we assume that each booking is new booking

        if ($input->booking_type == 0) {


            $query = $booking->find();
            $max = $query->select(['max' => $query->func()->count('*')])->first();
            $max_id = $max->max;
            $f_year = (date('m') >= 4) ? date('Y') : date('Y') - 1;

            //$this->sharedData = $max_id.$f_year;

            //$this->request->getSession()->write('booking_id', $max_id.$f_year);


            //$service_end_date = date('Y-m-d', strtotime("+$packageObj->validity days"));

            $service_end_date = date('Y-m-d', strtotime("+30 days"));

            $booking1 = $booking->newEmptyEntity();
            //$booking1->user_id = $this->Auth->user('id');

            $booking1->order_id = $max_id . $f_year;

            $booking1->patient_name = $input->patient_name;
            $booking1->patient_email = $input->patient_email;
            $booking1->patient_mobile = $input->patient_mobile;
            $booking1->age = $input->age;
            $booking1->sex = $input->sex;
            //$booking1->category_id = $input->category_id;
            //$booking1->subcategory_id = $input->subcategory_id;
            //$booking1->package_id = $input->package_id;
            $booking1->no_of_bookings = 1;
            $booking1->status = 1;
            $booking1->created_at = date('Y-m-d');
            $booking1->updated_at = date('Y-m-d');
            $booking1->service_end_date = $service_end_date;
            if ($abc = $booking->save($booking1)) {

                $booking_details1 = $booking_details->newEmptyEntity();
                $booking_details1->booking_id = $booking1->id;
                $booking_details1->expected_appointment_date = $input->expected_appointment_date;
                $booking_details1->expected_appointment_time = $input->expected_appointment_time;
                $booking_details1->booking_type = $input->booking_type;
                $booking_details1->appointment_details = $input->appointment_details;
                $booking_details1->appointment_type = $input->appointment_type;
                $booking_details1->package_amount = $input->package_amount;
                $booking_details1->status = 0;
                $booking_details1->created_at = date('Y-m-d');
                $booking_details1->updated_at = date('Y-m-d');
                $booking_details->save($booking_details1);
                $msg = "Booking is Successfull";
            }
        } else {
            if ($input->booking_id) {

                $booking1 = $booking->get($input->booking_id);

                $booking1->patient_name = $input->patient_name;
                $booking1->patient_email = $input->patient_email;
                $booking1->patient_mobile = $input->patient_mobile;
                $booking1->age = $input->age;
                $booking1->sex = $input->sex;
                $booking1->category_id = $input->category_id;
                $booking1->subcategory_id = $input->subcategory_id;



                $booking1->no_of_bookings = $input->booking_no + 1;
                if ($input->package1 == $booking1->no_of_bookings) {
                    $booking1->status = 2;
                } else {
                    $booking1->status = 1;
                }


                $booking1->updated_at = date('Y-m-d');

                if ($booking->save($booking1)) {

                    $booking_details1 = $booking_details->newEmptyEntity();
                    $booking_details1->booking_id = $booking1->id;
                    $booking_details1->expected_appointment_date = $input->expected_appointment_date;
                    $booking_details1->expected_appointment_time = $input->expected_appointment_time;
                    $booking_details1->booking_type = $input->booking_type;
                    $booking_details1->appointment_details = $input->appointment_details;
                    $booking_details1->appointment_type = $input->appointment_type;
                    $booking_details1->package_amount = $packageObj->old_customer_price;
                    $booking_details1->status = 0;
                    $booking_details1->created_at = date('Y-m-d');
                    $booking_details1->updated_at = date('Y-m-d');
                    $booking_details->save($booking_details1);
                    $msg = "Booking is Successfull";
                }
            }
        }

        $this->loadComponent('SendMail');
        $this->SendMail->sendMail(16, $input->patient_email, ['name' => $input->patient_name, 'email' => $input->patient_email]);
        echo json_encode(['success' => 1, 'msg' => $msg, 'booking_id' => $abc->id], ENT_QUOTES);
        $this->autoRender = FALSE;
    }
    public function customertype()
    {
        $input = $this->request->input('json_decode');
        $customer_type_id = $input->customer_type_id;

        if ($this->Auth->user('id')) {
            $book = TableRegistry::getTableLocator()->get('Bookings');
            $bookingobj = $book->find('all')->where(['status' => 1, 'user_id' => $this->Auth->user('id'), 'service_end_date >=' => date('Y-m-d')]);

            $msg = "Success";
        } else {
            $msg = "Please Login";
        }

        echo json_encode(['data' => $bookingobj, 'success' => 1, 'msg' => $msg], ENT_QUOTES);
        $this->autoRender = FALSE;
    }
    public function customerdetails()
    {
        $input = $this->request->input('json_decode');
        $booking_type = $input->booking_type;
        $package_id = $input->package_id;
        $packageObj = TableRegistry::getTableLocator()->get('Packages');
        $pck = $packageObj->find('all')->where(['id' => $package_id])->first();



        if ($this->Auth->user('id')) {
            if ($booking_type == 1) {
                $book = TableRegistry::getTableLocator()->get('Bookings');
                $bookingobj = $book->find('all')->where(['status' => 1, 'user_id' => $this->Auth->user('id'), 'service_end_date >=' => date('Y-m-d'), 'package_id' => $package_id, 'no_of_bookings <' => $pck->number_of_service])->first();
                if ($bookingobj) {
                    $customer_count = true;
                    $success = 1;
                } else {
                    $customer_count = false;
                    $success = 0;
                }
            }


            $msg = "Success";
        } else {
            $msg = "Please Login";
        }

        echo json_encode(['data' => $bookingobj, 'customer_count' => $customer_count, 'package' => $pck, 'success' => $success, 'msg' => $msg], ENT_QUOTES);
        $this->autoRender = FALSE;
    }

    public function getpackage()
    {
        $pack = TableRegistry::getTableLocator()->get('Packages');
        $packages = $pack->find('all')->where(['is_active' => 1, 'is_deleted' => 0]);

        echo json_encode(['data' => $packages, 'success' => 1, 'msg' => "Success"], ENT_QUOTES);
        $this->autoRender = FALSE;
    }
    public function getcategories()
    {
        $cat = TableRegistry::getTableLocator()->get('Servicecategories');
        $categories = $cat->find('all')->where(['is_active' => 1, 'is_deleted' => 0]);

        echo json_encode(['data' => $categories, 'success' => 1, 'msg' => "Success"], ENT_QUOTES);
        $this->autoRender = FALSE;
    }

    // Fetch subcategories based on category ID
    public function getsubcategories($categoryId = null)
    {


        $subcategoriesTable = TableRegistry::getTableLocator()->get('Packages');
        $subcategories = $subcategoriesTable->find('all', [
            'conditions' => ['servicecategory_id' => $categoryId]
        ]);
        echo json_encode(['data' => $subcategories, 'success' => 1, 'msg' => "Success"], ENT_QUOTES);
        $this->autoRender = FALSE;
    }

    public function seller_product_list($id = null)
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find()->where(['id' => $id])->first();
        $product = TableRegistry::getTableLocator()->get('Products');
        $product_list = $product->find('all', array('conditions' => array('FIND_IN_SET(Products.id, \'' . $slideralls->products . '\')')))->where(['Products.parent_id IS' => NULL])->limit(12000);

        $this->set('product_list', $product_list);
    }
    public function store($slug = null)
    {

        $user = TableRegistry::getTableLocator()->get('Users');
        $user1 = $user->findBySlug($slug)->first();

        $seller_id = $user1->id;

        $this->_display_indvseller = TRUE;

        $sellerpageview = TableRegistry::getTableLocator()->get('SellerPageViews');
        $ip = $this->request->clientIp();
        $page = $sellerpageview->find("all")->where(['seller_id' => $seller_id, 'ip' => $ip]);
        if ($page->count() == 0) {
            $page_view = $sellerpageview->newEmptyEntity();
            $page_view->seller_id = $seller_id;
            $page_view->dt = date('Y-m-d');
            $page_view->ip = $ip;
            $sellerpageview->save($page_view);
        }

        $currentDate = date('Y-m-d');
        $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
        $page = $branchObj->findBySlug('home')->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find("all", [
            "order" => ["ord" => "asc"]
        ])->where(['start_date <= ' => "$currentDate", 'end_date >= ' => "$currentDate", 'is_deleted' => '0', 'section' => '1', 'is_active' => "1", 'seller_id' => $seller_id]);
        $this->set(compact('slideralls'));

        $Pro1 = $seller->find("all", [
            "order" => ["ord" => "ASC"]
        ])->where(['start_date <= ' => "$currentDate", 'end_date >= ' => "$currentDate", 'is_active' => "1", 'is_deleted' => "0", 'section' => "2", 'seller_id' => $seller_id])->first();
        $this->set('Pro1', $Pro1);

        $Pro11 = $seller->find("all", [
            "order" => ["ord" => "ASC"]
        ])->where(['start_date <= ' => "$currentDate", 'end_date >= ' => "$currentDate", 'is_active' => "1", 'is_deleted' => "0", 'section' => "3", 'seller_id' => $seller_id]);
        $this->set('Pro11', $Pro11);

        $Pro111 = $seller->find("all", [
            "order" => ["ord" => "ASC"]
        ])->where(['start_date <= ' => "$currentDate", 'end_date >= ' => "$currentDate", 'is_active' => "1", 'is_deleted' => "0", 'section' => "4", 'seller_id' => $seller_id])->first();
        $this->set('Pro111', $Pro111);

        $Pro1111 = $seller->find("all", [
            "order" => ["ord" => "ASC"]
        ])->where(['start_date <= ' => "$currentDate", 'end_date >= ' => "$currentDate", 'is_active' => "1", 'is_deleted' => "0", 'section' => "5", 'seller_id' => $seller_id]);
        $this->set('Pro1111', $Pro1111);

        $Products = TableRegistry::getTableLocator()->get('Products');
        $Products1 = $Products->find("all")->where(['user_id' => $seller_id, 'is_active' => "1", 'is_deleted' => "0", 'Products.parent_id IS' => NULL]);

        $this->set('Products1', $Products1);

        $deal = $Products->find("all")->where(['user_id' => $seller_id, 'is_active' => "1", 'is_deleted' => "0", 'is_deal' => "1", 'Products.parent_id IS' => NULL]);

        $this->set('deal', $deal);

        $this->set('seller_id', $seller_id);
    }

    public function enquiry()
    {
        if (!$this->request->is('post')) {
            return $this->redirect('/');
        }

        $user = TableRegistry::getTableLocator()->get('Enquiries');
        $contactForm = $user->newEmptyEntity();

        $data = $this->request->getData();

        $isCareer = (!empty($data['type']) && $data['type'] === 'career') ||
                    (!empty($data['subject']) && strpos($data['subject'], 'Career') !== false) ||
                    (!empty($data['productname']) && strpos($data['productname'], 'Career') !== false);

        if ($isCareer) {
            $data['type'] = 'career';
            if (empty($data['productname'])) {
                $data['productname'] = !empty($data['subject']) ? $data['subject'] : 'Career Application';
            }
        } else {
            $data['type'] = 'product';
            if (empty($data['productname'])) {
                if (!empty($data['product_name'])) {
                    $data['productname'] = $data['product_name'];
                } elseif (!empty($data['product'])) {
                    $data['productname'] = $data['product'];
                } elseif (!empty($data['subject'])) {
                    $data['productname'] = $data['subject'];
                } else {
                    $data['productname'] = 'General Enquiry';
                }
            }
        }

        $contactForm = $user->patchEntity($contactForm, $data);
        $contactForm->created_at = date('Y-m-d');
        if ($user->save($contactForm)) {

            $name = $this->request->getData('name');
            $email = $this->request->getData('email');
            $phone = $this->request->getData('phone');
            $message = $this->request->getData('message');
            $product = $data['productname'];
            $variant = $this->request->getData('variant') ?? '';
            $admin_email = 'enquiry@agshovpharma.com';

            $this->loadComponent('SendMail');

            if ($isCareer) {
                // Send Career Application Email Format (Template 18)
                $this->SendMail->sendMail(18, $admin_email, [
                    'name' => $name,
                    'email' => $email,
                    'message' => $message,
                    'mobile' => $phone,
                    'productname' => $product
                ]);
            } else {
                // Send Product Enquiry Email Format (Template 17)
                $this->SendMail->sendMail(17, $admin_email, [
                    'name' => $name,
                    'email' => $email,
                    'message' => $message,
                    'mobile' => $phone,
                    'productname' => $product,
                    'variant' => $variant
                ]);
            }

            $successMsg = $isCareer ? 'We have received your application. Thank you!' : 'We have received your enquiry. Thank you!';

            if ($this->request->is('ajax')) {
                $this->autoRender = false;
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode(['success' => true, 'message' => $successMsg]));
            }

            $this->Flash->success($successMsg);
            return $this->redirect($this->referer('/', true));
        }

        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['success' => false, 'message' => 'The contact form could not be saved. Please try again.']));
        }

        $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        return $this->redirect($this->referer('/', true));
    }

    public function index()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $Products = TableRegistry::getTableLocator()->get('Products');
        $slideralls = $seller->find('all', ['conditions' => ['page_name' => 11, 'section' => 1, 'is_active' => 1], 'order' => ['ord' => 'ASC']]);
        $this->set('slider', $slideralls);

        $our_collection = $seller->find()->where(['page_name' => 5])->where(['section' => 1])->where(['is_active' => 1])->first();
        $this->set('our_collection', $our_collection);
        $product1 = $Products->find('all', array('conditions' => array('FIND_IN_SET(Products.id, \'' . ($our_collection ? $our_collection->products : '') . '\')')));
        $this->set('product1', $product1);

        $dbProducts = $Products->find('all')
            ->where(['Products.parent_id IS' => null, 'Products.is_deleted' => 0])
            ->contain(['ChildProducts' => ['FilterOptions'], 'FilterOptions'])
            ->toArray();
        $this->set('dbProducts', $dbProducts);

        $popular_product = $seller->find()->where(['page_name' => 6])->where(['section' => 1])->where(['is_active' => 1])->first();
        $this->set('popular_product', $popular_product);
        $product2 = $Products->find('all', array('conditions' => array('FIND_IN_SET(Products.id, \'' . $popular_product->products . '\')')));
        $this->set('product2', $product2);



        $feature_product = $seller->find()->where(['page_name' => 11])->where(['section' => 4])->where(['ord' => 1])->where(['is_active' => 1])->first();
        $this->set('feature_product', $feature_product);
        // $product3 = $Products->find('all', array('conditions' => array('FIND_IN_SET(Products.id, \'' . $feature_product->products . '\')')));
        // $this->set('product3', $product3);

        $category = $seller->find()->where(['page_name' => 11])->where(['section' => 9])->where(['is_active' => 1]);
        $this->set('category', $category);

        $ourservices = $seller->find()->where(['page_name' => 3])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('ourservices', $ourservices);
        $certificate = $seller->find()->where(['page_name' => 4])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('certificate', $certificate);



        $about1 = $seller->find()->where(['page_name' => 1])->where(['section' => 1])->where(['ord' => 1])->where(['is_active' => 1]);
        $this->set('about1', $about1);
        $about2 = $seller->find()->where(['page_name' => 1])->where(['section' => 1])->where(['is_active' => 1])->where(['ord' => 2]);
        $this->set('about2', $about2);

        $goal = $seller->find()->where(['page_name' => 11])->where(['section' => 11])->where(['is_active' => 1])->first();
        $this->set('goal', $goal);

        $post = TableRegistry::getTableLocator()->get('Posts');

        $post1 = $post->find("all")->where(['status' => '1'])->order(['id' => 'DESC'])->limit(3);
        $this->set('post1', $post1);

        $service = TableRegistry::getTableLocator()->get('Services');
        $services = $service->find("all")->where(['is_active' => '1', 'is_deleted' => '0']);
        $this->set('services', $services);

        $branchObj = TableRegistry::get('Pages');
        $slug = "home";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);

        $testimonial = TableRegistry::getTableLocator()->get('Testimonials');
        $testimonial1 = $testimonial->find("all")->where(['status' => '1'])->where(['is_deleted' => '0'])->order(['ord' => 'ASC']);
        $this->set('testimonial1', $testimonial1);

        $partner = TableRegistry::getTableLocator()->get('Partners');
        $partners = $partner->find("all")->where(['is_active' => '1'])->where(['is_deleted' => '0'])->order(['ord' => 'ASC']);
        $this->set('partners', $partners);

        $socialObj = TableRegistry::getTableLocator()->get('Socials');
        $social = $socialObj->find("all")->first();
        $this->set('social', $social);

        $categories = TableRegistry::getTableLocator()->get('Categories');
        $c1 = $categories->find("all")->where(['is_active' => '1'])->where(['is_deleted' => '0'])->where(['menu_order' => '1'])->first();
        $this->set('c1', $c1);
        $c2 = $categories->find("all")->where(['is_active' => '1'])->where(['is_deleted' => '0'])->where(['menu_order' => '2'])->first();
        $this->set('c2', $c2);
        $c3 = $categories->find("all")->where(['is_active' => '1'])->where(['is_deleted' => '0'])->where(['menu_order' => '3'])->first();
        $this->set('c3', $c3);
        $c4 = $categories->find("all")->where(['is_active' => '1'])->where(['is_deleted' => '0'])->where(['menu_order' => '4'])->first();
        $this->set('c4', $c4);
    }


    public function category($slug = null)
    {
        $category = TableRegistry::get('Categories');

        $category1 = $category->findBySlug($slug)->first();


        $Pro1 = $category->find("all")->where(['is_menu' => "1"]);

        $this->set('Pro1', $Pro1);

        $this->_categoryId = $category1->id;
        $this->_show_left_panel = true;
        $this->_display_meta = TRUE;
        $this->setMeta($category1);
        $this->set('category_name', $category1);
        $this->render('index');
    }

    public function about()
    {
 $branchObj = TableRegistry::getTableLocator()->get('Pages');
        $page = $branchObj->find("all")->where(['id' => 3])->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function blog()
    {

        $post = TableRegistry::getTableLocator()->get('Posts');

        $post1 = $this->paginate($post->find("all")->where(['status' => '1']));
        $this->set('post1', $post1);
    }
    public function blogdetails($slug = null) {}

    public function testimonial($slug = null)
    {

        $testimonial = TableRegistry::getTableLocator()->get('Testimonials');
        $testimonial1 = $testimonial->find("all")->where(['status' => '1'])->where(['is_deleted' => '0'])->order(['ord' => 'ASC']);
        $this->set('testimonial1', $testimonial1);
    }

    public function addressbook()
    {

        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);
        $user_delivery = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        $user2 = $user_delivery->find("all")->where(['user_id' => $this->Auth->user('id')]);
        $this->set('address', $user2);
    }
    public function myaccount()
    {



        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');

        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);
        $staticPage = $tblUserObj1->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {





            $usersave = $tblUserObj1->patchEntity($staticPage, $this->request->getData());
            if ($tblUserObj1->save($usersave)) {




                $this->Flash->success(__('User Information is Successfully Updated.'));

                return $this->redirect(['action' => 'myaccount']);
            } else {
                $this->Flash->error(__('User Information is not Successfully Updated.'));
            }
        }
    }
    public function contact()
    {

        $branchObj = TableRegistry::getTableLocator()->get('Pages');
        $page = $branchObj->find("all")->where(['id' => 7])->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);

        if ($this->request->is('post')) {
            if (isset($_POST['sub'])) {

                $name = $this->request->getData('name');
                $email = $this->request->getData('email');
                $mobile = $this->request->getData('mobile');
                $message = $this->request->getData('message');
                $admin_email = ['enquiry@agshovpharma.com', 'accenditoresoftware0005@gmail.com'];


                $this->loadComponent('SendMail');
                $this->SendMail->sendMail(8, $admin_email, ['name' => $name, 'email' => $email, 'mobile' => $mobile, 'message' => $message]);
                $this->Flash->error(__('We have received your Enquiry'));
            }
        }
    }
    public function myreviews()
    {

        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);
        $Products = TableRegistry::get('Products');
        $Reviews = TableRegistry::get('Reviews');
        $pro = $Reviews->find("all")->contain(['Products', 'ReviewImages'])->where(['Reviews.user_id' => $this->Auth->user('id')]);
        //pr($pro->first());
        $this->set('pro', $pro);
    }
    public function myorders()
    {
        $Invoice = TableRegistry::getTableLocator()->get('Invoices');
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $invoice1 = $Invoice->find("all", [
            "order" => ["Invoices.id" => "desc"]
        ])->contain(['InvoiceItems', 'Users', 'InvoiceItems.Products'])->where(['Invoices.user_id' => $this->Auth->user('id')]);

        // echo($invoice1->first());die;
        $this->set('invoice1', $invoice1);



        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);
    }
    public function track($id = null)
    {


        $this->loadComponent('Shyplite');

        $orderIdshy = $this->Shyplite->track($id);



        $this->set('track', $orderIdshy);
    }
    public function returntrack($id = null)
    {


        $this->loadComponent('Shyplite');

        $orderIdshy = $this->Shyplite->track($id);



        $this->set('track', $orderIdshy);
    }
    public function returnorder($id = null)
    {

        $InvoiceItems = TableRegistry::getTableLocator()->get('Invoices');
        $invoice_items = $InvoiceItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice_items1 = $InvoiceItems->patchEntity($invoice_items, $this->request->getData());
            $invoice_items1->return_status = 1;
            $invoice_items1->return_date = date('Y-m-d');

            if ($InvoiceItems->save($invoice_items1)) {
                $this->Flash->success(__('Your Return order has been Submitted'));

                return $this->redirect(["controller" => "Home", 'action' => 'myorders']);
            } else {
                $this->Flash->error(__('Your Return order has not been Submitted. Please, try again.'));
            }
        }
        $this->set(compact('invoice_items'));
        $this->set('_serialize', ['invoice_items']);
    }
    public function bankdetails($id = null)
    {

        $InvoiceItems = TableRegistry::getTableLocator()->get('InvoiceItems');
        $invoice_items11 = $InvoiceItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice_items1 = $InvoiceItems->patchEntity($invoice_items11, $this->request->getData());

            if ($InvoiceItems->save($invoice_items1)) {
                $this->Flash->success(__('We have Received your Bank Details..'));

                return $this->redirect(["controller" => "Home", 'action' => 'myorders']);
            } else {
                $this->Flash->error(__('Your Bank Detail has not been Submitted. Please, try again.'));
            }
        }
        $this->set(compact('invoice_items11'));
        $this->set('_serialize', ['invoice_items11']);
    }
    public function ordercancell($id = null)
    {
        $this->autoRender = false;

        $InvoiceItems = TableRegistry::getTableLocator()->get('Invoices');
        $invoice_items = $InvoiceItems->get($id, [
            'contain' => ['Users'] // make sure user relation is loaded
        ]);

        if ($this->request->is(['patch', 'post', 'put', 'get'])) {

            $invoice_items->order_status = 3;


            if ($InvoiceItems->save($invoice_items)) {

                // $this->loadComponent('SendMail');
                // $this->SendMail->sendMail(
                //     7,
                //     $invoice_items->user->email,
                //     ['name' => $invoice_items->user->name, 'email' => $invoice_items->user->email] // fixed to send email, not name
                // );

                $this->Flash->success(__('Your order has been Cancelled'));
                return $this->redirect(["controller" => "Home", 'action' => 'myorders']);
            } else {
                $this->Flash->error(__('Your order has not been Cancelled. Please, try again.'));
                return $this->redirect(["controller" => "Home", 'action' => 'myorders']);
            }
        }

        // Optional redirect if someone visits this action via GET
        return $this->redirect(["controller" => "Home", 'action' => 'myorders']);
    }

    public function editreview($id = null)
    {

        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);
        $Reviews = TableRegistry::getTableLocator()->get('Reviews');
        $rev = $Reviews->get($id, [
            'contain' => ['ReviewImages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rev = $Reviews->patchEntity($rev, $this->request->getData());
            if ($r = $Reviews->save($rev)) {

                //review image
                $path = 'upload/Review/';

                foreach ($_FILES['product_image']['tmp_name'] as $key => $value) {

                    $file_tmpname = $_FILES['product_image']['tmp_name'][$key];
                    $file_name = $_FILES['product_image']['name'][$key];


                    if (!empty($file_name)) {
                        $fileName = time() . $file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;

                        if (move_uploaded_file($file_tmpname, $uploadFile)) {
                            // Create a new Entity over here for each uploaded image
                            $item = $Reviews->ReviewImages->newEmptyEntity();
                            $item->product_image = $fileName;
                            $item->review_id = $r->id;
                            $Reviews->ReviewImages->save($item);
                        }
                    }
                }

                $this->Flash->success(__('Your Review has been Edited'));

                return $this->redirect(["controller" => "Home", 'action' => 'myreviews']);
            } else {
                $this->Flash->error(__('Your Review has not been Edited. Please, try again.'));
            }
        }
        $this->set(compact('rev'));
        $this->set('_serialize', ['rev']);
    }
    public function editaddress($id = null)
    {


        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $user1 = $tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
        $this->set('user1', $user1);

        $user_delivery = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        $user2 = $user_delivery->find("all")->where(['id' => $id])->first();
        $this->set('user2', $user2);
        $staticPage = $user_delivery->get($id, [
            'contain' => []
        ]);



        if ($this->request->is(['patch', 'post', 'put'])) {



            $usersave = $user_delivery->patchEntity($staticPage, $this->request->getData());
            if ($user_delivery->save($usersave)) {

                $this->Flash->success(__('Address is Successfully Updated.'));

                return $this->redirect(['action' => 'addressbook']);
            } else {
                $this->Flash->error(__('Address is not Successfully Updated.'));
            }
        }
    }
    public function deleteaddress($id = null)
    {
        $address = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        $this->request->allowMethod(['post', 'delete']);
        $ad = $address->get($id);
        if ($address->delete($ad)) {
            $this->Flash->success(__('Address has been Deleted'));
        } else {
            $this->Flash->error(__('Address has not been Deleted. Please, try again.'));
        }

        return $this->redirect(["controller" => "Home", 'action' => 'addressbook']);
    }
    public function deletereview($id = null)
    {
        $Reviews = TableRegistry::getTableLocator()->get('Reviews');
        $this->request->allowMethod(['post', 'delete']);
        $category = $Reviews->get($id);
        if ($Reviews->delete($category)) {
            $this->Flash->success(__('Review has been Deleted'));
        } else {
            $this->Flash->error(__('Review has not been Deleted. Please, try again.'));
        }

        return $this->redirect(["controller" => "Home", 'action' => 'myreviews']);
    }
    public function deletereviewimage($id = null)
    {
        $Reviews = TableRegistry::getTableLocator()->get('ReviewImages');
        $this->request->allowMethod(['post', 'delete']);
        $category = $Reviews->get($id);
        if ($Reviews->delete($category)) {
            $this->Flash->success(__('Image has been Deleted'));
        } else {
            $this->Flash->error(__('Image has not been Deleted. Please, try again.'));
        }

        return $this->redirect(["controller" => "Home", 'action' => 'myreviews']);
    }
    public function changepassword()
    {
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
        $staticPage = $tblUserObj1->get($this->Auth->user('id'), [
            'contain' => []
        ]);
        $this->set('user1', $staticPage);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersave = $tblUserObj1->patchEntity($staticPage, $this->request->getData());
            if ($tblUserObj1->save($usersave)) {
                $this->Flash->success(__('Password has been changed.'));

                //return $this->redirect(['action' => 'changepassword']);
            } else {
                $this->Flash->error(__('Password has not been changed.'));
            }
        }
    }

    public function forgetpasswordwithotp()
    {
        //$this->autoRender = FALSE;
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
                    ], Security::salt());
                    $validation_url = \Cake\Routing\Router::url([
                        "controller" => "Home",
                        "action" => "resetpassword",
                        "?" => [
                            'eid' => $uid
                        ],
                        'escape' => FALSE
                    ], true);


                    $this->loadComponent('SendMail');
                    $this->SendMail->sendMail(13, $this->request->data['email'], ['user_id' => $row->id, 'act_link' => $validation_url]);
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
        if ($this->request->is('post')) {
            if ($this->request->getData('password') === $this->request->getData('confirm_password')) {
                $tblUsersObj = TableRegistry::getTableLocator()->get('Users');
                $user_id = \Firebase\JWT\JWT::decode($this->request->query('eid'), Security::salt(), ['HS256']);
                $user_info = $tblUsersObj->get($user_id->sub);
                $user_info->password = $this->request->getData('password');
                if ($tblUsersObj->save($user_info)) {
                    //echo "<script type='text/javascript'>alert('Password Changed. Please login now');</script>";
                    $this->Flash->success(__('Password Changed. Please login now'));

                    return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                }
            } else {
                //echo "<script type='text/javascript'>alert('Confirm password does not match with choosen password ');</script>";
                $this->Flash->error(__('Confirm password does not match with choosen password'));
                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
            }
            return $this->redirect(['controller' => 'Login', 'action' => 'resetpassword', "?" => ['eid' => $this->request->query('eid')]]);
        }
        return $this->redirect(['controller' => 'Login', 'action' => 'resetpassword', "?" => ['eid' => $this->request->query('eid')]]);
    }
    public function resetpassword()
    {
        $this->set('eid', $this->request->query('eid'));
        /// $user_id = \Firebase\JWT\JWT::decode($this->request->query('eid'), Security::salt(), ['HS256']);
        //pr($user_id);
        //  die;

    }
    public function testemail()
    {
        $this->loadComponent('SendMail');


        $this->SendMail->sendMail(5, "bideshbhunia@gmail.com", ['name' => "XXXC", 'email' => "bideshbhunia@gmail.com", "otp_code" => "6666666", "message1" => "test"]);
        $this->autoRender = false;
    }
    public function razorpay()
    {

        //$order_id=rand(10,100);
        $input = $this->request->input('json_decode');

        $this->request->allowMethod(['post']);

        // Retrieve data from the AJAX request
        $data = $this->request->getData();

        // Access the sent data
        $key = $data['order_id'] ?? null; // Retrieve 'key'








        $this->loadComponent('Razorpay', ['sandbox' => TRUE]);
        $returnUrl = \Cake\Routing\Router::url(['controller' => "Home", 'action' => 'razorpayOrderSuccess'], TRUE);

        $data = $this->Razorpay->send_payment($key, 400, $returnUrl);
        $json = json_encode($data);
        $this->response = $this->response
            ->withType('application/json')
            ->withStringBody($json);

        $this->request->getSession()->delete('booking_id');
        $this->autoRender = FALSE;
    }

    public function razorpayOrderSuccess()
    {

        // \Cake\Log\Log::write('info', "razor");
        //\Cake\Log\Log::write('info', $_POST);
        // die;
        $generated_signature = hash_hmac('sha256', $_POST["razorpay_order_id"] . "|" . $_POST["razorpay_payment_id"], RAZORPAY_KEY_SECRET);

        $this->loadComponent('Razorpay', ['sandbox' => TRUE]);
        $data = $this->Razorpay->verifyPayment($_POST["razorpay_order_id"]);

        if ($generated_signature == $_POST["razorpay_signature"] && $data->items[0]->id == $_POST["razorpay_payment_id"]) {
            //$this->paymentsuccess($this->_cart_id, 2, 'COD-' . $this->_cart_id);
            //echo $_POST["razorpay_order_id"];die;
            //echo $_POST["razorpay_payment_id"];die;
            $cartTbl = TableRegistry::get('Bookings');
            $cart = $cartTbl->find()->where(["order_id" => $_POST["razorpay_order_id"]])->first();
            $cart->razorpay_payment_id = $_POST["razorpay_payment_id"];
            $cartTbl->save($cart);
        }

        //$this->autoRender = FALSE;
    }
    public function invoicedownload($id)
    {
        $Invoice = TableRegistry::getTableLocator()->get('Invoices');
        $invoice = $Invoice->get($id, [
            'contain' => ['Users', 'UserDeliveryDetails', 'InvoiceItems.Products', 'InvoiceItems']
        ]);


        //pr($invoice);die;




        $this->viewBuilder()->enableAutoLayout(false);
        $this->viewBuilder()
            ->setClassName('CakePdf.Pdf')
            ->setLayout('pdf')
            ->setOptions(['pdfconfig' => [
                'filename' => 'Invoice',
                'render' => 'download',
                "enable_html5_parser" => true,
                'orientation' => 'portrait'
            ]]);

        $this->set(compact('invoice'));
    }
}
