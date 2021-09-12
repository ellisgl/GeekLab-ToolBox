<?php

use Codeception\Test\Unit;
use DigiTickets\PHPUnit\ErrorHandler;
use GeekLab\ToolBox\Arrays;

class Arrays_renameKeyTest extends Unit
{
    use ErrorHandler;

    /** @var UnitTester $tester */
    protected $tester;

    /** @var array $array */
    private $array;

    protected function _before(): void
    {
        $this->array  = [
            '_10fish' => 'xyz',
            '_11fish' => [
                '_22'      => [
                    '_10fish' => 'zyx',
                    'a',
                    'b',
                    'c'       => [
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
            ],
            't',
            'u'
        ];
    }

    public function testItCanChangeOnlyARootLevelStringKeyToString(): void
    {
        $expArr = [
            '10fish'  => 'xyz',
            '_11fish' => [
                '_22'      => [
                    '_10fish' => 'zyx',
                    'a',
                    'b',
                    'c'       => [
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
            ],
            't',
            'u'
        ];

        $newArr = Arrays::renameKey($this->array, '_10fish', '10fish');

        $this->assertEquals($expArr, $newArr);
    }

    public function testItCanChangeStingKeyToStringRecursively(): void
    {
        $expArr = [
            '10fish'  => 'xyz',
            '_11fish' => [
                '_22'      => [
                    '10fish' => 'zyx',
                    'a',
                    'b',
                    'c'      => [
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
            ],
            't',
            'u'
        ];

        $newArr = Arrays::renameKey($this->array, '_10fish', '10fish', TRUE);

        $this->assertEquals($expArr, $newArr);
    }

    public function testItCanChangeOnlyARootLevelIntegerKeyToString(): void
    {
        $expArr = [
            '_10fish' => 'xyz',
            '_11fish' => [
                '_22'      => [
                    '_10fish' => 'zyx',
                    'a',
                    'b',
                    'c'       => [
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
            ],
            'ZERO'    => 't',
            1         => 'u'
        ];

        $newArr = Arrays::renameKey($this->array, 0, 'ZERO', FALSE);

        $this->assertEquals($expArr, $newArr);
    }

    public function testItCanChangeAnIntegerKeyToStringRecursively(): void
    {
        $expArr = [
            '_10fish' => 'xyz',
            '_11fish' => [
                '_22'      => [
                    '_10fish' => 'zyx',
                    0         => 'a',
                    'ONE'     => 'b',
                    'c'       => [
                        '_33' => [
                            0     => 'def',
                            'ONE' => 'xyz'
                        ],
                        0     => 'x',
                        'ONE' => 'y',
                        '_44' => 'z'
                    ]
                ],
                'someFish' => [
                    0             => 'xyz',
                    '@attributes' => ['type' => 'cod']
                ]
            ],
            0         => 't',
            'ONE'     => 'u'
        ];

        $newArr = Arrays::renameKey($this->array, 1, 'ONE', TRUE);

        $this->assertEquals($expArr, $newArr);
    }

    public function testItCanChangeOnlyARootLevelStringKeyToInteger(): void
    {
        $expArr = [
            10        => 'xyz',
            '_11fish' => [
                '_22'      => [
                    '_10fish' => 'zyx',
                    'a',
                    'b',
                    'c'       => [
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
            ],
            0         => 't',
            1         => 'u'
        ];

        $newArr = Arrays::renameKey($this->array, '_10fish', 10);

        $this->assertEquals($expArr, $newArr);
    }

    public function testItCanChangeAStringKeyToIntegerRecursively(): void
    {
        $expArr = [
            10        => 'xyz',
            '_11fish' => [
                '_22'      => [
                    10  => 'zyx',
                    0   => 'a',
                    1   => 'b',
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
            ],
            0         => 't',
            1         => 'u'
        ];

        $newArr = Arrays::renameKey($this->array, '_10fish', 10, TRUE);

        $this->assertEquals($expArr, $newArr);
    }
}
