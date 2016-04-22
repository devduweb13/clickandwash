<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adress Entity.
 *
 * @property int $id
 * @property int $preparateur_id
 * @property \App\Model\Entity\Preparateur $preparateur
 * @property string $lat
 * @property string $lon
 * @property int $rayon
 */
class Adress extends Entity
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
