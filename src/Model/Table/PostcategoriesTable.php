<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Postcategories Model
 *
 * @property \App\Model\Table\PostcategoriesTable&\Cake\ORM\Association\BelongsTo $ParentPostcategories
 * @property \App\Model\Table\PostcategoriesTable&\Cake\ORM\Association\HasMany $ChildPostcategories
 *
 * @method \App\Model\Entity\Postcategory newEmptyEntity()
 * @method \App\Model\Entity\Postcategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Postcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Postcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Postcategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Postcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Postcategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Postcategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Postcategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Postcategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Postcategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Postcategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Postcategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PostcategoriesTable extends Table
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

        $this->setTable('postcategories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentPostcategories', [
            'className' => 'Postcategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildPostcategories', [
            'className' => 'Postcategories',
            'foreignKey' => 'parent_id',
        ]);

        $this->hasMany('Posts', [
            'foreignKey' => 'category',
        ]);

        $this->addBehavior('Muffin/Slug.Slug', [
            'displayField'=>'name',
            'Model.beforeSave' => 'beforeSave'
         ]);
        
        

        $this->addBehavior('Timestamp', [
            'fields' => ['created' => 'created_at', 'modified' => 'updated_at']
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
            ->scalar('parent_id')
            ->maxLength('parent_id', 255)
            ->allowEmptyString('parent_id');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('details')
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

        $validator
            ->scalar('banner_photo')
            ->allowEmptyString('banner_photo');

        $validator
            ->scalar('slug')
            ->allowEmptyString('slug');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

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
        // $rules->add($rules->existsIn('parent_id', 'ParentPostcategories'), ['errorField' => 'parent_id']);
       
        return $rules;
    }
}
