<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\Time;
/**
 * BookingDetails Controller
 *
 * @property \App\Model\Table\BookingDetailsTable $BookingDetails
 * @method \App\Model\Entity\BookingDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookings'],
        ];
        $bookingDetails = $this->paginate($this->BookingDetails);

        $this->set(compact('bookingDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Booking Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookingDetail = $this->BookingDetails->get($id, [
            'contain' => ['Bookings'],
        ]);

        $this->set(compact('bookingDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookingDetail = $this->BookingDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $bookingDetail = $this->BookingDetails->patchEntity($bookingDetail, $this->request->getData());
            if ($this->BookingDetails->save($bookingDetail)) {
                $this->Flash->success(__('The booking detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking detail could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingDetails->Bookings->find('list', ['limit' => 200])->all();
        $this->set(compact('bookingDetail', 'bookings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookingDetail = $this->BookingDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookingDetail = $this->BookingDetails->patchEntity($bookingDetail, $this->request->getData());
            $bookingDetail->updated_at = Time::now();
            if ($this->BookingDetails->save($bookingDetail)) {
                $this->Flash->success(__('The booking detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking detail could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingDetails->Bookings->find('list', ['limit' => 200])->all();
        $this->set(compact('bookingDetail', 'bookings'));
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookingDetail = $this->BookingDetails->get($id);
        if ($this->BookingDetails->delete($bookingDetail)) {
            $this->Flash->success(__('The booking detail has been deleted.'));
        } else {
            $this->Flash->error(__('The booking detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
