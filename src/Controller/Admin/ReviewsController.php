<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\Routing\Router;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

/**
 * Reviews Controller
 *
 * @property \App\Model\Table\ReviewsTable $Reviews
 * @method \App\Model\Entity\Review[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReviewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
			$this->paginate = [
				'contain' => ['Users', 'Products'],
				'order' => ['Reviews.id' => 'DESC'],
			];

			$reviews = $this->paginate($this->Reviews);

			$this->set(compact('reviews'));

    }
	
	public function reviewchangestatus($id=null)
    {
		
		
        $state = $this->Reviews->get($id, [
            'contain' => []
        ]);
		$abc=$state->is_active;
		
        if ($this->request->is(['patch', 'post', 'put'])) {
      
			if($abc==1)
			{
				$state->is_active=0;
			}
			else
			{
				$state->is_active=1;
			}
			
            if ($this->Reviews->save($state)) {
                $this->Flash->success(__('Review Status has been Changed'));

                return $this->redirect(['controller' => 'Reviews','action' => 'index']);
            } else {
                $this->Flash->error(__('This Review has not been Deactivated. Please, try again.'));
            }
        }

    }

    /**
     * View method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $review = $this->Reviews->get($id, [
            'contain' => ['Users', 'Products', 'ReviewImages', 'ReviewLikeDislikes'],
        ]);

        $this->set(compact('review'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $review = $this->Reviews->newEmptyEntity();
        if ($this->request->is('post')) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $users = $this->Reviews->Users->find('list', ['limit' => 200])->all();
        $products = $this->Reviews->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('review', 'users', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $review = $this->Reviews->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $users = $this->Reviews->Users->find('list', ['limit' => 200])->all();
        $products = $this->Reviews->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('review', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Reviews->get($id);
        if ($this->Reviews->delete($review)) {
            $this->Flash->success(__('The review has been deleted.'));
        } else {
            $this->Flash->error(__('The review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
