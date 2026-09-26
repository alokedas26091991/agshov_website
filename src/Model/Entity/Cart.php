<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cart Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $ipaddress
 * @property float $gross_amt
 * @property int $coupon_id
 * @property \App\Model\Entity\Coupon $coupon
 * @property float $discount_amt
 * @property float $tax_amt
 * @property float $net_amt
 * @property string utm_source
 * @property string utm_medium
 * @property string utm_campaign
 * @property string affiliate_code
 * @property \Cake\I18n\Time $create_date
 * @property bool $is_deleted
 */
class Cart extends Entity
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
