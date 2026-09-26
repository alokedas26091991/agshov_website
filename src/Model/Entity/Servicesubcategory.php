<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Servicesubcategory Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $servicecategory_id
 * @property bool|null $is_active
 * @property bool|null $is_deleted
 * @property \Cake\I18n\FrozenDate|null $created_at
 * @property \Cake\I18n\FrozenDate|null $updated_at
 *
 * @property \App\Model\Entity\Servicecategory $servicecategory
 */
class Servicesubcategory extends Entity
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
        'servicecategory_id' => true,
        'is_active' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
        'servicecategory' => true,
    ];
}
