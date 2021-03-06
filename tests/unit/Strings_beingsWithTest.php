<?php

class Strings_beingsWithTest extends \Codeception\Test\Unit
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
    public function itCanMatchBeginsWith()
    {
        $this->assertTrue($this->Strings->beginsWith($this->testStr, 'Silly'));
    }

    /** @test */
    public function itCantMatchBeginsWith()
    {
        $this->assertFalse($this->Strings->beginsWith($this->testStr, 'Sally'));
    }
}