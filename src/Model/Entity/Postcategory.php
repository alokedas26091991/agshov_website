<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Postcategory Entity
 *
 * @property int $id
 * @property string|null $parent_id
 * @property string $name
 * @property string $details
 * @property string|null $banner_photo
 * @property string|null $slug
 * @property bool $status
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\ParentPostcategory $parent_postcategory
 * @property \App\Model\Entity\ChildPostcategory[] $child_postcategories
 */
class Postcategory extends Entity
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
        'parent_id' => true,
        'name' => true,
        'details' => true,
        'banner_photo' => true,
        'slug' => true,
        'status' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
        'parent_postcategory' => true,
        'child_postcategories' => true,
    ];
}
