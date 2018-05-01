<?php

namespace peje17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHandTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectOneArguments()
    {
        $dicehand = new DiceHand(6);
        $this->assertInstanceOf("\peje17\Dice\DiceHand", $dicehand);

        $res = $dicehand->histogram();
        $this->assertInstanceOf("\peje17\Dice\Histogram", $res);
    }
}
