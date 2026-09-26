<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'vendor_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'mobile' => 'Lorem ipsum do',
                'date_of_registration' => '2021-10-30',
                'email_verification_code' => 'Lorem ipsum do',
                'is_email_verified' => 1,
                'mobile_verification_code' => 'Lorem ipsum do',
                'is_mobile_verified' => 1,
                'mobile_verified_date' => '2021-10-30 20:06:13',
                'change_mobile' => 'Lorem ipsum do',
                'change_mobile_verification_code' => 'Lorem ipsum do',
                'address1' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'address2' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'country' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'pin' => 'Lorem ipsum do',
                'gst' => 'Lorem ipsum dolor sit amet',
                'address_type' => 1,
                'alternate_phone' => 'Lorem ipsum do',
                'photo' => 'Lorem ipsum dolor sit amet',
                'last_login_date' => '2021-10-30 20:06:13',
                'is_vendor' => 1,
                'is_customer' => 1,
                'is_admin' => 1,
                'is_active' => 1,
                'ipaddress' => 'Lorem ipsum do',
                'create_date' => '2021-10-30 20:06:13',
                'last_update_date' => '2021-10-30 20:06:13',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
