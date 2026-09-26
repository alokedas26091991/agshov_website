<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkuVariations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $Filters
 * @property \Cake\ORM\Association\BelongsTo $FilterOptions
 *
 * @method \App\Model\Entity\SkuVariation get($primaryKey, $options = [])
 * @method \App\Model\Entity\SkuVariation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SkuVariation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SkuVariation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SkuVariation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SkuVariation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SkuVariation findOrCreate($search, callable $callback = null)
 */
class SkuVariationsTable extends Table
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

        $this->setTable('sku_variations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsTo('Filters', [
            'foreignKey' => 'filter_id'
        ]);
        $this->belongsTo('FilterOptions', [
            'foreignKey' => 'filter_option_id'
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

        $validator
            ->integer('filter_type')
            ->allowEmptyString('filter_type');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        //$rules->add($rules->existsIn(['filter_id'], 'Filters'));
       // $rules->add($rules->existsIn(['filter_option_id'], 'FilterOptions'));

        return $rules;
    }
}
