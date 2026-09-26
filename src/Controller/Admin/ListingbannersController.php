<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\ORM\TableRegistry;
use App\Controller\Admin\AppController;

/**
 * AdvertisementItems Controller
 *
 * @property \App\Model\Table\AdvertisementItemsTable $AdvertisementItems
 */
class ListingbannersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $fran = TableRegistry::getTableLocator()->get('Franchises');
        $this->paginate = [
            'contain' => []
        ];
        $listingbanner = $this->paginate($fran->find());

        $this->set(compact('listingbanner'));
        $this->set('_serialize', ['listingbanner']);
    }



    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listingbanner = $this->Listingbanners->newEmptyEntity();
        if ($this->request->is('post')) {
            $listingbanner = $this->Listingbanners->patchEntity($listingbanner, $this->request->getData());
            if($_FILES['image1']['name']!=''){
					$this->loadComponent('UploadImage');
					$listingbanner->image=$this->UploadImage->do_upload_image_compress('listingbanner',$_FILES['image1'],'listingbanner','ll');
				 
			 }
            if ($this->Listingbanners->save($listingbanner)) {
                $this->Flash->success(__('The Listingbanner has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Listingbanner could not be saved. Please, try again.'));
            }
        }

        $categories = $this->Listingbanners->Categories->find('all')->contain(['SubCategories'=>function ($q) {
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

        $brands = $this->Listingbanners->Brands->find();
        $this->set(compact('listingbanner', 'categories','brands'));
        $this->set('_serialize', ['listingbanner']);
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
        $fran = TableRegistry::getTableLocator()->get('Franchises');
        $listingbanner = $fran->get($id, [
            'contain' => []
        ]);
    
       
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listingbanner1 = $fran->patchEntity($listingbanner, $this->request->getData());
            
            if ($fran->save($listingbanner1)) {
                $this->Flash->success(__('The Listingbanner has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Listingbanners could not be saved. Please, try again.'));
            }
        }
       

       
        $this->set(compact('listingbanner'));
        $this->set('_serialize', ['listingbanner']);
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
        $fran = TableRegistry::getTableLocator()->get('Franchises');
        $advertisementItem = $fran->get($id);
        
        if ($fran->delete($advertisementItem)) {
            $this->Flash->success(__('The Data has been deleted.'));
        } else {
            $this->Flash->error(__('The Data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
