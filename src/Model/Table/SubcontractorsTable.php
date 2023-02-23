<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subcontractors Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\HasMany $Projects
 *
 * @method \App\Model\Entity\Subcontractor newEmptyEntity()
 * @method \App\Model\Entity\Subcontractor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Subcontractor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subcontractor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subcontractor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Subcontractor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subcontractor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subcontractor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subcontractor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subcontractor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Subcontractor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Subcontractor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Subcontractor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SubcontractorsTable extends Table
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

        $this->setTable('subcontractors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'subcontractor_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('speciality')
            ->maxLength('speciality', 50)
            ->requirePresence('speciality', 'create')
            ->notEmptyString('speciality');

        $validator
            ->scalar('business')
            ->maxLength('business', 50)
            ->requirePresence('business', 'create')
            ->notEmptyString('business');

        $validator
            ->scalar('phone_no')
            ->maxLength('phone_no', 10)
            ->requirePresence('phone_no', 'create')
            ->notEmptyString('phone_no');

        $validator
            ->scalar('street')
            ->maxLength('street', 50)
            ->allowEmptyArray('street');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 3)
            ->notEmptyString('state');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 4)
            ->notEmptyString('postcode');

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
