<?php

class BatchLoopTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    /** @test */
    public function testBatchLoopWithUnder1000Iterations()
    {
        $BatchLoop = new GeekLab\ToolBox\BatchLoop();

        $a = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];

        $b = [];

        $BatchLoop->run(count($a), function($i) use ($a, &$b)
        {
            $b[] = $a[$i];
        });


        $this->assertEquals($a, $b);
    }

    /** @test */
    public function testBatchLoopWithOver1000Iterations()
    {
        $BatchLoop = new GeekLab\ToolBox\BatchLoop();

        for($i = 0; $i < 2000; $i++)
        {
            $a[] = $i;
        }

        $b = [];

        $BatchLoop->run(count($a), function($i) use ($a, &$b)
        {
            $b[] = $a[$i];
        });


        $this->assertEquals($a, $b);
    }
}