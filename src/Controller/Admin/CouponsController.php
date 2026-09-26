<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Coupons Controller
 *
 * @property \App\Model\Table\CouponsTable $Coupons
 */
class CouponsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $coupons = $this->paginate($this->Coupons);

        $this->set(compact('coupons'));
        $this->set('_serialize', ['coupons']);
    }

    /**
     * View method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => ['CartItemOriginals', 'CartItems', 'CartOriginals', 'Carts', 'CourseCoupons', 'InvoiceItems', 'Invoices', 'OfflineCartItems', 'OfflineCarts', 'UserCoupons']
        ]);

        $this->set('coupon', $coupon);
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coupon = $this->Coupons->newEmptyEntity();
        if ($this->request->is('post')) {
			
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
		
			
				$product_coupon = $this->Coupons->ProductCoupons->newEmptyEntity();
				$product_coupon = $this->Coupons->ProductCoupons->patchEntity($product_coupon, $this->request->getData());
				$product_coupon->coupon_id=$coupon->id;
				$this->Coupons->ProductCoupons->save($product_coupon);
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Coupons->ProductCoupons->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'=>function ($q) {
                return $q
				
               
				->contain(['Products'=>function($q){return $q->select(['id','name','type_id']);}])
                         
                         ->select(['id','name','sub_category_id']);}])
                         ->select(['id','name','category_id']);}])
                         ->select(['Categories.id','Categories.name']);
        
           //$products = $this->Coupons->ProductCoupons->Products->find('list', ['limit' => 2000]);
		   //$brands = $this->Coupons->ProductCoupons->Brands->find('list', ['limit' => 2000]);
        $this->set(compact('categories'));
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => ['ProductCoupons']
        ]);
        
     
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
				$product_coupon = $this->Coupons->ProductCoupons->get($coupon->product_coupons[0]->id, [
                    'contain' => []
                ]);
		
				
				$product_coupon = $this->Coupons->ProductCoupons->patchEntity($product_coupon, $this->request->getData());
				//$product_coupon->coupon_id=$coupon->id;
				$this->Coupons->ProductCoupons->save($product_coupon);
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Coupons->ProductCoupons->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'=>function ($q) {
                return $q
				
               
				->contain(['Products'=>function($q){return $q->select(['id','name','type_id']);}])
                         
                         ->select(['id','name','sub_category_id']);}])
                         ->select(['id','name','category_id']);}])
                         ->select(['Categories.id','Categories.name']);
                         
         
        

        $this->set(compact( 'categories'));
        $this->set(compact('coupon'));
        $this->set('_serialize', ['coupon']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coupon = $this->Coupons->get($id);
        if ($this->Coupons->delete($coupon)) {
            $this->Flash->success(__('The coupon has been deleted.'));
        } else {
            $this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
