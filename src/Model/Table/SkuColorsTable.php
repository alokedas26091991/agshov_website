<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkuColors Model
 *
 * @method \App\Model\Entity\SkuColor get($primaryKey, $options = [])
 * @method \App\Model\Entity\SkuColor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SkuColor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SkuColor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SkuColor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SkuColor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SkuColor findOrCreate($search, callable $callback = null)
 */
class SkuColorsTable extends Table
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

        $this->setTable('sku_colors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        

        return $validator;
    }
}
