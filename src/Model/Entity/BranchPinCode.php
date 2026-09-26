<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BranchPinCode Entity
 *
 * @property int $id
 * @property int $branch_id
 * @property int $pin_code_id
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\PinCode $pin_code
 */
class BranchPinCode extends Entity
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
