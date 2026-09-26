<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

date_default_timezone_set('Asia/Kolkata');
/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [],
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
    }
    public function booking_details($id)
    {
        //->order(['ord' => 'ASC'])
        $booking = TableRegistry::getTableLocator()->get('BookingDetails');
        $bookingobj = $booking->find('all')->where(['booking_id' => $id])->order(['id' => 'DESC']);

        $this->set('book', $bookingobj);
        $this->set('book_id', $id);
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Users', 'Servicecategories', 'Servicesubcategories', 'Packages', 'BookingDetails'],
        ]);

        $this->set(compact('booking'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
     
     public function addbooking($id)
     {
    $booking1 = TableRegistry::getTableLocator()->get('BookingDetails');
    $booking = $booking1->newEmptyEntity(); // Create a new entity

    if ($this->request->is(['patch', 'post', 'put'])) {
        $booking = $booking1->patchEntity($booking, $this->request->getData());
        $booking->booking_id=$id;
        $booking->created_at= Time::now();
        
        if ($booking1->save($booking)) {
            
            $status = "Completed"; 
            if ($this->request->getData('status') == 0) {
                $status = "Pending";
            } elseif ($this->request->getData('status') == 2) {
                $status = "Confirmed";
            } elseif ($this->request->getData('status') == 3) {
                $status = "Cancelled";
            }

            $this->Flash->success(__('The booking has been saved.'));
            return $this->redirect(['action' => 'booking_details', $booking->booking_id]);
        }

        $this->Flash->error(__('The booking could not be saved. Please, try again.'));
    }

    $this->set(compact('booking'));
 
     }
     
    public function editbooking($id)
{
    $bookingDetailsTable = TableRegistry::getTableLocator()->get('BookingDetails');
    $bookingsTable = TableRegistry::getTableLocator()->get('Bookings');

    // Verify the existence of the `Bookings` record
    $booking = $bookingsTable->find()
        ->where(['id' => $id])
        ->first();

    if (!$booking) {
        $this->Flash->error(__('The booking record does not exist.'));
        return $this->redirect(['action' => 'index']); // Redirect to a safe page
    }

    // Fetch the associated BookingDetails record
    $bookingDetail = $bookingDetailsTable->find()
        ->where(['booking_id' => $id])
        ->first();

    if (!$bookingDetail) {
        $this->Flash->error(__('The booking detail record does not exist.'));
        return $this->redirect(['action' => 'index']);
    }

    if ($this->request->is(['patch', 'post', 'put'])) {
        // Patch entity with form data
        $bookingDetail = $bookingDetailsTable->patchEntity($bookingDetail, $this->request->getData());

        // Update modification timestamp
        $bookingDetail->modified_at = Time::now();

        if ($bookingDetailsTable->save($bookingDetail)) {
            $this->Flash->success(__('The booking detail has been updated successfully.'));
            return $this->redirect(['action' => 'booking_details', $id]);
        } else {
            $this->Flash->error(__('The booking detail could not be updated. Please, try again.'));
        }
    }

    // Pass data to the view
    $this->set(compact('booking', 'bookingDetail'));
}


     
     
    
    public function add()
    {
        $booking = $this->Bookings->newEmptyEntity();
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', ['limit' => 200])->all();
        $servicecategories = $this->Bookings->Servicecategories->find('list', ['limit' => 200])->all();
        $servicesubcategories = $this->Bookings->Servicesubcategories->find('list', ['limit' => 200])->all();
        $packages = $this->Bookings->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('booking', 'users', 'servicecategories', 'servicesubcategories', 'packages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking1 = TableRegistry::getTableLocator()->get('BookingDetails');
        $booking = $booking1->get($id, [
            'contain' => ['Bookings', 'Bookings.Users'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $booking1->patchEntity($booking, $this->request->getData());
            $booking->updated_at= Time::now();
            if ($booking1->save($booking)) {

                if($this->request->getData('status')==0)
                {
                    $status="Pending";
                }
                else if($this->request->getData('status')==2)
                {
                    $status="Confirmed";
                }
                else if($this->request->getData('status')==3)
                {
                    $status="Cancelled";
                }
                else
                {
                    $status="Completed";
                }
                //echo $booking->booking->user->email;die;
                $this->loadComponent('SendMail');
                $this->SendMail->sendMail(12, $booking->booking->user->email, ['name' => $booking->booking->user->name, 'email' => $booking->booking->user->email,'appointment_date' => $this->request->getData('appointment_date'),'appointment_time' => $this->request->getData('appointment_time'),'video_link' => $this->request->getData('video_link'),'status' => $status]);

                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'booking_details', $booking->booking_id]);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }

        $this->set(compact('booking'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
