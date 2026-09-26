<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $school_name
 * @property string $address
 * @property string $phone_no
 * @property string $email
 * @property string $contact_person
 * @property int $english_version
 * @property int $bengali_version
 * @property int $small_school
 * @property int $large_school
 * @property \Cake\I18n\Time $create_date
 * @property int $created_by
 * @property bool $is_deteted
 */
class Customer extends Entity
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
