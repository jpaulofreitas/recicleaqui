<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecicladorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecicladorasTable Test Case
 */
class RecicladorasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecicladorasTable
     */
    public $Recicladoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recicladoras',
        'app.usuarios',
        'app.pedidos',
        'app.materiais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Recicladoras') ? [] : ['className' => RecicladorasTable::class];
        $this->Recicladoras = TableRegistry::get('Recicladoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recicladoras);

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
