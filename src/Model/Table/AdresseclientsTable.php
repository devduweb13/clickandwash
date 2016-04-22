<?php
namespace App\Model\Table;

use App\Model\Entity\Adresseclient;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adresseclients Model
 *
 * @property \Cake\ORM\Association\HasMany $Clients
 */
class AdresseclientsTable extends Table
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

        $this->table('adresseclients');
        $this->displayField(['name','adresse','cp','ville']);
        $this->primaryKey('id');

        $this->hasMany('Clients', [
            'foreignKey' => 'adresseclient_id'
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
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->integer('cp')
            ->requirePresence('cp', 'create')
            ->notEmpty('cp');

        $validator
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

        $validator
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->requirePresence('lon', 'create')
            ->notEmpty('lon');

        return $validator;
    }
}
