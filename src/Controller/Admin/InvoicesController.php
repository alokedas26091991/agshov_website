<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class InvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
 public function index()
{
    // Check for the page in the query and store it in session
    if ($this->request->getQuery('page')) {
        $this->request->getSession()->write('Products.page', $this->request->getQuery('page'));
    } else {
        $this->request->getSession()->write('Products.page', 0);
    }

    // Get search query
    $search = $this->request->getQuery('search');

    // Configure pagination
    $this->paginate = [
        'contain' => ['InvoiceItems', 'Users', 'UserDeliveryDetails', 'InvoiceItems.Vendors'],
        'order' => ['Invoices.id' => 'DESC']
    ];

    // Start building the query
    $query = $this->Invoices->find('all', [
        'conditions' => ['Invoices.is_deleted' => 0],
    ]);

    // Apply search filter if search query exists
    if (!empty($search)) {
        $query->where([
            'OR' => [
                'Users.name LIKE' => '%' . $search . '%',
                'UserDeliveryDetails.mobile LIKE' => '%' . $search . '%',
            ]
        ]);
    }

    // Paginate the query
    $invoice1 = $this->paginate($query);

    // Pass variables to the view
    $this->set(compact('invoice1', 'search'));
    $this->set('_serialize', ['invoice1']);
}



    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function invoicedetails($id = null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $invoice1 = $Invoice->find("all")->contain(['Invoices.Users', 'Invoices.UserDeliveryDetails', 'Products'])->where(['InvoiceItems.invoice_id' => $id]);

        $this->set('invoice1', $invoice1);
    }
    public function returnstatus($id = null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $Invoice1 = $Invoice->get($id, [
            'contain' => ['Invoices.Users']
        ]);
        $Products = TableRegistry::getTableLocator()->get('Products');
        $Products1 = $Products->get($Invoice1->product_id);
        $return_invoice = $Invoice1->return_status;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $return_status = $Invoice->patchEntity($Invoice1, $this->request->getData());
            $status = $this->request->getData('return_status');
            if ($return_invoice == $status) {
                $this->Flash->success(__('This Return status has already been been Done.'));
                return $this->redirect(['action' => 'returnstatus', $Invoice1->id]);
            } else {
                if ($this->request->getData('return_status') == 2) {

                    //for products
                    $product_qtn = $Products->patchEntity($Products1, $this->request->getData());
                    $product_qtn->total_quantity = $Products1->total_quantity + $Invoice1->quantity;

                    $product_qtn->total_quantity_sale = $Products1->total_quantity_sale - $Invoice1->quantity;
                    $Products->save($product_qtn);

                    //for user products


                    $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
                    $query = $UserProducts->query();
                    $query->update()
                        ->set(['total_quantity' => $product_qtn->total_quantity, 'total_quantity_sale' => $product_qtn->total_quantity_sale])
                        ->where(['product_id' => $Products1->id])
                        ->execute();

                    $return_status->return_approve_date = date('Y-m-d');
                    $this->loadComponent('Shyplite');
                    $orderIdshy = $this->Shyplite->set_order($id, TRUE);
                }
                if ($this->request->getData('return_status') == 3) {
                    $return_status->return_complete_date = date('Y-m-d');
                }
                if ($Invoice->save($return_status)) {

                    $Invoice2 = $Invoice->get($id, [
                        'contain' => ['Invoices.Users', 'ShypliteDetails']
                    ]);
                    $ShypliteDetails = TableRegistry::get('ShypliteDetails');
                    $ShypliteDetails1 = $ShypliteDetails->get($Invoice2->shyplite_details[1]->id, [
                        'contain' => []
                    ]);
                    if (isset($orderIdshy[0]->success)) {

                        $ShypliteDetails1->shipment = $orderIdshy[0]->success;
                    }

                    $ShypliteDetails->save($ShypliteDetails1);

                    $customer_email = $Invoice1->invoice->user->email;

                    if ($this->request->getData('return_status') == 2) {
                        $this->loadComponent('SendMail');
                        $this->SendMail->sendMail(11, $customer_email, ['name' => $customer_email]);
                    }
                    if ($this->request->getData('return_status') == 3) {
                        $this->loadComponent('SendMail');
                        $this->SendMail->sendMail(12, $customer_email, ['name' => $customer_email]);
                    }


                    $this->Flash->success(__('The Return Status has been saved.'));

                    return $this->redirect(['action' => 'returnstatus', $Invoice1->id]);
                } else {
                    $this->Flash->error(__('The Return Status could not be saved. Please, try again.'));
                }
            }
        }
        $this->set(compact('Invoice1'));
    }

    public function extracharges($id = null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $Invoice1 = $Invoice->get($id, [
            'contain' => ['Invoices.Users']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $charge = $Invoice->patchEntity($Invoice1, $this->request->getData());
            if ($this->request->getData('charge_type') == 1 || $this->request->getData('charge_type') == 2) {
                $charge->charge_apply_date = date('Y-m-d');
            }
            if ($this->request->getData('charge_type') == 2) {
                $charge->charge_receive_date = date('Y-m-d');
            }
            if ($Invoice->save($charge)) {

                $this->Flash->success(__('This Status has been saved.'));

                return $this->redirect(['action' => 'extracharges', $Invoice1->id]);
            } else {
                $this->Flash->error(__('This Status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('Invoice1'));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function orderstatus($id = null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('Invoices');

        $Invoice1 = $Invoice->get($id, [
            'contain' => ['Users'],
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $order_status = $Invoice->patchEntity($Invoice1, $this->request->getData());
            $status = $this->request->getData('order_status');


            $Invoice->save($order_status);


            $this->loadComponent('SendMail');
            $this->SendMail->sendMail(10, $Invoice1->user->email, ['name' => $Invoice1->user->name, 'email' => $Invoice1->user->name]);

            $this->Flash->success(__('This Order status is Updated'));
            return $this->redirect(['action' => 'index', $Invoice1->id]);
        }
        $this->set(compact('Invoice1'));
    }
    public function addpayment1($id = null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $Invoice1 = $Invoice->get($id, [
            'contain' => ['Invoices.Users']
        ]);

        if ($Invoice1->order_status == 2) {
            $payment_status = $Invoice->patchEntity($Invoice1, $this->request->getData());
            $payment_status->payment_date = date('Y-m-d');

            if ($Invoice1->payment_status == 0) {
                $payment_status->payment_status = 1;
            } else {
                $payment_status->payment_status = 0;
            }

            if ($Invoice->save($payment_status)) {




                $this->Flash->success(__('The Payment has been saved.'));

                return $this->redirect(['action' => 'allpayment']);
            } else {
                $this->Flash->error(__('The Payment could not be saved. Please, try again.'));
            }

            $this->set(compact('Invoice1'));
        } else {
            $this->Flash->success(__('The Payment is not Made because Order has not been Completed.'));

            return $this->redirect(['action' => 'allpayment']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function allpayment()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $search = [];
        $this->set('placeholder', ['Search here']);
        $search1 = $this->request->getQuery('search');
        if ($search1 != null) {
            $keyword = trim($search1);
            $search[] = ['OR' => ['Users.first_name LIKE' => "%$keyword%", 'Invoices.invoice_no LIKE' => "%$keyword%", 'Invoices.order_id LIKE' => "%$keyword%", 'Products.name LIKE' => "%$keyword%"]];
            $this->set('search', $keyword);
        }
        $this->paginate = [
            'contain' => ['Invoices', 'Users', 'Products']
        ];
        $invoice1 = $this->paginate($Invoice->find("all")->where(['InvoiceItems.is_deleted' => 0, 'InvoiceItems.order_status' => 2, 'InvoiceItems.payment_status' => 0, $search]));



        $this->set(compact('invoice1'));
        $this->set('_serialize', ['invoice1']);
    }
    public function paymentlist()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $search = [];
        $this->set('placeholder', ['Search here']);
        $search1 = $this->request->getQuery('search');
        if ($search1 != null) {
            $keyword = trim($search1);
            $search[] = ['OR' => ['Users.first_name LIKE' => "%$keyword%", 'Invoices.invoice_no LIKE' => "%$keyword%", 'Invoices.order_id LIKE' => "%$keyword%", 'Products.name LIKE' => "%$keyword%"]];
            $this->set('search', $keyword);
        }
        $this->paginate = [
            'contain' => ['Invoices', 'Users', 'Products']
        ];
        $invoice1 = $this->paginate($Invoice->find("all")->where(['InvoiceItems.is_deleted' => 0, 'InvoiceItems.order_status' => 2, 'InvoiceItems.payment_status' => 1, $search]));



        $this->set(compact('invoice1'));
        $this->set('_serialize', ['invoice1']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function invoicedownload($id)
    {
        $Invoice = TableRegistry::getTableLocator()->get('Invoices');
        $invoice = $Invoice->get($id, [
            'contain' => ['Users', 'UserDeliveryDetails', 'InvoiceItems.Products', 'InvoiceItems']
        ]);


        //pr($invoice);die;




        $this->viewBuilder()->enableAutoLayout(false);
        $this->viewBuilder()
            ->setClassName('CakePdf.Pdf')
            ->setLayout('pdf')
            ->setOptions(['pdfconfig' => [
                'filename' => 'Invoice',
                'render' => 'download',
                "enable_html5_parser" => true,
                'orientation' => 'portrait'
            ]]);

        $this->set(compact('invoice'));
    }
}
