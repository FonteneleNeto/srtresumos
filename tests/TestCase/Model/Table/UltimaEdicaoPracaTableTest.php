<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UltimaEdicaoPracaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UltimaEdicaoPracaTable Test Case
 */
class UltimaEdicaoPracaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UltimaEdicaoPracaTable
     */
    public $UltimaEdicaoPraca;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UltimaEdicaoPraca',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UltimaEdicaoPraca') ? [] : ['className' => UltimaEdicaoPracaTable::class];
        $this->UltimaEdicaoPraca = TableRegistry::getTableLocator()->get('UltimaEdicaoPraca', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UltimaEdicaoPraca);

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
