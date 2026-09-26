<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReviewImage Entity
 *
 * @property int $id
 * @property int $review_id
 * @property string $product_image
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\Review $review
 */
class ReviewImage extends Entity
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
        'review_id' => true,
        'product_image' => true,
        'is_deleted' => true,
        'review' => true,
    ];
}
