<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SearchUserDetail Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email_id
 * @property string $phone_no
 * @property int $pin_code
 * @property int $category_id
 * @property int $sub_category_id
 * @property int $type_id
 * @property string $search_text
 * @property \Cake\I18n\Time $create_date
 * @property bool $is_active
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Email $email
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\SubCategory $sub_category
 * @property \App\Model\Entity\Type $type
 */
class SearchUserDetail extends Entity
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
