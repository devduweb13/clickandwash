<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Preparateurs
 */
class RdvsTable extends Table
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

        $this->table('rdvs');

        $this->hasMany('Clients', [
            'foreignKey' => 'id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Vehiculeclients', [
            'foreignKey' => 'id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Prestations', [
            'foreignKey' => 'id',
            'joinType' => 'INNER'
        ]);

    }



}
