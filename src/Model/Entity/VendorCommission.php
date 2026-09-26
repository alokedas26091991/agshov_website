<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorCommission Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $vendor_id
 * @property string $vendor_code
 * @property int $product_id
 * @property int $invoice_item_id
 * @property int $invoice_id
 * @property float $product_price
 * @property float $commission
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\InvoiceItem $invoice_item
 * @property \App\Model\Entity\Invoice $invoice
 */
class VendorCommission extends Entity
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
        'user_id' => true,
        'vendor_id' => true,
        'vendor_code' => true,
        'product_id' => true,
        'invoice_item_id' => true,
        'invoice_id' => true,
        'product_price' => true,
        'commission' => true,
        'create_date' => true,
        'is_deleted' => true,
        'user' => true,
        'vendor' => true,
        'product' => true,
        'invoice_item' => true,
        'invoice' => true,
    ];
}
