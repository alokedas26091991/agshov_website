<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StaticPage Entity
 *
 * @property int $id
 * @property string $page_name
 * @property string $slug
 * @property string $description
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_desc
 * @property string $robots
 * @property string $canonical
 * @property \Cake\I18n\Time $create_date
 * @property int $created_by
 * @property \Cake\I18n\Time $last_update_date
 * @property int $last_updated_by
 * @property bool $is_deleted
 */
class StaticPage extends Entity
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
