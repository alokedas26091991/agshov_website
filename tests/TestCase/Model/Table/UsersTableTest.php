<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    protected $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users',
        'app.Vendors',
        'app.Brandrequests',
        'app.CancelPayments',
        'app.CartOriginals',
        'app.Carts',
        'app.Combos',
        'app.CourseComments',
        'app.CourseRatings',
        'app.CourseRemainderEmails',
        'app.InvoiceCourseHistory',
        'app.InvoiceCourses',
        'app.Invoices',
        'app.ManualCarts',
        'app.OfflineCarts',
        'app.Payments',
        'app.Products',
        'app.RefundRequests',
        'app.Requestcalls',
        'app.ReviewEmails',
        'app.ReviewLikeDislikes',
        'app.Reviews',
        'app.Sellerbrands',
        'app.SocialProfiles',
        'app.Supports',
        'app.TempCarts',
        'app.UserCoupons',
        'app.UserDeliveryDetails',
        'app.UserDevices',
        'app.UserLogins',
        'app.UserProducts',
        'app.UserRoles',
        'app.UserSettings',
        'app.Wishlists',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = $this->getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
