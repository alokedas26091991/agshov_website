<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SeoPages Model
 *
 * @method \App\Model\Entity\SeoPage newEmptyEntity()
 * @method \App\Model\Entity\SeoPage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SeoPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SeoPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\SeoPage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SeoPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SeoPage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SeoPage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SeoPage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 */
class SeoPagesTable extends Table
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

        $this->setTable('seo_pages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Muffin/Slug.Slug', [
            'field' => 'name',
            'implementedEvents' => [
                'Model.beforeSave' => 'beforeSave'
            ]
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 256)
            ->allowEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 256)
            ->allowEmptyString('slug');

        $validator
            ->scalar('meta_title')
            ->maxLength('meta_title', 512)
            ->allowEmptyString('meta_title');

        $validator
            ->scalar('meta_keywords')
            ->allowEmptyString('meta_keywords');

        $validator
            ->scalar('meta_desc')
            ->allowEmptyString('meta_desc');

        $validator
            ->scalar('content')
            ->allowEmptyString('content');

        $validator
            ->scalar('robots')
            ->maxLength('robots', 64)
            ->allowEmptyString('robots');

        $validator
            ->scalar('canonical')
            ->maxLength('canonical', 256)
            ->allowEmptyString('canonical');

        return $validator;
    }
}
