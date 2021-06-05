<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResumosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResumosTable Test Case
 */
class ResumosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResumosTable
     */
    public $Resumos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Resumos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Resumos') ? [] : ['className' => ResumosTable::class];
        $this->Resumos = TableRegistry::getTableLocator()->get('Resumos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Resumos);

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
