<?php
namespace App\Controller\Seller;

use App\Controller\Vendor\AppController;
use Cake\ORM\TableRegistry;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
            
       
      
                    $this->paginate = [
						'contain' => ['user','seller','Products']
					];
				   
					$question = $this->paginate($this->Questions->find()->where(['seller_id' => $this->Auth->user('id')]));

					$this->set(compact('question'));
					$this->set('_serialize', ['question']);
		

        
        
        

    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            $question->ans_by=3;
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Data could not be saved. Please, try again.'));
            }
        }
        

        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branch = $this->Questions->get($id);
        if ($this->Questions->delete($branch)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



   
}
