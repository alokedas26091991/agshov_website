<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Catalogues Controller
 *
 * @property \App\Model\Table\CataloguesTable $Catalogues
 * @method \App\Model\Entity\Catalogue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CataloguesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $catalogues = $this->paginate($this->Catalogues);

        $this->set(compact('catalogues'));
    }

    /**
     * View method
     *
     * @param string|null $id Catalogue id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catalogue = $this->Catalogues->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('catalogue'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $catalogue = $this->Catalogues->newEmptyEntity();

    if ($this->request->is('post')) {
        $data = $this->request->getData();

        // Handle file upload separately
        $uploadedFile = $data['pdf_link'] ?? null;
        if ($uploadedFile && $uploadedFile->getError() === UPLOAD_ERR_OK) {
            $name = $uploadedFile->getClientFilename();

            if ($name) {
                $uploadDir = WWW_ROOT . 'upload' . DS . 'catalogue';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $targetPath = $uploadDir . DS . $name;
                $uploadedFile->moveTo($targetPath);

                // Update file path in data array
                $data['pdf_link'] = 'catalogue/' . $name;
            }
        }

        // Patch the entity with the form data, including the updated file path
        $catalogue = $this->Catalogues->patchEntity($catalogue, $data);

        if ($this->Catalogues->save($catalogue)) {
            $this->Flash->success(__('The catalogue has been saved.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('The catalogue could not be saved. Please, try again.'));
    }

    $this->set(compact('catalogue'));
}


    /**
     * Edit method
     *
     * @param string|null $id Catalogue id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    $catalogue = $this->Catalogues->get($id, [
        'contain' => [],
    ]);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $data = $this->request->getData();
        
        // Retrieve the file object
        $uploadedFile = $data['pdf_link'] ?? null;

        if ($uploadedFile && $uploadedFile->getError() === UPLOAD_ERR_OK) {
            // Extract file details
            $name = $uploadedFile->getClientFilename();

            if ($name) {
                $uploadDir = WWW_ROOT . 'upload' . DS . 'catalogue';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $targetPath = $uploadDir . DS . $name;
                $uploadedFile->moveTo($targetPath);

                // Update file path in data array
                $data['pdf_link'] = 'catalogue/' . $name;
            }
        } else {
            // If no file uploaded, retain the existing value
            $data['pdf_link'] = $catalogue->pdf_link;
        }

        // Patch the entity with the form data, including the updated file path
        $catalogue = $this->Catalogues->patchEntity($catalogue, $data);

        if ($this->Catalogues->save($catalogue)) {
            $this->Flash->success(__('The catalogue has been saved.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('The catalogue could not be saved. Please, try again.'));
    }

    $this->set(compact('catalogue'));
}


    /**
     * Delete method
     *
     * @param string|null $id Catalogue id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catalogue = $this->Catalogues->get($id);
        if ($this->Catalogues->delete($catalogue)) {
            $this->Flash->success(__('The catalogue has been deleted.'));
        } else {
            $this->Flash->error(__('The catalogue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
