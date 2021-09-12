<?php

use Codeception\Test\Unit;
use GeekLab\ToolBox\Arrays;

class Arrays_lastValueTest extends Unit
{
    /** @var UnitTester $tester */
    protected $tester;

    // Tests.
    public function testItCanReturnTheLastValue(): void
    {
        $this->assertEquals('xxx', Arrays::lastValue(['a' => 'ccc', 'b' => 'aaa', 'c' => 'ddd', 'xxx']));
    }

    public function testItWillReturnBlankOnEmptyArray(): void
    {
        $this->assertEquals('', Arrays::lastValue([]));
    }
}
