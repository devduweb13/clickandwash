<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelesTable Test Case
 */
class ModelesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelesTable
     */
    public $Modeles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.modeles',
        'app.marques',
        'app.vehicules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Modeles') ? [] : ['className' => 'App\Model\Table\ModelesTable'];
        $this->Modeles = TableRegistry::get('Modeles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Modeles);

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
