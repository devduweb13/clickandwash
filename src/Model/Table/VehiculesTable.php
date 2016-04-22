<?php
namespace App\Model\Table;

use App\Model\Entity\Vehicule;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Marques
 * @property \Cake\ORM\Association\BelongsTo $Modeles
 */
class VehiculesTable extends Table
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

        $this->table('vehicules');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Marques', [
            'foreignKey' => 'marque_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modeles', [
            'foreignKey' => 'modele_id',
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
        $rules->add($rules->existsIn(['marque_id'], 'Marques'));
        $rules->add($rules->existsIn(['modele_id'], 'Modeles'));
        return $rules;
    }
}
