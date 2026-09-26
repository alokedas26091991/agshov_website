<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tag Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $slug
 * @property string $details
 * @property bool $status
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\CourseCoupon[] $course_coupons
 * @property \App\Model\Entity\CourseTag[] $course_tags
 */
class Tag extends Entity
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
        'name' => true,
        'slug' => true,
        'details' => true,
        'status' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
        'course_coupons' => true,
        'course_tags' => true,
    ];
}
