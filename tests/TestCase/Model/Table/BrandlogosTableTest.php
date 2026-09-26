<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BrandlogosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BrandlogosTable Test Case
 */
class BrandlogosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BrandlogosTable
     */
    protected $Brandlogos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Brandlogos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Brandlogos') ? [] : ['className' => BrandlogosTable::class];
        $this->Brandlogos = $this->getTableLocator()->get('Brandlogos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Brandlogos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BrandlogosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
