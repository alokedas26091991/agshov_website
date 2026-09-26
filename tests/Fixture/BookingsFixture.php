<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFixture
 */
class BookingsFixture extends TestFixture
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
                'user_id' => 1,
                'order_id' => 'Lorem ipsum dolor sit amet',
                'razorpay_payment_id' => 'Lorem ipsum dolor sit amet',
                'patient_name' => 'Lorem ipsum dolor sit amet',
                'age' => 1,
                'sex' => 'Lorem ipsum dolor sit amet',
                'patient_mobile' => 'Lorem ipsum dolor sit amet',
                'patient_email' => 'Lorem ipsum dolor sit amet',
                'package_id' => 1,
                'package_price' => 1,
                'status' => 1,
                'created_at' => '2025-02-21',
                'updated_at' => '2025-02-21',
            ],
        ];
        parent::init();
    }
}
