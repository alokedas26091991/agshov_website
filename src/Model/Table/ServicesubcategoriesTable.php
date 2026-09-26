<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicesubcategories Model
 *
 * @property \App\Model\Table\ServicecategoriesTable&\Cake\ORM\Association\BelongsTo $Servicecategories
 *
 * @method \App\Model\Entity\Servicesubcategory newEmptyEntity()
 * @method \App\Model\Entity\Servicesubcategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Servicesubcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicesubcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicesubcategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Servicesubcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicesubcategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicesubcategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicesubcategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicesubcategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Servicesubcategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Servicesubcategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Servicesubcategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ServicesubcategoriesTable extends Table
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

        $this->setTable('servicesubcategories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Servicecategories', [
            'foreignKey' => 'servicecategory_id',
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
            ->scalar('name')
            ->allowEmptyString('name');

        $validator
            ->integer('servicecategory_id')
            ->allowEmptyString('servicecategory_id');

        $validator
            ->boolean('is_active')
            ->allowEmptyString('is_active');

        $validator
            ->boolean('is_deleted')
            ->allowEmptyString('is_deleted');

        $validator
            ->date('created_at')
            ->allowEmptyDate('created_at');

        $validator
            ->date('updated_at')
            ->allowEmptyDate('updated_at');

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
        $rules->add($rules->existsIn('servicecategory_id', 'Servicecategories'), ['errorField' => 'servicecategory_id']);

        return $rules;
    }
}
