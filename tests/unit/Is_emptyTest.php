<?php

class Is_emptyTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /**
     * @var \GeekLab\ToolBox\Is
     */
    protected $Is;

    protected function _before()
    {
        $this->Is = new GeekLab\ToolBox\Is();
    }

    protected function _after()
    {
    }

    // tests
    /** @test */
    public function itShouldReturnTrueOnBlank()
    {
        $this->assertTrue($this->Is->empty(''));
    }

    /** @test */
    public function itShouldReturnFalseOnStringZero()
    {
        $this->assertFalse($this->Is->empty('0'));
    }

    /** @test */
    public function itShouldReturnFalseOnIntegerZero()
    {
        $this->assertFalse($this->Is->empty('0'));
    }

    /** @test */
    public function itShouldReturnTrueOnNull()
    {
        $this->assertTrue($this->Is->empty(NULL));
    }

    /** @test */
    public function itShouldReturnFalseOnNullIfNullValidIsTrue()
    {
        $this->assertFalse($this->Is->empty(NULL, TRUE));
    }
}