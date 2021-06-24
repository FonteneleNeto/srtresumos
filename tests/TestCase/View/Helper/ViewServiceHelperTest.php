<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ViewServiceHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\ViewServiceHelper Test Case
 */
class ViewServiceHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\ViewServiceHelper
     */
    public $ViewService;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->ViewService = new ViewServiceHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ViewService);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
