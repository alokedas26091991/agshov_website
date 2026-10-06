<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SeoPage Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_desc
 * @property string|null $content
 * @property string|null $robots
 * @property string|null $canonical
 */
class SeoPage extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'meta_title' => true,
        'meta_keywords' => true,
        'meta_desc' => true,
        'content' => true,
        'robots' => true,
        'canonical' => true,
    ];
}
