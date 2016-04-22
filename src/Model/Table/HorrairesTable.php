<?php
namespace App\Model\Table;

use App\Model\Entity\Horraire;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horraires Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Preparateurs
 */
class HorrairesTable extends Table
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

        $this->table('horraires');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Preparateurs', [
            'foreignKey' => 'preparateur_id',
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
            ->requirePresence('lm1', 'create')
            ->notEmpty('lm1');

        $validator
            ->requirePresence('lm2', 'create')
            ->notEmpty('lm2');

        $validator
            ->requirePresence('la1', 'create')
            ->notEmpty('la1');

        $validator
            ->requirePresence('la2', 'create')
            ->notEmpty('la2');

        $validator
            ->requirePresence('mm1', 'create')
            ->notEmpty('mm1');

        $validator
            ->requirePresence('mm2', 'create')
            ->notEmpty('mm2');

        $validator
            ->requirePresence('ma1', 'create')
            ->notEmpty('ma1');

        $validator
            ->requirePresence('ma2', 'create')
            ->notEmpty('ma2');

        $validator
            ->requirePresence('mem1', 'create')
            ->notEmpty('mem1');

        $validator
            ->requirePresence('mem2', 'create')
            ->notEmpty('mem2');

        $validator
            ->requirePresence('mea1', 'create')
            ->notEmpty('mea1');

        $validator
            ->requirePresence('mea2', 'create')
            ->notEmpty('mea2');

        $validator
            ->requirePresence('jm1', 'create')
            ->notEmpty('jm1');

        $validator
            ->requirePresence('jm2', 'create')
            ->notEmpty('jm2');

        $validator
            ->requirePresence('ja1', 'create')
            ->notEmpty('ja1');

        $validator
            ->requirePresence('ja2', 'create')
            ->notEmpty('ja2');

        $validator
            ->requirePresence('vm1', 'create')
            ->notEmpty('vm1');

        $validator
            ->requirePresence('vm2', 'create')
            ->notEmpty('vm2');

        $validator
            ->requirePresence('va1', 'create')
            ->notEmpty('va1');

        $validator
            ->requirePresence('va2', 'create')
            ->notEmpty('va2');

        $validator
            ->requirePresence('sm1', 'create')
            ->notEmpty('sm1');

        $validator
            ->requirePresence('sm2', 'create')
            ->notEmpty('sm2');

        $validator
            ->requirePresence('sa1', 'create')
            ->notEmpty('sa1');

        $validator
            ->requirePresence('sa2', 'create')
            ->notEmpty('sa2');

        $validator
            ->requirePresence('dm1', 'create')
            ->notEmpty('dm1');

        $validator
            ->requirePresence('dm2', 'create')
            ->notEmpty('dm2');

        $validator
            ->requirePresence('da1', 'create')
            ->notEmpty('da1');

        $validator
            ->requirePresence('da2', 'create')
            ->notEmpty('da2');

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
        $rules->add($rules->existsIn(['preparateur_id'], 'Preparateurs'));
        return $rules;
    }
}
