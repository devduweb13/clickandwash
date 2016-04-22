<?php
namespace App\Model\Table;

use App\Model\Entity\Adress;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Preparateurs
 */
class AdressesTable extends Table
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

        $this->table('adresses');
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
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->requirePresence('lon', 'create')
            ->notEmpty('lon');

        $validator
            ->integer('rayon')
            ->requirePresence('rayon', 'create')
            ->notEmpty('rayon');

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
