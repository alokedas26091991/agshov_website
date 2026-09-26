<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 */
class EmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $emails = $this->paginate($this->Emails);

        $this->set(compact('emails'));
        $this->set('_serialize', ['emails']);
    }
    
    public function subscriptionlist()
    {
        $subscription =TableRegistry::getTableLocator()->get('Subscriptionlists');
        $subscription = $this->paginate($subscription);

        $this->set(compact('subscription'));
        $this->set('_serialize', ['subscription']);
    }

    /**
     * View method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => []
        ]);

        $this->set('email', $email);
        $this->set('_serialize', ['email']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $email = $this->Emails->newEmptyEntity();
        if ($this->request->is('post')) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('email'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('email'));
        $this->set('_serialize', ['email']);
    }
    public function subscriptionentrylist()
    {
        $subscription = TableRegistry::getTableLocator()->get('Subscriptions');
        $subscription1 = $this->paginate($subscription);

        $this->set(compact('subscription1'));
        $this->set('_serialize', ['subscription1']);
    }
    public function subscriptionentry($id = null)
    {
        $subscription = TableRegistry::getTableLocator()->get('Subscriptions');
        $subscription1 = $subscription->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subscription1 = $subscription->patchEntity($subscription1, $this->request->getData());
            
            if($_FILES['image']['name']!=''){
						$this->loadComponent('UploadImage');
				 		$subscription1->image=$this->UploadImage->do_upload_image_compress('subscription',$_FILES['image'],'subscription','ll');
					 
				 }
				 else
				 {
				     $subscription2 = $subscription->get($id, [
                               'contain' => []
                      ]);
				     $subscription1->image=$subscription2->image;
				 }
            
            if ($subscription->save($subscription1)) {
                $this->Flash->success(__('The Subscription has been saved.'));

                return $this->redirect(['action' => 'subscriptionentrylist']);
            } else {
                $this->Flash->error(__('The subscription could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('subscription1'));
        $this->set('_serialize', ['subscription1']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $email = $this->Emails->get($id);
        if ($this->Emails->delete($email)) {
            $this->Flash->success(__('The email has been deleted.'));
        } else {
            $this->Flash->error(__('The email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
