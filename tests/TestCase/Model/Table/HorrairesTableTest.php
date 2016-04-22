<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HorrairesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HorrairesTable Test Case
 */
class HorrairesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HorrairesTable
     */
    public $Horraires;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.horraires'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Horraires') ? [] : ['className' => 'App\Model\Table\HorrairesTable'];
        $this->Horraires = TableRegistry::get('Horraires', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Horraires);

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
