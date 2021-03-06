<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrestationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrestationsTable Test Case
 */
class PrestationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrestationsTable
     */
    public $Prestations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prestations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Prestations') ? [] : ['className' => 'App\Model\Table\PrestationsTable'];
        $this->Prestations = TableRegistry::get('Prestations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prestations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
