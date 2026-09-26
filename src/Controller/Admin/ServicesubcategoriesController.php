<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\Time;
/**
 * Servicesubcategories Controller
 *
 * @property \App\Model\Table\ServicesubcategoriesTable $Servicesubcategories
 * @method \App\Model\Entity\Servicesubcategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesubcategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = ['contain' => ['Servicecategories'],'order'=>['Servicesubcategories.id'=>'DESC'],'conditions' => ['Servicesubcategories.is_deleted' => 0],'limit' => 10];
        
        $servicesubcategories = $this->paginate($this->Servicesubcategories);

        $this->set(compact('servicesubcategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Servicesubcategory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicesubcategory = $this->Servicesubcategories->get($id, [
            'contain' => ['Servicecategories'],
        ]);

        $this->set(compact('servicesubcategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicesubcategory = $this->Servicesubcategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $servicesubcategory->is_active = $this->request->getData('is_active') ? 1 : 0;
            $servicesubcategory = $this->Servicesubcategories->patchEntity($servicesubcategory, $this->request->getData());
            if ($this->Servicesubcategories->save($servicesubcategory)) {
                $this->Flash->success(__('The servicesubcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servicesubcategory could not be saved. Please, try again.'));
        }
        $servicecategories = $this->Servicesubcategories->Servicecategories->find('list', ['limit' => 200])->all();
        $this->set(compact('servicesubcategory', 'servicecategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicesubcategory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicesubcategory = $this->Servicesubcategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicesubcategory->is_active = $this->request->getData('is_active') ? 1 : 0;
            $servicesubcategory->updated_at = Time::now();
            $servicesubcategory = $this->Servicesubcategories->patchEntity($servicesubcategory, $this->request->getData());
            if ($this->Servicesubcategories->save($servicesubcategory)) {
                $this->Flash->success(__('The servicesubcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servicesubcategory could not be saved. Please, try again.'));
        }
        $servicecategories = $this->Servicesubcategories->Servicecategories->find('list', ['limit' => 200])->all();
        $this->set(compact('servicesubcategory', 'servicecategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicesubcategory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicesubcategory = $this->Servicesubcategories->get($id);
    
        if ($servicesubcategory) {
            // Toggle the 'is_active' field
            $servicesubcategory->is_deleted = !$servicesubcategory->is_deleted;
    
            if ($this->Servicesubcategories->save($servicesubcategory)) {
                $this->Flash->success(__('The servicesubcategory has been updated.'));
            } else {
                $this->Flash->error(__('The servicesubcategory could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The servicesubcategory does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
