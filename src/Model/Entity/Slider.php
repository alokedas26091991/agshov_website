<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slider Entity
 *
 * @property int $id
 * @property string $name
 * @property string $image_link
 * @property string $cta_link
 * @property string $caption
 * @property string $txt_caption_1
 * @property int $txt_caption_2
 * @property int $sort_order
 * @property \Cake\I18n\Time $valid_from
 * @property \Cake\I18n\Time $valid_to
 * @property int $created_by
 * @property \Cake\I18n\Time $create_date
 * @property int $is_deleted
 */
class Slider extends Entity
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
