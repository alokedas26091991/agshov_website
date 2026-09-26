<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\ORM\TableRegistry;
use App\Controller\Admin\AppController;

/**
 * StaticPages Controller
 *
 * @property \App\Model\Table\StaticPagesTable $StaticPages
 */
class StaticPagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function edit($id = null)
    {

        $sellerpage = TableRegistry::getTableLocator()->get('SellerPages');

        $advertisement = $sellerpage->get($id, [
            'contain' => []
        ]);
        $pic = $advertisement->photo;
        if ($this->request->is(['patch', 'post', 'put'])) {


            $advertisement1 = $sellerpage->patchEntity($advertisement, $this->request->getData());

            if (!empty($this->request->getData('products'))) {

                $advertisement1->products = implode(",", $this->request->getData('products'));
            } else {
                $advertisement1->products = "";
            }
            if ($_FILES['photo']['name'] != '') {
                $this->loadComponent('UploadImage');
                $advertisement1->photo = $this->UploadImage->do_upload_image_biswa_cake4('homepageimage', $_FILES['photo'], 'homepageimage', 'll');
            } else {
                $advertisement1->photo = $pic;
            }
            if ($sellerpage->save($advertisement1)) {
                $this->Flash->success(__('The Data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Data could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('advertisement'));
        $this->set('_serialize', ['advertisement']);

        $product = TableRegistry::getTableLocator()->get('Products');

        $product1 = $product->find()->where(['is_active' => 1, 'is_deleted' => 0]);
        $this->set(compact('product1'));
        $this->set('_serialize', ['product1']);
    }
    public function delete($id = null)
    {
        $sellerpage = TableRegistry::getTableLocator()->get('SellerPages');
        $this->request->allowMethod(['post', 'delete']);
        $advertisement = $sellerpage->get($id);
        if ($sellerpage->delete($advertisement)) {
            $this->Flash->success(__('This section has been deleted.'));
        } else {
            $this->Flash->error(__('This section could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function index()
    {

        $sellerpage = TableRegistry::getTableLocator()->get('SellerPages');

        $search = [];
        $this->set('placeholder', ['Search by  Page Name', 'Name']);
        $search1 = $this->request->getQuery('search');
        if ($search1 != null) {
            $keyword = trim($search1);
            $search[] = ['OR' => ['page_name ' => $keyword]];
            $this->set('search', $keyword);
        } else {
            $keyword = "";
            $this->set('search', $keyword);
        }

        $advertisements = $this->paginate($sellerpage->find("all")->where($search)->where(['is_deleted'=>'0'])->order(['section' => 'ASC'])->order(['ord' => 'ASC']));

        $this->set(compact('advertisements'));
        $this->set('_serialize', ['advertisements']);
    }

    public function add()
    {

        $sellerpage = TableRegistry::getTableLocator()->get('SellerPages');

        $advertisement = $sellerpage->newEmptyEntity();
        if ($this->request->is('post')) {
            $advertisement = $sellerpage->patchEntity($advertisement, $this->request->getData());
            if (!empty($this->request->getData('products'))) {
                $advertisement->products = implode(",", $this->request->getData('products'));
            }
            $advertisement->seller_id = $this->Auth->user('id');
            $advertisement->create_date = date('Y-m-d');
            if ($_FILES['photo']['name'] != '') {
                $this->loadComponent('UploadImage');
                $advertisement->photo = $this->UploadImage->do_upload_image_biswa_cake4('homepageimage', $_FILES['photo'], 'homepageimage', 'll');
            } else {
                $advertisement->photo = "";
            }


            if ($sellerpage->save($advertisement)) {
                $this->Flash->success(__('The Data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Data could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('advertisement'));
        $this->set('_serialize', ['advertisement']);

        $product = TableRegistry::getTableLocator()->get('Products');

        $product1 = $product->find()->where(['is_active' => 1, 'is_deleted' => 0, 'parent_id IS' => NULL]);
        $this->set(compact('product1'));
        $this->set('_serialize', ['product1']);
    }




    /**
     * View method
     *
     * @param string|null $id Static Page id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staticPage = $this->StaticPages->get($id, [
            'contain' => []
        ]);

        $this->set('staticPage', $staticPage);
        $this->set('_serialize', ['staticPage']);
    }


    public function seodata($id = null)
    {
        $category = $this->StaticPages->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->StaticPages->patchEntity($category, $this->request->getData());
            if ($this->StaticPages->save($category)) {
                $this->Flash->success(__('The SEO Content has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The SEO Data could not be saved. Please, try again.'));
            }
        }


        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }
    /**
     * Add method
     *
   

    /**
     * Edit method
     *
     * @param string|null $id Static Page id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */


    /**
     * Delete method
     *
     * @param string|null $id Static Page id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
}
