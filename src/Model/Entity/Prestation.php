<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prestation Entity.
 *
 * @property int $id
 * @property string $nom
 * @property float $tarif1
 * @property float $tarif2
 * @property float $tarif3
 * @property \Cake\I18n\Time $duree1
 * @property \Cake\I18n\Time $duree2
 * @property \Cake\I18n\Time $duree3
 * @property string $description
 */
class Prestation extends Entity
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
        'id' => true,
    ];
}
