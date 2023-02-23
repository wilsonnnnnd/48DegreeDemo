<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiceClientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiceClientsTable Test Case
 */
class ServiceClientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiceClientsTable
     */
    protected $ServiceClients;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ServiceClients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ServiceClients') ? [] : ['className' => ServiceClientsTable::class];
        $this->ServiceClients = $this->getTableLocator()->get('ServiceClients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ServiceClients);

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
}
