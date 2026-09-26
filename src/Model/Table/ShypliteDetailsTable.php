<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShypliteDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InvoiceItems
 *
 * @method \App\Model\Entity\ShypliteDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShypliteDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShypliteDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShypliteDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShypliteDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShypliteDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShypliteDetail findOrCreate($search, callable $callback = null)
 */
class ShypliteDetailsTable extends Table
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

        $this->setTable('shyplite_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('InvoiceItems', [
            'foreignKey' => 'invoice_item_id',
            'joinType' => 'INNER'
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
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->allowEmptyString('shipment');

        $validator
            ->allowEmptyString('carreierName');

        $validator
            ->allowEmptyString('manifestID');

        $validator
            ->allowEmptyString('awbNo');

        $validator
            ->integer('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

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
        $rules->add($rules->existsIn(['invoice_item_id'], 'InvoiceItems'));

        return $rules;
    }
}
