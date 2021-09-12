<?php

use Codeception\Test\Unit;
use GeekLab\ToolBox\Is;

class Is_emptyTest extends Unit
{
    /** @var UnitTester $tester */
    protected $tester;

    // Tests.
    public function testItShouldReturnTrueOnBlank(): void
    {
        $this->assertTrue(Is::empty(''));
    }


    public function testItShouldReturnFalseOnStringZero(): void
    {
        $this->assertFalse(Is::empty('0'));
    }

    public function testItShouldReturnFalseOnIntegerZero(): void
    {
        $this->assertFalse(Is::empty('0'));
    }

    public function testItShouldReturnTrueOnNull(): void
    {
        $this->assertTrue(Is::empty(null));
    }

    public function testItShouldReturnFalseOnNullIfNullValidIsTrue(): void
    {
        $this->assertFalse(Is::empty(null, true));
    }
}
