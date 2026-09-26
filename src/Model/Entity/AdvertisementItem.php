<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdvertisementItem Entity
 *
 * @property int $id
 * @property int $advertisement_id
 * @property int $category_id
 * @property int $sub_category_id
 * @property int $type_id
 * @property int $brand_id
 * @property int $product_id
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\Advertisement $advertisement
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\SubCategory $sub_category
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\Product $product
 */
class AdvertisementItem extends Entity
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
