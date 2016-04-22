<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiculeclientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiculeclientsTable Test Case
 */
class VehiculeclientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiculeclientsTable
     */
    public $Vehiculeclients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehiculeclients',
        'app.vehicules',
        'app.marques',
        'app.modeles',
        'app.clients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vehiculeclients') ? [] : ['className' => 'App\Model\Table\VehiculeclientsTable'];
        $this->Vehiculeclients = TableRegistry::get('Vehiculeclients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehiculeclients);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
