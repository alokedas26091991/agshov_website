<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Advertisements Controller
 *
 * @property \App\Model\Table\AdvertisementsTable $Advertisements
 */
class AdvertisementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $advertisements = $this->paginate($this->Advertisements);

        $this->set(compact('advertisements'));
        $this->set('_serialize', ['advertisements']);
    }

    /**
     * View method
     *
     * @param string|null $id Advertisement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advertisement = $this->Advertisements->get($id, [
            'contain' => ['AdvertisementItems']
        ]);

        $this->set('advertisement', $advertisement);
        $this->set('_serialize', ['advertisement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advertisement = $this->Advertisements->newEmptyEntity();
        if ($this->request->is('post')) {
            $advertisement = $this->Advertisements->patchEntity($advertisement, $this->request->getData());
			$advertisement->created_by=$this->Auth->user('id');
			if($_FILES['photo']['name']!=''){
					$this->loadComponent('UploadImage');
					$advertisement->photo=$this->UploadImage->do_upload_image_compress('homepageimage',$_FILES['photo'],'homepageimage','ll');
				 
			 }
			 else
			 {
				 $advertisement->photo="";
			 }
            if ($this->Advertisements->save($advertisement)) {
                $this->Flash->success(__('The advertisement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The advertisement could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('advertisement'));
        $this->set('_serialize', ['advertisement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Advertisement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advertisement = $this->Advertisements->get($id, [
            'contain' => []
        ]);
        $pic=$advertisement->photo;
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            
            $advertisement1 = $this->Advertisements->patchEntity($advertisement, $this->request->getData());
            if($_FILES['photo']['name']!=''){
					$this->loadComponent('UploadImage');
					$advertisement1->photo=$this->UploadImage->do_upload_image_compress('homepageimage',$_FILES['photo'],'homepageimage','ll');
				 
			 }
			 else
			 {
			     $advertisement1->photo=$pic;
			 }
            if ($this->Advertisements->save($advertisement1)) {
                $this->Flash->success(__('The advertisement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The advertisement could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('advertisement'));
        $this->set('_serialize', ['advertisement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Advertisement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advertisement = $this->Advertisements->get($id);
        if ($this->Advertisements->delete($advertisement)) {
            $this->Flash->success(__('The advertisement has been deleted.'));
        } else {
            $this->Flash->error(__('The advertisement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
