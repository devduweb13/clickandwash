<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Preparateur Entity.
 *
 * @property int $id
 * @property string $society_id
 * @property string $nom
 * @property string $adresse
 * @property string $ville
 * @property int $cp
 * @property string $tel
 * @property string $fax
 * @property string $prestation
 * @property int $lavagesec
 * @property int $lavageeau
 * @property int $rayon
 * @property string $password
 */
class Preparateur extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
    $hasher = new DefaultPasswordHasher();
    return $hasher->hash($value);
    }
}
