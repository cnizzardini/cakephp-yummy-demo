<?php
namespace YummyDemo\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Divisions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Conferences
 * @property \Cake\ORM\Association\HasMany $Teams
 *
 * @method \YummyDemo\Model\Entity\Division get($primaryKey, $options = [])
 * @method \YummyDemo\Model\Entity\Division newEntity($data = null, array $options = [])
 * @method \YummyDemo\Model\Entity\Division[] newEntities(array $data, array $options = [])
 * @method \YummyDemo\Model\Entity\Division|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \YummyDemo\Model\Entity\Division patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \YummyDemo\Model\Entity\Division[] patchEntities($entities, array $data, array $options = [])
 * @method \YummyDemo\Model\Entity\Division findOrCreate($search, callable $callback = null, $options = [])
 */
class DivisionsTable extends Table
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

        $this->setTable('divisions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Conferences', [
            'foreignKey' => 'conference_id',
            'joinType' => 'INNER',
            'className' => 'YummyDemo.Conferences'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'division_id',
            'className' => 'YummyDemo.Teams'
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
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['conference_id'], 'Conferences'));

        return $rules;
    }
}
