<?php
declare(strict_types=1);
namespace App\Controller\Seller;

use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;

class HomeController extends AppController {

    public function initialize():void {
		
        parent::initialize();
        $this->Auth->allow(['resources','seller_diaries']);
    }

    /**
     * student dashboard
     */
     
      public function sellerpageedit($id=null) {
          
          $sellerpage = TableRegistry::getTableLocator()->get('SellerPages');
          
          $advertisement = $sellerpage->get($id, [
            'contain' => []
        ]);
        $pic=$advertisement->photo;
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            
            $advertisement1 = $sellerpage->patchEntity($advertisement, $this->request->getData());
            
            if($advertisement1->products)
            {
            
            $advertisement1->products=implode(",",$this->request->getData('products'));
            }
            else
            {
                $advertisement1->products="";
            }
            if($_FILES['photo']['name']!=''){
					$this->loadComponent('UploadImage');
					$advertisement1->photo=$this->UploadImage->do_upload_image_biswa_cake4('homepageimage',$_FILES['photo'],'homepageimage','ll');
				 
			 }
			 else
			 {
			     $advertisement1->photo=$pic;
			 }
            if ($sellerpage->save($advertisement1)) {
                $this->Flash->success(__('The Data has been saved.'));

                return $this->redirect(['action' => 'sellerpagelist']);
            } else {
                $this->Flash->error(__('The Data could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('advertisement'));
        $this->set('_serialize', ['advertisement']);
        
        $product = TableRegistry::getTableLocator()->get('Products');
        
        $product1 = $product->find()->where(['user_id' => $this->Auth->user('id'),'is_active'=>1,'is_deleted'=>0]);
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

        return $this->redirect(['action' => 'sellerpagelist']);
    }
     public function sellerpagelist() {
         
        $sellerpage = TableRegistry::getTableLocator()->get('SellerPages');
         
        $advertisements = $this->paginate($sellerpage->find("all"));

        $this->set(compact('advertisements'));
        $this->set('_serialize', ['advertisements']);
     }
     
     public function sellerpage() {
         
         $sellerpage = TableRegistry::getTableLocator()->get('SellerPages');
         
        $advertisement = $sellerpage->newEmptyEntity();
        if ($this->request->is('post')) {
            $advertisement = $sellerpage->patchEntity($advertisement, $this->request->getData());
            if($this->request->getData('products'))
            {
            $advertisement->products=implode(",",$this->request->getData('products'));
            }
			$advertisement->seller_id=$this->Auth->user('id');
			$advertisement->create_date=date('Y-m-d');
			if($_FILES['photo']['name']!=''){
					$this->loadComponent('UploadImage');
					$advertisement->photo=$this->UploadImage->do_upload_image_biswa_cake4('homepageimage',$_FILES['photo'],'homepageimage','ll');
				 
			 }
			 else
			 {
				 $advertisement->photo="";
			 }
            if ($sellerpage->save($advertisement)) {
                $this->Flash->success(__('The Data has been saved.'));

                return $this->redirect(['action' => 'sellerpagelist']);
            } else {
                $this->Flash->error(__('The Data could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('advertisement'));
        $this->set('_serialize', ['advertisement']);
        
        $product = TableRegistry::getTableLocator()->get('Products');
        
        $product1 = $product->find()->where(['user_id' => $this->Auth->user('id'),'is_active'=>1,'is_deleted'=>0,'parent_id IS'=>NULL]);
        $this->set(compact('product1'));
        $this->set('_serialize', ['product1']);
         
     }
     public function average_rating() {
         
        $Reviews = TableRegistry::getTableLocator()->get('Reviews');
	

         
                     $Query = $Reviews->find("all",[
		    "order"=>["Reviews.rating"=>"desc"]]);
            $rating_group=$Reviews->find("all")->select([ 
                  'rating',
                  'slug',
                  'count' => $Query->func()->count('*'),
                  'avg' => $Query->func()->avg('Reviews.rating')
                  
                ])
        ->where(['Reviews.seller_id' => $this->Auth->user('id') , 'Reviews.is_active' => 1])
         ->group('product_id');
     
  
     $this->set('pro',$rating_group);
     
  
     }
    public function dashboard() {
	
	        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
	        
	        $total_new_order=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>0]);
		    $this->set('total_new_order',$total_new_order->count());
		$total_new_order_amount=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>2]);
		
		$abc=0;
		//$total_products_sale=0;
		foreach($total_new_order_amount as $a)
		{
            $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total=0;
                foreach($charge as $c){
                    $cha=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total= $total+$cha;
                    
                }
               $single_product_price= $a->product->offer_price-$total; 
               $total_product_value=$single_product_price*$a->quantity;
               $abc=$abc+$total_product_value+($a->quantity*$a->delivery_charge);
               //$total_products_sale1=$total_products_sale+$a->quantity;
		}
	    $this->set('abc',$abc);
	    $this->set('total_products_sale1',$total_new_order_amount->count());
	    
        $Products = TableRegistry::getTableLocator()->get('Products');
        
        $total_outofstock=$Products->find("all")->where(['user_id' => $this->Auth->user('id'), 'is_live'=>1, 'is_active'=>1, 'is_deleted'=>0, 'total_quantity'=>0]);
        
         $this->set('total_outofstock',$total_outofstock->count());
		
		$total_products=$Products->find("all")->where(['user_id' => $this->Auth->user('id'), 'is_live'=>1, 'is_active'=>1, 'is_deleted'=>0]);
		
	    $this->set('total_products',$total_products->count());
	    
	    $Users = TableRegistry::getTableLocator()->get('Users');
		
		$total_users=$Users->find("all")->where(['is_customer'=>1, 'is_deleted'=>0]);
		
	    $this->set('total_users',$total_users->count());
	    
	    $invoice_confirm=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>0]);
		
		$this->paginate = [
						'contain' => []
					];
				   
		$invoice_confirm1 = $this->paginate($invoice_confirm);
		$this->set(compact('invoice_confirm1'));
		$this->set('_serialize', ['invoice_confirm1']);
		
		$order_completed=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>2]);
		$this->set('order_completed',$order_completed->count());
		
		$order_confirmed=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>4]);
		$this->set('order_confirmed',$order_confirmed->count());
		
		$order_cancelled=$Invoice->find("all",[
		"order"=>["InvoiceItems.id"=>"desc"]])->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>3]);
		$this->set('order_cancelled',$order_cancelled->count());
		
		
		
		$Review = TableRegistry::getTableLocator()->get('Reviews');
		$total_review=$Review->find("all")->where(['seller_id' => $this->Auth->user('id'), 'is_active'=>1]);
		$this->set('total_review',$total_review->count());
	
		$total_positive_review=$Review->find("all")->where(['seller_id' => $this->Auth->user('id'), 'is_active'=>1, 'rating'=>5]);
		$this->set('total_positive_review',$total_positive_review->count());
		
		$total_negative_review=$Review->find("all")->where(['seller_id' => $this->Auth->user('id'), 'is_active'=>1])->where(["OR"=>[ 'rating'=>1, 'rating'=>2]]);
		$this->set('total_negative_review',$total_negative_review->count());
		
		$total_neutral_review=$Review->find("all")->where(['seller_id' => $this->Auth->user('id'), 'is_active'=>1, 'rating'=>3]);
		$this->set('total_neutral_review',$total_neutral_review->count());
		
	    $user = TableRegistry::getTableLocator()->get('Users');
        $user1=$user->find("all")->where(['id' => $this->Auth->user('id')])->first();
        
        $seller_slug=$user1->slug;
		
		$this->set('seller_id',$seller_slug);
		
	    $page_view = TableRegistry::getTableLocator()->get('SellerPageViews');
		$total_page_view=$page_view->find("all")->where(['seller_id'=>$this->Auth->user('id')]);
		$this->set('total_view_count',$total_page_view->count());
		
		$total_return=$Invoice->find("all")->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.return_status'=>3]);
        $this->set('total_return_count',$total_return->count());
        
        //$total_new_order_amount=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'), 'InvoiceItems.order_status'=>2]);
        
       $total_rtd=$Invoice->find('all', array('conditions' => array('Invoices.creation_date BETWEEN InvoiceItems.order_confirm_date AND DATE_ADD(InvoiceItems.order_confirm_date, INTERVAL 2 DAY)')))->contain(['Invoices']);
       $this->set('total_rtd_count',$total_rtd->count());
       
    }
    public function catalogreport()
    {

        
        $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');

			        $this->paginate = [
						'contain' => ['Users', 'Products', 'Products.Brands','Products.Categories','Products.SubCategories','Products.Types','Products.Brands']
					];
			
				   
					$products = $this->paginate($UserProducts->find("all",[
		"order"=>["Products.id"=>"desc"]])->where(['Products.status'=> 3, 'Products.is_deleted'=> 0,'Products.user_id' => $this->Auth->user('id'),'UserProducts.is_live'=> 1,'UserProducts.is_active'=> 1]));
				

					$this->set(compact('products'));
					$this->set('_serialize', ['products']);
    }
    public function orderreport()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $order = $Invoice->newEmptyEntity();
        
            $order = $Invoice->newEmptyEntity();
            $this->from_date=$this->request->getData('from_date');
            $this->to_date=$this->request->getData('to_date');
            $this->order_status=$this->request->getData('order_status');
           if(empty($this->order_status)) 
           {
               $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
						
						
           }
           else if(empty($this->from_date) || empty($this->to_date))
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.order_status'=>$this->order_status,'InvoiceItems.return_status !='=>'3']);
               
               
              
              
              
           }
           else
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.order_status'=>$this->order_status,'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
						
						
           }
          
		  $this->set('order_list', $order_list);
        
		
		
    }
    public function paymentreport()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $order = $Invoice->newEmptyEntity();
        
            $order = $Invoice->newEmptyEntity();
            $this->from_date=$this->request->getData('from_date');
            $this->to_date=$this->request->getData('to_date');
            $this->payment_status=$this->request->getData('payment_status');
           if(empty($this->payment_status)) 
           {
               $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
           }
           else if(empty($this->from_date) || empty($this->to_date))
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.payment_status'=>$this->payment_status,'InvoiceItems.return_status !='=>'3']);
              
              
           }
           else
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.payment_status'=>$this->payment_status,'InvoiceItems.return_status !='=>'3'])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
						
						
           }
          
		  $this->set('order_list', $order_list);
        
		
		
    }
    public function returnreport()
    {
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        $order = $Invoice->newEmptyEntity();
        
            $order = $Invoice->newEmptyEntity();
            $this->from_date=$this->request->getData('from_date');
            $this->to_date=$this->request->getData('to_date');
            $this->return_status=$this->request->getData('return_status');
           if(empty($this->return_status)) 
           {
               $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id')])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
           }
           else if(empty($this->from_date) || empty($this->to_date))
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status'=>$this->return_status]);
              
              
           }
           else
           {
                $order_list=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])
               ->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status'=>$this->return_status])
               ->where(function($exp) {
							return $exp->between('Invoices.creation_date', $this->from_date, $this->to_date);
						});
						
						
           }
          
		  $this->set('order_list', $order_list);
        
		
		
    }
	public function payment() {


	
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		
		
		$total_new_order_amount=$Invoice->find()->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id')]);

		//pr($total_new_order_amount->first());die;
		
		$abc=0;
		$abc2=0;
		$abc3=0;
		$abc4=0;
		$abc5=0;
		foreach($total_new_order_amount as $a)
		{
		    if($a->order_status=="0")
		    {
            $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total=0;
                foreach($charge as $c){
                    $cha=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total= $total+$cha;
                    
                }
               $single_product_price= $a->product->offer_price-$total; 
               $total_product_value=$single_product_price*$a->quantity;
               $abc=$abc+$total_product_value;
		    }
		    else if($a->order_status=="2")
		    {
		        
              $chargeObj2 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge2=$chargeObj2->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total2=0;
                foreach($charge2 as $c2){
                    $cha2=($c2->charge_type!=1)?(($c2->value*$a->product->offer_price/100)):$c2->value;
                    $total2= $total2+$cha2;
                    
                }
               $single_product_price2= $a->product->offer_price-$total2; 
               $total_product_value2=$single_product_price2*$a->quantity;
               $abc2=$abc2+$total_product_value2;
    		    
		    }
		    else if($a->order_status==3)
		    {
		        $chargeObj3 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge3=$chargeObj3->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total3=0;
                foreach($charge3 as $c3){
                    $cha3=($c3->charge_type!=1)?(($c3->value*$a->product->offer_price/100)):$c3->value;
                    $total3= $total3+$cha3;
                    
                }
               $single_product_price3= $a->product->offer_price-$total3; 
               $total_product_value3=$single_product_price3*$a->quantity;
               $abc3=$abc3+$total_product_value3;
		    }
		    else if($a->return_status==3)
		    {
		         $chargeObj4 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge4=$chargeObj4->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total4=0;
                foreach($charge4 as $c4){
                    $cha4=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total4= $total4+$cha4;
                    
                }
               $single_product_price4= $a4->product->offer_price-$total4; 
               $total_product_value4=$single_product_price4*$a4->quantity;
               $abc4=$abc4+$total_product_value4;
		    }
		    else if($a->payment_status==1)
		    {
		         $chargeObj5 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge5=$chargeObj5->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total5=0;
                foreach($charge5 as $c5){
                    $cha5=($c5->charge_type!=1)?(($c5->value*$a->product->offer_price/100)):$c5->value;
                    $total5= $total5+$cha5;
                    
                }
               $single_product_price5= $a->product->offer_price-$total5; 
               $total_product_value5=$single_product_price5*$a->quantity;
               $abc5=$abc5+$total_product_value5;
		    }
		}
		
	
		$due=$abc2-$abc4;
		$total_due=$due-$abc5;
		

		
		$this->set('abc',$abc);
	
		$this->set('abc2',$abc2);
		$this->set('abc3',$abc3);
		$this->set('abc4',$abc4);
		$this->set('abc5',$abc5);
		
		$this->set('total_due',$total_due);
		
		//now for table section
		
		$invoice11=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.order_status'=>2]);
		$invoice1 = $this->paginate($invoice11);

		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		
		

		
      
    }
    
    	public function returnList() {
	
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		
		$total_new_order_amount=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id')]);


		
		$abc=0;
		$abc2=0;
		$abc3=0;
		$abc4=0;
		$abc5=0;
		foreach($total_new_order_amount as $a)
		{
		    if($a->order_status=="0")
		    {
            $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total=0;
                foreach($charge as $c){
                    $cha=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total= $total+$cha;
                    
                }
               $single_product_price= $a->product->offer_price-$total; 
               $total_product_value=$single_product_price*$a->quantity;
               $abc=$abc+$total_product_value-($a->quantity*$a->delivery_charge);
		    }
		    else if($a->order_status=="2")
		    {
		        
              $chargeObj2 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge2=$chargeObj2->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total2=0;
                foreach($charge2 as $c2){
                    $cha2=($c2->charge_type!=1)?(($c2->value*$a->product->offer_price/100)):$c2->value;
                    $total2= $total2+$cha2;
                    
                }
               $single_product_price2= $a->product->offer_price-$total2; 
               $total_product_value2=$single_product_price2*$a->quantity;
               $abc2=$abc2+$total_product_value2-($a->quantity*$a->delivery_charge);
    		    
		    }
		    else if($a->order_status==3)
		    {
		        $chargeObj3 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge3=$chargeObj3->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total3=0;
                foreach($charge3 as $c3){
                    $cha3=($c3->charge_type!=1)?(($c3->value*$a->product->offer_price/100)):$c3->value;
                    $total3= $total3+$cha3;
                    
                }
               $single_product_price3= $a->product->offer_price-$total3; 
               $total_product_value3=$single_product_price3*$a->quantity;
               $abc3=$abc3+$total_product_value3-($a->quantity*$a->delivery_charge);
		    }
		    else if($a->return_status==3)
		    {
		         $chargeObj4 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge4=$chargeObj4->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total4=0;
                foreach($charge4 as $c4){
                    $cha4=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total4= $total4+$cha4;
                    
                }
               $single_product_price4= $a4->product->offer_price-$total4; 
               $total_product_value4=$single_product_price4*$a4->quantity;
               $abc4=$abc4+$total_product_value4-($a4->quantity*$a4->delivery_charge);
		    }
		    else if($a->payment_status==1)
		    {
		         $chargeObj5 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge5=$chargeObj5->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total5=0;
                foreach($charge5 as $c5){
                    $cha5=($c5->charge_type!=1)?(($c5->value*$a->product->offer_price/100)):$c5->value;
                    $total5= $total5+$cha5;
                    
                }
               $single_product_price5= $a->product->offer_price-$total5; 
               $total_product_value5=$single_product_price5*$a->quantity;
               $abc5=$abc5+$total_product_value5-($a->quantity*$a->delivery_charge);
		    }
		}
		
	
		$due=$abc2-$abc4;
		$total_due=$due-$abc5;
		

		
		$this->set('abc',$abc);
	
		$this->set('abc2',$abc2);
		$this->set('abc3',$abc3);
		$this->set('abc4',$abc4);
		$this->set('abc5',$abc5);
		
		$this->set('total_due',$total_due);
		
		//now for table section
		
		$invoice11=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.return_status'=>3]);
		$invoice1 = $this->paginate($invoice11);

		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		
		

		
      
    }
    public function paidAmount() {
	
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		
		$total_new_order_amount=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id')]);


		
		$abc=0;
		$abc2=0;
		$abc3=0;
		$abc4=0;
		$abc5=0;
		foreach($total_new_order_amount as $a)
		{
		    if($a->order_status=="0")
		    {
            $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total=0;
                foreach($charge as $c){
                    $cha=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total= $total+$cha;
                    
                }
               $single_product_price= $a->product->offer_price-$total; 
               $total_product_value=$single_product_price*$a->quantity;
               $abc=$abc+$total_product_value-($a->quantity*$a->delivery_charge);
		    }
		    else if($a->order_status=="2")
		    {
		        
              $chargeObj2 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge2=$chargeObj2->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total2=0;
                foreach($charge2 as $c2){
                    $cha2=($c2->charge_type!=1)?(($c2->value*$a->product->offer_price/100)):$c2->value;
                    $total2= $total2+$cha2;
                    
                }
               $single_product_price2= $a->product->offer_price-$total2; 
               $total_product_value2=$single_product_price2*$a->quantity;
               $abc2=$abc2+$total_product_value2-($a->quantity*$a->delivery_charge);
    		    
		    }
		    else if($a->order_status==3)
		    {
		        $chargeObj3 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge3=$chargeObj3->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total3=0;
                foreach($charge3 as $c3){
                    $cha3=($c3->charge_type!=1)?(($c3->value*$a->product->offer_price/100)):$c3->value;
                    $total3= $total3+$cha3;
                    
                }
               $single_product_price3= $a->product->offer_price-$total3; 
               $total_product_value3=$single_product_price3*$a->quantity;
               $abc3=$abc3+$total_product_value3-($a->quantity*$a->delivery_charge);
		    }
		    else if($a->return_status==3)
		    {
		         $chargeObj4 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge4=$chargeObj4->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total4=0;
                foreach($charge4 as $c4){
                    $cha4=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total4= $total4+$cha4;
                    
                }
               $single_product_price4= $a4->product->offer_price-$total4; 
               $total_product_value4=$single_product_price4*$a4->quantity;
               $abc4=$abc4+$total_product_value4-($a4->quantity*$a4->delivery_charge);
		    }
		    else if($a->payment_status==1)
		    {
		         $chargeObj5 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge5=$chargeObj5->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total5=0;
                foreach($charge5 as $c5){
                    $cha5=($c5->charge_type!=1)?(($c5->value*$a->product->offer_price/100)):$c5->value;
                    $total5= $total5+$cha5;
                    
                }
               $single_product_price5= $a->product->offer_price-$total5; 
               $total_product_value5=$single_product_price5*$a->quantity;
               $abc5=$abc5+$total_product_value5-($a->quantity*$a->delivery_charge);
		    }
		}
		
	
		$due=$abc2-$abc4;
		$total_due=$due-$abc5;
		

		
		$this->set('abc',$abc);
	
		$this->set('abc2',$abc2);
		$this->set('abc3',$abc3);
		$this->set('abc4',$abc4);
		$this->set('abc5',$abc5);
		
		$this->set('total_due',$total_due);
		
		//now for table section
		
		$invoice11=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.payment_status'=>1]);
		$invoice1 = $this->paginate($invoice11);

		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		
		

		
      
    }
    public function extraCharge() {
	
		$Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
		
		$total_new_order_amount=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id')]);
		
		$abc=0;
		$abc2=0;
		$abc3=0;
		$abc4=0;
		$abc5=0;
		foreach($total_new_order_amount as $a)
		{
		    if($a->order_status=="0")
		    {
            $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total=0;
                foreach($charge as $c){
                    $cha=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total= $total+$cha;
                    
                }
               $single_product_price= $a->product->offer_price-$total; 
               $total_product_value=$single_product_price*$a->quantity;
               $abc=$abc+$total_product_value-($a->quantity*$a->delivery_charge);
		    }
		    else if($a->order_status=="2")
		    {
		        
              $chargeObj2 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge2=$chargeObj2->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total2=0;
                foreach($charge2 as $c2){
                    $cha2=($c2->charge_type!=1)?(($c2->value*$a->product->offer_price/100)):$c2->value;
                    $total2= $total2+$cha2;
                    
                }
               $single_product_price2= $a->product->offer_price-$total2; 
               $total_product_value2=$single_product_price2*$a->quantity;
               $abc2=$abc2+$total_product_value2-($a->quantity*$a->delivery_charge);
    		    
		    }
		    else if($a->order_status==3)
		    {
		        $chargeObj3 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge3=$chargeObj3->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total3=0;
                foreach($charge3 as $c3){
                    $cha3=($c3->charge_type!=1)?(($c3->value*$a->product->offer_price/100)):$c3->value;
                    $total3= $total3+$cha3;
                    
                }
               $single_product_price3= $a->product->offer_price-$total3; 
               $total_product_value3=$single_product_price3*$a->quantity;
               $abc3=$abc3+$total_product_value3-($a->quantity*$a->delivery_charge);
		    }
		    else if($a->return_status==3)
		    {
		         $chargeObj4 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge4=$chargeObj4->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total4=0;
                foreach($charge4 as $c4){
                    $cha4=($c->charge_type!=1)?(($c->value*$a->product->offer_price/100)):$c->value;
                    $total4= $total4+$cha4;
                    
                }
               $single_product_price4= $a4->product->offer_price-$total4; 
               $total_product_value4=$single_product_price4*$a4->quantity;
               $abc4=$abc4+$total_product_value4-($a4->quantity*$a4->delivery_charge);
		    }
		    else if($a->payment_status==1)
		    {
		         $chargeObj5 = TableRegistry::getTableLocator()->get('ProductCharges');
            $charge5=$chargeObj5->find()->where(['is_active'=>1,'type_id'=>$a->product->type_id]);
            $total5=0;
                foreach($charge5 as $c5){
                    $cha5=($c5->charge_type!=1)?(($c5->value*$a->product->offer_price/100)):$c5->value;
                    $total5= $total5+$cha5;
                    
                }
               $single_product_price5= $a->product->offer_price-$total5; 
               $total_product_value5=$single_product_price5*$a->quantity;
               $abc5=$abc5+$total_product_value5-($a->quantity*$a->delivery_charge);
		    }
		}
		
	
		$due=$abc2-$abc4;
		$total_due=$due-$abc5;
		

		
		$this->set('abc',$abc);
	
		$this->set('abc2',$abc2);
		$this->set('abc3',$abc3);
		$this->set('abc4',$abc4);
		$this->set('abc5',$abc5);
		
		$this->set('total_due',$total_due);
		
		//now for table section
		
		$invoice11=$Invoice->find("all")->contain(['Invoices','Users','Products'])->where(['InvoiceItems.vendor_id' => $this->Auth->user('id'),'InvoiceItems.charge_type !='=>0]);
		$invoice1 = $this->paginate($invoice11);

		$this->set(compact('invoice1'));
		$this->set('_serialize', ['invoice1']);
		
		

		
      
    }
    public function paymentdetails($id=null) {
        
        $Invoice = TableRegistry::getTableLocator()->get('InvoiceItems');
        
        $invoice1=$Invoice->find("all")->contain(['Users','Invoices.Users','Invoices.Users','Invoices.UserDeliveryDetails','Products'])->where(['InvoiceItems.id' => $id])->first();
        
      //pr($invoice1->user->vendor->id);die;
		$this->set('invoice1', $invoice1);
	
      
    }
    public function report() {
	
      
    }
	 public function wishlist() {
		
      
    }
	public function security(){
		$user = TableRegistry::getTableLocator()->get('Users');
		$user1 = $user->get($this->Auth->user('id'), [
            'contain' => []
        ]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user2 = $user->patchEntity($user1, $this->request->getData());
			if ($user->save($user2)) {
                $this->Flash->success(__('The password change successfully.'));

                return $this->redirect(['action' => 'security']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
		}
		$user->password="";
		 $this->set(compact('user'));
        $this->set('_serialize', ['user']);
		}
 
		public function uploadsignature() {
		$vendor = TableRegistry::getTableLocator()->get('Vendors');
		$vendor1 = $vendor->get($this->Auth->user('vendor_id'), [
            'contain' => []
        ]);
	
		$upload_signature=$vendor1->upload_signature;
		$address_proof=$vendor1->address_proof;
		$gst_doc=$vendor1->gst_doc;
		$pan_card_scan_copy=$vendor1->pan_card_scan_copy;
		$cancel_cheque_scan_copy=$vendor1->cancel_cheque_scan_copy;
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$ven = $vendor->patchEntity($vendor1, $this->request->getData());
			
			$postData = $this->request->getData();
			
			if($_FILES['upload_signature']['name']!=''){
						$this->loadComponent('UploadImage');
				 		$postData['upload_signature']=$this->UploadImage->do_upload_image('vendor',$_FILES['upload_signature'],'vendor','ll');
					 
			}
			else
			{
				$postData['upload_signature']=$upload_signature;
			}
				
		
			$ven = $vendor->patchEntity($vendor1, $postData);
		
            if ($vendor->save($ven)) {
                $this->Flash->success(__('Seller Data has been Updated.'));

                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error(__('The Seller could not be Updated. Please, try again.'));
            }
        }
        $this->set(compact('vendor1'));
        $this->set('_serialize', ['vendor1']);
			
		}
 
    public function profile() {
		$vendor = TableRegistry::getTableLocator()->get('Vendors');
		$state = TableRegistry::getTableLocator()->get('States');
		$user = TableRegistry::getTableLocator()->get('Users');
		$vendor1 = $vendor->get($this->Auth->user('vendor_id'), [
            'contain' => []
        ]);
        $user1 = $user->get($this->Auth->user('id'), [
            'contain' => []
        ]);
        
        
		$address_proof=$vendor1->address_proof;
		$gst_doc=$vendor1->gst_doc;
		$upload_signature=$vendor1->upload_signature;
		$pan_card_scan_copy=$vendor1->pan_card_scan_copy;
		$cancel_cheque_scan_copy=$vendor1->cancel_cheque_scan_copy;
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $postData = $this->request->getData();
            //$ven = $vendor->patchEntity($vendor1, $this->request->getData());
			
			$user1->first_name=$this->request->getData('company_display_name');
            $user->save($user1);
			//$ven->upload_signature=$upload_signature;
			$postData['upload_signature']=$upload_signature;
			
			if($_FILES['address_proof']['name']!=''){
			    
			            $file_tmpname = $_FILES['address_proof']['tmp_name'];
                        $file_name = $_FILES['address_proof']['name'];
						$this->loadComponent('UploadImage');
				 		$postData['address_proof']=$this->UploadImage->do_upload_image_biswa_cake4('vendor2',$file_tmpname,$file_name,'vendor','ll');
					 
			}
			else
			{
				$postData['address_proof']=$address_proof;
			
				
			}
			if($_FILES['gst_doc']['name']!=''){
			    
			            $file_tmpname = $_FILES['gst_doc']['tmp_name'];
                        $file_name = $_FILES['gst_doc']['name'];
						$this->loadComponent('UploadImage');
				 		$postData['gst_doc']=$this->UploadImage->do_upload_image_biswa_cake4('vendor5',$file_tmpname,$file_name,'vendor','ll');
					 
			}
			else
			{
				$postData['gst_doc']=$gst_doc;
			
				
			}
			if($_FILES['pan_card_scan_copy']['name']!=''){
			    
			            $file_tmpname = $_FILES['pan_card_scan_copy']['tmp_name'];
                        $file_name = $_FILES['pan_card_scan_copy']['name'];
						$this->loadComponent('UploadImage');
				 		$postData['pan_card_scan_copy']=$this->UploadImage->do_upload_image_biswa_cake4('vendor3',$file_tmpname,$file_name,'vendor','l1');
					 
			}
			else
			{
				$postData['pan_card_scan_copy']=$pan_card_scan_copy;
			}
			if($_FILES['cancel_cheque_scan_copy']['name']!=''){
			    
			            $file_tmpname = $_FILES['cancel_cheque_scan_copy']['tmp_name'];
                        $file_name = $_FILES['cancel_cheque_scan_copy']['name'];
						$this->loadComponent('UploadImage');
				 		$postData['cancel_cheque_scan_copy']=$this->UploadImage->do_upload_image_biswa_cake4('vendor4',$file_tmpname,$file_name,'vendor','l1');
					 
			}
			else
			{
				$postData['cancel_cheque_scan_copy']=$cancel_cheque_scan_copy;
			}
		    $ven = $vendor->patchEntity($vendor1, $postData);
            if ($vendor->save($ven)) {
                $this->Flash->success(__('Seller Data has been Updated.'));

                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error(__('The Seller could not be Updated. Please, try again.'));
            }
        }
        
        $states_list = $state->find('list', ['limit' => 15000]);
        $this->set(compact('states_list'));
        $this->set(compact('vendor1'));
        $this->set('_serialize', ['vendor1']);
        
    }

	public function resources(){
		$this->viewBuilder()->layout(false);
	
	}
	public function seller_diaries(){
	$this->viewBuilder()->layout(false);

	}
  
	public function performance(){
           
		$Reviews = TableRegistry::getTableLocator()->get('Reviews');
		 $this->paginate = [
            'contain' => ['Products','Users']
        ];
		$pro1=$Reviews->find("all")->where(['seller_id'=>$this->Auth->user('id')]);
		$pro = $this->paginate($pro1);
		$this->set('pro', $pro);
 

}
}
