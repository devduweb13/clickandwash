<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdresseclientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdresseclientsTable Test Case
 */
class AdresseclientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdresseclientsTable
     */
    public $Adresseclients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adresseclients',
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
        $config = TableRegistry::exists('Adresseclients') ? [] : ['className' => 'App\Model\Table\AdresseclientsTable'];
        $this->Adresseclients = TableRegistry::get('Adresseclients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adresseclients);

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
