<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
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
        
            
                   //$P = TableRegistry::getTableLocator()->get('Productenquires');
        	 
                    $this->paginate = [
						'contain' => ['Products']
					];
				   
					$question = $this->paginate($this->Questions);

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
            $this->Flash->success(__('The Data has been deleted.'));
        } else {
            $this->Flash->error(__('The Data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



   
}
