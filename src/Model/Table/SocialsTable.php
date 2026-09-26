<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Socials Model
 *
 * @method \App\Model\Entity\Social newEmptyEntity()
 * @method \App\Model\Entity\Social newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Social[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Social get($primaryKey, $options = [])
 * @method \App\Model\Entity\Social findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Social patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Social[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Social|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Social saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SocialsTable extends Table
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

        $this->setTable('socials');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->allowEmptyString('title');

        $validator
            ->scalar('phone_1')
            ->allowEmptyString('phone_1');

        $validator
            ->scalar('phone_2')
            ->allowEmptyString('phone_2');

        $validator
            ->scalar('email_1')
            ->allowEmptyString('email_1');

        $validator
            ->scalar('email_2')
            ->allowEmptyString('email_2');

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->scalar('fb')
            ->allowEmptyString('fb');

        $validator
            ->scalar('instra')
            ->allowEmptyString('instra');

        $validator
            ->scalar('youtube')
            ->allowEmptyString('youtube');

        $validator
            ->scalar('twitter')
            ->allowEmptyString('twitter');

        $validator
            ->scalar('linkdin')
            ->allowEmptyString('linkdin');

        $validator
            ->scalar('whatsapp')
            ->allowEmptyString('whatsapp');

        $validator
            ->scalar('xzender')
            ->allowEmptyString('xzender');

        $validator
            ->scalar('ticktok')
            ->allowEmptyString('ticktok');

        return $validator;
    }
}
