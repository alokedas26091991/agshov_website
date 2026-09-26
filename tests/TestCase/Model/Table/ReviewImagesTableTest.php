<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReviewImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReviewImagesTable Test Case
 */
class ReviewImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReviewImagesTable
     */
    protected $ReviewImages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ReviewImages',
        'app.Reviews',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ReviewImages') ? [] : ['className' => ReviewImagesTable::class];
        $this->ReviewImages = $this->getTableLocator()->get('ReviewImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ReviewImages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReviewImagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReviewImagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
