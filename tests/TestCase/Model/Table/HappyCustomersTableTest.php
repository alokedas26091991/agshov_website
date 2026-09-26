<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HappyCustomersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HappyCustomersTable Test Case
 */
class HappyCustomersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HappyCustomersTable
     */
    protected $HappyCustomers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.HappyCustomers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HappyCustomers') ? [] : ['className' => HappyCustomersTable::class];
        $this->HappyCustomers = $this->getTableLocator()->get('HappyCustomers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HappyCustomers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HappyCustomersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
