<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int $user_id
 * @property bool $post_type
 * @property string|null $title
 * @property string|null $category
 * @property string|null $tag
 * @property string|null $details
 * @property string|null $slug
 * @property bool $is_popular
 * @property string|null $banner_photo
 * @property string|null $archive
 * @property \Cake\I18n\FrozenDate|null $post_date
 * @property int|null $owner
 * @property bool $status
 * @property bool $is_deleted
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $robots
 * @property string|null $canonical
 * @property string|null $meta_description
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 */
class Post extends Entity
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
        'user_id' => true,
        'post_type' => true,
        'title' => true,
        'category' => true,
        'tag' => true,
        'details' => true,
        'slug' => true,
        'is_popular' => true,
        'banner_photo' => true,
        'archive' => true,
        'post_date' => true,
        'owner' => true,
        'status' => true,
        'is_deleted' => true,
        'meta_title' => true,
        'meta_keywords' => true,
        'robots' => true,
        'canonical' => true,
        'meta_description' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
