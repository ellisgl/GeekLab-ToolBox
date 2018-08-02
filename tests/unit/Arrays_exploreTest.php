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
        /**
         * This test will test renameKeys in a recursive manor.
         * I can't think of any other tests for explore at this time.
         * http://php.net/manual/en/function.array-walk.php#122991
         */
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
            '10fish' => 'xyz',
            '11fish' => [
                22         => [
                    'a',
                    'b',
                    'c' => [
                        33 => ['def', 'xyz'],
                        0  => 'x',
                        1  => 'y',
                        44 => 'z'
                    ]
                ],
                'someFish' => [
                    'xyz',
                    '_attributes' => ['type' => 'cod']
                ]
            ]
        ];

        $this->Arrays->explore($array, function (&$value, $key)
        {
            if ('@' === substr($key, 0, 1))
            {
                if ('attributes' == substr($key, 1))
                {
                    // Replace key '@attributes' with '_attributes'
                    $this->Arrays->renameKey($value, $key, '_attributes');
                }
            }
            elseif ('_' === substr($key, 0, 1))
            {
                $a = substr($key, 1);

                if (false !== filter_var($a, FILTER_VALIDATE_INT))
                {
                    // convert _{integer like} to integer key.
                    $this->Arrays->renameKey($value, $key, intval($a));
                }
                elseif (is_numeric(substr($a, 0, 1)))
                {
                    // convert _{numeric}{alpha} to string key.
                    $this->Arrays->renameKey($value, $key, $a);
                }
            }
        });

        $this->assertEquals($expected, $array);
    }
}