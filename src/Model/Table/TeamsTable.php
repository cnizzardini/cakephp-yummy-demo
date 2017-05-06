<?php
namespace YummyDemo\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teams Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Divisions
 *
 * @method \YummyDemo\Model\Entity\Team get($primaryKey, $options = [])
 * @method \YummyDemo\Model\Entity\Team newEntity($data = null, array $options = [])
 * @method \YummyDemo\Model\Entity\Team[] newEntities(array $data, array $options = [])
 * @method \YummyDemo\Model\Entity\Team|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \YummyDemo\Model\Entity\Team patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \YummyDemo\Model\Entity\Team[] patchEntities($entities, array $data, array $options = [])
 * @method \YummyDemo\Model\Entity\Team findOrCreate($search, callable $callback = null, $options = [])
 */
class TeamsTable extends Table
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

        $this->setTable('teams');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Divisions', [
            'foreignKey' => 'division_id',
            'joinType' => 'INNER',
            'className' => 'YummyDemo.Divisions'
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
            ->boolean('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('abbreviation', 'create')
            ->notEmpty('abbreviation');

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
        $rules->add($rules->existsIn(['division_id'], 'Divisions'));

        return $rules;
    }
}
