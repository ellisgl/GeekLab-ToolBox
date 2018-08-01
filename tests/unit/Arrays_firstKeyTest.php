<?php

class Arrays_firstKeyTest extends \Codeception\Test\Unit
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
    public function itCanReturnTheFirstKey()
    {
        $this->assertEquals('a', $this->Arrays->firstKey(['a' => 'ccc', 'b' => 'aaa', 'c' => 'ddd', 'xxx']));
    }

    /** @test */
    public function itWillReturnBlankOnEmptyArray()
    {
        $this->assertEquals('', $this->Arrays->firstKey([]));
    }
}