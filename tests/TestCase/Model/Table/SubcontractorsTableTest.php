<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubcontractorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubcontractorsTable Test Case
 */
class SubcontractorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubcontractorsTable
     */
    protected $Subcontractors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Subcontractors',
        'app.Users',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Subcontractors') ? [] : ['className' => SubcontractorsTable::class];
        $this->Subcontractors = $this->getTableLocator()->get('Subcontractors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Subcontractors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
