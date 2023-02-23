<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobsTable Test Case
 */
class JobsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JobsTable
     */
    protected $Jobs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Jobs',
        'app.Properties',
        'app.Inspectors',
        'app.Reports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Jobs') ? [] : ['className' => JobsTable::class];
        $this->Jobs = $this->getTableLocator()->get('Jobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Jobs);

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
