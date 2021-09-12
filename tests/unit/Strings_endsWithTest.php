<?php

use Codeception\Test\Unit;
use GeekLab\ToolBox\Strings;

class Strings_endsWithTest extends Unit
{
    /** @var UnitTester $tester */
    protected $tester;

    /** @var string $testStr */
    protected $testStr = "Silly Sally wanted Peter Piper's pumpkin pie.";

    // Tests.
    public function testItCanMatchEndsWith(): void
    {
        $this->assertTrue(Strings::endsWith($this->testStr, 'pie.'));
    }

    public function testItCantMatchEndsWith(): void
    {
        $this->assertFalse(Strings::endsWith($this->testStr, 'Peter'));
    }
}
