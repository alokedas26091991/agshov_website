<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilterOptions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Filters
 * @property \Cake\ORM\Association\HasMany $ProductFilterOptionValues
 *
 * @method \App\Model\Entity\FilterOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\FilterOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FilterOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FilterOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilterOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FilterOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FilterOption findOrCreate($search, callable $callback = null)
 */
class FilterOptionsTable extends Table
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

        $this->setTable('filter_options');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Filters', [
            'foreignKey' => 'filter_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProductFilterOptionValues', [
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
            ->allowEmptyString('id', null,'create');

        $validator
            ->requirePresence('name', null,'create')
            ->notEmpty('name');

        $validator
            ->boolean('is_active')
            ->requirePresence('is_active',null, 'create')
            ->notEmpty('is_active');


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
        $rules->add($rules->existsIn(['filter_id'], 'Filters'));

        return $rules;
    }
}
