<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property int $type
 * @property int $seller_id
 * @property string $name
 * @property string $name_in_english
 * @property float $actual_price
 * @property float $offer_price
 * @property string $product_id
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Seller $seller
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\CartItemOriginal[] $cart_item_originals
 * @property \App\Model\Entity\CartItem[] $cart_items
 * @property \App\Model\Entity\ComboItem[] $combo_items
 * @property \App\Model\Entity\Combo[] $combos
 * @property \App\Model\Entity\InvoiceCombo[] $invoice_combos
 * @property \App\Model\Entity\InvoiceCourseHistory[] $invoice_course_history
 * @property \App\Model\Entity\InvoiceCourse[] $invoice_courses
 * @property \App\Model\Entity\InvoiceItem[] $invoice_items
 * @property \App\Model\Entity\OfflineCartItem[] $offline_cart_items
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\RefundRequest[] $refund_requests
 * @property \App\Model\Entity\UserCoupon[] $user_coupons
 */
class Item extends Entity
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
