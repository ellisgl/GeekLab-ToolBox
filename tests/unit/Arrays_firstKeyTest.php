<?php

use Codeception\Test\Unit;
use GeekLab\ToolBox\Arrays;

class Arrays_firstKeyTest extends Unit
{
    /** @var UnitTester $tester */
    protected $tester;

    // Tests.
    public function testItCanReturnTheFirstKey(): void
    {
        $this->assertEquals('a', Arrays::firstKey(['a' => 'ccc', 'b' => 'aaa', 'c' => 'ddd', 'xxx']));
    }

    public function testItWillReturnBlankOnEmptyArray(): void
    {
        $this->assertEquals('', Arrays::firstKey([]));
    }
}
