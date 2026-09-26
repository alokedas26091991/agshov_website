<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Review Entity
 *
 * @property int $id
 * @property int $product_id
 * @property string $slug
 * @property int $seller_id
 * @property int $user_id
 * @property string $rating
 * @property string $comment
 * @property \Cake\I18n\FrozenDate $dt
 * @property bool $is_active
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\ReviewImage[] $review_images
 * @property \App\Model\Entity\ReviewLikeDislike[] $review_like_dislikes
 */
class Review extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'product_id' => true,
        'slug' => true,
        'seller_id' => true,
        'user_id' => true,
        'rating' => true,
        'comment' => true,
        'dt' => true,
        'is_active' => true,
        'user' => true,
        'product' => true,
        'review_images' => true,
        'review_like_dislikes' => true,
    ];
}
