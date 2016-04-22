<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


/**
 * Client Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property boolean $active
 * @property string $name
 * @property string $prenom
 * @property int $vehiculeclient_id
 * @property \App\Model\Entity\Vehiculeclient $vehiculeclient
 * @property int $adresseclient_id
 * @property \App\Model\Entity\Adresseclient $adresseclient
 * @property string $mail
 * @property int $tel
 */
class Client extends Entity
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

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

}
