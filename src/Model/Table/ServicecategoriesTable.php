<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicecategories Model
 *
 * @property \App\Model\Table\ServicesubcategoriesTable&\Cake\ORM\Association\HasMany $Servicesubcategories
 *
 * @method \App\Model\Entity\Servicecategory newEmptyEntity()
 * @method \App\Model\Entity\Servicecategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Servicecategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicecategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicecategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Servicecategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicecategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicecategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicecategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicecategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Servicecategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Servicecategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Servicecategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ServicecategoriesTable extends Table
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

        $this->setTable('servicecategories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Servicesubcategories', [
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
}
