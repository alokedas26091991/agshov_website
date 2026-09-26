<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CartItem Entity.
 *
 * @property int $id
 * @property int $cart_id
 * @property \App\Model\Entity\Cart $cart
 * @property int $parent_id
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property float $item_gross_amount
 * @property int $coupon_id
 * @property float $discount_amt
 * @property float $item_net_amount
 * @property int $course_id
 * @property \App\Model\Entity\Course $course
 * @property int $combo_id
 * @property int $product_id
 * @property \App\Model\Entity\Product $product
 * @property int $webinar_id
 * @property \App\Model\Entity\Webinar $webinar
 * @property int $course_batch_id
 * @property \App\Model\Entity\CourseBatch $course_batch
 * @property bool $is_deleted
 */
class CartItem extends Entity
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
