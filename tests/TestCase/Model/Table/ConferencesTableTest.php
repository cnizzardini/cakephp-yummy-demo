<?php
namespace YummyDemo\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use YummyDemo\Model\Table\ConferencesTable;

/**
 * YummyDemo\Model\Table\ConferencesTable Test Case
 */
class ConferencesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \YummyDemo\Model\Table\ConferencesTable
     */
    public $Conferences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.yummy_demo.conferences',
        'plugin.yummy_demo.divisions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Conferences') ? [] : ['className' => 'YummyDemo\Model\Table\ConferencesTable'];
        $this->Conferences = TableRegistry::get('Conferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conferences);

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
