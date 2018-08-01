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
     *
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
    public function canMatchBeginsWith()
    {
        $this->assertTrue($this->Strings->beginsWith($this->testStr, 'Silly'));
    }

    /** @test */
    public function cantMatchBeginsWith()
    {
        $this->assertFalse($this->Strings->beginsWith($this->testStr, 'Sally'));
    }

    /** @test */
    public function canMatchEndsWith()
    {
        $this->assertTrue($this->Strings->endsWith($this->testStr, 'pie.'));
    }

    /** @test */
    public function cantMatchEndsWith()
    {
        $this->assertFalse($this->Strings->endsWith($this->testStr, 'Peter'));
    }


}