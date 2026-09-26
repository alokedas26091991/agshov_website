<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\Time;
/**
 * ContactServices Controller
 *
 * @property \App\Model\Table\ContactServicesTable $ContactServices
 * @method \App\Model\Entity\ContactService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = ['order'=>['ContactServices.id'=>'DESC'],'conditions' => ['ContactServices.is_deleted' => 0],'limit' => 10];
        $contactServices = $this->paginate($this->ContactServices);
        $this->set(compact('contactServices'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactService = $this->ContactServices->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contactService'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactService = $this->ContactServices->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactService = $this->ContactServices->patchEntity($contactService, $this->request->getData());
            $contactService->is_active = $this->request->getData('is_active') ? 1 : 0;
            $contactService->created_at = Time::now();
            if ($this->ContactServices->save($contactService)) {
                $this->Flash->success(__('The contact service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact service could not be saved. Please, try again.'));
        }
        $this->set(compact('contactService'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactService = $this->ContactServices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactService = $this->ContactServices->patchEntity($contactService, $this->request->getData());
            $contactService->is_active = $this->request->getData('is_active') ? 1 : 0;
            $contactService->updated_at = Time::now();
            if ($this->ContactServices->save($contactService)) {
                $this->Flash->success(__('The contact service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact service could not be saved. Please, try again.'));
        }
        $this->set(compact('contactService'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
 

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactService = $this->ContactServices->get($id);
        if ($contactService) {
            // Toggle the 'is_active' field
            $contactService->is_deleted = !$contactService->is_deleted;
    
            if ($this->ContactServices->save($contactService)) {
                $this->Flash->success(__('The contactService has been updated.'));
            } else {
                $this->Flash->error(__('The contactService could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The contactService does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
