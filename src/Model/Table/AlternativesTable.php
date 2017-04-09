<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alternatives Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Questions
 *
 * @method \App\Model\Entity\Alternative get($primaryKey, $options = [])
 * @method \App\Model\Entity\Alternative newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Alternative[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Alternative|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alternative patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Alternative[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Alternative findOrCreate($search, callable $callback = null, $options = [])
 */
class AlternativesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('alternatives');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('content');

        $validator
            ->allowEmpty('comment');

        $validator
            ->boolean('gabarito')
            ->requirePresence('gabarito', 'create')
            ->notEmpty('gabarito');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['question_id'], 'Questions'));

        return $rules;
    }
}
