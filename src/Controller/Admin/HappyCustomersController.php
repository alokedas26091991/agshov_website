<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * HappyCustomers Controller
 *
 * @property \App\Model\Table\HappyCustomersTable $HappyCustomers
 * @method \App\Model\Entity\HappyCustomer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HappyCustomersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $happyCustomers = $this->paginate($this->HappyCustomers);

        $this->set(compact('happyCustomers'));
    }

    /**
     * View method
     *
     * @param string|null $id Happy Customer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $happyCustomer = $this->HappyCustomers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('happyCustomer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $happyCustomer = $this->HappyCustomers->newEmptyEntity();
        if ($this->request->is('post')) {
            $happyCustomer = $this->HappyCustomers->patchEntity($happyCustomer, $this->request->getData());
            if ($this->HappyCustomers->save($happyCustomer)) {
                $this->Flash->success(__('The happy customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The happy customer could not be saved. Please, try again.'));
        }
        $this->set(compact('happyCustomer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Happy Customer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $happyCustomer = $this->HappyCustomers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $happyCustomer = $this->HappyCustomers->patchEntity($happyCustomer, $this->request->getData());
            if ($this->HappyCustomers->save($happyCustomer)) {
                $this->Flash->success(__('The happy customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The happy customer could not be saved. Please, try again.'));
        }
        $this->set(compact('happyCustomer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Happy Customer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $happyCustomer = $this->HappyCustomers->get($id);
        if ($this->HappyCustomers->delete($happyCustomer)) {
            $this->Flash->success(__('The happy customer has been deleted.'));
        } else {
            $this->Flash->error(__('The happy customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
