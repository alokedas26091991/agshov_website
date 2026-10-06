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

use Cake\Controller\Controller;

use Cake\Cache\Cache;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
     protected $_display_meta;
     protected $_display_cart;
     protected $_display_indvseller;
    public function initialize(): void
    {
        parent::initialize();
        

        $this->_display_meta = FALSE;
         $this->_display_cart = TRUE;
         $this->_display_indvseller = FALSE;
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
      
		$this->viewBuilder()->setLayout('layout_site');
		 $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                        
                        
                    ],
                    'scope'=>[
                        'Users.is_deleted' => 0,
                        'Users.is_active' => 1,
                        'Users.is_customer'=>1
                    ],
                    'finder' => 'auth'
                ]

            ],
            'loginRedirect' => [
                'controller' => 'Home',
                'action' => 'index',
                'prefix'=>false,
                'plugin' => false
            ],
            'logoutRedirect' => [
                'controller' => 'Home',
                'action' => 'index',
                'prefix'=>FALSE
            ],
            'loginAction' => [
                'controller' => 'login',
                'action' => 'index',
                'prefix'=>FALSE,
                'plugin' => false
            ]
        ]);
        $this->Auth->autoRedirect = true;
        $this->Auth->allow();
    }
    


    public function beforeRender(EventInterface $event)
    {
        // Auto-lookup SEO data from SeoPages table if meta title is not yet set
        if (!$this->_display_meta || empty($this->viewBuilder()->getVar('meta_title'))) {
            $pathClean = trim($this->request->getPath(), '/');
            $slugsToCheck = $pathClean !== '' ? [$pathClean, '/' . $pathClean] : ['home', '/home'];
            if ($pathClean === '' || $pathClean === 'home') {
                $slugsToCheck[] = '';
                $slugsToCheck[] = '/';
            }

            try {
                $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');
                $seoPage = $seoPagesTable->find()->where(['slug IN' => $slugsToCheck])->first();
                if ($seoPage) {
                    $this->_display_meta = true;
                    $this->set('meta_title', !empty($seoPage->meta_title) ? $seoPage->meta_title : $seoPage->name);
                    $this->set('meta_keywords', !empty($seoPage->meta_keywords) ? $seoPage->meta_keywords : '');
                    $this->set('meta_desc', !empty($seoPage->meta_desc) ? $seoPage->meta_desc : '');
                    $this->set('canonical', !empty($seoPage->canonical) ? $seoPage->canonical : '');
                    $this->set('title', !empty($seoPage->name) ? $seoPage->name : '');
                    $this->set('robot', !empty($seoPage->robots) ? $seoPage->robots : 'index,follow');
                }
            } catch (\Exception $e) {
                // Ignore if table not found or query fails
            }
        }

        $this->set('_display_meta',  $this->_display_meta);
        $this->set('_display_cart',  $this->_display_cart);
         
        $cache_variable = "menu_list";
    
        $categoryObj = TableRegistry::getTableLocator()->get('Categories');
        $menu=$categoryObj->find("all",[
        "order"=>["Categories.menu_order"=>"asc"]
        ])->contain(['SubCategories','SubCategories.Types'])->where(["Categories.is_active"=>"1"]);
         
        $this->set('menu',$menu);


        $menu1 = $categoryObj->find("all", [
            "order" => ["Categories.menu_order" => "asc"]
        ])
        ->contain(['SubCategories', 'SubCategories.Types'])
        ->where([
            "Categories.is_active" => "1",
            "Categories.is_menu" => "1"
        ]);
        
        $this->set('menu1', $menu1);
        

        
        $socialObj = TableRegistry::getTableLocator()->get('Socials');
        $social=$socialObj->find("all")->first();
         
        $this->set('social',$social);
        
        $postcategories = TableRegistry::getTableLocator()->get('Postcategories');
        $postcategories1 = $postcategories->find("all")->where(['is_deleted' => '0']);
        $this->set('postcategories1', $postcategories1);

        $service = TableRegistry::getTableLocator()->get('Services');
        $services = $service->find("all")->where(['is_active' => '1','is_deleted' => '0']);
        $this->set('services', $services);
        
        $productDataIds=[];
        
        
        if(!$this->request->getSession()->read('Auth.User.id')){
            
            
            
            
        $data=[];
            $Carts=TableRegistry::getTableLocator()->get('TempCarts');
            $cart = $Carts->find('all')->where(['TempCarts.user_id IS' => $this->request->getSession()->read('SesionDataId')])->contain(['TempCartItems.Products']);
            if($cart->count()>0){
            
            $cart=$cart->first();
            foreach($cart->temp_cart_items as $item){
               
                $item->product->quantity=$item->quantity;
                $data[]=$item->product;
                $productDataIds[]=$item->product->id;
                
                }
            }
            
        }else{
            
            
            
            if($this->request->getSession()->read('Product') && !empty($this->request->getSession()->read('Product'))){
                $data=$this->request->getSession()->read('Product');
                foreach($data as $d){
                    $this->addcart($d->slug ,$d->quentity);
                    }
                    
                $this->request->getSession()->write('Product', []);
                }
                if($this->request->getSession()->read('SesionDataId') && !empty($this->request->getSession()->read('SesionDataId'))){
                    $TempCarts=TableRegistry::getTableLocator()->get('TempCarts');
                    $tmp=$TempCarts->find()->where(['user_id'=>$this->request->getSession()->read('SesionDataId')])->first();
                    if($tmp)
                    {
                        $TempCarts->delete($tmp);
                    }
                    
                    $this->request->getSession()->write('SesionDataId',0);
                }
                
            $data=[];
            $Carts=TableRegistry::getTableLocator()->get('Carts');
            $cart = $Carts->find('all')->where(['Carts.user_id' => $this->request->getSession()->read('Auth.User.id')])->contain(['CartItems.Products']);
           
            if($cart->count()>0){
            $cart=$cart->first();
            $price=0;
            foreach($cart->cart_items as $item){
                $item->product->quantity=$item->quantity;
                $data[]=$item->product;
                $productDataIds[]=$item->product->id;
                $price=$price+$item->item_gross_amount;
                }
            }
            }
            
            
            $this->set('ProductObjData',$data);
            $this->set('productDataIds',$productDataIds);
        
        
            $Users = TableRegistry::getTableLocator()->get('Users');
            $User = $Users->newEmptyEntity();
            if ($this->request->is('post') && $this->request->getData('signup_submit') == '1') {
    
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
                    $this->Flash->success(__('Account Created successfully'));
    
                    return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                } else {
                    $this->Flash->error(__('Your Registration has not been Successfully Completed. Please, try again.'));
                    return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                }
            }
            
            
        }

	protected function setMeta($object = null, $type = TRUE)
    {
        $robot = 'index,follow';
        $this->_display_meta = TRUE;

        // Try lookup in SeoPages first
        $slugCandidates = [];
        if (is_string($object)) {
            $slugCandidates[] = $object;
        } elseif (is_object($object)) {
            if (!empty($object->slug)) {
                $slugCandidates[] = $object->slug;
            }
            if (!empty($object->page_name)) {
                $slugCandidates[] = $object->page_name;
            }
            if (!empty($object->name)) {
                $slugCandidates[] = $object->name;
            }
        }

        $requestPath = trim($this->request->getPath(), '/');
        if (!empty($requestPath)) {
            $slugCandidates[] = $requestPath;
        } else {
            $slugCandidates[] = 'home';
        }

        $allSlugs = [];
        foreach ($slugCandidates as $cand) {
            $cand = trim((string)$cand);
            if ($cand === '') continue;
            $allSlugs[] = $cand;
            $allSlugs[] = '/' . ltrim($cand, '/');
            $allSlugs[] = ltrim($cand, '/');
        }
        $allSlugs = array_values(array_unique($allSlugs));

        $seoPage = null;
        if (!empty($allSlugs)) {
            try {
                $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');
                $seoPage = $seoPagesTable->find()->where(['slug IN' => $allSlugs])->first();
            } catch (\Exception $e) {
                // Table might not exist or error
            }
        }

        if ($seoPage) {
            $this->set('meta_title', !empty($seoPage->meta_title) ? $seoPage->meta_title : ($seoPage->name ?? ''));
            $this->set('meta_keywords', !empty($seoPage->meta_keywords) ? $seoPage->meta_keywords : '');
            $this->set('meta_desc', !empty($seoPage->meta_desc) ? $seoPage->meta_desc : '');
            $this->set('canonical', !empty($seoPage->canonical) ? $seoPage->canonical : '');
            $this->set('title', !empty($seoPage->name) ? $seoPage->name : '');
            $this->set('robot', !empty($seoPage->robots) ? $seoPage->robots : $robot);
            return;
        }

        // Fallback to passed object if not found in SeoPages
        if (is_object($object)) {
            if ($type) {
                $metaTitle = !empty($object->meta_title) ? $object->meta_title : 'Agshov Pharmaceuticals';
                $metaKeywords = !empty($object->meta_keywords) ? $object->meta_keywords : 'Agshov Pharmaceuticals';

                $this->set('meta_title', $metaTitle);
                $this->set('meta_keywords', $metaKeywords);
                $this->set('meta_desc', $object->meta_desc ?? $object->meta_description ?? '');
                $this->set('canonical', $object->canonical ?? '');
                $this->set('title', $object->name ?? '');
                $this->set('desc', $object->introduction ?? '');
                $this->set('image', $object->photo ?? '');
                $this->set('slug', $object->slug ?? '');
                if (!empty($object->robots)) {
                    $this->set('robot', $object->robots);
                } else {
                    $this->set('robot', $robot);
                }
            } else {
                $static_pages = TableRegistry::getTableLocator()->get('StaticPages');
                $data = $static_pages->findByPageName($object)->first();
                if ($data) {
                    $metaTitle = !empty($data->meta_title) ? $data->meta_title : 'Agshov Pharmaceuticals';
                    $metaKeywords = !empty($data->meta_keywords) ? $data->meta_keywords : 'Agshov Pharmaceuticals';

                    $this->set('meta_title', $metaTitle);
                    $this->set('meta_keywords', $metaKeywords);
                    $this->set('meta_desc', $data->meta_desc ?? $data->meta_description ?? '');
                    $this->set('canonical', $data->canonical ?? '');
                    if (!empty($data->robots)) {
                        $this->set('robot', $data->robots);
                    } else {
                        $this->set('robot', $robot);
                    }
                }
            }
        }
    }
}
