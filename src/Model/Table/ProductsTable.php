<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'LEFT'
        ]);
		$this->belongsTo('SubCategories', [
            'foreignKey' => 'sub_category_id',
            'joinType' => 'LEFT'
        ]);
		$this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('CartItemOriginals', [
            'foreignKey' => 'product_id'
        ]);
		
		
        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('CartItems', [
            'foreignKey' => 'product_id'
        ]);
        
        $this->hasMany('OfflineCartItems', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('ProductImages', [
            'foreignKey' => 'product_id'
        ]);
		$this->hasMany('UserProducts', [
            'foreignKey' => 'product_id'
        ]);
		 $this->hasMany('ChildProducts', [
            'className' => 'Products',
            'foreignKey' => 'parent_id'
        ]);
		 $this->belongsTo('ParentProducts', [
            'className' => 'Products',
            'foreignKey' => 'parent_id'
        ]);
		 $this->belongsTo('Filters', [
            'foreignKey' => 'filter_id',
            'joinType' => 'LEFT'
        ]);
        


		 $this->belongsTo('FilterOptions', [
            'foreignKey' => 'filter_option_id',
            'joinType' => 'LEFT'
        ]);
        
         $this->belongsTo('FilterNews', [
             'className' => 'Filters',
            'foreignKey' => 'filter_id1',
            'joinType' => 'LEFT'
        ]);
        


		 $this->belongsTo('FilterOptionNews', [
		      'className' => 'FilterOptions',
            'foreignKey' => 'filter_option_id1',
            'joinType' => 'LEFT'
        ]);

		$this->addBehavior('Muffin/Slug.Slug', [
            'displayField' => 'name',
            'maxLength' => 255,
            'Model.beforeSave' => 'beforeSave',
            'onUpdate' => true
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->allowEmptyString('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
    public function beforeSave($event, $entity, $options) {
		if($entity->isNew()){
			$entity->is_deleted = 0;
			$entity->create_date = date('Y-m-d');
		}
		if (empty($entity->name) || trim($entity->name) === '') {
			if (!empty($entity->supc)) {
				$entity->name = $entity->supc;
			} elseif (!empty($entity->category_id)) {
				$categories = \Cake\ORM\TableRegistry::getTableLocator()->get('Categories');
				$cat = $categories->find()->where(['id' => $entity->category_id])->first();
				$entity->name = $cat ? $cat->name : 'Product';
			} else {
				$entity->name = 'Product ' . date('YmdHis');
			}
		}
	}

	public function afterSave($event, $entity, $options) {
		if (!empty($entity->id)) {
			$userProductsTable = \Cake\ORM\TableRegistry::getTableLocator()->get('UserProducts');
			$userProduct = $userProductsTable->find()->where(['product_id' => $entity->id])->first();
			if (!$userProduct) {
				$userProduct = $userProductsTable->newEmptyEntity();
				$userProduct->product_id = $entity->id;
			}
			$userProduct->user_id = $entity->user_id ?? 1;
			if (isset($entity->actual_price)) { $userProduct->actual_price = $entity->actual_price; }
			if (isset($entity->offer_price)) { $userProduct->offer_price = $entity->offer_price; }
			if (isset($entity->mrp)) { $userProduct->mrp = $entity->mrp; }
			if (isset($entity->total_quantity)) { $userProduct->total_quantity = $entity->total_quantity; }
			if (isset($entity->is_active)) { $userProduct->is_active = $entity->is_active; }
			if (isset($entity->is_deleted)) { $userProduct->is_deleted = $entity->is_deleted; }
			$userProductsTable->save($userProduct, ['atomic' => false]);
		}
	}
}
