<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Socials Controller
 *
 * @property \App\Model\Table\SocialsTable $Socials
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SocialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $socials = $this->paginate($this->Socials);

        $this->set(compact('socials'));
    }

    /**
     * View method
     *
     * @param string|null $id Social id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $social = $this->Socials->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('social'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $social = $this->Socials->newEmptyEntity();
        if ($this->request->is('post')) {
            $social = $this->Socials->patchEntity($social, $this->request->getData());
            if ($this->Socials->save($social)) {
                $this->Flash->success(__('The social has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social could not be saved. Please, try again.'));
        }
        $this->set(compact('social'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $social = $this->Socials->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $social = $this->Socials->patchEntity($social, $this->request->getData());
            if ($this->Socials->save($social)) {
                $this->Flash->success(__('The social has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social could not be saved. Please, try again.'));
        }
        $this->set(compact('social'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $social = $this->Socials->get($id);
        if ($this->Socials->delete($social)) {
            $this->Flash->success(__('The social has been deleted.'));
        } else {
            $this->Flash->error(__('The social could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
