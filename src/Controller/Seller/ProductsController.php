<?php
declare(strict_types=1);
namespace App\Controller\Seller;
use Cake\Routing\Router;
use App\Controller\Seller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
	private $_jsonVars;

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     
    public function youmaylike($id)
    {
        
        
        
        $product2 = $this->Products->find()->where(['id' => $id])->first();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product1 = $this->Products->patchEntity($product2, $this->request->getData());
            
           
           $product1->you_may_like=implode(",",$this->request->getData('you_may_like'));

            if ($this->Products->save($product1)) {
               
                $this->Flash->success(__('The product has been Updated.'));

                return $this->redirect(['action' => 'catelog']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $type = TableRegistry::getTableLocator()->get('Types');
        $you_may = $type->find()->Where(['category_id'=>$product2->category_id])->limit(200);
        //$categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('you_may','product2'));
        $this->set('_serialize', ['you_may']);
    }
    public function index()
    {
        
		if ($this->Auth->user('is_admin')==1) {
                    $this->paginate = [
						'contain' => ['Users', 'Categories', 'SubCategories', 'Types']
					];
				   
					$products = $this->paginate($this->Products);

					$this->set(compact('products'));
					$this->set('_serialize', ['products']);
		}
		else{
		    
			        $this->paginate = [
						'contain' => ['Users', 'Categories', 'SubCategories', 'Types']
					];
				   
					$products = $this->paginate($this->Products->find()->where(['user_id' => $this->Auth->user('id')]));
				
					$this->set(compact('products'));
					$this->set('_serialize', ['products']);
		}

    }
    public function productImageList($id)
    {
        
			$where=[];
        	$where=[ 'OR'=>['parent_id' =>$id,'Products.id' =>$id]];
            
		   $product = $this->Products->find('all')->contain(['ProductImages','FilterOptions'])->where($where);
        
       
       
         $json= json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
         $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
                                                $this->autoRender = FALSE;
    }
    
    public function product_delete($id=null)
    {
        
        //$this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
        $p=$UserProducts->find('all')->Where(['product_id'=>$id])->first();
        $UserProducts->delete($p);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'catelog']);
        
    }
    
    
	public function catelog(){
		
		}
	public function create(){
	
	}
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users', 'Categories', 'Items', 'CartItemOriginals', 'CartItems', 'OfflineCartItems', 'ProductImages']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
	 public function search()
    {
        $jsonVars = $this->request->input('json_decode');

        
            $product = $this->Products->find('all')->where([ 'Products.is_active' => 1])->contain(['Categories','Types','Brands']);
             $keyword =  $jsonVars->keyword;
                $product->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);

            //combo promo course will no be visible is search
            $product->andWhere(['Products.not_for_sale'=>0]);
        
       
       
        $json= json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
         $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
                                                $this->autoRender = FALSE;
    }
      public function productList()
    {
        $jsonVars = $this->request->input('json_decode');
			$listType=$jsonVars->listType;
			$where=[];
        	if($listType==1){
			$where=[ 'UserProducts.is_live' => 1,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL'];
			}elseif($listType==2){
			$where=[ 'UserProducts.is_live' => 0,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL'];
			}elseif($listType==3){
			$where=[ 'UserProducts.is_live' => 1,'UserProducts.in_stock' => 1,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL'];
			}elseif($listType==4){
			$where=[ 'UserProducts.is_live' => 1,'UserProducts.total_quantity' => 0,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL'];
			}
			$search=false;
			if(isset($jsonVars->search) & !empty($jsonVars->search)){
			$keyword =  $jsonVars->search;
			$search=true;
			}
               
			
			
			
           $productLive =$this->Products->UserProducts->find('all')->contain(['Products'])->where([ 'UserProducts.is_live' => 1,'UserProducts.total_quantity >' => 0,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL']);
			if($search){
				 $productLive=$productLive->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
			}
			  $productLive= $productLive ->count();
           $productNotLive = $this->Products->UserProducts->find('all')->contain(['Products'])->where([ 'UserProducts.is_live' => 0,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL']);
		   if($search){
				$productNotLive= $productNotLive->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
			}
			   $productNotLive=$productNotLive ->count();
			   
		   $productStock = $this->Products->UserProducts->find('all')->contain(['Products'])->where([ 'UserProducts.is_live' => 1,'UserProducts.in_stock' => 1,'UserProducts.total_quantity >' => 0,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL']);
		   if($search){
				$productStock= $productStock->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
			}
			   $productStock=$productStock ->count();
		   
		   $productNotStock = $this->Products->UserProducts->find('all')->contain(['Products'])->where([ 'UserProducts.is_live' => 1,'UserProducts.total_quantity' => 0,'UserProducts.user_id'=>$this->Auth->user('id'),'Products.parent_id IS NULL']);
		   if($search){
				$productNotStock= $productNotStock->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
			}
			   $productNotStock=$productNotStock ->count();
			
		  $product = $this->Products->UserProducts->find('all')->contain(['Products','Products.Categories','Products.Types','Products.Brands','Products.FilterOptions'])->where($where);
		   if($search){
				 $product=$product->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
			}
		   $totalProduct=$product->count();
		   $product=$this->paginate($product);
        	foreach($product as $p){
					if($p->user_id==$p->product->user_id && !$p->is_live){
						$p->allow_edit=true;
					}else{
						$p->allow_edit=false;
						}
						$p->seller_price=$this->productChargeList($p->product->type_id,$p->offer_price);
				}
       		$paging=$this->request->getParam('paging')['UserProducts'];
       
         $json= json_encode(['success' => 1, 'data' => $product,'page'=>$paging,'total'=> $totalProduct,'live'=>$productLive,'notlive'=> $productNotLive,'stock'=>$productStock,'outstock'=>$productNotStock], ENT_QUOTES);

         $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

        return $this->response;
         $this->autoRender = FALSE;
    }
		public function updateShow($id){
		$productLive = $this->Products->UserProducts->get($id);
		$productLive->show_in_site=!$productLive->show_in_site;
		$this->Products->UserProducts->save($productLive);
		$product=$this->Products->get($productLive->product_id);
		if($product->user_id==$productLive->user_id){
		    
		    $product->not_for_sale=!$product->not_for_sale;
		    $this->Products->save($product);
		}
		$json= json_encode(['success' => 1], ENT_QUOTES);
		$this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
                $this->autoRender = FALSE;
		}
	public function skuList($id)
    {
        $jsonVars = $this->request->input('json_decode');
			//$listType=$jsonVars->listType;
			$where=[];
        $where=[ 'OR'=>['parent_id' =>$id,'Products.id' =>$id]];
            
		   $product = $this->Products->find('all')->contain(['Categories','Types','Brands'])->where($where);
        
       
       
         $json= json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
         $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

        return $this->response;
             $this->autoRender = FALSE;
    }
	public function skuListPrice($id)
    {
        
			$where=[];
        	$where=[ 'OR'=>['parent_id' =>$id,'Products.id' =>$id]];
            
		   $product = $this->Products->find('all')->contain(['Filters','FilterOptions','UserProducts'=>function ($q) {
    return $q ->where(['UserProducts.user_id' => $this->Auth->user('id')]);
}])->where($where);
        
       
       
         $json= json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
         $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
                                                $this->autoRender = FALSE;
    }
	
    public function add()
    {
		
		$this->_is_lower_nav=false;
	$product = $this->Products->newEmptyEntity();
	if ($this->request->is('post')) {
		$product = $this->Products->patchEntity($product, $this->request->getData());
		
		if($_FILES['photo']['name']!=''){
					$this->loadComponent('UploadImage');
					$product->photo=$this->UploadImage->do_upload_image('product',$_FILES['photo'],'product','ll');
				 
			 }
			 $product->item_id=$this->_addItem($this->request->data);
			 

		 if ($this->Products->save($product)) {
			$this->Flash->success(__('The product has been saved.'));

			return $this->redirect(['action' => 'index']);
		} else {
			$this->Flash->error(__('The product could not be saved. Please, try again.'));
		}
		
		
        }
        $users = $this->Products->Users->find('list', ['keyField' => 'id',
        'valueField' => 'first_name'])->where(['is_vendor'=>1,'is_active'=>1]);
        if($this->Auth->user('is_vendor')==1){
            $users=$users->andWhere(['id'=>$this->Auth->user('id')]);
        }
        	//$categories = $this->Products->Categories->find('list', ['contain' =>['Subcategories','Subcategories.types']]);
			$categories = $this->Products->Categories->find('all')->where(['Categories.is_active'=>1,'Categories.is_deleted'=>0])->contain(['SubCategories'=>function ($q) {
			    return $q->where(['SubCategories.is_active'=>1])
                
				->contain(['Types'=>function ($r) {
				    return $r->where(['Types.is_active'=>1]);
				}])
				    
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
						 
			
			

			$bandObj=TableRegistry::getTableLocator()->get('Brandrequests');
			  $brand =  $bandObj->find()->where(['is_approve'=>1,'user_id'=>$this->Auth->user('id')]);
	
	$chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
	$charge=$chargeObj->find()->where(['is_active'=>1]);
	
       		 $this->set(compact('product', 'users', 'categories','brand','charge'));
       		 $this->set('_serialize', ['product']);
    }
	private function _addItem($data){
		$item=$this->Products->Items->newEmptyEntity();
		 $item = $this->Products->Items->patchEntity($item, $data);
		 $item->seller_id=$this->Auth->user('id');
		 $item->type=1;
		  $this->Products->Items->save($item);
		  return $item->id;
		}
		
	public function saveData(){
		$this->_jsonVars = $this->request->input('json_decode');
		
		$product = $this->Products->newEmptyEntity();
		$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
		$product->item_id=$this->_addItem((array)$this->_jsonVars->postData);
		$product->user_id=$this->Auth->user('id');
		if ($this->Products->save($product)) {
			$this->Flash->success(__('The product has been saved.'));

			$data=$product;
			$success=true;
		} else {
			$data=[];
			$success=false;
		}
		echo json_encode(['data'=>$data,'success'=>$success]);
		$this->autoRender=false;
		}	
	public function upload(){
		
		if($_FILES['file']['name']!=''){
						$this->loadComponent('UploadImage');
				 		 $product=$this->UploadImage->do_upload_image('product',$_FILES['file'],'product','ll');
						 if($this->request->getData('type')==2){
						 $item = $this->Products->ProductImages->newEmptyEntity();
						$item->product_id=$this->request->getData('product_id');
						$item->image=$product;
					 	$this->Products->ProductImages->save($item);
						 }elseif($this->request->getData('type')==1){
							$item= $this->Products->get($this->request->getData('product_id'));
							 $item->photo=$product;
							 $this->Products->save($item);
						 }
				 }
				 $json= json_encode(['data'=>$item]);
				  $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
				 $this->autoRender=false;
		}
		public function productimage($id){
		
		$product = $this->Products->ProductImages->find()->where(['product_id'=>$id]);
		foreach($product as $p){
		$p->image=	Router::url('/upload/product/'.$p->image,true); 
			}
		echo json_encode(['data'=>$product]);
				 $this->autoRender=false;
		}
    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->Users->find('list', ['keyField' => 'id',
        'valueField' => 'first_name'])->where(['is_vendor'=>1,'is_active'=>1]);
        if($this->Auth->user('is_vendor')==1){
            $users=$users->andWhere(['id'=>$this->Auth->user('id')]);
        }
        	//$categories = $this->Products->Categories->find('list', ['contain' =>['Subcategories','Subcategories.types']]);
				$categories = $this->Products->Categories->find('all')->where(['Categories.is_active'=>1,'Categories.is_deleted'=>0])->contain(['SubCategories'=>function ($q) {
			    return $q->where(['SubCategories.is_active'=>1])
                
				->contain(['Types'=>function ($r) {
				    return $r->where(['Types.is_active'=>1]);
				}])
				    
                         ->select(['id','name','category_id']);}])->select(['Categories.id','Categories.name']);
						 
			
			
			

			 $bandObj=TableRegistry::getTableLocator()->get('Brandrequests');
			  $brand =  $bandObj->find()->where(['is_approve'=>1,'user_id'=>$this->Auth->user('id')]);
	$chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
	$charge=$chargeObj->find()->where(['is_active'=>1]);
       		 $this->set(compact('product', 'users', 'categories','brand','charge'));
       		 $this->set('_serialize', ['product']);
    }
 public function updateProduct($id)
    {
		$this->_jsonVars = $this->request->input('json_decode');
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
      
            $product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
            if ($this->Products->save($product)) {
                	$item=$this->Products->Items->get($product->item_id);
                	$item->actual_price=$product->actual_price;
                	$item->offer_price=$product->offer_price;
                	$this->Products->Items->save($item);
                	
				$data=$product;
			$success=true;
               
            } else {
              $data=$product;
			$success=false;
            }
			$json= json_encode(['data'=>$data,'success'=>$success]);
			$this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
			$this->autoRender=false;
        }
        
   
    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function filterList($id){
		$product = $this->Products->get($id, [
            'contain' => []
        ]);
		$sparr=[];
		$sp=$product->product_specialization;
		if(!empty($sp)){
			$sparr=explode(',',$sp);
			}
		$filterCatObj=\Cake\ORM\TableRegistry::getTableLocator()->get('FilterCategories');
		$selectOption=[];
		$filterCategory=$filterCatObj->find()->contain(['Filters','Filters.FilterOptions'])->where(['FilterCategories.category_id'=>$product->category_id]);
		if($filterCategory->count()>0){
		foreach($filterCategory as $f){
			
				foreach($f->filter->filter_options as $fop){
					if(in_array($fop->id,$sparr)){
						 $fop->checked=true;
						
						}else{
						 $fop->checked=false;
							}
					}
			}
			
		}
		$json= json_encode(['data'=>$filterCategory]);
				 $this->autoRender=false;
				 $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);

        return $this->response;
             $this->autoRender = FALSE;
		}
		public function update(){
				$this->_jsonVars = $this->request->input('json_decode');
				
				$product = $this->Products->get($this->_jsonVars->id, [
            'contain' => []
        ]);
				$product->product_specialization=implode(',',$this->_jsonVars->postData);
				 $this->Products->save($product);
				$json=json_encode(['success'=>true]);
				$this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
				 $this->autoRender=false;
			}
			
			public function gst($g){
				$this->loadComponent('Search');
				$p=$this->Search->gst($g);
				pr($p);
				$this->autoRender=false;
				}
			public function productCharge(){
			$jsonVars = $this->request->input('json_decode');
			$type_id=$jsonVars->type_id;
			
            
		  $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
	$charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$type_id]);
        
       
       
         $json= json_encode(['success' => 1, 'data' => $charge], ENT_QUOTES);
         $this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
                                                $this->autoRender = FALSE;
		}
	public function productChargeList($type,$price){
            
		  $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
	$charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$type]);
	$total=0;
        foreach($charge as $c){
            $cha=($c->charge_type!=1)?(($c->value*$price/100)):$c->value;
            $total= $total+$cha;
            
        }
       return $price-$total;
       
        
		}	
 public function updatePrice($id)
    {
		$this->_jsonVars = $this->request->input('json_decode');
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
     	foreach($this->_jsonVars->postData as $dataUpdate){
     	    unset($dataUpdate->create_date);
			 $product = $this->Products->get($dataUpdate->id, [
            'contain' => []
        ]);
        
        $dataUpdate->actual_price=$dataUpdate->user_products[0]->actual_price;
        $dataUpdate->offer_price=$dataUpdate->user_products[0]->offer_price;
        if (isset($dataUpdate->user_products[0]->mrp)) {
            $dataUpdate->mrp=$dataUpdate->user_products[0]->mrp;
        }
        $dataUpdate->total_quantity=$dataUpdate->user_products[0]->total_quantity;
        $dataUpdate->delivery_charge=$dataUpdate->user_products[0]->delivery_charge;
        $dataUpdate->day_of_delivary=$dataUpdate->user_products[0]->day_of_delivary;
        
        $dataUpdate->height=$dataUpdate->user_products[0]->height;
        $dataUpdate->width=$dataUpdate->user_products[0]->width;
        $dataUpdate->length=$dataUpdate->user_products[0]->length;
        $dataUpdate->weight=$dataUpdate->user_products[0]->weight;
        $dataUpdate->is_live=$dataUpdate->user_products[0]->is_live;
     
            $product = $this->Products->patchEntity($product, (array)$dataUpdate);
			//pr($product);
            if ($this->Products->save($product)) {
                	//$item=$this->Products->Items->get($product->item_id);
                	//$item->actual_price=$product->actual_price;
                	//$item->offer_price=$product->offer_price;
                	//$this->Products->Items->save($item);
                	$up=$this->Products->UserProducts->find()->where(['user_id'=>$this->Auth->user('id'),'product_id'=>$product->id])->first();
					$up->actual_price=$product->actual_price;
					$up->offer_price=$product->offer_price;
					$up->mrp=$product->mrp;
					$up->total_quantity=$product->total_quantity;
					$up->delivery_charge=$product->delivery_charge;
					$up->day_of_delivary=$product->day_of_delivary;
					$up->height=$product->height;
					$up->width=$product->width;
					$up->length=$product->length;
					$up->weight=$product->weight;
					$up->show_in_site=$product->show_in_site;
					$up->show_in_site=$product->is_live;
					$up->in_stock=1;
					$this->Products->UserProducts->save($up);
				$data=$product;
			$success=true;
               
            
			}
			} 
			 $data = $this->Products->get($id, [
            'contain' => ['Brands']
        ]);
			$json= json_encode(['data'=>$data,'success'=>$success]);
			$this->response = $this->response
                ->withType('application/json')
                ->withStringBody($json);
			$this->autoRender=false;
        } 
 
 
			
}
