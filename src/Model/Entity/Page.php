<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $robots
 * @property string|null $canonical
 * @property string|null $meta_description
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime $created_at
 */
class Page extends Entity
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
        'name' => true,
        'slug' => true,
        'meta_title' => true,
        'meta_keywords' => true,
        'robots' => true,
        'canonical' => true,
        'meta_description' => true,
        'status' => true,
        'created_at' => true,
    ];
}
