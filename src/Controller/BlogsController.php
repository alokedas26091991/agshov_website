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
class BlogsController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();
    }
    public function index()
    {
         $this->paginate = [
            'limit' => 6,
            'order' => ['Posts.id' => 'desc']
        ];
		$branchObj = TableRegistry::get('Pages');
        $slug="homeopathic-consultations";
        $page=$branchObj->findBySlug($slug)->first();
        $this->_display_meta = TRUE;
        $this->setMeta($page);
        $post = TableRegistry::getTableLocator()->get('Posts');
        $postcategories = TableRegistry::getTableLocator()->get('Postcategories');
        $tags = TableRegistry::getTableLocator()->get('Tags');
        
     

        $post1 = $this->paginate($post->find("all")->where(['is_deleted' => '0'])->where(['post_type' => '1']));
       
        
        $this->set(compact('post1'));
        $this->set('_serialize', ['post1']);

        $postcategories1 = $postcategories->find("all")->where(['is_deleted' => '0']);
        $this->set('postcategories1', $postcategories1);

        $tags1 = $tags->find("all")->where(['is_deleted' => '0']);
        $this->set('tags1', $tags1);
    }

    public function blogcategory($cat = null)
    {

        $post = TableRegistry::getTableLocator()->get('Posts');
        $postcategories = TableRegistry::getTableLocator()->get('Postcategories');
        $tags = TableRegistry::getTableLocator()->get('Tags');



        $postcategories1 = $postcategories->find("all");
        $this->set('postcategories1', $postcategories1);

        $tags1 = $tags->find("all");
        $this->set('tags1', $tags1);

        $catobj = $postcategories->find("all")->where(['slug' => $cat])->first();
		
		$this->_display_meta = TRUE;
        $this->setMeta($catobj);



        $post1 = $this->paginate($post->find('all', array('conditions' => array('Posts.post_type' => 1,'Posts.is_deleted' => 0, 'FIND_IN_SET(\'' . $catobj->id . '\',Posts.category)'))));

        $this->set('post1', $post1);
    }
    public function tag($slug = null)
    {

        $post = TableRegistry::getTableLocator()->get('Posts');
        $postcategories = TableRegistry::getTableLocator()->get('Postcategories');
        $tags = TableRegistry::getTableLocator()->get('Tags');



        $postcategories1 = $postcategories->find("all");
        $this->set('postcategories1', $postcategories1);

        $tags1 = $tags->find("all");
        $this->set('tags1', $tags1);

        $catobj = $tags->find("all")->where(['slug' => $slug])->first();

		$this->_display_meta = TRUE;
        $this->setMeta($catobj);

        $post1 = $this->paginate($post->find('all', array('conditions' => array('Posts.post_type' => 1,'Posts.is_deleted' => 0, 'FIND_IN_SET(\'' . $catobj->id . '\',Posts.tag)'))));

        $this->set('post1', $post1);
    }
    public function blogdetails($slug = null)
    {

        $postcategories = TableRegistry::getTableLocator()->get('Postcategories');
        $tags = TableRegistry::getTableLocator()->get('Tags');



        $postcategories1 = $postcategories->find("all")->where(['is_deleted' => '0']);
        $this->set('postcategories1', $postcategories1);

        $tags1 = $tags->find("all")->where(['is_deleted' => '0']);
        $this->set('tags1', $tags1);

        $post = TableRegistry::getTableLocator()->get('Posts');

        $post1 = $post->find("all")->where(['slug' => $slug])->first();
        $this->set('post1', $post1);

        

        $this->_display_meta = TRUE;
        $this->setMeta($post1);

        
    }
}
