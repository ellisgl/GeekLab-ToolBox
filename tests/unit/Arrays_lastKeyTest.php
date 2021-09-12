<?php

use Codeception\Test\Unit;
use GeekLab\ToolBox\Arrays;

class Arrays_lastKeyTest extends Unit
{
    /** @var UnitTester $tester */
    protected $tester;

    // Tests.
    public function TestItCanReturnTheLastKey(): void
    {
        $this->assertEquals(0, Arrays::lastKey(['a' => 'ccc', 'b' => 'aaa', 'c' => 'ddd', 'xxx']));
    }

    public function TestItWillReturnBlankOnEmptyArray(): void
    {
        $this->assertEquals('', Arrays::lastKey([]));
    }
}
