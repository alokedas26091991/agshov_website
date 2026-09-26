<?php
declare(strict_types=1);
namespace App\Controller\Seller;
use Cake\Routing\Router;
use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		$invoice11=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.order_status'=>0]);
		
		 $invoice1 = $this->paginate($invoice11);


		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		

		
		
    }
    public function confirmOrder()
    {
        
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		$invoice11=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.order_status'=>4]);
		
		 $invoice1 = $this->paginate($invoice11);


		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		

		
		
    }
    public function completedOrder()
    {
        
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		$invoice11=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.order_status'=>2]);
		
		 $invoice1 = $this->paginate($invoice11);


		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		

		
		
    }
    public function cancelledOrder()
    {
        
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		$invoice11=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.order_status'=>3]);
		
		 $invoice1 = $this->paginate($invoice11);


		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		

		
		
    }
    public function returnorder()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		$invoice11=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status'=>1]);
		$invoice1 = $this->paginate($invoice11);		   
		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		

		
    }
    public function acceptReturn()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		$invoice11=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products','ShypliteDetails'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status'=>2]);

		$invoice1 = $this->paginate($invoice11);		   
		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		

		
    }
    public function completedReturn()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		$invoice11=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status'=>3]);

		$invoice1 = $this->paginate($invoice11);		   
		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		

		
    }
    public function returndetails($id=null) {
        
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        
        $invoice1=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])->where(['InvoiceItems.id' => $id])->first();
		$this->set('invoice1', $invoice1);
	
      
    }
    public function returnstatus($id=null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $Invoice1 = $Invoice->get($id, [
            'contain' => ['Invoices.Users']
        ]);
        $Products = TableRegistry::getTableLocator()->get('Products');
        $Products1 = $Products->get($Invoice1->product_id);
          //debug($Invoice1->shyplite_details[1]->id);die;  
        if ($this->request->is(['patch', 'post', 'put'])) {
            $return_status = $Invoice->patchEntity($Invoice1, $this->request->getData());
            	//for products
		  		$product_qtn = $Products->patchEntity($Products1, $this->request->getData());
		  		$product_qtn->total_quantity=$Products1->total_quantity+$Invoice1->quantity;
		  		
                $product_qtn->total_quantity_sale=$Products1->total_quantity_sale-$Invoice1->quantity;
                $Products->save($product_qtn);
                
                //for user products
				

				$UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
                $query = $UserProducts->query();
                $query->update()
                    ->set(['total_quantity' => $product_qtn->total_quantity,'total_quantity_sale'=>$product_qtn->total_quantity_sale])
                    ->where(['product_id' => $Products1->id])
                    ->execute();
            
            $return_status->return_approve_date=date('Y-m-d');
            $this->loadComponent('Shyplite');
		  	$orderIdshy=$this->Shyplite->set_order($id,TRUE);

            if ($Invoice->save($return_status)) {
                
            $Invoice2 = $Invoice->get($id, [
            'contain' => ['Invoices.Users','ShypliteDetails']
            ]);
            $ShypliteDetails = TableRegistry::getTableLocator()->get('ShypliteDetails');
            $ShypliteDetails1 = $ShypliteDetails->get($Invoice2->shyplite_details[1]->id, [
            'contain' => []
        ]);
		  	if(isset($orderIdshy[0]->success)){
					
				$ShypliteDetails1->shipment=$orderIdshy[0]->success;
			
			}
			 
             $ShypliteDetails->save($ShypliteDetails1);
                
                $customer_email=$Invoice1->invoice->user->email;
                
                if($this->request->getData('return_status')==2)
                {
                    $this->loadComponent('SendMail');
                    $this->SendMail->sendMail(11, $customer_email,['name' =>$customer_email ]);
                }
               
                
                $this->Flash->success(__('The Return Status has been saved.'));

                return $this->redirect(['action' => 'returnorder']);
            } else {
                $this->Flash->error(__('The Return Status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('Invoice1'));
    }
    public function returnstatus1($id=null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $Invoice1 = $Invoice->get($id, [
            'contain' => ['Invoices.Users']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $return_status = $Invoice->patchEntity($Invoice1, $this->request->getData());
            $return_status->return_complete_date=date('Y-m-d');
            if ($Invoice->save($return_status)) {
                
                $customer_email=$Invoice1->invoice->user->email;
                
                if($this->request->getData('return_status')==2)
                {
                    $this->loadComponent('SendMail');
                    $this->SendMail->sendMail(12, $customer_email,['name' =>$customer_email ]);
                }
               
                
                $this->Flash->success(__('The Return Status has been saved.'));

                return $this->redirect(['action' => 'returnorder']);
            } else {
                $this->Flash->error(__('The Return Status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('Invoice1'));
    }

	
    
    public function orderstatus($id=null)
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $Invoice1 = $Invoice->get($id, [
            'contain' => ['Invoices','Invoices.Users','ShypliteDetails']
        ]);
        $Products = TableRegistry::getTableLocator()->get('Products');
        $Products1 = $Products->get($Invoice1->product_id);

        
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if($Invoice1->order_status==2)
            {
                $this->Flash->success(__('Order has been Completed.You have nothing to do.'));

                return $this->redirect(['action' => 'index']);
            }
            else
            {
                
            $order_status = $Invoice->patchEntity($Invoice1, $this->request->getData());
            $status=$this->request->getData('order_status');
			
			if($status==3)
            {
				$order_status->order_cancell_date=date('Y-m-d');
			}
            if($status==4)
            {
                
				$this->loadComponent('Shyplite');
		  		$orderIdshy=$this->Shyplite->set_order($id);
		  		$order_status->order_confirm_date=date('Y-m-d');
		  		//if(isset($orderIdshy[0]->success)){
					
				//$order_status->shipment=$orderIdshy[0]->success;
			
				
			
					
					
		  		//}
		  		//for products
		  		$product_qtn = $Products->patchEntity($Products1, $this->request->data);
		  		$product_qtn->total_quantity=$Products1->total_quantity-$Invoice1->quantity;
		  		
                $product_qtn->total_quantity_sale=$Products1->total_quantity_sale+$Invoice1->quantity;
                $Products->save($product_qtn);
                
                //for user products
				

				$UserProducts = TableRegistry::get('UserProducts');
                $query = $UserProducts->query();
                $query->update()
                    ->set(['total_quantity' => $product_qtn->total_quantity,'total_quantity_sale'=>$product_qtn->total_quantity_sale])
                    ->where(['product_id' => $Products1->id])
                    ->execute();
		  		
		  		
                			

            }
            else
            {
               
				//$this->loadComponent('Shyplite');
				//$order_status->order_cancell_date=date('Y-m-d');
			//	$orderIdshy=$this->Shyplite->cancel_order([$Invoice1->shyplite_details[0]->id]);
				
				
				//for products
		  		$product_qtn = $Products->patchEntity($Products1, $this->request->getData());
		  		$product_qtn->total_quantity=$Products1->total_quantity+$Invoice1->quantity;
		  		
                $product_qtn->total_quantity_sale=$Products1->total_quantity_sale-$Invoice1->quantity;
                $Products->save($product_qtn);
                
                //for user products
				

				$UserProducts =TableRegistry::getTableLocator()->get('UserProducts');
                $query = $UserProducts->query();
                $query->update()
                    ->set(['total_quantity' => $product_qtn->total_quantity,'total_quantity_sale'=>$product_qtn->total_quantity_sale])
                    ->where(['product_id' => $Products1->id])
                    ->execute();
            }
            
            
          
            
            if ($Invoice->save($order_status)) {
                $customer_email=$Invoice1->invoice->user->email;
                $order_status=$this->request->getData('order_status');
                
 
                if($order_status==3)
                {
                                  $this->loadComponent('SendMail');
                                  $this->SendMail->sendMail(7, $customer_email,['name' =>$customer_email ]);
                                  $msg = "We want to inform you that Purchased Order Number $Invoice1->invoice->order_id has been cancelled at your Febino Shopping Portal. Confirmed by Team-Febino.";
                                  $this->SendMail->sendOTP($msg, $Invoice1->invoice->user->mobile);
                }
                if($order_status==4)
                {
                                  $this->loadComponent('SendMail');
                                  $this->SendMail->sendMail(10, $customer_email,['name' =>$customer_email ]);
                                  
                                  // $msg="Hi $Invoice1->invoice->user->first_name . ! Your $Invoice1->invoice->order_id has been shipped. Keep track of your delivery status from here: % or you can visit www.pickallure.com";
                                  // $this->SendMail->sendOTP($msg, $Invoice1->invoice->user->mobile);
                }

                $this->Flash->success(__('The Order Status has been saved.'));

                return $this->redirect(['action' => 'index']);
                
                

                
                
            } 
            
            else {
                $this->Flash->error(__('The Order Status could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        }
        $this->set(compact('Invoice1'));
        
    }

    public function adddetails($id=null)
    {
         $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $Invoice1 = $Invoice->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $details = $Invoice->patchEntity($Invoice1, $this->request->getdata());
            if ($Invoice->save($details)) {
               
                
                $this->Flash->success(__('Details has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Details could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('Invoice1'));
    }
    
public function barcode128()
{

}
public function getShipmentSlip($id){
			 	$this->loadComponent('Shyplite');
				 $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $order_status = $Invoice->get($id, [
            'contain' => ['ShypliteDetails']
        ]);
$ShypliteDetails = TableRegistry::getTableLocator()->get('ShypliteDetails');
$ShypliteDetails1 = $ShypliteDetails->get($order_status->shyplite_details[0]->id, [
            'contain' => []
        ]);

		  		$shipment=$this->Shyplite->getShipmentSlip($order_status->shyplite_details[0]->id);
		  		
		  
		  		
		  		if(isset($shipment->error)){
		  		    
		  		    
					
				$this->Flash->success(__('Your Carrier Partner did not receive this order.Please Contact to Administrator..'));
				return $this->redirect(['action' => 'orderstatus',$order_status->id]);	
		  		}
		  		else
		  		{
		  	
		  		
		  		
		  		
				$order_status->carrierName=$shipment->carrierName;
				$order_status->awbNo=$shipment->awbNo;
				$order_status->manifestID=$shipment->manifestID;
				$order_status->s3Path=$shipment->s3Path[0];
				
				$ShypliteDetails1->shipment=$order_status->shipment;
                $ShypliteDetails1->carrierName=$shipment->carrierName;
                $ShypliteDetails1->manifestID=$shipment->manifestID;
                $ShypliteDetails1->awbNo=$shipment->awbNo;
                $ShypliteDetails->save($ShypliteDetails1);
				
				$Invoice->save($order_status);
				 //$this->Flash->success(__('Details has been saved.'));
				return $this->redirect(['action' => 'invoice',$order_status->id]);
		  		}
				
	
}
   public function track($id=null){
       
      
			 	$this->loadComponent('Shyplite');
				
		  		$orderIdshy=$this->Shyplite->track($id);
		  		
		  	
		  		
		  		$this->set('track',$orderIdshy);
	
	} 
	
public function get_manifest($id=null){
       
                
			 	$this->loadComponent('Shyplite');
				
		  		$orderIdshy=$this->Shyplite->get_manifest($id);
		  		
		  		$url=$orderIdshy->s3Path;
		  		
		  		$this->set('url',$url);
		  		

		  	
		  		

		  		
                
	
	}
	public function get_return_awbno($id=null){
	    $this->autoRender = false;
	   	$this->loadComponent('Shyplite');
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $order_status = $Invoice->get($id, [
            'contain' => ['ShypliteDetails']
        ]);
	    
	    $ShypliteDetails = TableRegistry::getTableLocator()->get('ShypliteDetails');
        $ShypliteDetails1 = $ShypliteDetails->get($order_status->shyplite_details[1]->id, [
            'contain' => []
        ]);

		  		$shipment=$this->Shyplite->getShipmentSlip($order_status->shyplite_details[1]->id);
		  		
		  	
				
			
                $ShypliteDetails1->carrierName=$shipment->carrierName;
                $ShypliteDetails1->manifestID=$shipment->manifestID;
                $ShypliteDetails1->awbNo=$shipment->awbNo;
                $ShypliteDetails->save($ShypliteDetails1);
       
                $this->Flash->success(__('AWB No has been Generated'));
			 	return $this->redirect(['action' => 'returnorder']);
	
	}
	public function getShipmentSlip1($id=null){
       
                
			 	$this->loadComponent('Shyplite');
				
		  		$orderIdshy=$this->Shyplite->getShipmentSlip($id);
		  		
		  		$url=$orderIdshy->s3Path[0];
		  		
		  		//debug($url);die;
		  		
		  		$this->set('url',$url);
		  		

		  	
		  		

		  		
                
	
	}
    
public function invoice($id)
{
			$Invoice = TableRegistry::getTableLocator()->get('Invoices');
            $invoice = $Invoice->get($id, [
            'contain' => ['Users','UserDeliveryDetails','InvoiceItems.Products','InvoiceItems']
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
