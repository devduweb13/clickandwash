<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Society Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $contact
 * @property string $adresse
 * @property string $mail
 * @property int $cp
 * @property string $tel
 * @property string $fax
 * @property float $taux_comission
 * @property int $tva
 * @property int $iban
 * @property int $siret
 * @property string $password
 * @property bool $tva_ass
 * @property string $passwordconfirm
 * @property string $ville
 */
class Society extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */


protected function _setPassword($value)
{
$hasher = new DefaultPasswordHasher();
return $hasher->hash($value);
}

protected function _setPasswordconfirm($value)
{
 $hasher = new DefaultPasswordHasher();
 return $hasher->hash($value);
}





}
