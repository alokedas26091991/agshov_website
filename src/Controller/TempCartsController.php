<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Cache\Cache;
use Cake\Datasource\ConnectionManager;
/**
 * Carts Controller
 *
 * @property \App\Model\Table\CartsTable $Carts
 */
class TempCartsController extends AppController {

    private $_cart_id, $_total_price, $_order_id;

   

    public function initialize() {
        parent::initialize();

        $this->_cart_id = NULL;
        $this->_total_price = NULL;
        $this->_order_id = NULL;

        $this->Auth->allow(['index','addtocart']);
         $this->Auth->deny(['checkout','buynow']);
         
       $this->Carts=TableRegistry::get("Carts");
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->_display_cart=FALSE;
        $Products = TableRegistry::get('Products');
        $data=$Products->find()->where(["id"=>1]);
        //print_r($data->toArray());
       // die;
		$updatedetails=[];
		 $prefix="";
		if($this->Auth->user('id')){
       // $userdetails = false;
        $updatedetails = true;
        //pr($userdetails);
        $prefix="Temp";
		$data=$this->request->session()->read('Product');
	
		if($this->request->session()->read('Product')){
		foreach($data as $d){
		$this->addcart($d->slug ,$d->quentity);
		}
		}
			$this->request->session()->write('Product',[]);
		}
	
        $this->set('updatedetails', $updatedetails);
		 $this->set('prefix', $prefix);
		
        $this->set(compact('userdetails'));
    }
    


    	public function wishlist($friendlyUrl = null) {
        
        $this->_display_cart=FALSE;
        
        $conn = ConnectionManager::get('default');
			
        if ($this->Auth->user('id')) {
			
			
            $Products = TableRegistry::get('Products');

            $Wishlists = TableRegistry::get('Wishlists');
            //$product = $Products->findBySlug($friendlyUrl)->first();
            
            $product=$conn->execute("SELECT Products.id AS `Products__id`,Products.user_id AS `Products__user_id`,Products.name AS `Products__name` FROM products Products WHERE Products.slug = \"".$friendlyUrl."\" LIMIT 1" );
		    $product=$product->fetchAll('assoc');
            $product= (array)$product[0];
            //echo $product['Products__id'];die;
            
           // $query = $Wishlists->find('all')->where(['user_id' => $this->Auth->user('id'),'product_id' => $product->id ]);
            $query=$conn->execute('SELECT (COUNT(*)) AS `count` FROM wishlists Wishlists WHERE user_id = '. $this->Auth->user('id').' AND product_id = '. $product['Products__id'].'');
            $query=$query->fetchAll('assoc');
            $query= (array)$query[0];
			if ($query['count'] > 0) {
                $this->Flash->error(__('This Product is already in your Wishlist'));
                
                	$pro=$Wishlists->find("all")->contain(['Products'])->where(['Wishlists.user_id' => $this->Auth->user('id')]);
				    $this->set('pro', $pro);
            }
			else
			{	
       
                $cart = $Wishlists->newEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->created_date = date('Y-m-d');
                $cart->modified_date = date('Y-m-d');
				$cart->vendor_id = $product['Products__user_id'];
                $cart->product_id =$product['Products__id'];
				
                if ($Wishlists->save($cart)) {
                    $this->Flash->error(__('This Product is added to Wishlist'));
					
					//return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                } else {
                    $this->Flash->error(__('The Product could not be Wishlisted. Please, try again.'));
                    
                }
				
				$pro=$Wishlists->find("all")->contain(['Products'])->where(['Wishlists.user_id' => $this->Auth->user('id')]);
				$this->set('pro', $pro);
				
            
			}
           
        } else {
            $this->Flash->error(__('The Product could not be Wishlisted. Please, login first.'));
           return $this->redirect(['controller' => 'login', 'action' => 'index']);
        }
		
		
	
		
		
    }
public function wishlist1() {
$Products = TableRegistry::get('Products');
$Wishlists = TableRegistry::get('Wishlists');
$pro=$Wishlists->find("all")->contain(['Products'=>function($q) {
                return $q->autoFields(false)
                        ->select(['id', 'name', 'photo','slug','user_id','offer_price','actual_price']);
            }])->where(['Wishlists.user_id' => $this->Auth->user('id')]);

$this->set('pro', $pro);
		
}
    public function wishlistdelete($id = null)
    {
		$Wishlists = TableRegistry::get('Wishlists');
        //$this->request->allowMethod(['post', 'delete']);
        $wish = $Wishlists->get($id);
        if ($Wishlists->delete($wish)) {
            //$this->Flash->success(__('This Product is removed from Wishlist'));
        } else {
            //$this->Flash->error(__('This Product is Not removed from Wishlist, try again.'));
        }

        return $this->redirect(['controller' => 'Carts', 'action' => 'wishlist1']);
    }

    /* course-add to cart method -bidesh */
public function checkout() {
	 	$prefix="Temp";
	    $Users = TableRegistry::get('Users');	
		$user=$Users->find()->where(['id' => $this->Auth->user('id')])->first();
		
		$this->set(compact('user','prefix'));
        $this->set('_serialize', ['user']);
        
        $state = TableRegistry::get('States');
        $states_list = $state->find('list', ['limit' => 15000]);
        $this->set(compact('states_list'));
}
 public function cancell($id=null) {
		$Invioce = TableRegistry::get('Invoices');
        $invoice1 = $Invioce->get($id, [
            'contain' => []
        ]);
      
			
        
			$invoice1->is_cancell=1;
			
            if ($Invioce->save($invoice1)) {
                $this->Flash->success(__('The Order has been Cancelled.'));

                return $this->redirect(['controller'=>'Login','action' => 'myaccount']);
            } else {
                $this->Flash->error(__('The Order has not been Cancelled.'));
            }
        
} 

    public function addtocart($friendlyUrl = null,$quentity1=1) {
        $this->_display_cart=FALSE;
        $this->autoRender=false;
          $price_tag=$this->Cookie->read('pricetag');
          $conn = ConnectionManager::get('default');
          $priceArr=["dollar"=>1,"euro"=>2,"pound"=>3,"rupee"=>4];
           if (Cache::read("currency_data", 'site_data') === false) {
                $Currency = TableRegistry::getTableLocator()->get('CurrencyRates');
                //die;
                $rate= $conn->execute('SELECT id,rate,currency FROM currency_rates CurrencyRates WHERE currency ='. $priceArr[$price_tag].' LIMIT 1');
              //$rate=$Currency->find()->select(["id","currency","rate"])->where(['currency' => $priceArr[$price_tag]])->first();
              $r=$rate->fetchAll('assoc');
              $rate= (array)$r[0];
            
                //print_r($rate->fetchAll('assoc'));
                 Cache::write('currency_data', $rate, 'site_data');
                 \Cake\Log\Log::info("Cache created");
                } else {
                     $rate = Cache::read('currency_data','site_data');
                     \Cake\Log\Log::info("Cache created1");
                }
         
           
			$CartItems = $this->Carts->CartItems;
			 $Products = $this->Carts->CartItems->Products;
			 
            //$product = $Products->findBySlug($friendlyUrl)->contain(['Items','UserProducts'])->first();
          $product=$conn->execute("SELECT Products.id AS `Products__id`, Products.parent_id AS `Products__parent_id`, Products.item_id AS `Products__item_id`, Products.user_id AS `Products__user_id`, Products.name AS `Products__name`, Products.you_may_like AS `Products__you_may_like`, Products.supc AS `Products__supc`, Products.color AS `Products__color`, Products.color_code AS `Products__color_code`, Products.upc AS `Products__upc`, Products.country AS `Products__country`, Products.slug AS `Products__slug`, Products.category_id AS `Products__category_id`, Products.sub_category_id AS `Products__sub_category_id`, Products.type_id AS `Products__type_id`, Products.brand_id AS `Products__brand_id`, Products.sale_tag AS `Products__sale_tag`, Products.introduction AS `Products__introduction`, Products.product_tag AS `Products__product_tag`, Products.short_description AS `Products__short_description`, Products.content_topic_summary AS `Products__content_topic_summary`, Products.summary AS `Products__summary`, Products.open_date AS `Products__open_date`, Products.photo AS `Products__photo`, Products.display_image AS `Products__display_image`, Products.actual_price AS `Products__actual_price`, Products.offer_price AS `Products__offer_price`, Products.dollar_actual_price AS `Products__dollar_actual_price`, Products.dollar_offer_price AS `Products__dollar_offer_price`, Products.euro_actual_price AS `Products__euro_actual_price`, Products.euro_offer_price AS `Products__euro_offer_price`, Products.pound_actual_price AS `Products__pound_actual_price`, Products.pound_offer_price AS `Products__pound_offer_price`, Products.delivery_charge AS `Products__delivery_charge`, Products.total_quantity AS `Products__total_quantity`, Products.total_quantity_sale AS `Products__total_quantity_sale`, Products.is_live AS `Products__is_live`, Products.in_stock AS `Products__in_stock`, Products.day_of_delivary AS `Products__day_of_delivary`, Products.is_featured AS `Products__is_featured`, Products.variant AS `Products__variant`, Products.filter_id AS `Products__filter_id`, Products.filter_option_id AS `Products__filter_option_id`, Products.filter_id1 AS `Products__filter_id1`, Products.filter_option_id1 AS `Products__filter_option_id1`, Products.rank AS `Products__rank`, Products.status AS `Products__status`, Products.is_active AS `Products__is_active`, Products.not_for_sale AS `Products__not_for_sale`, Products.show_in_site AS `Products__show_in_site`, Products.gst_percentage AS `Products__gst_percentage`, Products.hsn_code AS `Products__hsn_code`, Products.product_specialization AS `Products__product_specialization`, Products.size AS `Products__size`, Products.meta_title AS `Products__meta_title`, Products.meta_keywords AS `Products__meta_keywords`, Products.meta_desc AS `Products__meta_desc`, Products.robots AS `Products__robots`, Products.canonical AS `Products__canonical`, Products.height AS `Products__height`, Products.width AS `Products__width`, Products.length AS `Products__length`, Products.weight AS `Products__weight`, Products.height_show AS `Products__height_show`, Products.width_show AS `Products__width_show`, Products.length_show AS `Products__length_show`, Products.weight_show AS `Products__weight_show`, Products.minimum_order AS `Products__minimum_order`, Products.create_date AS `Products__create_date`, Products.created_by AS `Products__created_by`, Products.last_update_date AS `Products__last_update_date`, Products.last_updated_by AS `Products__last_updated_by`, Products.is_deleted AS `Products__is_deleted`, Items.id AS `Items__id`, Items.type AS `Items__type`, Items.seller_id AS `Items__seller_id`, Items.name AS `Items__name`, Items.name_in_english AS `Items__name_in_english`, Items.actual_price AS `Items__actual_price`, Items.offer_price AS `Items__offer_price`, Items.is_deleted AS `Items__is_deleted` FROM products Products INNER JOIN items Items ON Items.id = (Products.item_id) WHERE Products.slug = \"".$friendlyUrl."\" LIMIT 1");
            // price tag
              $product=$product->fetchAll('assoc');
              $product= (array)$product[0];
              //var_dump($product);
              //echo $rr=$product['Products__offer_price'];
              
             
            $offer1=$product['Products__offer_price']/$rate['rate'];
            $offer=number_format((float)$offer1, 2, '.', '');
            
            if($price_tag!="rupee")
            {
              $delivery_charge=($offer1*$rate['delivery_charge']/100);
              $delivery=number_format((float)$delivery_charge, 2, '.', '');
            }
            else
            {
                $delivery=$product['Products__delivery_charge'];
            }
            

        //price tag end
            
            
		
			//$quentity=$product['Products__minimum_order'];
			$quentity=$product['Products__minimum_order'];
			
        if ($this->Auth->user('id')) {
            
             $query= $conn->execute('SELECT * FROM carts Carts WHERE user_id = '. $this->Auth->user('id').'');
             $query=$query->fetchAll('assoc');
             $query= (array)$query[0];


            //$query = $this->Carts->find('all')->where(['user_id' => $this->Auth->user('id')]);
				if($this->request->session()->read('Product')){
				$data=$this->request->session()->read('Product');
				foreach($data as $d){
					$this->addcart($d->slug ,$d->quentity);
					}
				$this->request->session()->write('Product', []);
				}
            if (count($query) > 0) {
                $cart_id = $query['id'];
                $cart = $this->Carts->get( $cart_id);
            } else {
                $cart = $this->Carts->newEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->ipaddress = $this->request->clientIp();
                    
                if ($this->Carts->save($cart)) {
                    $cart = $this->Carts->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $this->Carts->save($cart);
                    $cart_id=$cart->id;
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }

            //$cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product['Products__id']]);
            
            $cartitemquery=$conn->execute('SELECT * FROM cart_items CartItems WHERE cart_id = '. $cart_id.' AND product_id = '. $product['Products__id'].'');
            $cartitemquery=$cartitemquery->fetchAll('assoc');
            $cartitemquery= (array)$cartitemquery[0];

            if (count($cartitemquery) == 0) {

                $cart->gross_amt = $cart->gross_amt + (!empty($product['Products__offer_price']) ? $product['Products__offer_price'] : 0);
                $this->Carts->save($cart);
                $cartitem = $CartItems->newEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product['Products__item_id']) ? $product['Products__item_id'] : 1;
				$cartitem->quantity = $quentity;
                $cartitem->product_id = $product['Products__id'];
                $cartitem->item_gross_amount = !empty($offer) ? $offer : 0;
				$cartitem->item_gross_amount=$cartitem->item_gross_amount*$quentity;
                 $cartitem->vendor_id = $product['Items__seller_id'];
                $cartitem->item_net_amount = !empty($offer) ? $offer : 0;
				$cartitem->item_net_amount =$cartitem->item_net_amount *$quentity;
				$cartitem->delivery_charge =$delivery;
                $CartItems->save($cartitem);

                /* send to leadsqured */
               

                $this->Flash->success(__('The cart has been saved.'));
               // return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Already in your cart'));
                //return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
            }
        } else {
			
			
				
			if(!$this->request->session()->read('Product')){
				
				$data=[];
				$data[]=$product;
				$this->request->session()->write('Product', $data);
				
				}else{
					$this->request->session()->write('Product',[]);
					$data=$this->request->session()->read('Product');
					$data[]=$product;
					
					$this->request->session()->write('Product', $data);
					}
					
					$this->addtempcart($friendlyUrl,$quentity);
					
           // $this->Flash->error(__('Your Product has been added to cart'));
            //return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
        }
    }
	private function addcart($friendlyUrl = null,$quentity=1) {
	    
	    
	        //$price_tag=$this->Cookie->read('pricetag');
        
            $Currency = TableRegistry::get('CurrencyRates');
		    $CartItems = $this->Carts->CartItems;
			 $Products = $this->Carts->CartItems->Products;
			 
            $product = $Products->findBySlug($friendlyUrl)->contain(['Items','UserProducts'])->first();
            // price tag
             $price_tag=$this->Cookie->read('pricetag');
            if($price_tag=="dollar")
            {
              
                
                $rate=$Currency->find('all')->where(['currency' => 1])->first();
                
                
            }
            else if($price_tag=="rupee")
            {
               
                $rate=$Currency->find('all')->where(['currency' => 4])->first();
               
            }
            else if($price_tag=="euro")
            {
               
                $rate=$Currency->find('all')->where(['currency' => 2])->first();
               
            }
            else
            {
                
                $rate=$Currency->find('all')->where(['currency' => 3])->first();
               
            }
                   
                    
            $offer1=$product->user_products[0]->offer_price/$rate->rate;
            $offer=number_format((float)$offer1, 2, '.', '');
            $actual1=$product->user_products[0]->actual_price/$rate->rate;
            $actual=number_format((float)$actual1, 2, '.', '');
            
            if($price_tag!="rupee")
            {
              $delivery_charge=($offer1*$rate->delivery_charge/100);
              $delivery=number_format((float)$delivery_charge, 2, '.', '');
            }
            else
            {
                $delivery=$product->user_products[0]->delivery_charge;
            }
            
        //price tag end
			
			
        if ($this->Auth->user('id')) {
			
			
           

            
	
            $query = $this->Carts->find('all')->where(['user_id' => $this->Auth->user('id')]);
				if(!$this->request->session()->read('Product')){
				$data=[];
				$data[]=$product;
				$this->request->session()->write('Product', $data);
				}else{
					$data=$this->request->session()->read('Product');
					$data[]=$product;
					$this->request->session()->write('Product', $data);
					}
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $this->Carts->newEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->ipaddress = $this->request->clientIp();
                    
                if ($this->Carts->save($cart)) {
                    $cart = $this->Carts->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $this->Carts->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }

            $cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);
            if ($cartitemquery->count() == 0) {

                $cart->gross_amt = $cart->gross_amt + (!empty($actual) ? $actual : 0);
                $this->Carts->save($cart);
                $cartitem = $CartItems->newEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product->item_id) ? $product->item_id : 1;
				$cartitem->quantity = $quentity;
                $cartitem->product_id = $product->id;
                $cartitem->item_gross_amount = !empty($offer) ? $offer : 0;
				$cartitem->item_gross_amount=$cartitem->item_gross_amount*$quentity;
                 $cartitem->vendor_id = $product->item->seller_id;
                $cartitem->item_net_amount = !empty($offer) ? $offer : 0;
				$cartitem->item_net_amount =$cartitem->item_net_amount *$quentity;
				$cartitem->delivery_charge =$delivery*$quentity;
                $CartItems->save($cartitem);

                /* send to leadsqured */
               

               // $this->Flash->success(__('The cart has been saved.'));
               // return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            } else {
                //$this->Flash->error(__('Already in your cart'));
              //  return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            }
        } 
    }
	public function addDelivaryAddress(){
		$this->_jsonVars = $this->request->input('json_decode');
		
		$delivaryAddObj = TableRegistry::get('UserDeliveryDetails');
		$data=$this->_jsonVars->postData;
		if($this->_jsonVars->id>0){
			$delivary=$delivaryAddObj->get($this->_jsonVars->id);
			
			}else{
				$delivary = $delivaryAddObj->newEntity();
				
				}
				$delivary =$delivaryAddObj-> patchEntity($delivary, (array)$data);
				$delivary->user_id=$this->Auth->user('id');
				$delivaryAddObj->save($delivary);
				 echo json_encode(['success' => 1, 'data' => $delivary,'msg'=>'successfuly updated'], ENT_QUOTES);
				 $this->autoRender = FALSE;
		}
		
		public function getDelivaryAdd(){
			$delivaryAddObj = TableRegistry::get('UserDeliveryDetails');
			$delivary=$delivaryAddObj->find()->where(['user_id'=>$this->Auth->user('id')]);
			 echo json_encode(['success' => 1, 'data' => $delivary], ENT_QUOTES);
             $this->autoRender = FALSE;
			}
	private function addtempcart($friendlyUrl = null,$quentity=1) {
        
       		$Carts = TableRegistry::get('TempCarts');
			$CartItems = TableRegistry::get('TempCartItems');
			 $Products = TableRegistry::get('Products');
			 
            $product = $Products->findBySlug($friendlyUrl)->contain(['Items','UserProducts'])->first();
            
            //$price_tag=$this->Cookie->read('pricetag');
        

            // price tag
            $Currency = TableRegistry::get('CurrencyRates');
             $price_tag=$this->Cookie->read('pricetag');
            if($price_tag=="dollar")
            {
              
                
                $rate=$Currency->find('all')->where(['currency' => 1])->first();
                
                
            }
            else if($price_tag=="rupee")
            {
               
                $rate=$Currency->find('all')->where(['currency' => 4])->first();
               
            }
            else if($price_tag=="euro")
            {
               
                $rate=$Currency->find('all')->where(['currency' => 2])->first();
               
            }
            else
            {
                
                $rate=$Currency->find('all')->where(['currency' => 3])->first();
               
            }
            
            $offer1=$product->user_products[0]->offer_price/$rate->rate;
            $offer=number_format((float)$offer1, 2, '.', '');
            $actual1=$product->user_products[0]->actual_price/$rate->rate;
            $actual=number_format((float)$actual1, 2, '.', '');
            if($price_tag!="rupee")
            {
               $delivery_charge=($offer1*$rate->delivery_charge/100);
              $delivery=number_format((float)$delivery_charge, 2, '.', '');
            }
            else
            {
                $delivery=$product->user_products[0]->delivery_charge;
            }
            
        //price tag end
			
			if(!$this->request->session()->read('SesionDataId')){
				$uid=$this->uniqueId();
				$this->request->session()->write('SesionDataId',$uid);
				}else{
					$uid=$this->request->session()->read('SesionDataId');
					}
			
        if ($uid) {
	
            $query = $Carts->find('all')->where(['user_id' => $uid]);
				if(!$this->request->session()->read('Product')){
				$data=[];
				$data[]=$product;
				$this->request->session()->write('Product', $data);
				}else{
					$data=$this->request->session()->read('Product');
					$data[]=$product;
					$this->request->session()->write('Product', $data);
					}
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $Carts->newEntity();
                $cart->user_id = $uid;
                $cart->ipaddress = $this->request->clientIp();
                    
                if ($Carts->save($cart)) {
                    $cart = $Carts->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $Carts->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }
			
            $cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);
			
            if ($cartitemquery->count() == 0) {

                $cart->gross_amt = $cart->gross_amt + (!empty($product->item->actual_price) ? $product->item->actual_price : 0);
                $Carts->save($cart);
                $cartitem = $CartItems->newEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product->item_id) ? $product->item_id : 1;
				$cartitem->quantity = $quentity;
                $cartitem->product_id = $product->id;
                $cartitem->item_gross_amount = !empty($offer) ? $offer : 0;
				$cartitem->item_gross_amount=$cartitem->item_gross_amount*$quentity;
                 $cartitem->vendor_id = $product->item->seller_id;
                $cartitem->item_net_amount = !empty($offer) ? $offer : 0;
				$cartitem->item_net_amount =$cartitem->item_net_amount *$quentity;
				$cartitem->delivery_charge =$delivery*$quentity;
                $CartItems->save($cartitem);

                /* send to leadsqured */
               

               // $this->Flash->success(__('The cart has been saved.'));
               // return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            } else {
                //$this->Flash->error(__('Already in your cart'));
              //  return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            }
        } 
    }

    protected function uniqueId($length=6) {
        $key = '';
        $keys = range(0, 9);

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $Users = TableRegistry::get('TempCarts');
        $Users = $Users->find('all')->where(['user_id' => $key]);
        if ($Users->count() > 0) {
            $this->uniqueId($length);
            return true;
        }

        return $key;
    }
	
   public function deletecartItem() {

                                                $this->_jsonVars = $this->request->input('json_decode');
												$pre="";
												if(!$this->Auth->user('id')){
													$pre="Temp";
													}
                                                $tbl_obj = TableRegistry::get($pre.'CartItems');
                                                $tbl_cart_obj = TableRegistry::get($pre.'Carts');

                                                $instance = $tbl_obj->get($this->_jsonVars->info_id);
                                                $cart_id = $instance->cart_id;
                                                $deleted = FALSE;
                                                 $tbl_obj->delete($instance);
                                                    $deleted = TRUE;
                                               
                                                $cartitem = $tbl_obj->find('all')->where(['cart_id' => $cart_id, "parent_id IS NULL"]);
                                                if ($cartitem->count() == 0) {
                                                    $tbl_cart_obj->deleteAll(['id' => $cart_id], true);
                                                }
                                                echo json_encode(['success' => 1, 'msg' => 'Delete item from cart'], ENT_QUOTES);
                                                $this->autoRender = FALSE;
                                            }
											
	public function updateItem(){
		$this->_jsonVars = $this->request->input('json_decode');
												$pre="";
												if(!$this->Auth->user('id')){
													$pre="Temp";
													}
                                                $tbl_obj = TableRegistry::get($pre.'CartItems');
                                                $tbl_cart_obj = TableRegistry::get($pre.'Carts');
												$productObj = TableRegistry::get('Products');
												
                                                $instance = $tbl_obj->get($this->_jsonVars->info_id);
                                                $instance->quantity = $this->_jsonVars->quantity;
												$product=$productObj->get($instance->product_id,['contain'=>['UserProducts']]);
												
													   //$price_tag=$this->Cookie->read('pricetag');
        
                                                    // price tag
                                                      $Currency = TableRegistry::get('CurrencyRates');
                                                    
                                                     $price_tag=$this->Cookie->read('pricetag');
                                                    if($price_tag=="dollar")
                                                    {
                                                      
                                                        
                                                        $rate=$Currency->find('all')->where(['currency' => 1])->first();
                                                        
                                                        
                                                    }
                                                    else if($price_tag=="rupee")
                                                    {
                                                       
                                                        $rate=$Currency->find('all')->where(['currency' => 4])->first();
                                                       
                                                    }
                                                    else if($price_tag=="euro")
                                                    {
                                                       
                                                        $rate=$Currency->find('all')->where(['currency' => 2])->first();
                                                       
                                                    }
                                                    else
                                                    {
                                                        
                                                        $rate=$Currency->find('all')->where(['currency' => 3])->first();
                                                       
                                                    }
                                                    
                                                             $offer1=$product->user_products[0]->offer_price/$rate->rate;
                                                            $offer=number_format((float)$offer1, 2, '.', '');
                                                            $actual1=$product->user_products[0]->actual_price/$rate->rate;
                                                            $actual=number_format((float)$actual1, 2, '.', '');
                                                            if($price_tag!="rupee")
                                                            {
                                                               $delivery_charge=($offer1*$rate->delivery_charge/100);
                                                              $delivery=number_format((float)$delivery_charge, 2, '.', '');
                                                            }
                                                            else
                                                            {
                                                                $delivery=$product->user_products[0]->delivery_charge;
                                                            }
            
                                                //price tag end
												
												 $instance->item_gross_amount=!empty($offer) ? $offer : 0;									
												 $instance->item_gross_amount=$instance->item_gross_amount*$instance->quantity;
												 $instance->delivery_charge=$delivery*$instance->quantity;
												 $instance->item_net_amount=!empty($offer) ? $offer : 0;
												 $instance->item_net_amount=$instance->item_net_amount*$instance->quantity-$instance->discount_amt;
                                                $deleted = FALSE;
                                                 $tbl_obj->save($instance);
                                                    $deleted = TRUE;
                                               
                                                $cartitem = $tbl_obj->find('all')->where(['cart_id' => $instance->cart_id, "parent_id IS NULL"]);
                                                if ($cartitem->count() == 0) {
                                                    $tbl_cart_obj->deleteAll(['id' => $cart_id], true);
                                                }
                                                echo json_encode(['success' => 1, 'msg' => 'Update item from cart'], ENT_QUOTES);
                                                $this->autoRender = FALSE;
		
		}
		
	  public function setDelivaryadd(){
						$this->_jsonVars = $this->request->input('json_decode'); 
						$tbl_cart_obj = TableRegistry::get('Carts');
						if($this->__checkpin($this->_jsonVars->info_id,$this->_jsonVars->delivery_id)){
						$instance=$tbl_cart_obj->get($this->_jsonVars->info_id);
						$instance->user_delivery_detail_id=$this->_jsonVars->delivery_id;
						$tbl_cart_obj->save($instance);
						 echo json_encode(['success' => 1, 'msg' => 'Selected delivery address'], ENT_QUOTES);
						}else{
							
							 echo json_encode(['success' => 0, 'msg' => 'Please Provide Valid Address, State, City and Six digits of Zip Code'], ENT_QUOTES);
						}
                         $this->autoRender = FALSE;
						 } 	
private function __checkpin($id,$dvid){
		$this->autoRender=false;
		$tbl_cart_obj = TableRegistry::get('CartItems');
		$tbl_delevery_obj = TableRegistry::get('UserDeliveryDetails');
		$instance=$tbl_delevery_obj->get($dvid);
		
		if(strlen($instance->home_address)<2 || empty($instance->state) || empty($instance->city) || empty($instance->pin) || strlen($instance->pin)!=6){
			$status=false;
			
		}else{
		$status=true;
		}
		return $status;
	}	
    function convertCurrency($amount, $from, $to) {
        $url = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
        $data = file_get_contents($url);
        preg_match("/<span class=bld>(.*)<\/span>/", $data, $converted);
        $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
        return round($converted, 2);
    }

    /* function for success payment */

   

                      

                            /** atom payment end */

                            /** free course */
                            public function freePayment() {
                                
                                    $this->_getCartInfo(2);
									// echo  $this->_total_price;
                                    
										//echo  $this->_total_price;
                                        $this->paymentsuccess($this->_cart_id, 2, 'COD-' . $this->_cart_id);
                                  
                               
                                $this->autoRender = FALSE;
                            }

                            /* payu money payment */

                           

                            /* payu money end */

                            /**
                             * send payment fail email
                             * @param type $reason
                             * @param type $cart_id
                             * @param type $pay_method
                             */
                          
                            private function _getCartInfo($payment_mode) {
                                if ($this->Auth->user('id')) {
                                    $Carts = TableRegistry::get('Carts');
                                    $cart = $Carts->find('all')->where(['Carts.user_id' => $this->Auth->user('id')])->contain(['CartItems'])->toArray();
                                }
								
								
                                if (!empty($cart)) {
                                 $this->_total_price = $this->calculateTotal($cart);
                                   $this->_cart_id = $cart[0]['id'];

                                    $cartdata = $this->Carts->get($cart[0]['id']);
                                    $cartdata->order_id = (empty($cartdata->order_id) || $cartdata->order_id == null) ? time() . '-' . $cart[0]['id'] : $cart[0]['order_id'];
                                    $cartdata->payment_mode = $payment_mode;
                                    $cartdata->payment_status = 1;
									$cartdata->payment_request_date = date('Y-m-d');
                                    $this->Carts->save($cartdata);
                                    $this->_order_id = $cartdata->order_id;
                                } else {
                                    return true;
                                }
                            }

                            private function calculateTotal($data) {
                                //$recordArr=array();
                                $total = 0;
                                //$totaldiscount=0;
                                $totaltax = 0;
                                $totaldiscount = 0;
                                $total_gross_amount = 0;
                                $totalwithtax = 0;
								$totaldelivery = 0;
                                if (!empty($data)) {

                                    $cartdata = $data[0]['cart_items'];
                                    foreach ($cartdata as $datas) {
                                        $total_gross_amount = $total_gross_amount + $datas->item_gross_amount;
                                        $totaldiscount = $totaldiscount + $datas->discount_amt;
                                        $total = $total + $datas->item_net_amount;
										$totaldelivery = $totaldelivery + $datas->delivery_charge;
                                    }
                                    $Taxes = TableRegistry::get('Taxes');
                                    $tax = $Taxes->getTaxesForProducts();
                                    foreach ($tax as $taxs) {

                                        $totaltax = $totaltax + ($total * $taxs['tax_percentage']) / 100;
                                    }

                                    $totalwithtax = $total + $totaltax+$totaldelivery+$data[0]['cod_amt'];
                                    $cart = $this->Carts->get($data[0]['id'], ['contain' => []]);

                                    $cart->gross_amt = $total_gross_amount;
                                    $cart->discount_amt = $totaldiscount;
                                    $cart->tax_amt = $totaltax;
                                    $cart->net_amt = $total;
                                    $cart->total_delivery_charge=$totaldelivery;
                                    $this->Carts->save($cart);
                                    return $totalwithtax;
                                }
                            }

                    
							
					public function priceTextConvert($number){
		
							   $no = round($number);
							   $point = round($number - $no, 2) * 100;
							   $hundred = null;
							   $digits_1 = strlen($no);
							   $i = 0;
							   $str = array();
							   $words = array('0' => '', '1' => 'one', '2' => 'two',
								'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
								'7' => 'seven', '8' => 'eight', '9' => 'nine',
								'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
								'13' => 'thirteen', '14' => 'fourteen',
								'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
								'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
								'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
								'60' => 'sixty', '70' => 'seventy',
								'80' => 'eighty', '90' => 'ninety');
							   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
							   while ($i < $digits_1) {
								 $divider = ($i == 2) ? 10 : 100;
								 $number = floor($no % $divider);
								 $no = floor($no / $divider);
								 $i += ($divider == 10) ? 1 : 2;
								 if ($number) {
									$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
									$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
									$str [] = ($number < 21) ? $words[$number] .
										" " . $digits[$counter] . $plural . " " . $hundred
										:
										$words[floor($number / 10) * 10]
										. " " . $words[$number % 10] . " "
										. $digits[$counter] . $plural . " " . $hundred;
								 } else $str[] = null;
							  }
							  $str = array_reverse($str);
							  $result = implode('', $str);
							  if(empty($result)){
								  return  $result;
							  }
							  $points = ($point) ?
								"." . $words[$point / 10] . " " . 
									  $words[$point = $point % 10] : '';
									  if(!empty($points)){
										 $text= "Rupees  ".$result ;
										  
									  }else{
										   $text="Rupees ".$result ;
									  }
							  return ucwords($text)." only";
					}
					
					  public function getData() {

                                                if ($this->Auth->user('id')) {

                                                   
                                                   
                                                  
                                                  
                                                    $cart = $this->Carts->find('all')->where(['Carts.user_id' => $this->Auth->user('id')])
                                                                    ->join([
                                                                        'CartItems' => [
                                                                            'table' =>  'cart_items',
                                                                            'type' => 'INNER',
                                                                            'conditions' => ['CartItems.cart_id = Carts.id', 'CartItems.is_deleted=0', 'CartItems.parent_id IS NULL']
                                                                        ],
                                                                        'Products' => [
                                                                            'table' => 'products',
                                                                            'type' => 'LEFT',
                                                                            'conditions' => ['Products.id = CartItems.product_id', 'Products.is_deleted=0']
                                                                        ],
																		 
                                                                        'Items' => [
                                                                            'table' => 'items',
                                                                            'type' => 'LEFT',
                                                                            'conditions' => ['Items.id = CartItems.item_id', 'Items.is_deleted=0']
                                                                        ]
                                                                        
                                                                    ])->select(['Carts.coupon_id','Carts.payment_mode','Carts.cod_amt', 'CartItems.id', 'CartItems.cart_id', 'CartItems.item_gross_amount', 'CartItems.coupon_id','CartItems.quantity', 'CartItems.discount_amt', 'CartItems.item_net_amount','CartItems.quantity','CartItems.delivery_charge','CartItems.product_id',  'Products.id', 'Products.name', 'Products.slug',  'Products.offer_price', 'Products.photo', 'Items.id', 'Items.type', 'Items.name','Items.offer_price','Products.minimum_order','Products.total_quantity'])->contain(['CartItems']);




                                                    if ($cart->count() > 0) {

                                                        foreach ($cart as $carts):
                                                            $couponId = $carts->coupon_id;

                                                            
                                                            //pr($carts->CartItems['course_batch_id']);
                                                           
                                                        endforeach;
                                                        $coupon = [];
                                                        if ($couponId > 0) {
                                                            $Coupons = TableRegistry::get('Coupons');
                                                            $coupon = $Coupons->get($couponId);
                                                            // pr($coupon);
                                                        }

                                                        echo json_encode(['success' => 1, 'data' => $cart, 'tax' => $tax, 'coupon' => $coupon, 'coupon_id' => $couponId], ENT_QUOTES);
                                                    } else {
                                                        echo json_encode(['success' => 2, 'data' => []]);
                                                    }
                                                } else {
													
                                                    $Carts = TableRegistry::getTableLocator()->get('TempCarts');
                                                   
                                                    //$Products = TableRegistry::get('Products');
                                                   
                                                    //$CartItems = TableRegistry::get('TempCartItems');
                                                  
                                                    $cart = $Carts->find('all')->where(['TempCarts.user_id' => $this->request->session()->read('SesionDataId')])
                                                                    ->join([
                                                                        'TempCartItems' => [
                                                                            'table' =>  'temp_cart_items',
                                                                            'type' => 'INNER',
																			'alise'=>'CartItems',
                                                                            'conditions' => ['TempCartItems.cart_id = TempCarts.id', 'TempCartItems.is_deleted=0', 'TempCartItems.parent_id IS NULL']
                                                                        ],
                                                                        
                                                                        'Products' => [
                                                                            'table' => 'products',
                                                                            'type' => 'LEFT',
                                                                            'conditions' => ['Products.id = TempCartItems.product_id', 'Products.is_deleted=0']
                                                                        ],
                                                                        'Items' => [
                                                                            'table' => 'items',
                                                                            'type' => 'LEFT',
                                                                            'conditions' => ['Items.id = TempCartItems.item_id', 'Items.is_deleted=0']
                                                                        ]
                                                                        
                                                                        
                                                                    ])->select(['TempCarts.coupon_id','TempCarts.cod_amt', 'TempCartItems.id', 'TempCartItems.cart_id', 'TempCartItems.item_gross_amount', 'TempCartItems.coupon_id', 'TempCartItems.discount_amt', 'TempCartItems.item_net_amount','TempCartItems.delivery_charge','TempCartItems.quantity','TempCartItems.product_id',  'Products.id', 'Products.name', 'Products.slug',  'Products.introduction', 'Products.photo','Products.offer_price','Products.total_quantity','Items.id', 'Items.type', 'Items.name','Items.offer_price']);




                                                    if ($cart->count() > 0) {

                                                        foreach ($cart as $carts):
                                                            $couponId = $carts->coupon_id;

                                                            $carts->CartItems=$carts->TempCartItems;
                                                            //pr($carts->CartItems['course_batch_id']);
                                                           
                                                        endforeach;
                                                        if (Cache::read("tax_data", 'site_data') === false) {
                                                             $Taxes = TableRegistry::get('Taxes');

                                                        $tax = $Taxes->getTaxesForProducts();
                                                         Cache::write('tax_data', $tax, 'site_data');
                                                         \Cake\Log\Log::info("Cache created");
                                                        } else {
                                                             $tax = Cache::read('tax_data','site_data');
                                                             \Cake\Log\Log::info("Cache created1");
                                                        }
                                                       
                                                        $coupon = [];
                                                        if ($couponId > 0) {
                                                            $Coupons = TableRegistry::get('Coupons');
                                                            $coupon = $Coupons->get($couponId);
                                                            // pr($coupon);
                                                        }

                                                        echo json_encode(['success' => 1, 'data' => $cart, 'tax' => $tax, 'coupon' => $coupon, 'coupon_id' => $couponId], ENT_QUOTES);
                                                    } else {
                                                        echo json_encode(['success' => 2, 'data' => []]);
                                                    }
                                                }

                                                $this->autoRender = FALSE;
                                            }
                                            
                                            

 private function paymentsuccess($cartId = 0, $paymentmethod = '', $txn_id = '123456') {
	$orderData=[];
        if ($cartId > 0) {
            $Carts = TableRegistry::get('Carts');
            $Invoices = TableRegistry::get('Invoices');
            $InvoiceItems = TableRegistry::get('InvoiceItems');
          
            $CartItems = TableRegistry::get('CartItems');
            $user = TableRegistry::get('Users');
           

            
            $cart = $Carts->find('all')->where(['Carts.id' => $cartId])
                            ->join([
                                'CartItems' => [
                                    'table' =>'cart_items',
                                    'type' => 'INNER',
                                    'conditions' => ['CartItems.cart_id = Carts.id', 'CartItems.is_deleted=0', 'CartItems.parent_id IS NULL']
                                ], 
                                'Items' => [
                                    'table' => 'items',
                                    'type' => 'LEFT',
                                    'conditions' => ['Items.id = CartItems.item_id', 'Items.is_deleted=0']
                                ],
								'Products' => [
                                    'table' => 'products',
                                    'type' => 'LEFT',
                                    'conditions' => ['Products.id = CartItems.product_id', 'Products.is_deleted=0']
                                ]
                            ])->select(['Carts.id','Carts.payment_mode','Carts.cod_amt', 'Carts.user_id','Carts.user_delivery_detail_id', 'Carts.order_id', 'Carts.ipaddress', 'Carts.gross_amt', 'Carts.coupon_id', 'Carts.discount_amt', 'Carts.tax_amt', 'Carts.net_amt','Carts.total_delivery_charge', 'Carts.create_date', 'CartItems.id', 'CartItems.cart_id', 'CartItems.parent_id', 'CartItems.item_id', 'CartItems.item_gross_amount', 'CartItems.coupon_id', 'CartItems.discount_amt','CartItems.quantity', 'CartItems.item_net_amount','CartItems.delivery_charge',  'CartItems.product_id','CartItems.vendor_id',  'Items.id', 'Items.type', 'Items.name','Products.name','Products.photo']);
        }
		
        if ($cart->count() > 0) {


            //pr($cart);

            $all_invoice_items = [];
            $i = 0;
			$gross=0;
			
            $author_ids = [];
            foreach ($cart as $carts):
                if ($i == 0) {
                    $invoice = $Invoices->newEntity();
                    $invoice->user_id = $carts->user_id;
					$invoice->user_delivery_detail_id = $carts->user_delivery_detail_id;
                    $invoice->ipaddress = $carts->ipaddress;
                    $invoice->cod_amt = $carts->cod_amt;
                    $invoice->gross_amt = $carts->gross_amt;
                    $invoice->coupon_id = $carts->coupon_id;
                    $invoice->discount_amt = $carts->discount_amt;
                    $invoice->tax_amt = $carts->tax_amt;
                    $invoice->net_amt = $carts->net_amt;
                    $invoice->total_delivery_charge=$carts->total_delivery_charge;
                    $invoice->create_date = $carts->create_date;
                    $invoice->pay_txn_id = $txn_id;
                    $invoice->pay_mode = $paymentmethod;
                    $invoice->order_id = $carts->order_id;
                    $invoice->price_tag = $this->Cookie->read('pricetag');
					$invoice->creation_date = date('Y-m-d');

                    if ($Invoices->save($invoice)) {
                        $invoiceId = $invoice->id;
                        $deliverydetails=$Invoices->UserDeliveryDetails->get($invoice->user_delivery_detail_id);
                       
                    } else {
                        break;
                    }
                }
                $invoiceitem = $InvoiceItems->newEntity();

                if (!empty($carts->CartItems)) {
                    $invoiceitem->invoice_id = $invoiceId;
                    $invoiceitem->item_id = $carts->Items['id'];
					 $invoiceitem->product_id = $carts->CartItems['product_id'];
                    $invoiceitem->vendor_id = $carts->CartItems['vendor_id'];
                    $invoiceitem->type = $carts->Items['type'];
                    $invoiceitem->item_gross_amount = $carts->CartItems['item_gross_amount'];
					$invoiceitem->quantity = $carts->CartItems['quantity'];
					$invoiceitem->delivery_charge = $carts->CartItems['delivery_charge'];
					
                    $invoiceitem->coupon_id = $carts->CartItems['coupon_id'];
                    $invoiceitem->discount_amount = $carts->CartItems['discount_amt'];
                    $invoiceitem->item_net_amount = $carts->CartItems['item_net_amount'];
                    
                    
                    
                    
                    if ($InvoiceItems->save($invoiceitem)) {
                        $parentId = $invoiceitem->id;
                       
                        $all_invoice_items[$i] = $invoiceitem;
                    } else {
                        break;
                    }
                   
                }


              
                $i++;
                
                //for products
                $Products = TableRegistry::get('Products');
                $Products1 = $Products->get($carts->CartItems['product_id']);
		  		$product_qtn = $Products->patchEntity($Products1, $this->request->data);
		  		$product_qtn->total_quantity=$Products1->total_quantity-$carts->CartItems['quantity'];
		  		
                $product_qtn->total_quantity_sale=$Products1->total_quantity_sale+$carts->CartItems['quantity'];
                $Products->save($product_qtn);
                
                //for user products
				

				$UserProducts = TableRegistry::get('UserProducts');
                $query = $UserProducts->query();
                $query->update()
                    ->set(['total_quantity' => $product_qtn->total_quantity,'total_quantity_sale'=>$product_qtn->total_quantity_sale])
                    ->where(['product_id' => $Products1->id])
                    ->execute();
            endforeach;
           
            $CartItems->deleteAll(['CartItems.cart_id' => $carts->id]);
            $Carts->deleteAll(['Carts.id' => $carts->id], true);
            
            
            
            
            
            // send mail to vendor
            $userdata = $user->find('all')->where(['id' => $carts->CartItems['vendor_id']])->first();
            $em1=$userdata->email;
            $name2=$this->Auth->user('first_name');
           $this->loadComponent('SendMail');
            $this->SendMail->sendMail(16, $em1, ['name' =>$name2,'email' =>$em1 ]);
          
          
          //send mail to admin
            $email="info@pickallure.com";
            $name=$this->Auth->user('first_name');
            
            $this->SendMail->sendMail(16, $email, ['name' =>$name,'email' =>$email ]);
            
            //send mail to customer
            
            $name1=$this->Auth->user('first_name');
            $em=$this->Auth->user('email');
            $this->SendMail->sendMail(15, $em, ['name' =>$name1,'email' =>$em ]);
            
            // send otp
            
            $msg="Hi $name1,  Your order has been successfully received by us vide order number  $carts->order_id. We will text you when it ships. Thanks for Shopping with www.pickallure.com";
            $this->SendMail->sendOTP($msg, $this->Auth->user('mobile'));
           
           
           
           
           
            return $this->redirect(['controller' => 'Home', 'action' => 'myorders']);
            
        } else {
            
        }
        $this->autoRender = FALSE;
    }

                            

                
          public function ccavenuePayment() {
                                $this->loadComponent('Ccavenue', ['sandbox' => CCAVENUE_SANDBOX]);
                                $this->_getCartInfo(1);
                                $this->Ccavenue->send_payment($this->_order_id, $this->_total_price);
                                $this->autoRender = FALSE;
                            }                   
                             
                           public function ccavenueReturnurl() {
                                $paramList = $_POST;
                                $encResponse = $paramList["encResp"];
                                $this->loadComponent('Ccavenue', ['sandbox' => CCAVENUE_SANDBOX]);

                                $rcvdString = $this->Ccavenue->decrypt($encResponse);
                                $decryptValues = explode('&', $rcvdString);
                                $dataSize = sizeof($decryptValues);

                                for ($i = 0; $i < $dataSize; $i++) {

                                    $information = explode('=', $decryptValues[$i]);

                                    if ($i == 0)
                                        $order_id = $information[1];

                                    if ($i == 1)
                                        $tracking_id = $information[1];

                                    if ($i == 2)
                                        $bank_ref_no = $information[1];

                                    if ($i == 3)
                                        $order_status = $information[1];

                                    if ($i == 4)
                                        $failure_message = $information[1];

                                    if ($i == 5)
                                        $payment_mode = $information[1];

                                    if ($i == 6)
                                        $card_name = $information[1];

                                    if ($i == 7)
                                        $status_code = $information[1];

                                    if ($i == 8)
                                        $status_message = $information[1];

                                    if ($i == 9)
                                        $currency = $information[1];

                                    if ($i == 10)
                                        $amount = $information[1];

                                    if ($i == 11)
                                        $billing_name = $information[1];

                                    if ($i == 12)
                                        $billing_address = $information[1];

                                    if ($i == 13)
                                        $billing_city = $information[1];

                                    if ($i == 14)
                                        $billing_state = $information[1];

                                    if ($i == 15)
                                        $billing_zip = $information[1];

                                    if ($i == 16)
                                       $billing_country = $information[1];

                                    if ($i == 17)
                                        $billing_tel = $information[1];

                                    if ($i == 18)
                                        $billing_email = $information[1];

                                    if ($i == 19)
                                        $delivery_name = $information[1];

                                    if ($i == 20)
                                        $delivery_address = $information[1];

                                    if ($i == 21)
                                        $delivery_city = $information[1];

                                    if ($i == 22)
                                        $delivery_state = $information[1];

                                    if ($i == 23)
                                        $delivery_zip = $information[1];

                                    if ($i == 24)
                                        $delivery_country = $information[1];

                                    if ($i == 25)
                                        $delivery_tel = $information[1];

                                    if ($i == 26)
                                         $merchant_param1 = $information[1];

                                    if ($i == 27)
                                         $merchant_param2 = $information[1];

                                    if ($i == 28)
                                         $merchant_param3 = $information[1];

                                    if ($i == 29)
                                        $merchant_param4 = $information[1];

                                    if ($i == 30)
                                        $merchant_param5 = $information[1];

                                    if ($i == 31)
                                        $vault = $information[1];

                                    if ($i == 31)
                                        $offer_type = $information[1];

                                    if ($i == 33)
                                        $offer_code = $information[1];

                                    if ($i == 34)
                                        $discount_value = $information[1];

                                    if ($i == 35)
                                        $mer_amount = $information[1];
                                }

                                if ($order_status === 'Success') {
                                    $this->Flash->success('Payment successfully completed.');
                                    

									$orderId=explode('-',$order_id);
                                    $this->paymentsuccess($orderId[1],1, $tracking_id);
								
									 return $this->redirect(['controller' => 'Home', 'action' => 'myaccount']);
                                } else {
                                    //$ord_id = explode('-', $order_id);

                                    //$this->_paymentFail($order_status . ' ' . $failure_message, $ord_id[1], 'CCAvenue');

                                    $this->Flash->error('Payment failed.Please contact our support for further assistance' . $failure_message);
                                }
                                return $this->redirect(['controller' => 'Products', 'action' => 'index']);
                            }

public function buynow($friendlyUrl = null,$quentity1=1) {
    
    

        
       
			$CartItems = TableRegistry::get('CartItems');
			 $Products = TableRegistry::get('Products');
			 
            $product = $Products->findBySlug($friendlyUrl)->contain(['Items','UserProducts'])->first();
		
			$product->quentity=$product->minimum_order;
			$quentity=$product->minimum_order;
			
			    // price tag

            $Currency = TableRegistry::get('CurrencyRates');
             $price_tag=$this->Cookie->read('pricetag');
            if($price_tag=="dollar")
            {
              
                
                $rate=$Currency->find('all')->where(['currency' => 1])->first();
                
                
            }
            else if($price_tag=="rupee")
            {
               
                $rate=$Currency->find('all')->where(['currency' => 4])->first();
               
            }
            else if($price_tag=="euro")
            {
               
                $rate=$Currency->find('all')->where(['currency' => 2])->first();
               
            }
            else
            {
                
                $rate=$Currency->find('all')->where(['currency' => 3])->first();
               
            }
            
            $offer1=$product->user_products[0]->offer_price/$rate->rate;
            $offer=number_format((float)$offer1, 2, '.', '');
            $actual1=$product->user_products[0]->actual_price/$rate->rate;
            $actual=number_format((float)$actual1, 2, '.', '');
            if($price_tag!="rupee")
            {
               $delivery_charge=($offer1*$rate->delivery_charge/100);
              $delivery=number_format((float)$delivery_charge, 2, '.', '');
            }
            else
            {
                $delivery=$product->user_products[0]->delivery_charge;
            }
    
    //endpricetag
			
        if ($this->Auth->user('id')) {
            $query = $this->Carts->find('all')->where(['user_id' => $this->Auth->user('id')]);
				if($this->request->session()->read('Product')){
				$data=$this->request->session()->read('Product');
				foreach($data as $d){
					$this->addcart($d->slug ,$d->quentity);
					}
				$this->request->session()->write('Product', []);
				}
            if ($query->count() > 0) {
                $cart = $query->first();
            } else {
                $cart = $this->Carts->newEntity();
                $cart->user_id = $this->Auth->user('id');
                $cart->ipaddress = $this->request->clientIp();
                    
                if ($this->Carts->save($cart)) {
                    $cart = $this->Carts->get($cart->id);
                    $cart->order_id = time() . '-' . $cart->id;
                    $this->Carts->save($cart);
                } else {
                    $this->Flash->error(__('The cart could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
                }
            }

            $cartitemquery = $CartItems->find('all')->where(['cart_id' => $cart->id, 'product_id' => $product->id]);
            if ($cartitemquery->count() == 0) {

                $cart->gross_amt = $cart->gross_amt + (!empty($product->item->offer_price) ? $product->item->offer_price : 0);
                $this->Carts->save($cart);
                $cartitem = $CartItems->newEntity();
                $cartitem->cart_id = $cart->id;
                $cartitem->item_id = !empty($product->item_id) ? $product->item_id : 1;
				$cartitem->quantity = $quentity;
                $cartitem->product_id = $product->id;
                $cartitem->item_gross_amount = !empty($offer) ? $offer : 0;
				$cartitem->item_gross_amount=$cartitem->item_gross_amount*$quentity;
                 $cartitem->vendor_id = $product->item->seller_id;
                $cartitem->item_net_amount = !empty($offer) ? $offer : 0;
				$cartitem->delivery_charge =$delivery*$quentity;
                $CartItems->save($cartitem);

                /* send to leadsqured */
               

                $this->Flash->success(__('The cart has been saved.'));
                return $this->redirect(['controller' => 'Carts', 'action' => 'checkout']);
            } else {
                $this->Flash->error(__('Already in your cart'));
                return $this->redirect(['controller' => 'Carts', 'action' => 'checkout']);
            }
        } else {
			
			
				
			if(!$this->request->session()->read('Product')){
				
				$data=[];
				$data[]=$product;
				$this->request->session()->write('Product', $data);
				
				}else{
					$this->request->session()->write('Product',[]);
					$data=$this->request->session()->read('Product');
					$data[]=$product;
					
					$this->request->session()->write('Product', $data);
					}
					$this->addtempcart($friendlyUrl,1);
					
            $this->Flash->error(__('Your Product has been added to cart'));
            return $this->redirect(['controller' => 'Products', 'action' => 'details', $friendlyUrl]);
        }
    }
	public function setDelivaryMode(){ 
						$this->_jsonVars = $this->request->input('json_decode'); 
						$tbl_cart_obj = TableRegistry::get('Carts');
						
						$instance=$tbl_cart_obj->get($this->_jsonVars->info_id);
						$instance->payment_mode =$this->_jsonVars->delivary_mode;
						if(intval($this->_jsonVars->delivary_mode)==2){
							$instance->cod_amt=0;
						
						}else{
							$instance->cod_amt=0;
						}
						
						$tbl_cart_obj->save($instance);
						 echo json_encode(['success' => 1, 'msg' => 'Select delevery modecccc'], ENT_QUOTES);
						
                         $this->autoRender = FALSE;
						 }
	public function checkcouponcode() {
        $input = $this->request->input('json_decode');
       $coupon_code = $input->coupon_code;
        $user_id = $this->Auth->user('id');
        $this->loadComponent('Coupon');
		echo json_encode($this->Coupon->checkCouponCode($coupon_code, $user_id), ENT_QUOTES);
          $this->autoRender = FALSE;
    }
	  public function deletecouponcode() {
        if ($this->Auth->user('id') > 0) {
            $input = $this->request->input('json_decode');
            $coupon_id = $input->coupon_id;
            $Carts = TableRegistry::get('Carts');
            $CartItems = TableRegistry::get('CartItems');
            $cart = $Carts->find('all')->where(['Carts.user_id' => $this->Auth->user('id')])->first();
            if ($cart->coupon_id == $coupon_id) {
                $cartitem = $CartItems->find('all')->where(['cart_id' => $cart->id, "parent_id IS NULL"]);
                if ($cartitem->count() > 0) {
                    foreach ($cartitem as $cartitems) {
                        $cartitems->coupon_id = 0;
                        $cartitems->discount_amt = 0;
                        $cartitems->item_net_amount = $cartitems->item_gross_amount;
                        $CartItems->save($cartitems);
                    }
                }
                $cart->coupon_id = 0;
                $Carts->save($cart);
               $success = 1; 
			   $msg = 'remove coupon from  cart';
            } else {
				 $success = 0; 
			   $msg = 'invalid request';
              
            }
        } else {
			 $success = 0; 
			   $msg = 'Please login';
            
        }

         echo json_encode(['success' => $success,'msg'=>$msg], ENT_QUOTES);
        $this->autoRender = FALSE;
    }
                             
public function beforeFilter(\Cake\Event\Event $event) {
    parent::beforeFilter($event);
    $this->response->disableCache();
    \Cake\Cache\Cache::disable();
}

    public function checkpin1(){
        $this->autoRender=false;
		$this->_jsonVars = $this->request->input('json_decode');
		$vendorPin=$this->_jsonVars->vendor_pin;
		$pincode=$this->_jsonVars->pincode;
		
		    $timestamp = time();
            $appID = 4583;
            $key = 'sX2++lDhUjo=';
            $secret = 'WkouxmxaYDVYBEzbQbvcWBX5HgziRHG7Fz4kIO4+ZBsCtr0i0KVBMUD+EHOFNtvI8teAadr5ijPr9nN63vZZWQ==';
        
            $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
            $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
            $ch = curl_init();
        
            $header = array(
                "x-appid: $appID",
                "x-timestamp: $timestamp",
                "x-sellerid:36326",
                "x-version:3", // for auth version 3.0 only
                "Authorization: $authtoken"
            );
        
            curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getserviceability/'.$vendorPin.'/'.$pincode);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            $returndata=(json_decode($server_output,true));
            //print_r($returndata) ;
            
            foreach($returndata as $rr)
            {
                $check= $rr['airCod'];
            }
            if($check==1)
            {
                echo json_encode(['success'=>1]);
            }
            else
            {
                echo json_encode(['error'=>0]);
            }

            
            curl_close($ch);
    }

}
                        