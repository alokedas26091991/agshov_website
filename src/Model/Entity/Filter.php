<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Filter Entity
 *
 * @property int $id
 * @property string $name
 * @property int $filter_type
 * @property bool $is_display
 * @property bool $is_active
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\FilterCategory[] $filter_categories
 * @property \App\Model\Entity\FilterOption[] $filter_options
 */
class Filter extends Entity
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
