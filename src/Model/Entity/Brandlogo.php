<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Brandlogo Entity
 *
 * @property int $id
 * @property string|null $logo
 * @property bool|null $is_active
 * @property bool|null $is_deleted
 */
class Brandlogo extends Entity
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
        'logo' => true,
        'is_active' => true,
        'is_deleted' => true,
    ];
}
