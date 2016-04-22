<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Horraire Entity.
 *
 * @property int $id
 * @property int $preparateur_id
 * @property string $lm1
 * @property string $lm2
 * @property string $la1
 * @property string $la2
 * @property string $mm1
 * @property string $mm2
 * @property string $ma1
 * @property string $ma2
 * @property string $mem1
 * @property string $mem2
 * @property string $mea1
 * @property string $mea2
 * @property string $jm1
 * @property string $jm2
 * @property string $ja1
 * @property string $ja2
 * @property string $vm1
 * @property string $vm2
 * @property string $va1
 * @property string $va2
 * @property string $sm1
 * @property string $sm2
 * @property string $sa1
 * @property string $sa2
 * @property string $dm1
 * @property string $dm2
 * @property string $da1
 * @property string $da2
 */
class Horraire extends Entity
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
