<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TempCartItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Carts
 * @property \Cake\ORM\Association\BelongsTo $ParentTempCartItems
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Coupons
 * @property \Cake\ORM\Association\BelongsTo $Combos
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\HasMany $ChildTempCartItems
 *
 * @method \App\Model\Entity\TempCartItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\TempCartItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TempCartItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TempCartItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TempCartItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TempCartItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TempCartItem findOrCreate($search, callable $callback = null)
 */
class TempCartItemsTable extends Table
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

        $this->setTable('temp_cart_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TempCarts', [
            'foreignKey' => 'cart_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ParentTempCartItems', [
            'className' => 'TempCartItems',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Coupons', [
            'foreignKey' => 'coupon_id',
			'joinType' => 'LEFT'
        ]);
       
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('ChildTempCartItems', [
            'className' => 'TempCartItems',
            'foreignKey' => 'parent_id'
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
            ->allowEmptyString('id', 'create');

        

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
        $rules->add($rules->existsIn(['cart_id'], 'TempCarts'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentTempCartItems'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
       ;

        return $rules;
    }
}
