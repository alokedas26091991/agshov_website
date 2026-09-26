<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Advertisement Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $photo
 * @property \Cake\I18n\FrozenDate|null $start_date
 * @property \Cake\I18n\FrozenDate|null $end_date
 * @property \Cake\I18n\FrozenDate|null $create_date
 * @property int $created_by
 * @property int $adv_type
 * @property int $ord
 * @property bool $is_active
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\AdvertisementItem[] $advertisement_items
 */
class Advertisement extends Entity
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
        'description' => true,
        'photo' => true,
        'start_date' => true,
        'end_date' => true,
        'create_date' => true,
        'created_by' => true,
        'adv_type' => true,
		'section' => true,
		'link' => true,
        'ord' => true,
        'is_active' => true,
        'is_deleted' => true,
        'advertisement_items' => true,
    ];
}
