<?php

use Codeception\Test\Unit;
use GeekLab\ToolBox\Arrays;

class Arrays_exploreTest extends Unit
{
    /** @var UnitTester $tester */
    protected $tester;


    // Tests.
    public function testExploreWithRenameKeys(): void
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

        Arrays::explore($array, function ($value, $key) use (&$cnt)
        {
            if (strpos($key, '@') === 0) {
                $cnt['@']++;
            } elseif (strpos($key, '_') === 0) {
                $cnt['_']++;
            }
        });

        $this->assertEquals($expected, $cnt);
    }
}
