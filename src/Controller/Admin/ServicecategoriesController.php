<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\Time;

/**
 * Servicecategories Controller
 *
 * @property \App\Model\Table\ServicecategoriesTable $Servicecategories
 * @method \App\Model\Entity\Servicecategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicecategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = ['order'=>['Servicecategories.id'=>'DESC'],'conditions' => ['Servicecategories.is_deleted' => 0],'limit' => 10];
        $servicecategories = $this->paginate($this->Servicecategories);

        $this->set(compact('servicecategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Servicecategory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicecategory = $this->Servicecategories->get($id, [
            'contain' => ['Servicesubcategories'],'order' => ['Servicecategories.id' => 'DESC'],'conditions' => ['Servicecategories.is_deleted' => 0],'limit' => 10]);

        $this->set(compact('servicecategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicecategory = $this->Servicecategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $servicecategory->is_active = $this->request->getData('is_active') ? 1 : 0;
            $servicecategory = $this->Servicecategories->patchEntity($servicecategory, $this->request->getData());
            if ($this->Servicecategories->save($servicecategory)) {
                $this->Flash->success(__('The servicecategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servicecategory could not be saved. Please, try again.'));
        }
        $this->set(compact('servicecategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicecategory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicecategory = $this->Servicecategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicecategory->is_active = $this->request->getData('is_active') ? 1 : 0;
            $servicecategory->updated_at = Time::now();
            $servicecategory = $this->Servicecategories->patchEntity($servicecategory, $this->request->getData());
            if ($this->Servicecategories->save($servicecategory)) {
                $this->Flash->success(__('The servicecategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servicecategory could not be saved. Please, try again.'));
        }
        $this->set(compact('servicecategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicecategory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicecategory = $this->Servicecategories->get($id);
    
        if ($servicecategory) {
            // Toggle the 'is_active' field
            $servicecategory->is_deleted = !$servicecategory->is_deleted;
    
            if ($this->Servicecategories->save($servicecategory)) {
                $this->Flash->success(__('The servicecategory has been updated.'));
            } else {
                $this->Flash->error(__('The servicecategory could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The servicecategory does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
