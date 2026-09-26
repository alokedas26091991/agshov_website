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
class ExpertiseController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }
    public function index()
    {

        $post = TableRegistry::getTableLocator()->get('Posts');

        $post1 = $this->paginate($post->find("all")->where(['status' => '1']));
        $this->set('post1', $post1);
    }

    public function homeopthaicconsultation() {
        
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls=$seller->find()->where(['page_name'=>7 ])->where(['section'=>1 ])->where(['is_active'=>1 ]);
        $this->set('hc1', $slideralls);

		
		$branchObj = TableRegistry::get('Pages');
        $slug="homeopathic-consultations";
        $page=$branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
	}
    public function counsellingsessions() {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls=$seller->find()->where(['page_name'=>8 ])->where(['section'=>1 ])->where(['is_active'=>1 ]);
        $this->set('hc1', $slideralls);

		$branchObj = TableRegistry::get('Pages');
        $slug="counselling-sessions";
        $page=$branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
	}

    public function babyandmeprograms() {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls=$seller->find()->where(['page_name'=>9 ])->where(['section'=>1 ])->where(['is_active'=>1 ]);
        $this->set('hc1', $slideralls);

		$branchObj = TableRegistry::get('Pages');
        $slug="baby-and-me-programs";
        $page=$branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
	}

    public function hairfalltreatment() {
        $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls=$seller->find()->where(['page_name'=>10 ])->where(['section'=>1 ])->where(['is_active'=>1 ]);
        $this->set('hc1', $slideralls);

		$branchObj = TableRegistry::get('Pages');
        $slug="hairfall-treatment";
        $page=$branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
	}

    public function petconsultation() {
		 $seller = TableRegistry::getTableLocator()->get('SellerPages');
        $slideralls=$seller->find()->where(['page_name'=>11 ])->where(['section'=>1 ])->where(['is_active'=>1 ]);
        $this->set('hc1', $slideralls);

		$branchObj = TableRegistry::get('Pages');
        $slug="pet-consultation";
        $page=$branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
	}
	
public function alldiseases()
    {
        $disease = TableRegistry::getTableLocator()->get('Diseases');
        $diseases=$disease->find()->where(['is_active'=>1 ]);
        $testimonialsTable = TableRegistry::getTableLocator()->get('Testimonials');

    // Create an array to store testimonials for each disease
    $testimonialsByDisease = [];
    
    foreach ($diseases as $d) {
        // Fetch testimonials for each disease
        $testimonialsByDisease[$d->id] = $testimonialsTable->find()->where(['disease_id' => $d->id])->all();
    }

    $this->set(compact('diseases', 'testimonialsByDisease'));
        

        $branchObj = TableRegistry::get('Pages');
        $slug="a-to-z-diseases";
        $page=$branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
    }
}
