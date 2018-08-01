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

    protected function _before()
    {
        $this->Arrays = new GeekLab\ToolBox\Arrays();
    }

    protected function _after()
    {
    }

    // tests

    /** @test */
    public function itCanChangeKey()
    {
        $arr = ['tree' => 'a', 'dog' => 'b', 'fish' => 'c'];

        $this->Arrays->renameKey($arr, 'fish', 'rock');
        self::assertEquals(['tree' => 'a', 'dog' => 'b', 'rock' => 'c'], $arr);
        //print_r($arr);
    }

    /** @test */
    public function itCanWorkWithMixedKeys()
    {
        $arr = ['x', 'y', 'z' => '1'];

        $this->Arrays->renameKey($arr, 'z', 'a');
        self::assertEquals(['x', 'y', 'a' => '1'], $arr);
        //print_r($arr);
    }

    /** @test */
    public function itCanChangeAnIntegerIndexToString()
    {
        $arr = ['x', 'y', 'z' => '1'];

        // Changing integer index to string.
        $this->Arrays->renameKey($arr, 1, 'fred');
        $this->assertEquals(['x', 'fred' => 'y', 'z' => '1'], $arr);
        //print_r($arr);
    }

    /** @test */
    public function itCanChangeAStringIndexToInteger()
    {
        $arr = ['x', 'fred' => 'y', 'z' => '1'];

        // Changing string index to integer
        $this->Arrays->renameKey($arr, 'fred', 1);
        $this->assertEquals(['x', 'y', 'z' => '1'], $arr);
    }


    /** @test */
    public function itWillRaiseErrorIfOldKeyIsNotFound()
    {
        $arr = ['x', 'y', 'z' => '1'];

        // Changing a key that does not exist should thrown error with default settings.
        $this->Arrays->renameKey($arr, 'fred', 'tim');

        $this->assertError('Old key does not exist', E_USER_WARNING);
    }

    /** @test */
    public function itWillRaiseErrorIfNewKeyExists()
    {
        $arr = ['x', 'y', 'z' => '1'];

        // Changing a key to a key that already exist should thrown error with default settings.
        $this->Arrays->renameKey($arr, 1, 'z');

        $this->assertError('New key already exists', E_USER_WARNING);
    }
}