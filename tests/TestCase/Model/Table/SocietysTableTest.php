<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocietysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocietysTable Test Case
 */
class SocietysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SocietysTable
     */
    public $Societys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.societys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Societys') ? [] : ['className' => 'App\Model\Table\SocietysTable'];
        $this->Societys = TableRegistry::get('Societys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Societys);

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
