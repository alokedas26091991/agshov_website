<?php

declare(strict_types=1);

namespace App\Controller\Vendor;

use Cake\Routing\Router;
use App\Controller\Vendor\AppController;
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

		if ($this->Auth->user('is_admin') == 1) {
			$this->paginate = [
				'contain' => ['Users', 'Categories', 'SubCategories', 'Types']
			];

			$products = $this->paginate($this->Products);

			$this->set(compact('products'));
			$this->set('_serialize', ['products']);
		} else {

			$this->paginate = [
				'contain' => ['Users', 'Categories', 'SubCategories', 'Types']
			];

			$products = $this->paginate($this->Products->find()->where(['user_id' => $this->Auth->user('id')]));

			$this->set(compact('products'));
			$this->set('_serialize', ['products']);
		}
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
	public function add()
	{

		$this->_is_lower_nav = false;
		$product = $this->Products->newEmptyEntity();
		if ($this->request->is('post')) {
			$product = $this->Products->patchEntity($product, $this->request->data);

			if ($_FILES['photo']['name'] != '') {
				$this->loadComponent('UploadImage');
				$product->photo = $this->UploadImage->do_upload_image_compress('product', $_FILES['photo'], 'product', 'll');
			}
			$product->item_id = $this->_addItem($this->request->data);


			if ($this->Products->save($product)) {
				$this->Flash->success(__('The product has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
		$users = $this->Products->Users->find('list', [
			'keyField' => 'id',
			'valueField' => 'first_name'
		])->where(['is_vendor' => 1, 'is_active' => 1]);
		if ($this->Auth->user('is_vendor') == 1) {
			$users = $users->andWhere(['id' => $this->Auth->user('id')]);
		}
		$categories = $this->Products->Categories->find('list', ['contain' => ['Subcategories', 'Subcategories.types']]);
		pr($categories);
		die;
		$sub_category = $this->Products->SubCategories->find('list', ['limit' => 200]);
		$type = $this->Products->Types->find('list', ['limit' => 200]);
		$brand = $this->Products->Brands->find('list', ['limit' => 200]);
		$this->set(compact('product', 'users', 'categories', 'sub_category', 'type', 'brand'));
		$this->set('_serialize', ['product']);
	}
	private function _addItem($data)
	{
		$item = $this->Products->Items->newEmptyEntity();
		$item = $this->Products->Items->patchEntity($item, $data);
		$item->seller_id = $this->Auth->user('id');
		$item->type = 1;
		$this->Products->Items->save($item);
		return $item->id;
	}

	public function saveData()
	{
		$this->_jsonVars = $this->request->input('json_decode');

		$product = $this->Products->newEmptyEntity();
		//$type=$this->Products->Types->get($this->_jsonVars->postData->type_id,['contain'=>['SubCategories']]);
		//$brand=$this->Products->Brands->get($this->_jsonVars->postData->brand_id);
		$brand = $this->Products->Categories->get($this->_jsonVars->postData->category_id);
		$this->_jsonVars->postData->name = $brand->name;
		$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
		$product->item_id = $this->_addItem((array)$this->_jsonVars->postData);

		$product->user_id = $this->Auth->user('id');
		if ($this->Products->save($product)) {
			$productUser = $this->Products->UserProducts->newEmptyEntity();
			$productUser->user_id = $this->Auth->user('id');
			$productUser->product_id = $product->id;
			$this->Products->UserProducts->save($productUser);
			$this->Flash->success(__('The product has been saved.'));

			$data = $this->Products->get($product->id);
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
	}

	public function productList()
	{
		$jsonVars = $this->request->input('json_decode');
		$listType = $jsonVars->listType;
		$where = [];
		if ($listType == 1) {
			$where = ['UserProducts.is_live' => 1, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL'];
		} elseif ($listType == 2) {
			$where = ['UserProducts.is_live' => 0, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL'];
		} elseif ($listType == 3) {
			$where = ['UserProducts.is_live' => 1, 'UserProducts.in_stock' => 1, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL'];
		} elseif ($listType == 4) {
			$where = ['UserProducts.is_live' => 1, 'UserProducts.total_quantity' => 0, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL'];
		}
		$search = false;
		if (isset($jsonVars->search) & !empty($jsonVars->search)) {
			$keyword =  $jsonVars->search;
			$search = true;
		}




		$productLive = $this->Products->UserProducts->find('all')->contain(['Products'])->where(['UserProducts.is_live' => 1, 'UserProducts.total_quantity >' => 0, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL']);
		if ($search) {
			$productLive = $productLive->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
		}
		$productLive = $productLive->count();
		$productNotLive = $this->Products->UserProducts->find('all')->contain(['Products'])->where(['UserProducts.is_live' => 0, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL']);
		if ($search) {
			$productNotLive = $productNotLive->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
		}
		$productNotLive = $productNotLive->count();

		$productStock = $this->Products->UserProducts->find('all')->contain(['Products'])->where(['UserProducts.is_live' => 1, 'UserProducts.in_stock' => 1, 'UserProducts.total_quantity >' => 0, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL']);
		if ($search) {
			$productStock = $productStock->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
		}
		$productStock = $productStock->count();

		$productNotStock = $this->Products->UserProducts->find('all')->contain(['Products'])->where(['UserProducts.is_live' => 1, 'UserProducts.total_quantity' => 0, 'UserProducts.user_id' => $this->Auth->user('id'), 'Products.parent_id IS NULL']);
		if ($search) {
			$productNotStock = $productNotStock->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
		}
		$productNotStock = $productNotStock->count();

		$product = $this->Products->UserProducts->find('all')->contain(['Products', 'Products.Categories', 'Products.Types', 'Products.Brands', 'Products.FilterOptions'])->where($where);
		if ($search) {
			$product = $product->andwhere(['OR' => [['Products.name LIKE' => '%' . $keyword . '%'], ['Products.supc LIKE' => '%' . $keyword . '%']]]);
		}
		$totalProduct = $product->count();
		$product = $this->paginate($product);
		foreach ($product as $p) {
			if ($p->user_id == $p->product->user_id && !$p->is_live) {
				$p->allow_edit = true;
			} else {
				$p->allow_edit = false;
			}
			$p->seller_price = $this->productChargeList($p->product->type_id, $p->offer_price);
		}
		$paging = $this->request->getAttribute('paging')['UserProducts'];

		$json = json_encode(['success' => 1, 'data' => $product, 'page' => $paging, 'total' => $totalProduct, 'live' => $productLive, 'notlive' => $productNotLive, 'stock' => $productStock, 'outstock' => $productNotStock], ENT_QUOTES);
		$this->autoRender = FALSE;

		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);

		return $this->response;
	}
	public function productChargeList($type, $price)
	{

		$chargeObj = TableRegistry::get('ProductCharges');
		$charge = $chargeObj->find()->where(['is_active' => 1, 'type_id' => $type]);
		$total = 0;
		foreach ($charge as $c) {
			$cha = ($c->charge_type != 1) ? (($c->value * $price / 100)) : $c->value;
			$total = $total + $cha;
		}
		return $price - $total;
	}
	public function upload()
	{

		if ($_FILES['file']['name'] != '') {
			$this->loadComponent('UploadImage');
			$product = $this->UploadImage->do_upload_image('product', $_FILES['file'], 'product', 'll');

			if ($this->request->getData('type') == 2) {
				$item = $this->Products->ProductImages->newEmptyEntity();
				$item->product_id = $this->request->getData('product_id');
				$item->image = $product;

				$this->Products->ProductImages->save($item);
			} elseif ($this->request->getData('type') == 1) {
				$item = $this->Products->get($this->request->getData('product_id'));
				$item->photo = $product;
				$this->Products->save($item);
			}
		}
		$json = json_encode(['data' => $item, 'image' => $product]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
	}

	public function uploadSku()
	{

		if ($_FILES['file']['name'] != '') {
			$this->loadComponent('UploadImage');
			$product = $this->UploadImage->do_upload_image('product', $_FILES['file'], 'product', 'll');

			$item = $this->Products->SkuVariations->get($this->request->data['product_id']);
			$item->photo = $product;
			$this->Products->SkuVariations->save($item);
		}
		$json = json_encode(['data' => $item, 'image' => $product]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
	}


	public function productimage($id)
	{

		$product = $this->Products->ProductImages->find()->where(['product_id' => $id]);
		foreach ($product as $p) {
			$p->image =	Router::url('/upload/product/' . $p->image, true);
		}
		echo json_encode(['data' => $product]);
		$this->autoRender = false;
	}
	public function deleteProductImage($id = null)
	{

		$product = $this->Products->ProductImages->get($id);
		$this->Products->ProductImages->delete($product);
		$json = json_encode(['success' => true]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
	}

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
		$users = $this->Products->Users->find('list', ['limit' => 200]);
		$categories = $this->Products->Categories->find('list', ['limit' => 200]);
		$this->set(compact('product', 'users', 'categories'));
		$this->set('_serialize', ['product']);
	}
	public function updateProduct($id)
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$product_add = $this->Products->get($id, [
			'contain' => ['Brands', 'Types', 'FilterOptions', 'SubCategories']
		]);
		$product = $this->Products->get($id, [
			'contain' => []
		]);

		//if(!$this->_jsonVars->postData->variant){
		$brand = $product_add->brand->name;


		$type = !empty($product_add->type) ? $product_add->type->name : '';
		$sub_category = !empty($product_add->sub_category) ? $product_add->sub_category->name : '';
		$filter_option = !empty($product_add->filter_option) ? $product_add->filter_option->name : '';
		if ($this->_jsonVars->postData->variant == '1') {
			$supc = $product_add->supc;
			unset($this->_jsonVars->postData->slug);
			unset($this->_jsonVars->postData->size);
			unset($this->_jsonVars->postData->name);
			unset($this->_jsonVars->postData->supc);
			unset($this->_jsonVars->postData->filter_id);
			unset($this->_jsonVars->postData->filter_option_id);
		} else {
			$supc = $this->_jsonVars->postData->supc;
		}
		//$this->_jsonVars->postData->name=$brand." ".$supc." ".$filter_option." ".$type." ".$sub_category;
		//}
		//unset($this->_jsonVars->postData->slug);
		unset($this->_jsonVars->postData->create_date);
		$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
		
		$product->introduction=$this->_jsonVars->postData->introduction;
		$product->short_description=$this->_jsonVars->postData->short_description;

		if ($this->Products->save($product)) {
			$childProduct = $this->Products->find()->where(['parent_id' => $product->id]);
			if ($childProduct->count() > 0) {
				foreach ($childProduct as $cp) {
					$childp = $this->Products->get($cp->id);
					$childp->introduction = $product->introduction;
					$childp->short_description = $product->short_description;
					$childp->hsn_code = $product->hsn_code;
					$childp->upc = $product->upc;
					$childp->ean = $product->ean;
					$childp->gst_percentage = $product->gst_percentage;
					$this->Products->save($childp);
				}
			}
			$data = $product;
			$success = true;
		} else {
			$data = $product;
			$success = false;
		}
		$data = $this->Products->get($id, [
			'contain' => ['Brands']
		]);
		$json = json_encode(['data' => $data, 'success' => $success]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
	}
	public function updatePrice($id)
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$product = $this->Products->get($id, [
			'contain' => []
		]);
		foreach ($this->_jsonVars->postData as $dataUpdate) {
			unset($dataUpdate->create_date);
			$product = $this->Products->get($dataUpdate->id, [
				'contain' => []
			]);

			$dataUpdate->actual_price = $dataUpdate->user_products[0]->actual_price;
			$dataUpdate->offer_price = $dataUpdate->user_products[0]->offer_price;
			if (isset($dataUpdate->user_products[0]->mrp)) {
				$dataUpdate->mrp = $dataUpdate->user_products[0]->mrp;
			}
			$dataUpdate->vendor_discount = $dataUpdate->user_products[0]->vendor_discount;
			$dataUpdate->total_quantity = $dataUpdate->user_products[0]->total_quantity;
			$dataUpdate->delivery_charge = $dataUpdate->user_products[0]->delivery_charge;
			$dataUpdate->day_of_delivary = $dataUpdate->user_products[0]->day_of_delivary;

			$dataUpdate->height = $dataUpdate->user_products[0]->height;
			$dataUpdate->width = $dataUpdate->user_products[0]->width;
			$dataUpdate->length = $dataUpdate->user_products[0]->length;
			$dataUpdate->weight = $dataUpdate->user_products[0]->weight;
			$dataUpdate->minimum_order = $dataUpdate->user_products[0]->minimum_order;
			$dataUpdate->show_in_site = $dataUpdate->user_products[0]->show_in_site;
			$dataUpdate->is_live = $dataUpdate->user_products[0]->is_live;

			$product = $this->Products->patchEntity($product, (array)$dataUpdate);
			//pr($product);
			if ($this->Products->save($product)) {
				//$item=$this->Products->Items->get($product->item_id);
				//$item->actual_price=$product->actual_price;
				//$item->offer_price=$product->offer_price;
				//$this->Products->Items->save($item);
				$up = $this->Products->UserProducts->find()->where(['user_id' => $this->Auth->user('id'), 'product_id' => $product->id])->first();
				$up->actual_price = $product->actual_price;
				$up->offer_price = $product->offer_price;
				$up->mrp = $product->mrp;
				$up->vendor_discount = $product->vendor_discount;
				$up->total_quantity = $product->total_quantity;
				$up->delivery_charge = $product->delivery_charge;
				$up->day_of_delivary = $product->day_of_delivary;
				$up->height = $product->height;
				$up->width = $product->width;
				$up->length = $product->length;
				$up->weight = $product->weight;
				$up->minimum_order = $product->minimum_order;
				$up->show_in_site = 0;
				$up->in_stock = 1;
				$up->is_live = $product->is_live;
				$this->Products->UserProducts->save($up);
				$data = $product;
				$success = true;
			}
		}
		$data = $this->Products->get($id, [
			'contain' => ['Brands']
		]);
		$json = json_encode(['data' => $data, 'success' => $success]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
	}

	public function requestForAdmin($id)
	{

		$product = $this->Products->get($id, [
			'contain' => []
		]);

		$actual_price = $product->actual_price;
		$offer_price = $product->offer_price;
		$total_quantity = $product->total_quantity;
		$minimum_order = $product->minimum_order;

		if ($actual_price == NULL || $offer_price == NULL || $total_quantity == NULL || $minimum_order == NULL) {
			$json = json_encode(['success' => false]);
			$this->response = $this->response
				->withType('application/json')
				->withStringBody($json);
		} else {
			$product->status = 2;
			$this->Products->save($product);
			$json = json_encode(['success' => true]);
			$this->response = $this->response
				->withType('application/json')
				->withStringBody($json);
		}


		$this->autoRender = false;
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

	public function filterList($id)
	{
		$product = $this->Products->get($id, [
			'contain' => []
		]);
		$sparr = [];
		$sp = $product->product_specialization;
		if (!empty($sp)) {
			$sparr = explode(',', $sp);
		}
		$filterCatObj = \Cake\ORM\TableRegistry::getTableLocator()->get('FilterCategories');
		$selectOption = [];
		$filterCategory = $filterCatObj->find()->contain(['Filters', 'Filters.FilterOptions'])->group("Filters.id")


			->where(['FilterCategories.category_id' => $product->category_id, 'FilterCategories.sub_category_id' => $product->sub_category_id]);

		if ($product->type_id > 0) {
			$filterCategory->where(['FilterCategories.type_id' => $product->type_id]);
		}
		if ($filterCategory->count() > 0) {
			foreach ($filterCategory as $f) {

				foreach ($f->filter->filter_options as $fop) {
					if (in_array($fop->id, $sparr)) {
						$fop->checked = true;
					} else {
						$fop->checked = false;
					}
				}
			}
		}
		$json = json_encode(['data' => $filterCategory]);
		$this->autoRender = false;
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);

		return $this->response;
		$this->autoRender = FALSE;
	}
	public function filterListVarient($id)
	{

		$product = $this->Products->get($id, [
			'contain' => []
		]);
		//echo $product->type_id;

		$filterCatObj = TableRegistry::getTableLocator()->get('FilterCategories');
		$filterCategory = $filterCatObj->find()->contain(['Filters', 'Filters.FilterOptions'])->where(['FilterCategories.sub_category_id' => $product->sub_category_id]);

		foreach ($filterCategory as $f) {

			$selectOption[] = $f->filter;
		}


		$json = json_encode(['data' => $selectOption]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
	}
	public function update()
	{
		$this->_jsonVars = $this->request->input('json_decode');

		$product = $this->Products->get($this->_jsonVars->id, [
			'contain' => []
		]);
		$product->product_specialization = implode(',', $this->_jsonVars->postData);
		$this->Products->save($product);
		$json = json_encode(['success' => true]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = false;
	}
	public function skuList($id)
	{

		$where = [];
		$where = ['OR' => ['parent_id' => $id, 'Products.id' => $id]];

		$product = $this->Products->find('all')->contain(['Filters', 'FilterOptions', 'FilterNews', 'FilterOptionNews', 'UserProducts' => function ($q) {
			return $q->where(['UserProducts.user_id' => $this->Auth->user('id')]);
		}])->where($where);



		$json = json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = FALSE;
	}
	public function skuListPrice($id)
	{

		$where = [];
		$where = ['OR' => ['parent_id' => $id, 'Products.id' => $id]];

		$product = $this->Products->find('all')->contain(['Filters', 'FilterOptions', 'UserProducts' => function ($q) {
			return $q->where(['UserProducts.user_id' => $this->Auth->user('id')]);
		}])->where($where);



		$json = json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = FALSE;
	}
	public function productImageList($id)
	{

		$where = [];
		$where = ['OR' => ['parent_id' => $id, 'Products.id' => $id]];

		$product = $this->Products->find('all')->contain(['ProductImages', 'FilterOptions'])->where($where);



		$json = json_encode(['success' => 1, 'data' => $product], ENT_QUOTES);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
		$this->autoRender = FALSE;
	}
	public function addSku()
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$product = $this->Products->get($this->_jsonVars->id, ['contain' => ['ParentProducts']]);

		if ($this->_jsonVars->is_first) {
			$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
			$product->parent_id = NULL;
		} else {
			$product = $this->Products->newEmptyEntity();
			$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
		}

		//$product->filter_id=19;
		if ($this->Products->save($product)) {

			$sku = $this->Products->UserProducts->find()->where(['product_id' => $product->id, 'user_id' => $this->Auth->user('id')]);
			if ($sku->count() == 0) {
				$productUser = $this->Products->UserProducts->newEmptyEntity();
				$productUser->user_id = $this->Auth->user('id');
				$productUser->product_id = $product->id;
				$this->Products->UserProducts->save($productUser);
			}
			//$this->Flash->success(__('The product has been saved.'));
			$product = $this->Products->get($product->id, ['contain' => ['Brands', 'Types', 'Filters', 'FilterOptions', 'SubCategories']]);

			$brand = $product->brand->name;
			$type = !empty($product->type) ? $product->type->name : '';
			$sub_category = !empty($product->sub_category) ? $product->sub_category->name : '';
			$filter = !empty($product->filter) ? $product->filter->name : '';
			$filter_option = !empty($product->filter_option) ? $product->filter_option->name : '';
			$supc = $product->supc;
			$size = $product->size;
			///$product->name=$brand." ".$supc." ".$filter_option." ".$type." ".$sub_category;
			$this->Products->save($product);
			//$product->name=$product->brand->name." ".$product=>supc." ".$product->type->name
			$data = $product;
			$success = true;




			//$this->Flash->success(__('The product has been saved.'));

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
	}
	public function updateSku()
	{
		$this->_jsonVars = $this->request->input('json_decode');
		$product = $this->Products->get($this->_jsonVars->id);

		$product = $this->Products->patchEntity($product, (array)$this->_jsonVars->postData);
		

		
		
		
		if ($this->Products->save($product)) {

			$product = $this->Products->get($product->id, ['contain' => ['Brands', 'Types', 'Filters', 'FilterOptions', 'SubCategories']]);

			$brand = $product->brand->name;
			$type = !empty($product->type) ? $product->type->name : '';
			$sub_category = !empty($product->sub_category) ? $product->sub_category->name : '';
			$filter = !empty($product->filter) ? $product->filter->name : '';
			$filter_option = !empty($product->filter_option) ? $product->filter_option->name : '';
			$supc = $product->supc;
			$size = $product->size;
			
			//	$product->name=$brand." ".$supc." ".$filter_option." ".$type." ".$sub_category;
			$this->Products->save($product);
			//$product->name=$product->brand->name." ".$product=>supc." ".$product->type->name
			$data = $product;
			$success = true;




			//$this->Flash->success(__('The product has been saved.'));

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
	}
}
