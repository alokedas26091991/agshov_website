<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Testimonials Controller
 *
 * @property \App\Model\Table\TestimonialsTable $Testimonials
 * @method \App\Model\Entity\Testimonial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestimonialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pages', 'Products', 'Diseases'],
            'conditions' => ['Testimonials.is_deleted' => 0],
            'order' => ['Testimonials.id' => 'DESC'],
        ];
        
        $testimonials = $this->paginate($this->Testimonials);
    
        $this->set(compact('testimonials'));
    }
    

    /**
     * View method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testimonial = $this->Testimonials->get($id, [
            'contain' => ['Pages', 'Products', 'Diseases'],
        ]);

        $this->set(compact('testimonial'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testimonial = $this->Testimonials->newEmptyEntity();
        if ($this->request->is('post')) {
            // $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->getData());
            $path = 'upload/allimages/';
            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $testimonial->image = $fileName;
                    }
                }
            }

            if ($_FILES['rating']['name']) {
                $file_tmpname = $_FILES['rating']['tmp_name'];
                $file_name = $_FILES['rating']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $testimonial->rating = $fileName;
                    }
                }
            }


            $testimonial->name = $this->request->getData('name');
            if (empty($this->request->getData('page_id'))) {
                $testimonial->page_id = null;
            } else {
                $testimonial->page_id = $this->request->getData('page_id');
            }
            // Handle product_id
            if (empty($this->request->getData('product_id'))) {
                $testimonial->product_id = null;
            } else {
                $testimonial->product_id = $this->request->getData('product_id');
            }

            // Handle disease_id
            if (empty($this->request->getData('disease_id'))) {
                $testimonial->disease_id = null;
            } else {
                $testimonial->disease_id = $this->request->getData('disease_id');
            }

            $testimonial->position = $this->request->getData('position');
            $testimonial->details = $this->request->getData('details');
            $testimonial->ord = $this->request->getData('ord');
            // $testimonial->rating = $this->request->getData('rating');
            $testimonial->status = $this->request->getData('status') ? 1 : 0;
            $testimonial->created_at = Time::now();

            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
        }
        $products = $this->Testimonials->Products->find('list', ['limit' => 2000]);
        $diseases = $this->Testimonials->Diseases->find('list', ['keyField' => 'id', 'valueField' => 'name', 'limit' => 2000])->toArray();
        $this->set(compact('testimonial', 'products', 'diseases'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testimonial = $this->Testimonials->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->getData());
            $path = 'upload/allimages/';
            if ($_FILES['image']['name']) {
                $file_tmpname = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $testimonial->image = $fileName;
                    }
                }
            }

            if ($_FILES['rating']['name']) {
                $file_tmpname = $_FILES['rating']['tmp_name'];
                $file_name = $_FILES['rating']['name'];
                if (!empty($file_name)) {
                    $fileName = time() . $file_name;
                    $uploadPath = WWW_ROOT . $path;
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_tmpname, $uploadFile)) {

                        $testimonial->rating = $fileName;
                    }
                }
            }

            $testimonial->name = $this->request->getData('name');
            if (empty($this->request->getData('page_id'))) {
                $testimonial->page_id = null;
            } else {
                $testimonial->page_id = $this->request->getData('page_id');
            }
            // Handle product_id
            if (empty($this->request->getData('product_id'))) {
                $testimonial->product_id = null;
            } else {
                $testimonial->product_id = $this->request->getData('product_id');
            }

            // Handle disease_id
            if (empty($this->request->getData('disease_id'))) {
                $testimonial->disease_id = null;
            } else {
                $testimonial->disease_id = $this->request->getData('disease_id');
            }

            $testimonial->position = $this->request->getData('position');
            $testimonial->details = $this->request->getData('details');
            $testimonial->ord = $this->request->getData('ord');
            // $testimonial->rating = $this->request->getData('rating');
            $testimonial->status = $this->request->getData('status') ? 1 : 0;
            $testimonial->updated_at = Time::now();

            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
        }
        $products = $this->Testimonials->Products->find('list', ['limit' => 2000]);
        $diseases = $this->Testimonials->Diseases->find('list', ['keyField' => 'id', 'valueField' => 'name', 'limit' => 2000])->toArray();
        $this->set(compact('testimonial', 'products', 'diseases'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testimonial = $this->Testimonials->get($id);

        if ($testimonial) {
            // Toggle the 'is_active' field
            $testimonial->is_deleted = !$testimonial->is_deleted;

            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been updated.'));
            } else {
                $this->Flash->error(__('The testimonial could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The testimonial does not exist.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
