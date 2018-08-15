<?php

class Arrays_exploreTest extends \Codeception\Test\Unit
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
    public function testExploreWithRenameKeys()
    {
        $cnt = [
            '@' => 0,
            '_' => 0
        ];

        $array = [
            '_10fish' => 'xyz',
            '_11fish' => [
                '_22'      => [
                    'a',
                    'b',
                    'c' => [
                        '_33' => ['def', 'xyz'],
                        'x',
                        'y',
                        '_44' => 'z'
                    ]
                ],
                'someFish' => [
                    'xyz',
                    '@attributes' => ['type' => 'cod']
                ]
            ]
        ];

        $expected = [
            '@' => 1,
            '_' => 5
        ];

        $this->Arrays->explore($array, function ($value, $key) use (&$cnt)
        {
            if ('@' === substr($key, 0, 1))
            {
                $cnt['@']++;
            }
            elseif ('_' === substr($key, 0, 1))
            {
                $cnt['_']++;
            }
        });

        $this->assertEquals($expected, $cnt);
    }
}