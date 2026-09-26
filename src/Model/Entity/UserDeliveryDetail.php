<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserDeliveryDetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $alternate_phone
 * @property int $address_type
 * @property string $home_address
 * @property string $work_address
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $pin
 * @property \Cake\I18n\Time $create_date
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\User $user
 */
class UserDeliveryDetail extends Entity
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
        'id' => false
    ];
}
