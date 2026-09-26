<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coupon Entity
 *
 * @property int $id
 * @property string $coupon_code
 * @property string $description
 * @property string $discount_type
 * @property float $discount_value
 * @property bool $app_only
 * @property int $is_featured
 * @property string $page_link
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $expiry_date
 * @property \Cake\I18n\Time $create_date
 * @property int $created_by
 * @property \Cake\I18n\Time $last_update_date
 * @property int $last_updated_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\CartItemOriginal[] $cart_item_originals
 * @property \App\Model\Entity\CartItem[] $cart_items
 * @property \App\Model\Entity\CartOriginal[] $cart_originals
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\CourseCoupon[] $course_coupons
 * @property \App\Model\Entity\InvoiceItem[] $invoice_items
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\OfflineCartItem[] $offline_cart_items
 * @property \App\Model\Entity\OfflineCart[] $offline_carts
 * @property \App\Model\Entity\UserCoupon[] $user_coupons
 */
class Coupon extends Entity
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
