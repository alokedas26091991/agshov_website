<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

/**
 * SeoPages Controller
 *
 * @property \App\Model\Table\SeoPagesTable $SeoPages
 */
class SeoPagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');

        $search = [];
        $this->set('placeholder', ['Search by Name or Slug']);
        $searchQuery = $this->request->getQuery('search');
        if (!empty($searchQuery)) {
            $keyword = trim($searchQuery);
            $search[] = [
                'OR' => [
                    'SeoPages.name LIKE' => "%$keyword%",
                    'SeoPages.slug LIKE' => "%$keyword%",
                    'SeoPages.meta_title LIKE' => "%$keyword%",
                ]
            ];
            $this->set('search', $keyword);
        } else {
            $this->set('search', '');
        }

        $this->paginate = [
            'order' => ['SeoPages.id' => 'DESC'],
            'limit' => 20,
        ];

        $seoPages = $this->paginate($seoPagesTable->find()->where($search));

        $this->set(compact('seoPages'));
        $this->set('_serialize', ['seoPages']);
    }

    /**
     * View method
     *
     * @param string|null $id Seo Page id.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function view($id = null)
    {
        $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');
        $seoPage = $seoPagesTable->get($id);

        $this->set(compact('seoPage'));
        $this->set('_serialize', ['seoPage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');
        $seoPage = $seoPagesTable->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if (empty($data['slug']) && !empty($data['name'])) {
                $data['slug'] = strtolower(Text::slug($data['name']));
            }
            $seoPage = $seoPagesTable->patchEntity($seoPage, $data);
            if ($seoPagesTable->save($seoPage)) {
                $this->Flash->success(__('The SEO Page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The SEO Page could not be saved. Please try again.'));
        }

        $this->set(compact('seoPage'));
        $this->set('_serialize', ['seoPage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Seo Page id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null)
    {
        $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');
        $seoPage = $seoPagesTable->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if (empty($data['slug']) && !empty($data['name'])) {
                $data['slug'] = strtolower(Text::slug($data['name']));
            }
            $seoPage = $seoPagesTable->patchEntity($seoPage, $data);
            if ($seoPagesTable->save($seoPage)) {
                $this->Flash->success(__('The SEO Page has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The SEO Page could not be updated. Please try again.'));
        }

        $this->set(compact('seoPage'));
        $this->set('_serialize', ['seoPage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Seo Page id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seoPagesTable = TableRegistry::getTableLocator()->get('SeoPages');
        $seoPage = $seoPagesTable->get($id);

        if ($seoPagesTable->delete($seoPage)) {
            $this->Flash->success(__('The SEO Page has been deleted.'));
        } else {
            $this->Flash->error(__('The SEO Page could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
