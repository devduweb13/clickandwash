<?php
namespace App\Model\Table;

use App\Model\Entity\Prestation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prestations Model
 *
 */
class PrestationsTable extends Table
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

        $this->table('prestations');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->notEmpty('nom');

        $validator
            ->numeric('tarif1')
            ->requirePresence('tarif1', 'create')
            ->notEmpty('tarif1');

        $validator
            ->numeric('tarif2')
            ->requirePresence('tarif2', 'create')
            ->notEmpty('tarif2');

        $validator
            ->numeric('tarif3')
            ->requirePresence('tarif3', 'create')
            ->notEmpty('tarif3');

        $validator
            ->numeric('duree1')
            ->requirePresence('duree1', 'create')
            ->notEmpty('duree1');

        $validator
            ->numeric('duree2')
            ->requirePresence('duree2', 'create')
            ->notEmpty('duree2');

        $validator
            ->numeric('duree3')
            ->requirePresence('duree3', 'create')
            ->notEmpty('duree3');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
