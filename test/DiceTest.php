<?php

namespace peje17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectOneArguments()
    {
        $dice = new Dice(4);
        $this->assertInstanceOf("\peje17\Dice\Dice", $dice);
    }

    /**
     * Test Methods
     */
    public function testProperties()
    {
        $dice = new Dice(4);
        $res = $dice->dicesides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test Methods
     */
    public function testMethods()
    {
        $dice = new Dice(4);
        $res = $dice->rolldice();
        $this->assertInternalType("int", $res);
    }
}
