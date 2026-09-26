<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\Routing\Router;
use App\Controller\Admin\AppController;
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
    public function index()
    {
                if(isset($this->request->query['page'])){
            $this->request->getSession()->write('Products.page',$this->request->query['page']);
        }else{
            
            $this->request->getSession()->write('Products.page',0);
        }
                		$search=[];
		 	$this->set('placeholder',['Search here']);
             $search1 = $this->request->getQuery('search');
				if($search1!=null){   
				$keyword= trim($search1);
				$search[]=['OR'=>['Users.first_name LIKE' => "%$keyword%",'Categories.name LIKE' => "%$keyword%",'SubCategories.name LIKE' => "%$keyword%",'Brands.name LIKE' => "%$keyword%",'Products.supc LIKE' => "%$keyword%",'Brands.name LIKE' => "%$keyword%",'Products.name LIKE' => "%$keyword%"]];
				$this->set('search',$keyword);
				}
        
        $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');

			        $this->paginate = [
						'contain' => ['Users', 'Products', 'Products.Brands','Products.Categories','Products.SubCategories','Products.Brands']
					];
			
				   
					$products = $this->paginate($UserProducts->find("all",[
		"order"=>["Products.id"=>"desc"]])->where(['Products.status !='=> 0,'Products.is_deleted ='=> 0, 'Products.parent_id IS'=> NULL,$search]));
				

					$this->set(compact('products'));
					$this->set('_serialize', ['products']);
		

    }
    public function varientproduct($id = null)
    {
        $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $parentProduct = $ProductsTable->find()->where(['id' => $id])->first();

        $this->paginate = [
            'contain' => ['Users', 'Products']
        ];

        $products = $this->paginate($UserProducts->find()->where(['Products.is_deleted' => 0, 'Products.parent_id' => $id]));

        $this->set(compact('products', 'parentProduct'));
        $this->set('_serialize', ['products']);
    }
    public function productgalleryedit($id = null)
    {
        $ProductImages = TableRegistry::getTableLocator()->get('ProductImages');
        $advertisement = $ProductImages->get($id, [
            'contain' => []
        ]);
        $Product = TableRegistry::getTableLocator()->get('Products');
        $product1 = $Product->find('all')->where(['id'=>$advertisement->product_id])->first();
        $pic=$advertisement->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            
            $advertisement1 = $ProductImages->patchEntity($advertisement, $this->request->getData());
            $advertisement1->is_active=$this->request->getData('is_active');

            if($_FILES['image']['name']!=''){
					$this->loadComponent('UploadImage');
					$advertisement1->image=$this->UploadImage->do_upload_image_compress('product',$_FILES['image'],'product','ll');
				 
			 }
			 else
			 {
			     $advertisement1->image=$pic;
			 }
            if ($ProductImages->save($advertisement1)) {
                $this->Flash->success(__('The Image has been saved.'));

                return $this->redirect(['action' => 'gallery',$product1->id]);
            } else {
                $this->Flash->error(__('The Image could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('advertisement'));
        $this->set('_serialize', ['advertisement']);
    }
    public function gallery($id = null)
    {
       
       
                    $Product = TableRegistry::getTableLocator()->get('ProductImages');
			        
			
				   
					$products = $Product->find()->where(['product_id'=>$id]);
					
				
				  
                    
					$this->set(compact('products'));
					$this->set('_serialize', ['products']);
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
   
    public function approve($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
         $page= $this->request->getSession()->read('Products.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'users', 'categories'));
        $this->set('_serialize', ['product']);
    }
    
    public function productstatus($id = null)
    {
        $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
        $Products = TableRegistry::getTableLocator()->get('Products');
        $product = $UserProducts->get($id, [
            'contain' => ['Products']
        ]);
       
        $page= $this->request->getSession()->read('Products.page');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user_product = $UserProducts->patchEntity($product, $this->request->getData());
         
            $user_product->is_active=$this->request->getData('is_active');
           $product1 = $this->Products->find()->where(['id' => $product->product_id])->first();
           
           if($_FILES['country']['name']!=''){
					$this->loadComponent('UploadImage');
					$product1->country=$this->UploadImage->do_upload_image('product',$_FILES['country'],'product','ll');
				 
			 }
			 else
			 {
			     $product1->country=$product1->country;
			 }
            
         
           $product1->is_active=$this->request->getData('is_active');
        
           

           
     

            if ($UserProducts->save($user_product)) {
                $this->Products->save($product1);
                $this->Flash->success(__('The product has been Activated.'));

                return $this->redirect(['action' => 'index','?'=>['page'=>$page]]);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }

          $this->set(compact('product'));

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
        $this->request->allowMethod(['post', 'delete', 'get']);
        $UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
        $Products = TableRegistry::getTableLocator()->get('Products');
        $page = $this->request->getSession()->read('Products.page');

        // First attempt to find by UserProducts primary key or product_id
        $user_product = $UserProducts->find()->where(['id' => $id])->first();
        if (!$user_product) {
            $user_product = $UserProducts->find()->where(['product_id' => $id])->first();
        }

        // Determine Product entity
        if ($user_product) {
            $product = $Products->find()->where(['id' => $user_product->product_id])->first();
        } else {
            $product = $Products->find()->where(['id' => $id])->first();
        }

        if (!$product && !$user_product) {
            $this->Flash->error(__('Product not found.'));
            return $this->redirect(['action' => 'index', '?' => ['page' => $page]]);
        }

        $deleted = false;

        if ($product) {
            $product->is_deleted = 1;
            if ($Products->save($product)) {
                $deleted = true;

                // Also soft delete any child variants
                $variantProducts = $Products->find()->where(['parent_id' => $product->id])->all();
                foreach ($variantProducts as $vProd) {
                    $vProd->is_deleted = 1;
                    $Products->save($vProd);
                    $UserProducts->updateAll(['is_deleted' => 1], ['product_id' => $vProd->id]);
                }
            }
        }

        if ($user_product) {
            $user_product->is_deleted = 1;
            if ($UserProducts->save($user_product)) {
                $deleted = true;
            }
        }

        if ($deleted) {
            $this->Flash->success(__('The product has been deleted successfully.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', '?' => ['page' => $page]]);
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
		$filterCatObj=\Cake\ORM\TableRegistry::get('FilterCategories');
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
		echo json_encode(['data'=>$filterCategory]);
				 $this->autoRender=false;
		}
		public function update(){
				$this->_jsonVars = $this->request->input('json_decode');
				
				$product = $this->Products->get($this->_jsonVars->id, [
            'contain' => []
        ]);
				$product->product_specialization=implode(',',$this->_jsonVars->postData);
				 $this->Products->save($product);
				echo json_encode(['success'=>true]);
				 $this->autoRender=false;
			}
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
		$mainProduct = $this->Products->find()->where(['id' => $id])->first();
		if ($mainProduct && (empty($mainProduct->variant) || $mainProduct->variant == 0 || $mainProduct->variant === false)) {
			$where = ['Products.id' => $id];
		} else {
			$where = ['OR' => ['parent_id' => $id, 'Products.id' => $id]];
		}

		$product = $this->Products->find('all')->contain([
			'Categories',
			'Types',
			'Brands',
			'Filters',
			'FilterOptions',
			'UserProducts' => function ($q) {
				return $q->where(['UserProducts.user_id' => $this->Auth->user('id')]);
			}
		])->where($where)->toArray();

		foreach ($product as $p) {
			if (empty($p->user_products)) {
				$p->user_products = [
					(object)[
						'actual_price' => $p->actual_price ?? 0,
						'offer_price' => $p->offer_price ?? 0,
						'mrp' => $p->mrp ?? 0,
						'total_quantity' => $p->total_quantity ?? 0,
						'vendor_discount' => $p->vendor_discount ?? 0,
						'delivery_charge' => $p->delivery_charge ?? 0,
						'day_of_delivary' => $p->day_of_delivary ?? 0,
						'height' => $p->height ?? null,
						'width' => $p->width ?? null,
						'length' => $p->length ?? null,
						'weight' => $p->weight ?? null,
						'minimum_order' => $p->minimum_order ?? 1,
						'show_in_site' => $p->show_in_site ?? 1,
						'is_live' => $p->is_live ?? 1,
					]
				];
			}
		}

		$json = json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
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
						 
			
			

			$bandObj=TableRegistry::getTableLocator()->get('Brands');
			  $brand =  $bandObj->find()->where(['is_active'=>1]);
	
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
		
	public function saveData()
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$product = $this->Products->newEmptyEntity();
		$postData = (array)($this->_jsonVars->postData ?? []);
		if (empty($postData['name']) || trim((string)$postData['name']) === '') {
			if (!empty($postData['supc'])) {
				$postData['name'] = $postData['supc'];
			} else {
				$postData['name'] = 'Product ' . date('YmdHis');
			}
		}
		$product = $this->Products->patchEntity($product, $postData);
		$product->item_id = $this->_addItem($postData);
		$product->user_id = $this->Auth->user('id');
		if ($this->Products->save($product)) {
			$this->Flash->success(__('The product has been saved.'));
			$data = $product;
			$success = true;
		} else {
			$data = [];
			$success = false;
		}
		$json = json_encode(['data' => $data, 'success' => $success]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
		return $this->response;
	}
	public function upload(){
		$item = null;
		$product = null;
		$productId = (int)$this->request->getData('product_id');
		if(!empty($_FILES['file']['name']) && $productId > 0){
			$this->loadComponent('UploadImage');
			$product=$this->UploadImage->do_upload_image('product',$_FILES['file'],'product','ll');
			if($this->request->getData('type')==2){
				$item = $this->Products->ProductImages->newEmptyEntity();
				$item->product_id=$productId;
				$item->image=$product;
				$this->Products->ProductImages->save($item);
			}elseif($this->request->getData('type')==1){
				$item = $this->Products->find()->where(['id' => $productId])->first();
				if ($item) {
					$item->photo=$product;
					$this->Products->save($item);
				}
			}
		}
		$json= json_encode(['data'=>$item, 'image'=>$product, 'success' => !empty($product)]);
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
						 
			
			
			

			 $bandObj=TableRegistry::getTableLocator()->get('Brands');
			  $brand =  $bandObj->find()->where(['is_active'=>1]);
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

	public function updatePrice($id)
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$targetId = (!empty($id) && $id > 0) ? (int)$id : 0;
		if (!empty($this->_jsonVars->postData)) {
			foreach ($this->_jsonVars->postData as $dataUpdate) {
				unset($dataUpdate->create_date);
				$pId = (!empty($dataUpdate->id) && $dataUpdate->id > 0) ? (int)$dataUpdate->id : $targetId;
				if (!$pId || $pId == 0) {
					continue;
				}
				$p = $this->Products->find()->where(['id' => $pId])->first();
				if (!$p) {
					continue;
				}

				$pUser = $dataUpdate->user_products[0] ?? null;
				$dataUpdate->actual_price = $pUser->actual_price ?? $p->actual_price ?? 0;
				$dataUpdate->offer_price = $pUser->offer_price ?? $p->offer_price ?? 0;
				if (isset($pUser->mrp)) {
					$dataUpdate->mrp = $pUser->mrp;
				}
				$dataUpdate->vendor_discount = $pUser->vendor_discount ?? $p->vendor_discount ?? 0;
				$dataUpdate->total_quantity = $pUser->total_quantity ?? $p->total_quantity ?? 0;
				$dataUpdate->delivery_charge = $pUser->delivery_charge ?? $p->delivery_charge ?? 0;
				$dataUpdate->day_of_delivary = $pUser->day_of_delivary ?? $p->day_of_delivary ?? 0;

				$dataUpdate->height = $pUser->height ?? $p->height ?? null;
				$dataUpdate->width = $pUser->width ?? $p->width ?? null;
				$dataUpdate->length = $pUser->length ?? $p->length ?? null;
				$dataUpdate->weight = $pUser->weight ?? $p->weight ?? null;
				$dataUpdate->minimum_order = $pUser->minimum_order ?? $p->minimum_order ?? 1;
				$dataUpdate->show_in_site = $pUser->show_in_site ?? $p->show_in_site ?? 0;
				$dataUpdate->is_live = $pUser->is_live ?? $p->is_live ?? 1;

				$p = $this->Products->patchEntity($p, (array)$dataUpdate);
				if ($this->Products->save($p)) {
					$up = $this->Products->UserProducts->find()->where(['user_id' => $this->Auth->user('id'), 'product_id' => $p->id])->first();
					if (!$up) {
						$up = $this->Products->UserProducts->newEmptyEntity();
						$up->user_id = $this->Auth->user('id');
						$up->product_id = $p->id;
					}
					$up->actual_price = $p->actual_price;
					$up->offer_price = $p->offer_price;
					$up->mrp = $p->mrp;
					$up->vendor_discount = $p->vendor_discount;
					$up->total_quantity = $p->total_quantity;
					$up->delivery_charge = $p->delivery_charge;
					$up->day_of_delivary = $p->day_of_delivary;
					$up->height = $p->height;
					$up->width = $p->width;
					$up->length = $p->length;
					$up->weight = $p->weight;
					$up->minimum_order = $p->minimum_order;
					$up->show_in_site = 0;
					$up->in_stock = 1;
					$up->is_live = $p->is_live ?? 1;
					$this->Products->UserProducts->save($up);
				}
			}
		}
		$data = ($targetId > 0) ? $this->Products->find()->where(['id' => $targetId])->first() : null;
		$json = json_encode(['data' => $data, 'success' => true]);
		$this->response = $this->response->withType('application/json')->withStringBody($json);
		$this->autoRender = false;
		return $this->response;
	}

	public function productImageList($id)
	{
		$mainProduct = $this->Products->find()->where(['id' => $id])->first();
		if ($mainProduct && (empty($mainProduct->variant) || $mainProduct->variant == 0 || $mainProduct->variant === false)) {
			$where = ['Products.id' => $id];
		} else {
			$where = ['OR' => ['parent_id' => $id, 'Products.id' => $id]];
		}
		$product = $this->Products->find('all')->contain(['ProductImages', 'FilterOptions'])->where($where);

		$json = json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
		$this->response = $this->response->withType('application/json')->withStringBody($json);
		$this->autoRender = false;
	}

	public function filterListVarient($id)
	{
		$product = $this->Products->get($id, ['contain' => []]);
		$filterCatObj = TableRegistry::getTableLocator()->get('FilterCategories');
		$filterCategory = $filterCatObj->find()->contain(['Filters', 'Filters.FilterOptions'])->where(['FilterCategories.sub_category_id' => $product->sub_category_id]);

		$selectOption = [];
		foreach ($filterCategory as $f) {
			$selectOption[] = $f->filter;
		}

		$json = json_encode(['data' => $selectOption]);
		$this->response = $this->response->withType('application/json')->withStringBody($json);
		$this->autoRender = false;
	}

	public function addSku()
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$product = $this->Products->get($this->_jsonVars->id, ['contain' => ['ParentProducts']]);

		if (!empty($this->_jsonVars->is_first)) {
			$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
			$product->parent_id = NULL;
		} else {
			$product = $this->Products->newEmptyEntity();
			$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
		}

		if ($this->Products->save($product)) {
			$sku = $this->Products->UserProducts->find()->where(['product_id' => $product->id, 'user_id' => $this->Auth->user('id')]);
			if ($sku->count() == 0) {
				$productUser = $this->Products->UserProducts->newEmptyEntity();
				$productUser->user_id = $this->Auth->user('id');
				$productUser->product_id = $product->id;
				$this->Products->UserProducts->save($productUser);
			}
			$product = $this->Products->get($product->id, ['contain' => ['Brands', 'Types', 'Filters', 'FilterOptions', 'SubCategories']]);
			$data = $product;
			$success = true;
		} else {
			$data = [];
			$success = false;
		}
		$json = json_encode(['data' => $data, 'success' => $success]);
		$this->response = $this->response->withType('application/json')->withStringBody($json);
		$this->autoRender = false;
	}

	public function updateSku()
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$product = $this->Products->get($this->_jsonVars->id);
		$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);

		if ($this->Products->save($product)) {
			$product = $this->Products->get($product->id, ['contain' => ['Brands', 'Types', 'Filters', 'FilterOptions', 'SubCategories']]);
			$data = $product;
			$success = true;
		} else {
			$data = [];
			$success = false;
		}
		$json = json_encode(['data' => $data, 'success' => $success]);
		$this->response = $this->response->withType('application/json')->withStringBody($json);
		$this->autoRender = false;
	}

	public function uploadSku()
	{
		$this->loadComponent('UploadImage');
		$id = $this->request->getData('product_id');
		$product = $this->Products->get($id);

		if (!empty($_FILES['file']['name'])) {
			$product->photo = $this->UploadImage->do_upload_image_compress('product', $_FILES['file'], 'product', 'll');
			$this->Products->save($product);
		}

		$json = json_encode(['success' => true, 'image' => $product->photo]);
		$this->response = $this->response->withType('application/json')->withStringBody($json);
		$this->autoRender = false;
	}

	public function deleteProductImage($id = null)
	{
		$ProductImages = TableRegistry::getTableLocator()->get('ProductImages');
		$image = $ProductImages->get($id);
		$ProductImages->delete($image);

		$json = json_encode(['success' => true]);
		$this->response = $this->response->withType('application/json')->withStringBody($json);
		$this->autoRender = false;
	}
}

