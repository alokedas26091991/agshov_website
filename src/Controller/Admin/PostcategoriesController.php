<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\Time;

/**
 * Postcategories Controller
 *
 * @property \App\Model\Table\PostcategoriesTable $Postcategories
 * @method \App\Model\Entity\Postcategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostcategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->paginate = ['contain' => ['ParentPostcategories'], 'order' => ['Postcategories.id' => 'DESC'], 'conditions' => ['Postcategories.is_deleted' => 0], 'limit' => 20];
        $postcategories = $this->paginate($this->Postcategories);

        $this->set(compact('postcategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Postcategory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postcategory = $this->Postcategories->get($id, [
            'contain' => ['ParentPostcategories', 'ChildPostcategories'],
        ]);

        $this->set(compact('postcategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $postcategory = $this->Postcategories->newEmptyEntity();
        // debug($postcategory);
        // die;
        if ($this->request->is('post')) {
            // $postcategory = $this->Postcategories->patchEntity($postcategory, $this->request->getData());
            $path = 'upload/allimages/';
            if ($_FILES['banner_photo']['name']) {
                $file_tmpname = $_FILES['banner_photo']['tmp_name'];
                $file_name = $_FILES['banner_photo']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $postcategory->banner_photo = $fileName;
                    }
                }
            }

            $postcategory->parent_id = $this->request->getData('parent_id');
            $postcategory->name = $this->request->getData('name');
            $postcategory->details = $this->request->getData('details');
            $postcategory->meta_title = $this->request->getData('meta_title');
            $postcategory->meta_keywords = $this->request->getData('meta_keywords');
            $postcategory->robots = $this->request->getData('robots');
            $postcategory->canonical = $this->request->getData('canonical');
            $postcategory->meta_description = $this->request->getData('meta_description');
            $postcategory->created_at = Time::now();

            if ($this->Postcategories->save($postcategory)) {
                $this->Flash->success(__('The postcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The postcategory could not be saved. Please, try again.'));
        }
        $parentPostcategories = $this->Postcategories->ParentPostcategories->find('list', ['limit' => 200])->all();
        $this->set(compact('postcategory', 'parentPostcategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Postcategory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $postcategory = $this->Postcategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $postcategory = $this->Postcategories->patchEntity($postcategory, $this->request->getData());
            $path = 'upload/allimages/';
            if ($_FILES['banner_photo']['name']) {
                $file_tmpname = $_FILES['banner_photo']['tmp_name'];
                $file_name = $_FILES['banner_photo']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $postcategory->banner_photo = $fileName;
                    }
                }
            }

            $postcategory->parent_id = $this->request->getData('parent_id');
            $postcategory->name = $this->request->getData('name');
            $postcategory->details = $this->request->getData('details');
            $postcategory->meta_title = $this->request->getData('meta_title');
            $postcategory->meta_keywords = $this->request->getData('meta_keywords');
            $postcategory->robots = $this->request->getData('robots');
            $postcategory->canonical = $this->request->getData('canonical');
            $postcategory->meta_description = $this->request->getData('meta_description');
            $postcategory->updated_at = Time::now();

            if ($this->Postcategories->save($postcategory)) {
                $this->Flash->success(__('The postcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The postcategory could not be saved. Please, try again.'));
        }
        $parentPostcategories = $this->Postcategories->ParentPostcategories->find('list', ['limit' => 200])->all();
        $this->set(compact('postcategory', 'parentPostcategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Postcategory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $postcategory = $this->Postcategories->get($id);

        if ($postcategory) {
            // Toggle the 'is_active' field
            $postcategory->is_deleted = !$postcategory->is_deleted;

            if ($this->Postcategories->save($postcategory)) {
                $this->Flash->success(__('The postcategory has been updated.'));
            } else {
                $this->Flash->error(__('The postcategory could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The postcategory does not exist.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
