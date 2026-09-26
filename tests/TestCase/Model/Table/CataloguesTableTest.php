<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CataloguesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CataloguesTable Test Case
 */
class CataloguesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CataloguesTable
     */
    protected $Catalogues;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Catalogues',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Catalogues') ? [] : ['className' => CataloguesTable::class];
        $this->Catalogues = $this->getTableLocator()->get('Catalogues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Catalogues);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CataloguesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
