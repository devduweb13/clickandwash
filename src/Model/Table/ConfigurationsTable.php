<?php
namespace App\Model\Table;

use App\Model\Entity\Configuration;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Configurations Model
 *
 */
class ConfigurationsTable extends Table
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

        $this->table('configurations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Tvas',[
            'foreignKey' => 'id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Timestamp');
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
            ->requirePresence('nom_exp', 'create')
            ->notEmpty('nom_exp');

        $validator
            ->requirePresence('email_exp', 'create')
            ->notEmpty('email_exp');

        $validator
            ->numeric('taux_tva')
            ->requirePresence('taux_tva', 'create')
            ->notEmpty('taux_tva');

        return $validator;
    }
}
