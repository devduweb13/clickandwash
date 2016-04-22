<?php
namespace App\Model\Table;

use App\Model\Entity\Society;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Societys Model
 *
 */
class SocietysTable extends Table
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

        $this->table('societys');
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
            ->notEmpty('name',"Un nom de société est obligatoire")
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table' , 'message' => __('Une société avec ce nom est déja connu')]);


        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->requirePresence('mail', 'create')
            ->notEmpty('mail')
            ->add('mail', 'unique', ['rule' => 'validateUnique', 'provider' => 'table' , 'message' => __('Une société avec cette email est déja connu')]);

        $validator
            ->integer('cp')
            ->requirePresence('cp', 'create')
            ->notEmpty('cp')
            ->add('cp', 'length', ['rule' => ['lengthBetween', 5, 5], 'message' => __('Veuillez entrer un code postal valide')]);

        $validator
            ->requirePresence('tel', 'create')
            ->notEmpty('tel');



        $validator
            ->numeric('taux_comission')
            ->requirePresence('taux_comission', 'create')
            ->notEmpty('taux_comission');


        $validator
            ->notEmpty('tva', 'Veuillez renseigner un numéro de TVA valide', function ($context) {
                return !empty($context['data']['tva_ass']);
              });



        $validator
            ->requirePresence('iban', 'create')
            ->notEmpty('iban')
            ->add('iban', 'unique', ['rule' => 'validateUnique', 'provider' => 'table' , 'message' => __('Une société avec cette iban est déja connu')])
            ->add('iban', 'length', ['rule' => ['lengthBetween', 27 , 34], 'message' => __('Veuillez entrer un iban valide de 27 caractères')]);

        $validator
            ->requirePresence('siret', 'create')
            ->notEmpty('siret')
            ->add('siret', 'unique', ['rule' => 'validateUnique', 'provider' => 'table' , 'message' => __('Une société avec ce siret est déja connu')])
            ->add('siret', 'length', ['rule' => ['lengthBetween', 14 , 14], 'message' => __('Veuillez entrer un siret valide de 14 caractères')]);

        $validator
            ->requirePresence('password', 'create')
            ->allowEmpty('password', 'update')
            ->add('password', 'length', ['rule' => ['lengthBetween', 8 , 60], 'message' => __('Veuillez entrer un mot de passe de 8 caractères min')]);


        $validator
            ->requirePresence('passwordconfirm', 'create')
            ->allowEmpty('passwordconfirm', 'update')
            ->add('passwordconfirm', 'compareWith', ['rule' => ['compareWith', 'password' ], 'message' => __('Les mots de passe ne sont pas identique')]);


        $validator
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

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
