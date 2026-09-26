<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sellers
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\HasMany $CartItemOriginals
 * @property \Cake\ORM\Association\HasMany $CartItems
 * @property \Cake\ORM\Association\HasMany $ComboItems
 * @property \Cake\ORM\Association\HasMany $Combos
 * @property \Cake\ORM\Association\HasMany $InvoiceCombos
 * @property \Cake\ORM\Association\HasMany $InvoiceCourseHistory
 * @property \Cake\ORM\Association\HasMany $InvoiceCourses
 * @property \Cake\ORM\Association\HasMany $InvoiceItems
 * @property \Cake\ORM\Association\HasMany $OfflineCartItems
 * @property \Cake\ORM\Association\HasMany $Payments
 * @property \Cake\ORM\Association\HasMany $Products
 * @property \Cake\ORM\Association\HasMany $RefundRequests
 * @property \Cake\ORM\Association\HasMany $UserCoupons
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null)
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'seller_id',
            'joinType' => 'INNER'
        ]);
       
       /* $this->hasMany('CartItemOriginals', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('CartItems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ComboItems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Combos', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('InvoiceCombos', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('InvoiceCourseHistory', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('InvoiceCourses', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('InvoiceItems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('OfflineCartItems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('RefundRequests', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('UserCoupons', [
            'foreignKey' => 'item_id'
        ]);*/
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

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

       

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
        
        //$rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
