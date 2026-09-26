<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

use Cake\Http\Cookie\CookieCollection;
use Cake\Http\Cookie\Cookie;
use Cake\Controller\Component\PaginatorComponent;
use App\Controller\CommonTrait;
use Cake\Event\EventInterface;



/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ProductsController extends AppController
{
	public $cookies;
	private $_jsonVars;
	private $_show_left_panel;
	private $_home;
	private $_categoryId;
	private $_subCategoryId;
	private $_typeId;
	private  $_search;
	private $_displayName = "";
	public $paginate = [
		'limit' => 10

	];
	use CommonTrait;
	/**
	 * Displays a view
	 *
	 * @return void|\Cake\Network\Response
	 * @throws \Cake\Network\Exception\NotFoundException When the view file could not
	 *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
	 */
	public function initialize(): void
	{
		parent::initialize();
		$this->_home = false;
		$this->_categoryId = 0;
		$this->_subCategoryId = 0;
		$this->_typeId = 0;
		$this->_show_left_panel = true;
		$this->_search = "";
		$this->loadComponent('Paginator');
	}



	public function enquiry()
	{
		if ($this->request->is('post')) {
			if (isset($_POST['sub'])) {
				$fan = TableRegistry::getTableLocator()->get('Productenquires');
				$question11 = $fan->newEmptyEntity();
				$question1 = $fan->patchEntity($question11, $this->request->getData());

				$question1->dt = date('Y-m-d');
				$slug = $this->request->getData('slug');


				if ($r = $fan->save($question1)) {




					$this->Flash->error(__('Thanks for your Enquiry'));
					//return $this->redirect($this->Auth->redirectUrl());

					return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
				} else {
					$this->Flash->error(__('Enquiry is not Generated. Please, try again.'));
					return $this->redirect(['controller' => 'Home', 'action' => 'index']);
				}
			}
		}
	}

	public function index()
	{
		$this->_show_left_panel = true;
		$this->_home = true;

		$branchObj = TableRegistry::getTableLocator()->get('Pages');
		$slug = "products";
		$page = $branchObj->findBySlug($slug)->first();
		$this->_display_meta = TRUE;
		if ($page) {
			$this->setMeta($page);
		}

		$productsTable = TableRegistry::getTableLocator()->get('Products');
		$categoriesTable = TableRegistry::getTableLocator()->get('Categories');

		$query = $productsTable->find('all')
			->contain(['Categories', 'SubCategories', 'ProductImages'])
			->where([
				'Products.parent_id IS' => null,
				'OR' => [
					'Products.is_deleted' => 0,
					'Products.is_deleted IS' => null
				]
			])
			->order(['Products.id' => 'DESC']);

		$catId = $this->request->getQuery('category');
		$subCatId = $this->request->getQuery('subcategory');
		$search = $this->request->getQuery('search');

		if (!empty($catId)) {
			$query->where(['Products.category_id' => $catId]);
		}
		if (!empty($subCatId)) {
			$query->where(['Products.sub_category_id' => $subCatId]);
		}
		if (!empty($search)) {
			$query->where(['Products.name LIKE' => '%' . trim($search) . '%']);
		}

		$products = $this->paginate($query, ['limit' => 24]);
		$categories = $categoriesTable->find('all')->contain(['SubCategories'])->toArray();

		$this->set(compact('products', 'categories', 'catId', 'subCatId', 'search'));
	}
	public function compare($slug = null)
	{
		$product = $this->Products->findBySlug($slug)->contain(['ProductImages'])->first();
		$this->set('product', $product);

		if ($product->offer_price == "0") {
			$this->price = $product->actual_price / 100;
			if ($this->price >= 5) {
				$this->max_price = $product->actual_price + 500;
				$this->min_price = $product->actual_price - 500;
			} else {
				$this->max_price = $product->actual_price + 100;
				$this->min_price = $product->actual_price - 100;
			}
		} else {
			$this->price = $product->offer_price / 100;
			if ($this->price >= 5) {
				$this->max_price = $product->offer_price + 500;
				$this->min_price = $product->offer_price - 500;
			} else {
				$this->max_price = $product->offer_price + 100;
				$this->min_price = $product->offer_price - 100;
			}
		}



		$Products = TableRegistry::get('Products');
		$Products1 = $Products->find("all", array('limit' => 15), [
			"order" => ["id" => "asc"]
		])->where(['type_id' => "$product->type_id", 'actual_price >=' => "$this->min_price", 'actual_price <=' => "$this->max_price", 'is_active' => "1", 'is_live' => "1", 'is_deleted' => "0"]);

		$this->set(compact('Products1'));
		$this->set('_serialize', ['Products1']);

		$Pro = TableRegistry::get('SubCategories');
		$Pro1 = $Pro->find("all")->where(['id' => "$product->sub_category_id"])->first();

		$this->set('Pro1', $Pro1);

		$Pro1 = TableRegistry::get('Types');
		$Pro2 = $Pro1->find("all")->where(['id' => "$product->type_id"])->first();

		$this->set('Pro2', $Pro2);


		$Pro3 = $Pro->find("all", array('limit' => 200), [

			"order" => ["id" => "desc"]
		])->where(['category_id' => "$product->category_id"]);

		$this->set(compact('Pro3'));
		$this->set('_serialize', ['Pro3']);

		$Pro4 = TableRegistry::get('Categories');
		$Pro5 = $Pro4->find("all")->where(['id' => "$product->category_id"])->first();

		$this->set('Pro5', $Pro5);



		$Pro6 = $Pro1->find("all", array('limit' => 200), [

			"order" => ["id" => "desc"]
		])->where(['sub_category_id' => "$product->sub_category_id"]);

		$this->set(compact('Pro6'));
		$this->set('_serialize', ['Pro6']);
	}
	public function details($slug = null)
	{
		$this->_show_left_panel = false;
		$product = $this->Products->findBySlug($slug)->contain(['Users', 'Filters', 'FilterOptions', 'ProductImages', 'UserProducts', 'Categories' => function ($q) {
			return $q->select(['id', 'name']);
		}, 'SubCategories' => function ($q) {
			return $q->select(['id', 'name', 'category_id']);
		}, 'Brands' => function ($q) {
			return $q->select(['id', 'name', 'slug']);
		}, 'Users' => function ($q) {
			return $q->select(['name', 'photo']);
		}])->first();

		if (!$product) {
			throw new \Cake\Http\Exception\NotFoundException(__('Product not found'));
		}

		$parentId = !empty($product->parent_id) ? $product->parent_id : $product->id;

		$variants = $this->Products->find()
			->contain(['FilterOptions', 'ProductImages', 'UserProducts'])
			->where([
				'Products.is_deleted' => 0,
				'Products.is_active' => 1
			])
			->andWhere([
				'OR' => [
					['Products.id' => $parentId],
					['Products.parent_id' => $parentId]
				]
			])
			->order(['Products.id' => 'ASC'])
			->toArray();

		$this->set(compact('product', 'variants'));
		$this->set('_serialize', ['product', 'variants']);


		//related products and featured products


		$Pro3 = $this->Products->find("all", [
			"order" => 'rand()'
		])->where(['Products.sub_category_id' => $product->sub_category_id,  'Products.is_active' => "1", 'Products.parent_id IS' => NULL, 'Products.is_deleted' => "0"])->limit(6);

		$this->set(compact('Pro3'));
		$this->set('_serialize', ['Pro3']);

		// review section

		if ($this->request->is('post')) {
			if ($this->Auth->user('id')) {

				$Reviews = TableRegistry::getTableLocator()->get('Reviews');
				$product = $this->Products->findBySlug($slug)->first();

				$review11 = $Reviews->newEmptyEntity();
				$review1 = $Reviews->patchEntity($review11, $this->request->getData());
				$review1->user_id = $this->Auth->user('id');
				$review1->dt = date('Y-m-d');
				$review1->slug = $product->slug;
				$review1->seller_id = $product->user_id;
				$review1->product_id = $product->id;
				$review1->is_active = 0;
                $review1->rating = $this->request->getData('rating');

                
				if ($r = $Reviews->save($review1)) {




					$this->Flash->error(__('Thanks for your Valuable Review'));

					return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
				} else {
					$this->Flash->error(__('Review is not Generated. Please, try again.'));
				}
			} else {
				$this->Flash->error(__('Please, login first.'));
				return $this->redirect(['controller' => 'login', 'action' => 'index']);
			}
		}


		//review show section
		$Reviews = TableRegistry::getTableLocator()->get('Reviews');
		$reviewlist1 = $Reviews->find("all", [
			"order" => ["Reviews.id" => "desc"]
		])->contain(['Users', 'ReviewImages'])->where(['Reviews.slug' => $slug, 'Reviews.is_active' => 1]);

		$reviewlist2 = $Reviews->find("all", [
			"order" => ["Reviews.id" => "desc"]
		])->contain(['Users'])->where(['Reviews.slug' => $slug, 'Reviews.is_active' => 1]);





		$this->set('reviewlist', $this->paginate($reviewlist1));










		//end question

		$totalreviews = $reviewlist2->count();



		$res = $reviewlist2->select(['sum' => $reviewlist2->func()->sum('Reviews.rating')])->first();
		$total = $res->sum; //your total sum result

		if (empty($totalreviews)) {
			$average = 0;
		} else {
			$average = $total / $totalreviews;
		}
		$average1 = round($average * 20);
		$Query = $Reviews->find("all", [
			"order" => ["Reviews.rating" => "desc"]
		]);
		$rating_group = $Reviews->find("all")->select([
			'rating',
			'count' => $Query->func()->count('*'),
			'sum' => $reviewlist1->func()->sum('Reviews.rating')

		])
			->where(['Reviews.slug' => $slug, 'Reviews.is_active' => 1])
			->group('rating');

		// foreach ($rating_group as $row) {
		//   debug($row);
		// }

		$this->set('totalreviews', $totalreviews);
		$this->set('average1', $average1);
		$this->set('rating_group', $rating_group);
	}

	public function question($slug = null)
	{
		if ($this->request->is('post')) {
			if ($this->Auth->user('id')) {

				$question = TableRegistry::getTableLocator()->get('Questions');
				$product = $this->Products->findBySlug($slug)->first();

				$question11 = $question->newEmptyEntity();
				$question1 = $question->patchEntity($question11, $this->request->getData());
				$question1->user_id = $this->Auth->user('id');
				$question1->dt = date('Y-m-d');
				$question1->slug = $product->slug;
				$question1->seller_id = $product->user_id;
				$question1->product_id = $product->id;

				if ($r = $question->save($question1)) {




					$this->Flash->error(__('Thanks for your Question'));

					return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
				} else {
					$this->Flash->error(__('Question is not Generated. Please, try again.'));
					return $this->redirect(['controller' => 'Products', 'action' => 'details', $slug]);
				}
			} else {
				$this->Flash->error(__('Please, login first.'));
				return $this->redirect(['controller' => 'login', 'action' => 'index']);
			}
		}
		//$this->render('details');
	}
	public function category($slug = null)
	{
		$category = TableRegistry::get('Categories');
		$listingbanner = TableRegistry::get('Listingbanners');
		$category1 = $category->findBySlug($slug)->first();
		$list_banner = $listingbanner->find("all", [
			"order" => ["ord" => "asc"]
		])->contain(['Categories', 'SubCategories', 'Types', 'Brands', 'Products'])->where(['Listingbanners.category_id' => $category1->id, 'Listingbanners.is_active' => 1, 'Listingbanners.is_deleted' => 0])->andWhere(['Listingbanners.sub_category_id' => 0, 'Listingbanners.type_id' => 0, 'Listingbanners.brand_id' => 0]);
		$this->set('list_banner', $list_banner);
		$this->_categoryId = $category1->id;
		$this->_show_left_panel = true;
		$this->_display_meta = TRUE;
		$this->setMeta($category1);
		$this->set('category_name', $category1);
		$this->render('index');
	}
	public function subcategory($slug = null)
	{

		$listingbanner = TableRegistry::get('Listingbanners');
		$subCategoryObj = TableRegistry::get('SubCategories');
		$sub_category = $subCategoryObj->findBySlug($slug)->contain(['Categories'])->first();
		$list_banner = $listingbanner->find("all", [
			"order" => ["ord" => "asc"]
		])->contain(['Categories', 'SubCategories', 'Types', 'Brands', 'Products'])->where(['Listingbanners.sub_category_id' => $sub_category->id, 'Listingbanners.is_active' => 1, 'Listingbanners.is_deleted' => 0])->andWhere(['Listingbanners.type_id' => 0, 'Listingbanners.brand_id' => 0]);
		$this->set('list_banner', $list_banner);
		$this->set('sub_category_name', $sub_category);
		$this->_subCategoryId = $sub_category->id;
		$this->_categoryId = $sub_category->category_id;
		$this->_display_meta = TRUE;
		$this->setMeta($sub_category);
		$this->render('index');
	}
	public function search()
	{

		if (!empty($this->request->getQuery('q'))) {
			$this->_search = $this->request->getQuery('q');
		}





		$this->render('index');
	}

	public function type($slug = null)
	{

		$listingbanner = TableRegistry::get('Listingbanners');

		$currentDate = date('Y-m-d');
		$typeObj = TableRegistry::get('Types');
		$type = $typeObj->findBySlug($slug)->contain(['Categories', 'SubCategories'])->first();
		$list_banner = $listingbanner->find("all", [
			"order" => ["ord" => "asc"]
		])->contain(['Categories', 'SubCategories', 'Types', 'Brands', 'Products'])->where(['Listingbanners.type_id' => $type->id, 'Listingbanners.is_active' => 1, 'Listingbanners.is_deleted' => 0])->andWhere(['Listingbanners.brand_id' => 0]);
		$this->set('list_banner', $list_banner);
		$this->set('type_name', $type);
		$this->_subCategoryId = $type->sub_category_id;
		$this->_categoryId = $type->category_id;
		$this->_typeId = $type->id;
		$this->_display_meta = TRUE;
		$this->setMeta($type);
		$this->render('index');
	}
	public function brand($slug = null)
	{

		$listingbanner = TableRegistry::get('Listingbanners');

		$currentDate = date('Y-m-d');
		$typeObj = TableRegistry::get('Brands');
		$type = $typeObj->findBySlug($slug)->first();
		$list_banner = $listingbanner->find("all", [
			"order" => ["ord" => "asc"]
		])->contain(['Categories', 'SubCategories', 'Types', 'Brands', 'Products'])->where(['Listingbanners.brand_id' => $type->id, 'Listingbanners.is_active' => 1, 'Listingbanners.is_deleted' => 0]);
		$this->set('list_banner', $list_banner);
		$this->_brandId = $type->id;
		$this->set('brand_id', $type);
		$this->render('index');
	}

	public  function getData()
	{
		$this->_jsonVars = $this->request->input('json_decode');

		//echo $this->_jsonVars->category_id;

		$condition = ['Products.is_active' => 1,  'Products.not_for_sale' => 0, 'Products.is_deleted' => 0, 'Products.parent_id IS' => NULL];


		if (isset($this->_jsonVars->category_id) && intval($this->_jsonVars->category_id) > 0) {
			$condition['Products.category_id'] = $this->_jsonVars->category_id;
		}

		if (isset($this->_jsonVars->sub_category_id) && intval($this->_jsonVars->sub_category_id) > 0) {
			$condition['Products.sub_category_id'] = $this->_jsonVars->sub_category_id;
		}
		if (isset($this->_jsonVars->type_id) && intval($this->_jsonVars->type_id) > 0) {
			$condition['Products.type_id'] = $this->_jsonVars->type_id;
		}
		if (isset($this->_jsonVars->brand_id) && intval($this->_jsonVars->brand_id) > 0) {
			$condition['Products.brand_id'] = $this->_jsonVars->brand_id;
		}



		$product = $this->Products->find()->contain(['Users', 'Categories', 'SubCategories', 'Types', 'UserProducts', 'Brands'])->where($condition);





		if (isset($this->_jsonVars->search) && !empty($this->_jsonVars->search)) {





			$keyword = trim($this->_jsonVars->search);
			$product = $this->Products->find("all", [
				"order" => ["rank" => "desc"]
			])->contain(['Users', 'Categories', 'SubCategories', 'Types', 'UserProducts', 'Brands'])->where($condition)->andWhere(["Products.name LIKE \"%$keyword%\""]);
		}


		$TotalComment = $product->count();

		//->order("is_featured")
		$products = $this->paginate($product);
		$this->autoRender = false;
		$a = $TotalComment;
		$b = 10;
		$lastpage = ($a - $a % $b) / $b + ($TotalComment % 10 > 0 ? 1 : 0);

		$nextpage = $this->request->getQuery('page') + 1;
		$json = json_encode(['data' => $product, 'lastpage' => $lastpage, 'nextpage' => $nextpage, 'success' => 1, 'total' => $TotalComment]);

		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);

		return $this->response;
	}




	public function beforeRender(EventInterface $event)
	{
		parent::beforeRender($event);
		$currentDate = date('Y-m-d');
		$CatObj = TableRegistry::get('Categories');
		$sub_cat = TableRegistry::get('SubCategories');
		$typ = TableRegistry::get('Types');

		if ($this->_show_left_panel) {


			if ($this->_categoryId > 0) {
				$category = $CatObj->find()->contain(['SubCategories', 'SubCategories.Types']);
			} else {
				$category = $CatObj->find()->contain(['SubCategories', 'SubCategories.Types']);
			}

			$this->set('category', $category);
			$this->set('category_id', $this->_categoryId);
			$this->set('search', $this->_search);

			$this->set('sub_category_id', $this->_subCategoryId);
			$this->set('type_id', $this->_typeId);
			$this->set('displayHeader', $this->_displayName);
			$this->set('is_home', $this->_home);
		} else {
			$category = $CatObj->find()->contain(['SubCategories', 'SubCategories.Types']);





			$this->set('category', $category);
			$this->set('category_id', $this->_categoryId);
			$this->set('search', $this->_search);

			$this->set('sub_category_id', $this->_subCategoryId);
			$this->set('type_id', $this->_typeId);
			$this->set('displayHeader', $this->_displayName);
			$this->set('is_home', $this->_home);
		}




		$this->set('show_left_panel',  $this->_show_left_panel);
	}
	public function searchauto()
	{
		//$this->viewBuilder()->layout(false);
		$this->autoRender = false;
		$this->_jsonVars = $this->request->input('json_decode');



		$k = $this->_jsonVars->productId;

		$seller_id = $this->_jsonVars->seller_id;

		if ($k) {

			if ($seller_id) {
				$product = $this->Products->find("all", [
					"order" => ["rank" => "desc"]
				])->Where(["Products.name LIKE \"%$k%\"", 'Products.is_active' => 1, 'Products.is_live' => 1, 'Products.not_for_sale' => 0, 'Products.is_deleted' => 0, 'Products.parent_id IS' => NULL, 'Products.user_id' => $seller_id])->limit(40);
			} else {
				$product = $this->Products->find("all", [
					"order" => ["rank" => "desc"]
				])->Where(["Products.name LIKE \"%$k%\"", 'Products.is_active' => 1, 'Products.is_live' => 1, 'Products.not_for_sale' => 0, 'Products.is_deleted' => 0, 'Products.parent_id IS' => NULL])->limit(40);
			}





			$json = json_encode(['data' => $product]);

			$this->response = $this->response
				->withType('application/json')
				->withStringBody($json);

			return $this->response;
		}
	}
	public function like()
	{

		$this->_jsonVars = $this->request->input('json_decode');

		$table = TableRegistry::getTableLocator()->get('ReviewLikeDislikes');
		$productUser = $table->newEmptyEntity();
		$productUser->user_id = $this->Auth->user('id');
		$productUser->product_id = $this->_jsonVars->product_id;

		$productUser->seller_id = $this->_jsonVars->seller_id;
		$productUser->like_type = 1;
		$productUser->dt = date('Y-m-d');
		$productUser->review_id = $this->_jsonVars->review_id;
		if ($this->Auth->user('id')) {
			$review_like = $table->find()->where(['user_id' => $productUser->user_id, 'review_id' => $this->_jsonVars->review_id, 'like_type' => 1]);

			if ($review_like->count() > 0) {
				$success = false;
				$login = false;
			} else {
				$table->save($productUser);
				$success = true;
				$login = false;
			}
		} else {
			$login = true;
			$success = "10";
		}

		echo json_encode(['success' => $success, 'login' => $login]);
		$this->autoRender = false;
	}
	public function dislike()
	{

		$this->_jsonVars = $this->request->input('json_decode');

		$table = TableRegistry::getTableLocator()->get('ReviewLikeDislikes');
		$productUser = $table->newEmptyEntity();
		$productUser->user_id = $this->Auth->user('id');
		$productUser->product_id = $this->_jsonVars->product_id;

		$productUser->seller_id = $this->_jsonVars->seller_id;
		$productUser->like_type = 2;
		$productUser->dt = date('Y-m-d');
		$productUser->review_id = $this->_jsonVars->review_id;
		if ($this->Auth->user('id')) {
			$review_like = $table->find()->where(['user_id' => $productUser->user_id, 'review_id' => $this->_jsonVars->review_id, 'like_type' => 2]);

			if ($review_like->count() > 0) {
				$success = false;
				$login = false;
			} else {
				$table->save($productUser);
				$success = true;
				$login = false;
			}
		} else {
			$login = true;
			$success = "10";
		}

		echo json_encode(['success' => $success, 'login' => $login]);
		$this->autoRender = false;
	}
	public function checkpin1()
	{
		$this->autoRender = false;
		$this->_jsonVars = $this->request->input('json_decode');
		$vendorPin = $this->_jsonVars->vendor_pin;
		$pincode = $this->_jsonVars->pincode;


		$json = json_encode(['success' => 1]);
		$this->response = $this->response
			->withType('application/json')
			->withStringBody($json);
	}

	public function checkpin()
	{
		$this->autoRender = false;
		$this->_jsonVars = $this->request->input('json_decode');
		$vendorId = $this->_jsonVars->vendor_id;
		$pincode = $this->_jsonVars->pincode;
		//$vendorId=32;
		//$pincode=700142;
		$ZoneSellers = TableRegistry::get('ZoneSellers');
		$ZonePincodes = TableRegistry::get('ZonePincodes');
		$zone = $ZoneSellers->find()->join([
			'Zones' => [
				'table' =>  'zones',
				'type' => 'INNER',
				'conditions' => ['ZoneSellers.zone_id = Zones.id', 'Zones.is_deleted=0']
			],
			'ZonePincodes' => [
				'table' =>  'zone_pincodes',
				'type' => 'INNER',
				'conditions' => ['ZonePincodes.zone_id = Zones.id', 'ZonePincodes.is_deleted=0']
			],
		])->where(['ZonePincodes.pincode' => $pincode, 'ZoneSellers.seller_id' => $vendorId]);


		//->contain(['Zones.ZonePincodes'])->where(['ZoneSellers.seller_id'=>$vendorId,'Zones.ZonePincodes.pincode'=>$pincode]);
		$pincode = $ZonePincodes->find()->where(['pincode' => $pincode]);

		//debug($pincode->count());
		if ($pincode->count() > 0) {
			if ($zone->count() > 0) {

				echo json_encode(['error' => 0]);
			} else {
				echo json_encode(['success' => 1]);
			}
		} else {
			echo json_encode(['invalid' => 0]);
		}
	}
	public function beforeSave($event, $entity, $options)
	{
		if ($entity->isNew()) {
			$entity->is_deleted = 0;
			$entity->create_date = date('Y-m-d H:i:s');
		}
	}
}
