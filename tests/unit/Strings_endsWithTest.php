<?php

class Strings_endsWithTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \GeekLab\ToolBox\Strings
     */
    protected $Strings;

    /**
     * @var string
     */
    protected $testStr = 'Silly Sally wanted Peter Piper\'s pumpkin pie.';

    protected function _before()
    {
        $this->Strings = new \GeekLab\ToolBox\Strings();
    }

    protected function _after()
    {
    }

    // tests

    /** @test */
    public function itCanMatchEndsWith()
    {
        $this->assertTrue($this->Strings->endsWith($this->testStr, 'pie.'));
    }

    /** @test */
    public function itCantMatchEndsWith()
    {
        $this->assertFalse($this->Strings->endsWith($this->testStr, 'Peter'));
    }
}