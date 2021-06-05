<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PracasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PracasTable Test Case
 */
class PracasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PracasTable
     */
    public $Pracas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pracas',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pracas') ? [] : ['className' => PracasTable::class];
        $this->Pracas = TableRegistry::getTableLocator()->get('Pracas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pracas);

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
