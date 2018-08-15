<?php

use DigiTickets\PHPUnit\ErrorHandler;

class Arrays_renameKeyTest extends \Codeception\Test\Unit
{
    use ErrorHandler;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \GeekLab\ToolBox\Arrays
     */
    protected $Arrays;

    private $array;

    protected function _before()
    {
        $this->Arrays = new GeekLab\ToolBox\Arrays();
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

    protected function _after()
    {
    }

    /** @test */
    public function itCanChangeOnlyARootLevelStringKeyToString()
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

        $newArr = $this->Arrays->renameKey($this->array, '_10fish', '10fish');

        $this->assertEquals($expArr, $newArr);
    }


    /** @test */
    public function itCanChangeStingKeyToStringRecursively()
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

        $newArr = $this->Arrays->renameKey($this->array, '_10fish', '10fish', TRUE);

        $this->assertEquals($expArr, $newArr);
    }

    /** @test */
    public function itCanChangeOnlyARootLevelIntegerKeyToString()
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

        $newArr = $this->Arrays->renameKey($this->array, 0, 'ZERO', FALSE);

        $this->assertEquals($expArr, $newArr);
    }

    /** @test */
    public function itCanChangeAnIntegerKeyToStringRecursively()
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

        $newArr = $this->Arrays->renameKey($this->array, 1, 'ONE', TRUE);

        $this->assertEquals($expArr, $newArr);
    }

    /** @test */
    public function itCanChangeOnlyARootLevelStringKeyToInteger()
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

        $newArr = $this->Arrays->renameKey($this->array, '_10fish', 10);

        $this->assertEquals($expArr, $newArr);
    }

    /** @test */
    public function itCanChangeAStringKeyToIntegerRecursively()
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

        $newArr = $this->Arrays->renameKey($this->array, '_10fish', 10, TRUE);

        $this->assertEquals($expArr, $newArr);
    }
}