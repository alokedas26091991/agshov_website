<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PinCodes Model
 *
 * @property \Cake\ORM\Association\HasMany $BranchPinCodes
 *
 * @method \App\Model\Entity\PinCode get($primaryKey, $options = [])
 * @method \App\Model\Entity\PinCode newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PinCode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PinCode|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PinCode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PinCode[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PinCode findOrCreate($search, callable $callback = null)
 */
class PinCodesTable extends Table
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

        $this->setTable('pin_codes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('BranchPinCodes', [
            'foreignKey' => 'pin_code_id'
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
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        

        return $validator;
    }
}
