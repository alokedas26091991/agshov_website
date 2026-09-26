<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $order_id
 * @property string|null $razorpay_payment_id
 * @property string|null $patient_name
 * @property int|null $age
 * @property string|null $sex
 * @property string|null $patient_mobile
 * @property string|null $patient_email
 * @property int|null $package_id
 * @property int|null $package_price
 * @property int|null $status
 * @property \Cake\I18n\FrozenDate|null $created_at
 * @property \Cake\I18n\FrozenDate|null $updated_at
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Servicecategory $servicecategory
 * @property \App\Model\Entity\Servicesubcategory $servicesubcategory
 * @property \App\Model\Entity\Package $package
 * @property \App\Model\Entity\BookingDetail[] $booking_details
 */
class Booking extends Entity
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
        'user_id' => true,
        'order_id' => true,
        'razorpay_payment_id' => true,
        'patient_name' => true,
        'age' => true,
        'sex' => true,
        'patient_mobile' => true,
        'patient_email' => true,
        'package_id' => true,
        'package_price' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'servicecategory' => true,
        'servicesubcategory' => true,
        'package' => true,
        'booking_details' => true,
    ];
}
