<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CommentsTable&\Cake\ORM\Association\HasMany $Comments
 *
 * @method \App\Model\Entity\Post newEmptyEntity()
 * @method \App\Model\Entity\Post newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PostsTable extends Table
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

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'post_id',
        ]);

        $this->addBehavior('Muffin/Slug.Slug', [
            'displayField'=>'title',
            'onUpdate' => true,
            'Model.beforeSave' => 'beforeSave'
         ]);

        

         $this->belongsTo('Postcategories', [
            'foreignKey' => 'category',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Tags', [
            'foreignKey' => 'tag',
            'propertyName' => 'post_tags',
            'joinType' => 'INNER',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        // $validator
        //     ->boolean('post_type')
        //     ->notEmptyString('post_type');

        // $validator
        //     ->scalar('title')
        //     ->requirePresence('title', 'create')
        //     ->notEmptyString('title');

        // // $validator
        // //     ->scalar('category')
        // //     ->requirePresence('category', 'create')
        // //     ->notEmptyString('category');

        // // $validator
        // //     ->scalar('tag')
        // //     ->requirePresence('tag', 'create')
        // //     ->notEmptyString('tag');

        // $validator
        //     ->scalar('details')
        //     ->requirePresence('details', 'create')
        //     ->notEmptyString('details');

        // $validator
        //     ->scalar('slug')
        //     ->allowEmptyString('slug');

        // $validator
        //     ->boolean('is_popular')
        //     ->notEmptyString('is_popular');

        // $validator
        //     ->scalar('banner_photo')
        //     ->allowEmptyString('banner_photo');

        // $validator
        //     ->scalar('archive')
        //     ->allowEmptyString('archive');

        // $validator
        //     ->date('post_date')
        //     ->allowEmptyDate('post_date');

        // $validator
        //     ->integer('owner')
        //     ->allowEmptyString('owner');

        // $validator
        //     ->boolean('status')
        //     ->notEmptyString('status');

        // $validator
        //     ->scalar('meta_title')
        //     ->requirePresence('meta_title', 'create')
        //     ->notEmptyString('meta_title');

        // $validator
        //     ->scalar('meta_keywords')
        //     ->requirePresence('meta_keywords', 'create')
        //     ->notEmptyString('meta_keywords');

        // $validator
        //     ->scalar('robots')
        //     ->requirePresence('robots', 'create')
        //     ->notEmptyString('robots');

        // $validator
        //     ->scalar('canonical')
        //     ->requirePresence('canonical', 'create')
        //     ->notEmptyString('canonical');

        // $validator
        //     ->scalar('meta_description')
        //     ->requirePresence('meta_description', 'create')
        //     ->notEmptyString('meta_description');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
    //    $rules->add($rules->existsIn('category', 'Postcategories'), ['errorField' => 'category']);
    //     $rules->add($rules->existsIn('tag', 'Tags'), ['errorField' => 'tag']);

        return $rules;
    }
}
