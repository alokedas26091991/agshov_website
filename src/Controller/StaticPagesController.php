<?php
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
 declare(strict_types=1);
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class StaticPagesController extends AppController
{
     public function initialize(): void
	 {
        parent::initialize();
       
       
    }

  
public function index($slug=null)
{
    	   
            
            $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug($slug)->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
           
}
public function aboutUs()
{
    	   
            
            $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('about-us')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
			$this->render('about');
           
}
public function privacyAndPolicy()
{
    	   
            
            $branchObj =TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('privacy-and-policy')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
			$this->render('index');
           
}
public function returnpolicy()
{
    	   
            
            $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('return-policy')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
			$this->render('index');
           
}
public function shipping()
{
    	   
            
            $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('shipping')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
			$this->render('index');
           
}
public function covidnote()
{
    	   
            
            $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('covid-note')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
			$this->render('index');
           
}
public function cookiee()
{
    	   
            
            $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('cookies')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
			$this->render('index');
           
}
public function termsAndConditions()
{
    	   
            
            $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('terms-and-conditions')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			$this->set('page', $page);
			$this->render('index');
           
}
   public function contact(){
   
   }
   public function centre($slug=null){
			$branchObj = TableRegistry::get('Branches');
			$branch=$branchObj->findBySlug($slug)->first();
			 $this->set('branch', $branch);
			
   }
}
