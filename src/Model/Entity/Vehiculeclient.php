<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiculeclient Entity.
 *
 * @property int $id
 * @property int $vehicule_id
 * @property \App\Model\Entity\Vehicule $vehicule
 * @property int $annee
 * @property \App\Model\Entity\Client[] $clients
 */
class Vehiculeclient extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
