<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductCharges Model
 *
 * @method \App\Model\Entity\ProductCharge get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductCharge newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductCharge[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductCharge|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductCharge patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCharge[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCharge findOrCreate($search, callable $callback = null)
 */
class ProductChargesTable extends Table
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

        $this->setTable('product_charges');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
		 $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
		$this->belongsTo('SubCategories', [
            'foreignKey' => 'sub_category_id',
            'joinType' => 'LEFT'
        ]);
		$this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'LEFT'
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
            ->allowEmptyString('id', null,'create');

        $validator
            ->requirePresence('name', null,'create')
            ->notEmpty('name');



       

        return $validator;
    }
}
