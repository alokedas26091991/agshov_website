<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocialsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocialsTable Test Case
 */
class SocialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SocialsTable
     */
    protected $Socials;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Socials',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Socials') ? [] : ['className' => SocialsTable::class];
        $this->Socials = $this->getTableLocator()->get('Socials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Socials);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SocialsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
