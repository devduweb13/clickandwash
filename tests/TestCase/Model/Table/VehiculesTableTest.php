<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiculesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiculesTable Test Case
 */
class VehiculesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiculesTable
     */
    public $Vehicules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicules',
        'app.marques',
        'app.modeles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vehicules') ? [] : ['className' => 'App\Model\Table\VehiculesTable'];
        $this->Vehicules = TableRegistry::get('Vehicules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehicules);

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
