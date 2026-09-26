<?php

declare(strict_types=1);

namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property int|null $vendor_id
 * @property string $email
 * @property string|null $password
 * @property string|null $mobile
 * @property \Cake\I18n\FrozenDate $date_of_registration
 * @property string|null $email_verification_code
 * @property bool|null $is_email_verified
 * @property string|null $mobile_verification_code
 * @property bool|null $is_mobile_verified
 * @property \Cake\I18n\FrozenTime|null $mobile_verified_date
 * @property string $change_mobile
 * @property string $change_mobile_verification_code
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $country
 * @property string|null $state
 * @property string|null $city
 * @property string|null $pin
 * @property string $gst
 * @property bool $address_type
 * @property string|null $alternate_phone
 * @property string|null $photo
 * @property \Cake\I18n\FrozenTime|null $last_login_date
 * @property bool $is_vendor
 * @property bool $is_customer
 * @property bool $is_admin
 * @property bool $is_active
 * @property string|null $ipaddress
 * @property \Cake\I18n\FrozenTime|null $create_date
 * @property \Cake\I18n\FrozenTime|null $last_update_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Brandrequest[] $brandrequests
 * @property \App\Model\Entity\CancelPayment[] $cancel_payments
 * @property \App\Model\Entity\CartOriginal[] $cart_originals
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\Combo[] $combos
 * @property \App\Model\Entity\CourseComment[] $course_comments
 * @property \App\Model\Entity\CourseRating[] $course_ratings
 * @property \App\Model\Entity\CourseRemainderEmail[] $course_remainder_emails
 * @property \App\Model\Entity\InvoiceCourseHistory[] $invoice_course_history
 * @property \App\Model\Entity\InvoiceCourse[] $invoice_courses
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\ManualCart[] $manual_carts
 * @property \App\Model\Entity\OfflineCart[] $offline_carts
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\RefundRequest[] $refund_requests
 * @property \App\Model\Entity\Requestcall[] $requestcalls
 * @property \App\Model\Entity\ReviewEmail[] $review_emails
 * @property \App\Model\Entity\ReviewLikeDislike[] $review_like_dislikes
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\Sellerbrand[] $sellerbrands
 * @property \App\Model\Entity\SocialProfile[] $social_profiles
 * @property \App\Model\Entity\Support[] $supports
 * @property \App\Model\Entity\TempCart[] $temp_carts
 * @property \App\Model\Entity\UserCoupon[] $user_coupons
 * @property \App\Model\Entity\UserDeliveryDetail[] $user_delivery_details
 * @property \App\Model\Entity\UserDevice[] $user_devices
 * @property \App\Model\Entity\UserLogin[] $user_logins
 * @property \App\Model\Entity\UserProduct[] $user_products
 * @property \App\Model\Entity\UserRole[] $user_roles
 * @property \App\Model\Entity\UserSetting[] $user_settings
 * @property \App\Model\Entity\Wishlist[] $wishlists
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'vendor_id' => true,
        'email' => true,
        'password' => true,
        'mobile' => true,
        'date_of_registration' => true,
        'email_verification_code' => true,
        'is_email_verified' => true,
        'mobile_verification_code' => true,
        'is_mobile_verified' => true,
        'mobile_verified_date' => true,
        'change_mobile' => true,
        'change_mobile_verification_code' => true,
        'address1' => true,
        'address2' => true,
        'country' => true,
        'state' => true,
        'city' => true,
        'pin' => true,
        'gst' => true,
        'address_type' => true,
        'alternate_phone' => true,
        'photo' => true,
        'last_login_date' => true,
        'is_vendor' => true,
        'is_customer' => true,
        'is_admin' => true,
        'is_active' => true,
        'ipaddress' => true,
        'create_date' => true,
        'last_update_date' => true,
        'is_deleted' => true,
        'vendor' => true,
        'brandrequests' => true,
        'cancel_payments' => true,
        'cart_originals' => true,
        'carts' => true,
        'combos' => true,
        'course_comments' => true,
        'course_ratings' => true,
        'course_remainder_emails' => true,
        'invoice_course_history' => true,
        'invoice_courses' => true,
        'invoices' => true,
        'manual_carts' => true,
        'offline_carts' => true,
        'payments' => true,
        'products' => true,
        'refund_requests' => true,
        'requestcalls' => true,
        'review_emails' => true,
        'review_like_dislikes' => true,
        'reviews' => true,
        'sellerbrands' => true,
        'social_profiles' => true,
        'supports' => true,
        'temp_carts' => true,
        'user_coupons' => true,
        'user_delivery_details' => true,
        'user_devices' => true,
        'user_logins' => true,
        'user_products' => true,
        'user_roles' => true,
        'user_settings' => true,
        'wishlists' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
	protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
