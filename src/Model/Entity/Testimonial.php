<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Testimonial Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $page_id
 * @property int|null $product_id
 * @property int|null $disease_id
 * @property string|null $position
 * @property string|null $details
 * @property string|null $image
 * @property int $ord
 * @property bool $status
 * @property string|null $rating
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Page $page
 */
class Testimonial extends Entity
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
        'name' => true,
        'page_id' => true,
        'product_id' => true,
        'disease_id' => true,
        'position' => true,
        'details' => true,
        'image' => true,
        'ord' => true,
        'status' => true,
        'rating' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
        'page' => true,
    ];
}
