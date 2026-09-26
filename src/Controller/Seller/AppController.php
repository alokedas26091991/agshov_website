<?php

declare(strict_types = 1);
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

namespace App\Controller\Seller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public function initialize(): void {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->viewBuilder()->setLayout('layout_vendor');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'scope' => ['Users.is_deleted' => 0, 
                    'Users.is_vendor' => '1',
                    'Users.is_active' => '1'
                    
                    ],
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Products',
                'action' => 'catelog',
                'prefix' => 'Seller',
                'plugin' => NULL,
                '_matchedRoute' => '/seller',
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'logout',
                'prefix' => 'Seller',
                'home'
            ]
        ]);
        //$this->loadComponent('MyAcl');
        $this->_is_lower_nav = true;
        $this->_access_type = [
            ACCESS_GENERAL => 'General',
            ACCESS_VENDOR => 'Vendor',
            ACCESS_ADMIN => 'Admin',
            ACCESS_API => 'Api'
        ];
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(EventInterface $event) {
        if ($this->Auth->user('vendor_id')) {
            $vendorObj = \Cake\ORM\TableRegistry::getTableLocator()->get('Vendors');
            $vendor = $vendorObj->find()->where(['id' => $this->Auth->user('vendor_id')])->first();
            $this->set('vendor', $vendor);

            $this->set('is_lower_nav', $this->_is_lower_nav);
            if ($this->Auth->user('id')) {
                //echo $this->request->param('action');
                //die;
            }
        }
    }

}
