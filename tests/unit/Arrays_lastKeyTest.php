<?php

class Arrays_lastKeyTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \GeekLab\ToolBox\Arrays
     */
    protected $Arrays;

    protected function _before()
    {
        $this->Arrays = new GeekLab\ToolBox\Arrays();
    }


    protected function _after()
    {
    }

    // tests

    /** @test */
    public function itCanReturnTheLastKey()
    {
        $this->assertEquals(0, $this->Arrays->lastKey(['a' => 'ccc', 'b' => 'aaa', 'c' => 'ddd', 'xxx']));
    }

    /** @test */
    public function itWillReturnBlankOnEmptyArray()
    {
        $this->assertEquals('', $this->Arrays->lastKey([]));
    }
}