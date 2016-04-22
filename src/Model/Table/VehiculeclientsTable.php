<?php
namespace App\Model\Table;

use App\Model\Entity\Vehiculeclient;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiculeclients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehicules
 * @property \Cake\ORM\Association\HasMany $Clients
 */
class VehiculeclientsTable extends Table
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

        $this->table('vehiculeclients');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Vehicules', [
            'foreignKey' => 'vehicule_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clients', [
            'foreignKey' => 'vehiculeclient_id'
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
            ->integer('annee')
            ->requirePresence('annee', 'create')
            ->notEmpty('annee');

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
        $rules->add($rules->existsIn(['vehicule_id'], 'Vehicules'));
        return $rules;
    }
}
