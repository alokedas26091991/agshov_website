<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserProduct Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $total_quantity
 * @property int $total_quantity_sale
 * @property float $actual_price
 * @property float $offer_price
 * @property float $discount
 * @property bool $is_live
 * @property bool $is_active
 * @property int $in_stock
 * @property \Cake\I18n\Time $create_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product $product
 */
class UserProduct extends Entity
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
