<?php
namespace App\Controller\Seller;
use Cake\Routing\Router;
use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [ 'Items']
        ];
        //$sellerbrands = $this->paginate($this->Sellerbrands->find()->where(['user_id' => $this->Auth->user('id')]));
        $IinvoiceItemObj=TableRegistry::get('InvoiceItems');
        $sellerbrands = $this->paginate($IinvoiceItemObj->find()->where(['vendor_id'=>$this->Auth->user('id')]));
        $this->set(compact('sellerbrands'));
        $this->set('_serialize', ['sellerbrands']);
    }




}
