<?php
namespace App\Controller\Vendor;

use App\Controller\Vendor\AppController;

/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 */
class BrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'SubCategories', 'Types', 'Users']
        ];
        $brands = $this->paginate($this->Brands);

        $this->set(compact('brands'));
        $this->set('_serialize', ['brands']);
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => ['Categories', 'SearchUserDetails', 'Users']
        ]);

        $this->set('type', $type);
        $this->set('_serialize', ['type']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brand = $this->Brands->newEntity();
        if ($this->request->is('post')) {
            $brand = $this->Brands->patchEntity($brand, $this->request->data);
			$brand->user_id=$this->Auth->user('id');
			$brand->created_date=date('Y-m-d');
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The Brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Brand could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Brands->Categories->find('list', ['limit' => 200]);
        $this->set(compact('brand', 'categories'));
        $this->set('_serialize', ['brand']);
        
        $SubCategories = $this->Brands->Subcategories->find('list', ['limit' => 200]);
        $this->set(compact('type1', 'SubCategories'));
        $this->set('_serialize', ['type1']);
		
		$Types = $this->Brands->Types->find('list', ['limit' => 200]);
        $this->set(compact('type2', 'Types'));
        $this->set('_serialize', ['type2']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brand = $this->Brands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brands->patchEntity($brand, $this->request->data);
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The Brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Brand could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Brands->Categories->find('list', ['limit' => 200]);
        $this->set(compact('brand', 'categories'));
        
        $subcategories = $this->Brands->SubCategories->find('list', ['limit' => 200]);
        $this->set(compact('brand', 'subcategories'));
        $this->set('_serialize', ['brand']);
		
		$Types = $this->Brands->Types->find('list', ['limit' => 200]);
        $this->set(compact('type2', 'Types'));
        $this->set('_serialize', ['type2']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Brands->get($id);
        if ($this->Brands->delete($type)) {
            $this->Flash->success(__('The type has been deleted.'));
        } else {
            $this->Flash->error(__('The type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
