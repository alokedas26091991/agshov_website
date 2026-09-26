<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PinCode Entity
 *
 * @property int $id
 * @property int $code
 * @property bool $is_active
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\BranchPinCode[] $branch_pin_codes
 */
class PinCode extends Entity
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
