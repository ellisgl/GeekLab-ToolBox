<?php

use Codeception\Test\Unit;
use GeekLab\ToolBox\Arrays;

class Arrays_firstValueTest extends Unit
{
    /** @var UnitTester $tester */
    protected $tester;

    // Tests.
    public function testItCanReturnTheFirstValue(): void
    {
        $this->assertEquals('ccc', Arrays::firstValue(['a' => 'ccc', 'b' => 'aaa', 'c' => 'ddd', 'xxx']));
    }

    public function testItWillReturnBlankOnEmptyArray(): void
    {
        $this->assertEquals('', Arrays::firstValue([]));
    }
}
