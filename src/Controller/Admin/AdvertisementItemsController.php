<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * AdvertisementItems Controller
 *
 * @property \App\Model\Table\AdvertisementItemsTable $AdvertisementItems
 */
class AdvertisementItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        	$search=[];
		 	$this->set('placeholder',['Search here']);
				$search1 = $this->request->getQuery('search');
                if($search1!=null){   
                $keyword= trim($search1);
				$search[]=['OR'=>['Advertisements.name LIKE' => "%$keyword%",'Categories.name LIKE' => "%$keyword%",'SubCategories.name LIKE' => "%$keyword%",'Types.name LIKE' => "%$keyword%",'Brands.name LIKE' => "%$keyword%",'Products.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
        $this->paginate = [
            'contain' => ['Advertisements', 'Categories', 'SubCategories', 'Types', 'Brands', 'Products']
        ];
        $advertisementItems = $this->paginate($this->AdvertisementItems->find()->where($search));

        //pr($advertisementItems);die;

        $this->set(compact('advertisementItems'));
        $this->set('_serialize', ['advertisementItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Advertisement Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advertisementItem = $this->AdvertisementItems->get($id, [
            'contain' => ['Advertisements', 'Categories', 'SubCategories', 'Types', 'Brands', 'Products']
        ]);

        $this->set('advertisementItem', $advertisementItem);
        $this->set('_serialize', ['advertisementItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advertisementItem = $this->AdvertisementItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $advertisementItem = $this->AdvertisementItems->patchEntity($advertisementItem, $this->request->getData());
            if ($this->AdvertisementItems->save($advertisementItem)) {
                $this->Flash->success(__('The advertisement item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The advertisement item could not be saved. Please, try again.'));
            }
        }
        $advertisements = $this->AdvertisementItems->Advertisements->find('list', ['limit' => 200]);
        $categories = $this->AdvertisementItems->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'=>function ($q) {
                return $q
				
               
				->contain(['Products'=>function($q)
				{
				    
				    return $q
				 
				    ->where(['Products.parent_id IS'=>NULL])
				    ->select(['id','name','type_id','parent_id']);
				    
				    
				}
				])
				
                         
                         ->select(['id','name','sub_category_id']);}])
                         ->select(['id','name','category_id']);}])
                         ->select(['Categories.id','Categories.name']);

        $this->set(compact('advertisementItem', 'advertisements', 'categories', 'subCategories', 'types', 'brands', 'products'));
        $this->set('_serialize', ['advertisementItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Advertisement Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advertisementItem = $this->AdvertisementItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advertisementItem = $this->AdvertisementItems->patchEntity($advertisementItem, $this->request->getData());
            if ($this->AdvertisementItems->save($advertisementItem)) {
                $this->Flash->success(__('The advertisement item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The advertisement item could not be saved. Please, try again.'));
            }
        }
        $advertisements = $this->AdvertisementItems->Advertisements->find('list', ['limit' => 200]);
        $categories = $this->AdvertisementItems->Categories->find('all')->contain(['SubCategories'=>function ($q) {
                return $q
				->contain(['Types'=>function ($q) {
                return $q
				
               
				->contain(['Products'=>function($q)
				{
				    return $q
				    ->where(['Products.parent_id IS'=>NULL])
				    ->select(['id','name','type_id']);
				    
				}
				])
                         
                         ->select(['id','name','sub_category_id']);}])
                         ->select(['id','name','category_id']);}])
                         ->select(['Categories.id','Categories.name']);

        $brands = $this->AdvertisementItems->Brands->find();

        $this->set(compact('advertisementItem', 'advertisements', 'categories', 'brands'));
        $this->set('_serialize', ['advertisementItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Advertisement Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advertisementItem = $this->AdvertisementItems->get($id);
        if ($this->AdvertisementItems->delete($advertisementItem)) {
            $this->Flash->success(__('The advertisement item has been deleted.'));
        } else {
            $this->Flash->error(__('The advertisement item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
