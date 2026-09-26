<?php
declare(strict_types=1);
namespace App\Model\Table;

use App\Model\Entity\Invoice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use ArrayObject;

/**
 * Invoices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Coupons
 */
class InvoicesTable extends Table
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

        $this->setTable('invoices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('UserDeliveryDetails', [
            'foreignKey' => 'user_delivery_detail_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('InvoiceItems',[
            'foreignKey'=>'invoice_id'
        ]);
		 $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
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
            ->requirePresence('ipaddress',null, 'create')
            ->notEmpty('ipaddress');

        $validator
            ->numeric('gross_amt')
            ->requirePresence('gross_amt',null, 'create')
            ->notEmpty('gross_amt');

        $validator
            ->numeric('discount_amt')
            ->requirePresence('discount_amt',null, 'create')
            ->notEmpty('discount_amt');

        $validator
            ->numeric('tax_amt')
            ->requirePresence('tax_amt',null, 'create')
            ->notEmpty('tax_amt');

        $validator
            ->numeric('net_amt')
            ->requirePresence('net_amt',null, 'create')
            ->notEmpty('net_amt');

        /*$validator
            ->date('create_date')
            ->requirePresence('create_date', 'create')
            ->notEmpty('create_date');

        $validator
            ->boolean('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');*/

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        //$rules->add($rules->existsIn(['coupon_id'], 'Coupons'));
        return $rules;
    }
    
    public function beforeSave(\Cake\Event\Event $event, \Cake\Datasource\EntityInterface $entity,  ArrayObject $options)
    {
        if($entity->isNew())
        {
            $query = $this->find();
            $max = $query->select(['max' => $query->func()->count('*')])->first();
            $max_id = $max->max;
            $f_year = (date('m')>=4) ? date('Y'):date('Y') - 1;
            $entity->invoice_no = "ORD".$max_id.$f_year;
            $entity->creation_date = date('Y-m-d');
        }
    }
}
