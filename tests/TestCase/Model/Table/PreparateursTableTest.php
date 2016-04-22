<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreparateursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreparateursTable Test Case
 */
class PreparateursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PreparateursTable
     */
    public $Preparateurs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.preparateurs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Preparateurs') ? [] : ['className' => 'App\Model\Table\PreparateursTable'];
        $this->Preparateurs = TableRegistry::get('Preparateurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Preparateurs);

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
