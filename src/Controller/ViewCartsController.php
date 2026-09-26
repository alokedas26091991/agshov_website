<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Cache\Cache;
use Cake\Datasource\ConnectionManager;
use App\Controller\CommonTrait;


/**
 * Carts Controller
 *
 * @property \App\Model\Table\CartsTable $Carts
 */
class ViewCartsController extends AppController {

    private $_cart_id, $_total_price, $_order_id;
    use CommonTrait; 
    public function initialize(): void {
        parent::initialize();

        $this->_cart_id = NULL;
        $this->_total_price = NULL;
        $this->_order_id = NULL;

        $this->Auth->allow(['index', 'addtocart',"getDataCart"]);
        $this->Auth->deny(['checkout', 'buynow']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        
        $this->_display_cart=FALSE;

        $updatedetails = [];
        $prefix = "";
        if ($this->Auth->user('id')) {

            $updatedetails = true;

            $prefix = "Temp";
            $data = $this->request->getSession()->read('Product');

            if ($this->request->getSession()->read('Product')) {
                foreach ($data as $d) {
                    $this->addcart($d->slug, $d->quentity);
                }
            }
            $this->request->getSession()->write('Product', []);
        }

        $this->set('updatedetails', $updatedetails);
        $this->set('prefix', $prefix);

        //$this->set(compact('userdetails'));
    }

    public function checkout() {
        
        $this->_display_cart=FALSE;
        
    }

    public function wishlistdelete($id = null)
    {
		$Wishlists = TableRegistry::getTableLocator()->get('Wishlists');
        //$this->request->allowMethod(['post', 'delete']);
        $wish = $Wishlists->get($id);
        if ($Wishlists->delete($wish)) {
            //$this->Flash->success(__('This Product is removed from Wishlist'));
        } else {
            //$this->Flash->error(__('This Product is Not removed from Wishlist, try again.'));
        }

        return $this->redirect(['controller' => 'ViewCarts', 'action' => 'wishlist1']);
    }

 

}
