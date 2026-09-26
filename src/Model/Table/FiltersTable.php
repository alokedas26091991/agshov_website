<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Filters Model
 *
 * @property \Cake\ORM\Association\HasMany $FilterCategories
 * @property \Cake\ORM\Association\HasMany $FilterOptions
 *
 * @method \App\Model\Entity\Filter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Filter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Filter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Filter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Filter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Filter findOrCreate($search, callable $callback = null)
 */
class FiltersTable extends Table
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

        $this->setTable('filters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('FilterCategories', [
            'foreignKey' => 'filter_id'
        ]);
        $this->hasMany('FilterOptions', [
            'foreignKey' => 'filter_id'
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
            ->requirePresence('is_active', null,'create')
            ->notEmpty('is_active');

       

        return $validator;
    }
}
