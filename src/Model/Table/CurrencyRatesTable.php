<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CurrencyRates Model
 *
 * @method \App\Model\Entity\CurrencyRate get($primaryKey, $options = [])
 * @method \App\Model\Entity\CurrencyRate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CurrencyRate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CurrencyRate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CurrencyRate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CurrencyRate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CurrencyRate findOrCreate($search, callable $callback = null)
 */
class CurrencyRatesTable extends Table
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

        $this->setTable('currency_rates');
        $this->setDisplayField('id');
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
            ->integer('currency')
            ->requirePresence('currency', 'create')
            ->notEmpty('currency')
            ->add('currency', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->numeric('rate')
            ->requirePresence('rate', 'create')
            ->notEmpty('rate');

        

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
        $rules->add($rules->isUnique(['currency']));

        return $rules;
    }
}
