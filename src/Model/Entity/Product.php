<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $item_id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string $search_keyword
 * @property int $category_id
 * @property int $sale_tag
 * @property string $introduction
 * @property string $objective
 * @property string $benefits
 * @property string $content_topic_summary
 * @property string $summary
 * @property \Cake\I18n\Time $open_date
 * @property string $photo
 * @property string $display_image
 * @property float $actual_price
 * @property float $offer_price
 * @property bool $is_featured
 * @property int $rank
 * @property int $status
 * @property bool $is_active
 * @property bool $not_for_sale
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_desc
 * @property string $robots
 * @property string $canonical
 * @property \Cake\I18n\Time $create_date
 * @property int $created_by
 * @property \Cake\I18n\Time $last_update_date
 * @property int $last_updated_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\CartItemOriginal[] $cart_item_originals
 * @property \App\Model\Entity\CartItem[] $cart_items
 * @property \App\Model\Entity\OfflineCartItem[] $offline_cart_items
 * @property \App\Model\Entity\ProductImage[] $product_images
 */
class Product extends Entity
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
