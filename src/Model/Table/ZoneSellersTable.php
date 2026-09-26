<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ZoneSellers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sellers
 * @property \Cake\ORM\Association\BelongsTo $Zones
 *
 * @method \App\Model\Entity\ZoneSeller get($primaryKey, $options = [])
 * @method \App\Model\Entity\ZoneSeller newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ZoneSeller[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ZoneSeller|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ZoneSeller patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ZoneSeller[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ZoneSeller findOrCreate($search, callable $callback = null)
 */
class ZoneSellersTable extends Table
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

        $this->setTable('zone_sellers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

     
        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
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
       
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));

        return $rules;
    }
}
