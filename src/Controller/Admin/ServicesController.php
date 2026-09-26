<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $services = $this->paginate($this->Services);

        $this->set(compact('services'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('service'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEmptyEntity();
        if ($this->request->is('post')) {
            $path = 'upload/allimages/';
			if($_FILES['image']['name']){
					    $file_tmpname = $_FILES['image']['tmp_name'];
                        $file_name = $_FILES['image']['name'];
                        if(!empty($file_name)) {
                        $fileName = time().$file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
        
                        if(move_uploaded_file($file_tmpname, $uploadFile)) {
                           
                            $service->image = $fileName;
                        }
							}
                        }
            // $service = $this->Services->patchEntity($service, $this->request->getData());
            $service->name = $this->request->getData('name');
            $service->title = $this->request->getData('title');
            $service->details_1 = $this->request->getData('details_1');
            $service->details_2 = $this->request->getData('details_2');
            $service->fees = $this->request->getData('fees');
            $service->is_active = $this->request->getData('is_active') ? 1 : 0;
            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $path = 'upload/allimages/';
			if($_FILES['image']['name']){
					    $file_tmpname = $_FILES['image']['tmp_name'];
                        $file_name = $_FILES['image']['name'];
                        if(!empty($file_name)) {
                        $fileName = time().$file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
        
                        if(move_uploaded_file($file_tmpname, $uploadFile)) {
                           
                            $service->image = $fileName;
                        }
							}
                        }
                        $service->name = $this->request->getData('name');
                        $service->title = $this->request->getData('title');
                        $service->details_1 = $this->request->getData('details_1');
                        $service->details_2 = $this->request->getData('details_2');
                        $service->fees = $this->request->getData('fees');
                        $service->is_active = $this->request->getData('is_active') ? 1 : 0;
            // $service = $this->Services->patchEntity($service, $this->request->getData());
            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success(__('The service has been deleted.'));
        } else {
            $this->Flash->error(__('The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
