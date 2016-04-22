<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adresseclient Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $adresse
 * @property int $cp
 * @property string $ville
 * @property string $lat
 * @property string $lon
 * @property \App\Model\Entity\Client[] $clients
 */
class Adresseclient extends Entity
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
