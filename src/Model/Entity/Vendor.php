<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendor Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $phone_no
 * @property string $email
 * @property string $address
 * @property string $contact_person
 * @property string $gst_no
 * @property string $pan_no
 * @property string $address_proof
 * @property string $gst_proof
 * @property string $aadhaar_proof
 * @property string $pan_card
 * @property \Cake\I18n\Time $approval_date
 * @property bool $is_approved
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User[] $users
 */
class Vendor extends Entity
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
