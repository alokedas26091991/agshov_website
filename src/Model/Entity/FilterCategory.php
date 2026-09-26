<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FilterCategory Entity
 *
 * @property int $id
 * @property int $filter_id
 * @property int $category_id
 * @property bool $is_active
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Filter $filter
 * @property \App\Model\Entity\Category $category
 */
class FilterCategory extends Entity
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
