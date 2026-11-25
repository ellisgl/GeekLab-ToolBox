<?php

use GeekLab\ToolBox\Strings;

class Strings_beingsWithTest extends \Codeception\Test\Unit
{
    /** @var UnitTester $tester */
    protected $tester;


    /** @var string $testStr */
    protected $testStr = "Silly Sally wanted Peter Piper's pumpkin pie.";

    // Tests.
    public function testItCanMatchBeginsWith(): void
    {
        $this->assertTrue(Strings::beginsWith($this->testStr, 'Silly'));
    }

    public function testItCantMatchBeginsWith(): void
    {
        $this->assertFalse(Strings::beginsWith($this->testStr, 'Sally'));
    }

    public function testItCanMatchZeroNeedle(): void
    {
        $this->assertTrue(Strings::beginsWith('012', '0'));
    }

    public function testItCantMatchZeroNeedleElsewhere(): void
    {
        $this->assertFalse(Strings::beginsWith('102', '0'));
    }

    public function testEmptyNeedleNeverMatches(): void
    {
        $this->assertFalse(Strings::beginsWith($this->testStr, ''));
    }
}
