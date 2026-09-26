<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductFilterOptionValue Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $filter_option_id
 * @property string $filter_value
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\FilterOption $filter_option
 */
class ProductFilterOptionValue extends Entity
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
