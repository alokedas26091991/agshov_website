<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coupons Model
 *
 * @property \Cake\ORM\Association\HasMany $CartItemOriginals
 * @property \Cake\ORM\Association\HasMany $CartItems
 * @property \Cake\ORM\Association\HasMany $CartOriginals
 * @property \Cake\ORM\Association\HasMany $Carts
 * @property \Cake\ORM\Association\HasMany $InvoiceItems
 * @property \Cake\ORM\Association\HasMany $Invoices
 * @property \Cake\ORM\Association\HasMany $OfflineCartItems
 * @property \Cake\ORM\Association\HasMany $OfflineCarts
 * @property \Cake\ORM\Association\HasMany $ProductCoupons
 * @property \Cake\ORM\Association\HasMany $TempCartItems
 * @property \Cake\ORM\Association\HasMany $TempCarts
 * @property \Cake\ORM\Association\HasMany $UserCoupons
 *
 * @method \App\Model\Entity\Coupon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coupon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coupon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coupon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coupon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coupon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coupon findOrCreate($search, callable $callback = null)
 */
class CouponsTable extends Table
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

        $this->setTable('coupons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('CartItemOriginals', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('CartItems', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('CartOriginals', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('Carts', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('InvoiceItems', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('OfflineCartItems', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('OfflineCarts', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('ProductCoupons', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('TempCartItems', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('TempCarts', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->hasMany('UserCoupons', [
            'foreignKey' => 'coupon_id'
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
            ->allowEmptyString('id',null, 'create');

        $validator
            ->requirePresence('coupon_code',null, 'create')
            ->notEmpty('coupon_code')
            ->add('coupon_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('coupon_type')
            ->requirePresence('coupon_type', null,'create')
            ->notEmpty('coupon_type');

        $validator
            ->requirePresence('description',null, 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('discount_type',null, 'create')
            ->notEmpty('discount_type');

        $validator
            ->numeric('discount_value')
            ->requirePresence('discount_value',null, 'create')
            ->notEmpty('discount_value');

        

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
        $rules->add($rules->isUnique(['coupon_code']));

        return $rules;
    }
	public function beforeSave($event, $entity, $options) 
    {
        if($entity->isNew()){
            $entity->set('create_date', date('Y-m-d'));
			 $entity->set('is_deleted', 0);
        }
    }
}
