<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

 /* InvoiceItem Entity.
 *
 * @property int $id
 * @property int $invoice_id
 * @property \App\Model\Entity\Invoice $invoice
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property float $item_gross_amount
 * @property int $coupon_id
 * @property \App\Model\Entity\Coupon $coupon
 * @property float $discount_amount
 * @property float $item_net_amount
 * @property bool $is_deleted
 */
class InvoiceItem extends Entity
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
