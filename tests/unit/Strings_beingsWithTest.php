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
}
