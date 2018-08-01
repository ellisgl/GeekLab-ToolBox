<?php

class Arrays_firstValueTest extends \Codeception\Test\Unit
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
    public function itCanReturnTheFirstValue()
    {
        $this->assertEquals('ccc', $this->Arrays->firstValue(['a' => 'ccc', 'b' => 'aaa', 'c' => 'ddd', 'xxx']));
    }

    /** @test */
    public function itWillReturnBlankOnEmptyArray()
    {
        $this->assertEquals('', $this->Arrays->firstValue([]));
    }
}