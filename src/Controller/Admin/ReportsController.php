<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\ORM\TableRegistry;
use App\Controller\Admin\AppController;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 */
class ReportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
    }
    public function productreport()
    {
        $User = TableRegistry::getTableLocator()->get('Users');
        $User1 = $User->find('list', [
            'keyField' => 'id',
            'valueField' => 'first_name'
        ],['limit' => 5000])->where(['is_vendor'=>1]);
        $this->set('User1',$User1);
        
    }
    public function productreport1()
    {
        $userproduct = TableRegistry::getTableLocator()->get('UserProducts');
        
        
            $product = $userproduct->newEmptyEntity();
            $this->from_date=$this->request->getData('from_date');
            $this->to_date=$this->request->getData('to_date');
            $this->seller_id=$this->request->getData('seller_id');
           if($this->seller_id==NULL) 
           {
               $product_list=$userproduct->find("all")->contain(['Users', 'Products', 'Products.Brands','Products.Categories','Products.SubCategories','Products.Types','Products.Brands'])
               ->where(function($exp) {
							return $exp->between('Products.create_date', $this->from_date, $this->to_date);
						});
           }
           else if($this->from_date==NULL || $this->to_date==NULL)
           {
               $product_list=$userproduct->find("all")->contain(['Users', 'Products', 'Products.Brands','Products.Categories','Products.SubCategories','Products.Types','Products.Brands'])
               ->where(['UserProducts.user_id' => $this->seller_id]);
              
              
           }
           else
           {
               $product_list=$userproduct->find("all")->contain(['Users', 'Products', 'Products.Brands','Products.Categories','Products.SubCategories','Products.Types','Products.Brands'])
               ->where(['UserProducts.user_id' => $this->seller_id])
               ->where(function($exp) {
							return $exp->between('Products.create_date', $this->from_date, $this->to_date);
						});
						
						
           }
          //pr($product_list);die;
		  $this->set('product_list', $product_list);
        
    }
    public function orderreport()
    {
        $User = TableRegistry::getTableLocator()->get('Users');
        $User1 = $User->find('list', [
            'keyField' => 'id',
            'valueField' => 'first_name'
        ],['limit' => 5000])->where(['is_vendor'=>1]);
        $this->set('User1',$User1);
    }
    public function orderreport1()
    {
            $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
            $order = $Invoice->newEmptyEntity();
        
       
           $this->from_date=$this->request->getData('from_date');
            $this->to_date=$this->request->getData('to_date');
            $this->order_status=$this->request->getData('order_status');
         
            $this->seller_id=$this->request->getData('seller_id');
           

          if($this->order_status==NULL && $this->seller_id==NULL) 
           {
               $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
           }
           else if($this->from_date==NULL || $this->to_date==NULL && $this->order_status==NULL)
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.return_status !='=>'3']);
              
           }
           else if($this->from_date==NULL && $this->to_date==NULL && $this->seller_id==NULL)
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.order_status'=>$this->order_status,'InvoiceItems.return_status !='=>'3']);

              
              
           }
           else if($this->from_date==NULL || $this->to_date==NULL)
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.order_status'=>$this->order_status,'InvoiceItems.return_status !='=>'3']);
              
              
           }
           else if($this->seller_id==NULL)
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.order_status'=>$this->order_status,'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
						
						          
              
              
           }
           else if($this->order_status==NULL)
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
              
              
           }
           else
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.order_status'=>$this->order_status,'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
						
						
           }
						
						
           
          
		  $this->set('order_list', $order_list);
    }
    public function paymentreport()
    {
                $User = TableRegistry::getTableLocator()->get('Users');
                $User1 = $User->find('list',[
            'keyField' => 'id',
            'valueField' => 'first_name'
        ], ['limit' => 5000])->where(['is_vendor'=>1]);
                $this->set('User1',$User1);
    }
    public function paymentreport1()
    {
                $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $order = $Invoice->newEmptyEntity();
        
         
             $this->from_date=$this->request->getData('from_date');
            $this->to_date=$this->request->getData('to_date');
            $this->payment_status=$this->request->getData('payment_status');
         
            $this->seller_id=$this->request->getData('seller_id');
           if($this->seller_id==NULL) 
           {
               $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.payment_status' => $this->payment_status,'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('InvoiceItems.payment_date', $this->from_date, $this->to_date);
						});
           }
           else if($this->from_date==NULL || $this->to_date==NULL)
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.payment_status'=>$this->payment_status,'InvoiceItems.return_status !='=>'3']);
               
              
              
           }
           else if($this->payment_status==NULL)
           {
               $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('InvoiceItems.payment_date', $this->from_date, $this->to_date);
						});
               
              
              
           }
           else
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->Where(['InvoiceItems.return_status !='=>'3'])
               ->Where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						})
			   ->andWhere(['InvoiceItems.payment_status'=>$this->payment_status])
			   ->andWhere(['InvoiceItems.vendor_id' => $this->seller_id]);
			   
			   
						
						
           }
          
		  $this->set('order_list', $order_list);
    }
    public function returnreport()
    {
                $User = TableRegistry::getTableLocator()->get('Users');
                $User1 = $User->find('list',[
            'keyField' => 'id',
            'valueField' => 'first_name'
        ], ['limit' => 5000])->where(['is_vendor'=>1]);
                $this->set('User1',$User1);
    }
    public function returnreport1()
    {
            $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
            $order = $Invoice->newEmptyEntity();
        
          
            $this->from_date=$this->request->getData('from_date');
            $this->to_date=$this->request->getData('to_date');
          
         
            $this->seller_id=$this->request->getData('seller_id');
           if($this->seller_id==NULL) 
           {
               $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.return_status' => 3])
               ->where(function($exp) {
							return $exp->between('InvoiceItems.return_complete_date', $this->from_date, $this->to_date);
						});
           }
           else if($this->from_date==NULL || $this->to_date==NULL)
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.return_status'=>3]);
              
              
           }
           else
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->seller_id,'InvoiceItems.return_status'=>3])
               ->where(function($exp) {
							return $exp->between('InvoiceItems.return_complete_date', $this->from_date, $this->to_date);
						});
						
						
           }
          
		  $this->set('order_list', $order_list);
    }
   
}
