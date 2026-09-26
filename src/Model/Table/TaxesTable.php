<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Taxes Model
 *
 * @property \Cake\ORM\Association\HasMany $InvoiceTaxes
 *
 * @method \App\Model\Entity\Tax get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tax newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tax[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tax|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tax patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tax[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tax findOrCreate($search, callable $callback = null)
 */
class TaxesTable extends Table
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

        $this->setTable('taxes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('InvoiceTaxes', [
            'foreignKey' => 'tax_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        

        return $validator;
    }
	public function getTaxesForProducts() {
        $taxes = $this->find('all');
        $return = [];
        $i = 0;
        foreach ($taxes as $t) {
            $return[$i]['id'] = $t->id;
            $return[$i]['name'] = $t->name;
            $return[$i]['tax_percentage'] = $t->tax_percentage;
            $i++;
        }

        return $return;
    }
}
