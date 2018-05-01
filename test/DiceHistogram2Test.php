<?php

namespace peje17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHistogram2Test extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObject()
    {
        $dicehistogram2 = new DiceHistogram2();
        $this->assertInstanceOf("\peje17\Dice\DiceHistogram2", $dicehistogram2);

        $res = $dicehistogram2->roll();
        $this->assertInternalType("int", $res);

        $res = $dicehistogram2->getHistogramMin();
        $exp = 1;
        $this->assertEquals($exp, $res);

    }
}
