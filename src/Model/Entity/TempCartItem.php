<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TempCartItem Entity
 *
 * @property int $id
 * @property int $cart_id
 * @property int $parent_id
 * @property int $item_id
 * @property int $quantity
 * @property float $item_gross_amount
 * @property int $coupon_id
 * @property float $discount_amt
 * @property float $item_net_amount
 * @property int $combo_id
 * @property int $product_id
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Cart $cart
 * @property \App\Model\Entity\ParentTempCartItem $parent_temp_cart_item
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Coupon $coupon
 * @property \App\Model\Entity\Combo $combo
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\ChildTempCartItem[] $child_temp_cart_items
 */
class TempCartItem extends Entity
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
