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

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    public function details($slug = null)
    {
        $serviceTable = TableRegistry::getTableLocator()->get('Services');
        $services = $serviceTable->findBySlug($slug)->first();
        $this->set('services', $services);
        $servicesdetails = $serviceTable->findBySlug($slug)->where(['is_active' => 1])->where(['is_deleted' => 0])->first();
        $this->set('servicesdetails', $servicesdetails);
    }



    public function install()
    {
        if ($this->request->is('post')) {
            if (isset($_POST['sub'])) {
                $fan = TableRegistry::getTableLocator()->get('Installations');
                $question11 = $fan->newEmptyEntity();
                $question1 = $fan->patchEntity($question11, $this->request->getData());

                $question1->dt = date('Y-m-d');



                if ($r = $fan->save($question1)) {




                    $this->Flash->error(__('Thanks for your Enquiry'));
                    return $this->redirect($this->Auth->redirectUrl());

                    //return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
                } else {
                    $this->Flash->error(__('Enquiry is not Generated. Please, try again.'));
                    return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                }
            }
        }
    }
    public function reseller()
    {
        if ($this->request->is('post')) {
            if (isset($_POST['sub'])) {
                $fan = TableRegistry::getTableLocator()->get('Vendors');
                $question11 = $fan->newEmptyEntity();
                $question1 = $fan->patchEntity($question11, $this->request->getData());

                $question1->dt = date('Y-m-d');



                if ($r = $fan->save($question1)) {




                    $this->Flash->error(__('Thanks for your Registration. Please wait for admin Approval'));
                    return $this->redirect($this->Auth->redirectUrl());

                    //return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
                } else {
                    $this->Flash->error(__('Enquiry is not Generated. Please, try again.'));
                    return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                }
            }
        }
    }
    public function servicepartner()
    {
        if ($this->request->is('post')) {
            if (isset($_POST['sub'])) {
                $fan = TableRegistry::getTableLocator()->get('Servicepartners');
                $question11 = $fan->newEmptyEntity();
                $question1 = $fan->patchEntity($question11, $this->request->getData());

                $question1->dt = date('Y-m-d');



                if ($r = $fan->save($question1)) {




                    $this->Flash->error(__('Thanks for your Enquiry'));
                    return $this->redirect($this->Auth->redirectUrl());

                    //return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
                } else {
                    $this->Flash->error(__('Enquiry is not Generated. Please, try again.'));
                    return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                }
            }
        }
    }
    public function franchise()
    {
        if ($this->request->is('post')) {
            if (isset($_POST['sub'])) {
                $fan = TableRegistry::getTableLocator()->get('Franchises');
                $question11 = $fan->newEmptyEntity();
                $question1 = $fan->patchEntity($question11, $this->request->getData());

                $question1->dt = date('Y-m-d');

                // 			$name=$this->request->getData('name');
                // 			$company_name=$this->request->getData('company_name');
                // 			$email=$this->request->getData('email');
                // 			$mobile=$this->request->getData('mobile');
                // 			$address=$this->request->getData('address');
                // 			$pin=$this->request->getData('pin');
                // 			$city=$this->request->getData('city');
                // 			$message=$this->request->getData('message');
                // 			$admin_email='bideshbhunia@gmail.com';


                if ($r = $fan->save($question1)) {




                    $this->Flash->error(__('Thanks for your Enquiry'));
                    return $this->redirect($this->Auth->redirectUrl());

                    //return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
                } else {
                    $this->Flash->error(__('Enquiry is not Generated. Please, try again.'));
                    return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                }
            }
        }
    }


    public function about()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find()->where(['page_name' => 1])->where(['section' => 1])->where(['ord' => 1])->where(['is_active' => 1])->first();
        $this->set('about', $slideralls);

        $slideralls = $seller->find()->where(['page_name' => 1])->where(['section' => 1])->where(['ord' => 2])->where(['is_active' => 1])->first();
        $this->set('about1', $slideralls);

        $branchObj = TableRegistry::get('Pages');
        $slug = "about-us";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function successful() {}

    public function bookappointment()
    {
        $package = TableRegistry::getTableLocator()->get('Packages');
        $packages = $package->find()->where(['is_active' => 1]);
        $this->set('packages', $packages);
        $bookingsTable = TableRegistry::getTableLocator()->get('Bookings');
        $booking = $bookingsTable->newEmptyEntity();
    if ($this->request->is('post')) {
        $userId = $this->Auth->user('id');
        $data = $this->request->getData();
        $data['user_id'] = $userId;
        $booking = $bookingsTable->patchEntity($booking, $data);
        if ($bookingsTable->save($booking)) {
            $this->Flash->success('Your appointment has been booked successfully.');
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        } else {
            $this->Flash->error('Unable to book the appointment. Please try again.');
        }
    }
            $this->set(compact('booking'));

        $branchObj = TableRegistry::get('Pages');
        $slug = "book-appointment";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }
    public function requestforspecialappointment()
    {
        $branchObj = TableRegistry::get('Pages');
        $slug = "book-appointment";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }
    public function shippingdelivery()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find()->where(['page_name' => 15])->where(['section' => 1])->where(['is_active' => 1])->first();


        $this->set('about', $slideralls);

        $branchObj = TableRegistry::get('Pages');
        $slug = "shipping-and-delivery-policy";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function catalogues()
    {
        $this->loadModel('Catalogues');

        $catalogues = $this->Catalogues->find("all")->where(['is_active' => 1])->limit(50);
        $this->set('catalogues', $catalogues);
    }


    public function termsandconditions()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find()->where(['page_name' => 12])->where(['section' => 1])->where(['is_active' => 1])->first();

        $branchObj = TableRegistry::get('Pages');
        $slug = "terms-and-conditions";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
        $this->set('about', $slideralls);
    }
    public function privacypolicy()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find()->where(['page_name' => 13])->where(['section' => 1])->where(['is_active' => 1])->first();


        $this->set('about', $slideralls);

        $branchObj = TableRegistry::get('Pages');
        $slug = "privacy-policy";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }
    public function returnpolicy()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find()->where(['page_name' => 14])->where(['section' => 1])->where(['is_active' => 1])->first();


        $this->set('about', $slideralls);

        $branchObj = TableRegistry::get('Pages');
        $slug = "returns-and-exchange-policy";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function contact()
    {
        if ($this->request->is('post')) {
            if (isset($_POST['sub'])) {

                $name = $this->request->getData('name');
                $email = $this->request->getData('email');
                $phone = $this->request->getData('phone');
                $subject = $this->request->getData('subject');
                $message = $this->request->getData('message');
                $admin_email = 'info@astroaaxis.com';


                $this->loadComponent('SendMail');
                $this->SendMail->sendMail(8, $admin_email, ['name' => $name, 'email' => $email, 'mobile' => $phone, 'message' => $message, 'message' => $message]);
                echo "<script type='text/javascript'>alert('We have received your enquiry.');</script>";
            }
        }

        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $contactservice = TableRegistry::getTableLocator()->get('ContactServices');
        $slideralls = $seller->find()->where(['page_name' => 2])->where(['section' => 1])->where(['is_active' => 1])->first();
        $slideralls1 = $seller->find()->where(['page_name' => 2])->where(['section' => 2])->where(['is_active' => 1])->first();
        $slideralls2 = $seller->find()->where(['page_name' => 2])->where(['section' => 3])->where(['is_active' => 1])->first();
        $slideralls3 = $seller->find()->where(['page_name' => 2])->where(['section' => 4])->where(['is_active' => 1])->first();
        $contactservicelist = $contactservice->find()->where(['is_active' => 1])->where(['is_deleted' => 0])->all();
        $socialTable = TableRegistry::getTableLocator()->get('Socials');
        $socials = $socialTable->find()->first();;
        $this->set('socials', $socials);

        $this->set('contactservicelist', $contactservicelist);

        $this->set('head', $slideralls);
        $this->set('dis', $slideralls1);
        $this->set('phone', $slideralls2);
        $this->set('email', $slideralls3);
        $branchObj = TableRegistry::get('Pages');
        $slug = "contact";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }
    public function support()
    {

        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls = $seller->find()->where(['page_name' => 3])->where(['section' => 1])->where(['is_active' => 1])->first();
        $slideralls1 = $seller->find()->where(['page_name' => 3])->where(['section' => 2])->where(['is_active' => 1])->first();
        $slideralls2 = $seller->find()->where(['page_name' => 3])->where(['section' => 3])->where(['is_active' => 1]);

        $this->set('support', $slideralls);
        $this->set('ins', $slideralls1);
        $this->set('video', $slideralls2);
    }
    public function photo()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls2 = $seller->find()->where(['page_name' => 4])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('photo', $slideralls2);
    }
    public function video()
    {

        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls2 = $seller->find()->where(['page_name' => 5])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('video', $slideralls2);
    }
    public function feedback()
    {

        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls2 = $seller->find()->where(['page_name' => 6])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('feed', $slideralls2);
    }
    public function material()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls2 = $seller->find()->where(['page_name' => 7])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('mat', $slideralls2);
    }
    public function information()
    {

        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls2 = $seller->find()->where(['page_name' => 8])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('info', $slideralls2);
    }
    public function information_details($id = NULL)
    {

        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls = $seller->find()->where(['page_name' => 8])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('info', $slideralls);

        $slideralls2 = $seller->find()->where(['id' => $id])->where(['is_active' => 1])->first();

        $this->set('v', $slideralls2);
    }
    public function certificate()
    {

        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls2 = $seller->find()->where(['page_name' => 9])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('cer', $slideralls2);
    }
    public function csr()
    {

        $seller = TableRegistry::getTableLocator()->get('SellerPages');

        $slideralls2 = $seller->find()->where(['page_name' => 10])->where(['section' => 1])->where(['is_active' => 1]);

        $this->set('csr', $slideralls2);
    }

    public function holistictreatmentinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 16])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "holistic-treatment-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function anxietytreatmentinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 18])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "anxiety-treatment-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function bookonlinehomeopathyconsultationinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 17])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "book-online-homeopathy-consultation-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function chronicdiseasetreatmentinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 19])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "chronic-disease-treatment-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function hairfalltreatmentinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 20])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "hairfall-treatment-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function homeopathypetconsultationinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 21])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "homeopathy-pet-consultation-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function homeopathyspecialistinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 22])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "homeopathy-specialist-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function hormoneimbalancetreatmentinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 23])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "hormone-imbalance-treatment-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }

    public function pcostreatmentinmumbai()
    {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls2 = $seller->find()->where(['page_name' => 24])->where(['section' => 1])->where(['is_active' => 1]);
        $this->set('test', $slideralls2);

        $branchObj = TableRegistry::get('Pages');
        $slug = "pcos-treatment-in-mumbai";
        $page = $branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }
    //end wishlist

}
