<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * ProductCharges Controller
 *
 * @property \App\Model\Table\ProductChargesTable $ProductCharges
 */
class ProductChargesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
              if(isset($this->request->query['page'])){
            $this->request->getSession()->write('Products.page',$this->request->query['page']);
        }else{
            
            $this->request->getSession()->write('Products.page',0);
        }
        
        		$search=[];
		 	$this->set('placeholder',['Search by  Name , Category , Sub Category, Type']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['ProductCharges.name LIKE' => "%$keyword%",'Categories.name LIKE' => "%$keyword%",'SubCategories.name LIKE' => "%$keyword%",'Types.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => ['Categories', 'SubCategories', 'Types']
					];
				   
					$productCharges = $this->paginate($this->ProductCharges->find()->where($search));

					$this->set(compact('productCharges'));
					$this->set('_serialize', ['productCharges']);
		}


    }

    /**
     * View method
     *
     * @param string|null $id Product Charge id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productCharge = $this->ProductCharges->get($id, [
            'contain' => []
        ]);

        $this->set('productCharge', $productCharge);
        $this->set('_serialize', ['productCharge']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productCharge = $this->ProductCharges->newEmptyEntity();
        if ($this->request->is('post')) {
            $productCharge = $this->ProductCharges->patchEntity($productCharge, $this->request->getData());
            if ($this->ProductCharges->save($productCharge)) {
                $this->Flash->success(__('The product charge has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product charge could not be saved. Please, try again.'));
            }
        }
		$categories = $this->ProductCharges->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'])
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
        $this->set(compact('categories'));
        $this->set(compact('productCharge'));
        $this->set('_serialize', ['productCharge']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Charge id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productCharge = $this->ProductCharges->get($id, [
            'contain' => []
        ]);
        $page= $this->request->getSession()->read('ProductCharges.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCharge = $this->ProductCharges->patchEntity($productCharge, $this->request->getData());
            if ($this->ProductCharges->save($productCharge)) {
                $this->Flash->success(__('The product charge has been saved.'));

              return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The product charge could not be saved. Please, try again.'));
            }
        }
        

       $categories = $this->ProductCharges->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'])
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
        $this->set(compact('categories'));
        $this->set(compact('productCharge'));
        $this->set('_serialize', ['productCharge'],['categories']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Charge id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productCharge = $this->ProductCharges->get($id);
        $page= $this->request->getSession()->read('ProductCharges.page');
        if ($this->ProductCharges->delete($productCharge)) {
            $this->Flash->success(__('The product charge has been deleted.'));
        } else {
            $this->Flash->error(__('The product charge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
    }
}
