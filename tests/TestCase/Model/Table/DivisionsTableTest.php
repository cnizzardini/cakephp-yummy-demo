<?php
namespace YummyDemo\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use YummyDemo\Model\Table\DivisionsTable;

/**
 * YummyDemo\Model\Table\DivisionsTable Test Case
 */
class DivisionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \YummyDemo\Model\Table\DivisionsTable
     */
    public $Divisions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.yummy_demo.divisions',
        'plugin.yummy_demo.conferences',
        'plugin.yummy_demo.teams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Divisions') ? [] : ['className' => 'YummyDemo\Model\Table\DivisionsTable'];
        $this->Divisions = TableRegistry::get('Divisions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Divisions);

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
