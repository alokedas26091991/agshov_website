<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BranchPinCodes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Branches
 * @property \Cake\ORM\Association\BelongsTo $PinCodes
 *
 * @method \App\Model\Entity\BranchPinCode get($primaryKey, $options = [])
 * @method \App\Model\Entity\BranchPinCode newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BranchPinCode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BranchPinCode|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BranchPinCode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BranchPinCode[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BranchPinCode findOrCreate($search, callable $callback = null)
 */
class BranchPinCodesTable extends Table
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

        $this->setTable('branch_pin_codes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PinCodes', [
            'foreignKey' => 'pin_code_id',
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
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));
        $rules->add($rules->existsIn(['pin_code_id'], 'PinCodes'));

        return $rules;
    }
}
