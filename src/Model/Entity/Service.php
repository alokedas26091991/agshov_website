<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $details_1
 * @property string|null $details_2
 * @property string|null $image
 * @property string|null $fees
 * @property bool|null $is_active
 * @property bool|null $is_deleted
 * @property \Cake\I18n\FrozenDate|null $created_at
 * @property \Cake\I18n\FrozenDate|null $updated_at
 */
class Service extends Entity
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
        'slug' => true,
        'title' => true,
        'details_1' => true,
        'details_2' => true,
        'image' => true,
        'fees' => true,
        'is_active' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
