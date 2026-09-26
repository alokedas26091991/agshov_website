<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Partners Controller
 *
 * @property \App\Model\Table\PartnersTable $Partners
 * @method \App\Model\Entity\Partner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PartnersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $partners = $this->paginate($this->Partners);

        $this->set(compact('partners'));
    }

    /**
     * View method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partner = $this->Partners->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('partner'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partner = $this->Partners->newEmptyEntity();
        if ($this->request->is('post')) {
            // $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            $path = 'upload/allimages/';
			if($_FILES['image']['name']){
					    $file_tmpname = $_FILES['image']['tmp_name'];
                        $file_name = $_FILES['image']['name'];
                        if(!empty($file_name)) {
                        $fileName = time().$file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
        
                        if(move_uploaded_file($file_tmpname, $uploadFile)) {
                           
                            $partner->image = $fileName;
                        }
							}
                        }
             
                     
                        $partner->name = $this->request->getData('name');
                        $partner->ord = $this->request->getData('ord');
                        $partner->is_active = $this->request->getData('is_active') ? 1 : 0;

            if ($this->Partners->save($partner)) {
                $this->Flash->success(__('The partner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner could not be saved. Please, try again.'));
        }
        $this->set(compact('partner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partner = $this->Partners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            $path = 'upload/allimages/';
			if($_FILES['image']['name']){
					    $file_tmpname = $_FILES['image']['tmp_name'];
                        $file_name = $_FILES['image']['name'];
                        if(!empty($file_name)) {
                        $fileName = time().$file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
        
                        if(move_uploaded_file($file_tmpname, $uploadFile)) {
                           
                            $partner->image = $fileName;
                        }
							}
                        }
             
                     
                        $partner->name = $this->request->getData('name');
                        $partner->ord = $this->request->getData('ord');
                        $partner->is_active = $this->request->getData('is_active') ? 1 : 0;
            if ($this->Partners->save($partner)) {
                $this->Flash->success(__('The partner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner could not be saved. Please, try again.'));
        }
        $this->set(compact('partner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partner = $this->Partners->get($id);
        if ($this->Partners->delete($partner)) {
            $this->Flash->success(__('The partner has been deleted.'));
        } else {
            $this->Flash->error(__('The partner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
