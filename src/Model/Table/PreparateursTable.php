<?php
namespace App\Model\Table;

use App\Model\Entity\Preparateur;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Preparateurs Model
 *
 */
class PreparateursTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {


        $this->table('preparateurs');
        $this->displayField('id');
        $this->primaryKey('id');

        /*Association*/
        $this->hasMany('Societys',[
            'foreignKey' => 'preparateur_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Prestations');

        $this->hasMany('Horraires',[
            'foreignKey' => 'preparateur_id',
            'joinType' => 'INNER',
            'dependent' => true,
   'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Adresses',[
            'foreignKey' => 'preparateur_id',
            'joinType' => 'INNER',
            'dependent' => true,
   'cascadeCallbacks' => true,
        ]);



        /*ACTIATION PLUGIN GEO*/



        parent::initialize($config);
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
            ->integer('society_id')
            ->requirePresence('society_id', 'create')
            ->notEmpty('society_id');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');


        $validator
            ->requirePresence('cp', 'create')
            ->notEmpty('cp')
            ->add('cp', 'length', ['rule' => ['lengthBetween', 5, 5], 'message' => __('Veuillez entrer un code postal valide')]);

        $validator
            ->requirePresence('tel', 'create')
            ->notEmpty('tel')
            ->add('tel', 'length', ['rule' => ['lengthBetween', 10, 10], 'message' => __('Veuillez entrer un numéro de téléphone valide')]);

        $validator
            ->allowEmpty('fax');


        $validator
            ->requirePresence('prestation_id', 'create')
            ->notEmpty('prestation');


        $validator
            ->integer('rayon')
            ->requirePresence('rayon', 'create')
            ->notEmpty('rayon');

        $validator
        ->add('lm1', 'notEmpty', [
                  'rule' => ['comparison', '<' ,'lm2'],
                  'message' => __('Incohérence dans les horaires !')
          ]);


        return $validator;
    }
}
