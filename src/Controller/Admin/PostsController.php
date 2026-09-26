<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'order' => ['Posts.id' => 'DESC'],
            'conditions' => ['Posts.is_deleted' => 0],
            'limit' => 10
        ];
    
        $posts = $this->paginate($this->Posts);
            
        
    
        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Comments'],
        ]);

        $this->set(compact('post'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
        if ($this->Auth->user('id')) {
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            // $post = $this->Posts->patchEntity($post, $this->request->getData());
            $path = 'upload/allimages/';
			if($_FILES['banner_photo']['name']){
					    $file_tmpname = $_FILES['banner_photo']['tmp_name'];
                        $file_name = $_FILES['banner_photo']['name'];
                        if(!empty($file_name)) {
                        $fileName = time().$file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
        
                        if(move_uploaded_file($file_tmpname, $uploadFile)) {
                           
                            $post->banner_photo = $fileName;
                        }
							}
                        }
                        $post->user_id = $this->Auth->user('id');
                     
                        $post->title = $this->request->getData('title');
                        // $post->category = $this->request->getData('category');
                        // $post->tag = $this->request->getData('tag');
                        $post->details = $this->request->getData('details');
                        $post->post_type = $this->request->getData('post_type') ? 1 : 0;
                        // $post->is_popular = $this->request->getData('is_popular') ? 1 : 0;
                        // $post->archive = $this->request->getData('archive');
                        // $post->post_date = $this->request->getData('post_date');
                        
                        $post->status = $this->request->getData('status') ? 1 : 0;
                        $post->meta_title = $this->request->getData('meta_title');
                        $post->meta_keywords = $this->request->getData('meta_keywords');
                        $post->robots = $this->request->getData('robots');
                        $post->canonical = $this->request->getData('canonical');
                        $post->meta_description = $this->request->getData('meta_description');
                        $post->post_date = Time::now();
                        $post->created_at = Time::now();
											
						
						$post->category=implode(',', $this->request->getData('category')??[]);
						$post->tag=implode(',', $this->request->getData('tag')??[]);
						
                        $data = $this->request->getData();
                      

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['keyField' => 'id', 'valueField' => 'name','limit' => 200
        ])->all();
       
        $postcategories = $this->Posts->Postcategories->find()->all();
        $tags = $this->Posts->Tags->find()->all();

        $this->set(compact('post', 'users','postcategories','tags'));
    }
    else {
        
        return $this->redirect(['controller' => 'Posts', 'action' => 'index']);
    }
}

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->Auth->user('id')) {
            $post = $this->Posts->get($id, [
                'contain' => [],
            ]);
    
            
            $savedCategories = explode(',', $post->category);
            $savedTags = explode(',', $post->tag);
    
            if ($this->request->is(['patch', 'post', 'put'])) {
                $path = 'upload/allimages/';
                if ($_FILES['banner_photo']['name']) {
                    $file_tmpname = $_FILES['banner_photo']['tmp_name'];
                    $file_name = $_FILES['banner_photo']['name'];
                    if (!empty($file_name)) {
                        $fileName = time() . $file_name;
                        $uploadPath = WWW_ROOT . $path;
                        $uploadFile = $uploadPath . $fileName;
    
                        if (move_uploaded_file($file_tmpname, $uploadFile)) {
                            $post->banner_photo = $fileName;
                        }
                    }
                }
    
                $post->user_id = $this->Auth->user('id');
                $post->title = $this->request->getData('title');
                $post->details = $this->request->getData('details');
                
                $post->post_type = $this->request->getData('post_type') ? 1 : 0;
                $post->status = $this->request->getData('status') ? 1 : 0;
                $post->meta_title = $this->request->getData('meta_title');
                $post->meta_keywords = $this->request->getData('meta_keywords');
                $post->robots = $this->request->getData('robots');
                $post->canonical = $this->request->getData('canonical');
                $post->meta_description = $this->request->getData('meta_description');
                $post->updated_at = Time::now();
    
                $post->category = implode(',', $this->request->getData('category')??[]);
                $post->tag = implode(',', $this->request->getData('tag')??[]);
    
                if ($this->Posts->save($post)) {
                    $this->Flash->success(__('The post has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
    
            $users = $this->Posts->Users->find('list', ['keyField' => 'id', 'valueField' => 'name', 'limit' => 200])->all();
            $postcategories = $this->Posts->Postcategories->find()->all();
            $tags = $this->Posts->Tags->find()->all();
    
            $this->set(compact('post', 'users', 'postcategories', 'tags', 'savedCategories', 'savedTags'));
        } else {
            return $this->redirect(['controller' => 'Posts', 'action' => 'index']);
        }
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
      public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
    
        if ($post) {
            // Toggle the 'is_active' field
            $post->is_deleted = !$post->is_deleted;
    
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been updated.'));
            } else {
                $this->Flash->error(__('The post could not be updated. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('The post does not exist.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
