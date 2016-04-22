<?php
namespace App\Model\Table;

use App\Model\Entity\Client;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vehiculeclients
 * @property \Cake\ORM\Association\BelongsTo $Adresseclients
 */
class ClientsTable extends Table
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

        $this->table('clients');
        $this->displayField(['tel','name']);

        $this->primaryKey('id');

        $this->hasmany('Vehiculeclients', [
            'foreignKey' => 'vehiculeclient_id',
            'joinType' => 'INNER'
        ]);
        $this->hasmany('Adresseclients', [
            'foreignKey' => 'adresseclient_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->requirePresence('mail', 'create')
            ->notEmpty('mail')
            ->add('mail', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('tel')
            ->requirePresence('tel', 'create')
            ->notEmpty('tel');

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
        $rules->add($rules->isUnique(['mail']));

        return $rules;
    }
}
