<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Brandlogos Controller
 *
 * @property \App\Model\Table\BrandlogosTable $Brandlogos
 * @method \App\Model\Entity\Brandlogo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrandlogosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->paginate = ['order' => ['Brandlogos.id' => 'DESC'], 'limit'=>10];
        $brandlogos = $this->paginate($this->Brandlogos);

        $this->set(compact('brandlogos'));
    }

    /**
     * View method
     *
     * @param string|null $id Brandlogo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $brandlogo = $this->Brandlogos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('brandlogo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brandlogo = $this->Brandlogos->newEmptyEntity();
        if ($this->request->is('post')) {
            // $brandlogo = $this->Brandlogos->patchEntity($brandlogo, $this->request->getData());

            $path = 'upload/Post/';
            if ($_FILES['logo']['name']) {
                $file_tmpname = $_FILES['logo']['tmp_name'];
                $file_name = $_FILES['logo']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $brandlogo->logo = $fileName;
                    }
                }
            }
            $brandlogo->is_active = $this->request->getData('is_active');
            $brandlogo->is_deleted = $this->request->getData('is_deleted');
            if ($this->Brandlogos->save($brandlogo)) {
            $this->Flash->success(__('The brandlogo has been saved.'));
            return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brandlogo could not be saved. Please, try again.'));
        }
        $this->set(compact('brandlogo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Brandlogo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brandlogo = $this->Brandlogos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $brandlogo = $this->Brandlogos->patchEntity($brandlogo, $this->request->getData());
            $path = 'upload/Post/';
            if ($_FILES['logo']['name']) {
                $file_tmpname = $_FILES['logo']['tmp_name'];
                $file_name = $_FILES['logo']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $brandlogo->logo = $fileName;
                    }
                }
            }
            $brandlogo->is_active = $this->request->getData('is_active');
            $brandlogo->is_deleted = $this->request->getData('is_deleted');
            if ($this->Brandlogos->save($brandlogo)) {
                $this->Flash->success(__('The brandlogo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brandlogo could not be saved. Please, try again.'));
        }
        $this->set(compact('brandlogo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Brandlogo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $brandlogo = $this->Brandlogos->get($id);
        if ($this->Brandlogos->delete($brandlogo)) {
            $this->Flash->success(__('The brandlogo has been deleted.'));
        } else {
            $this->Flash->error(__('The brandlogo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
