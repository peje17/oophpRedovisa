<?php

namespace peje17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DicePlayerTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectTwoArguments()
    {
        $diceplayer = new DicePlayer("TestPlayer", 6);
        $this->assertInstanceOf("\peje17\Dice\DicePlayer", $diceplayer);

        $res = $diceplayer->name();
        $exp = "TestPlayer";
        $this->assertEquals($exp, $res);

        $res = $diceplayer->roll();
        $this->assertInternalType("array", $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testAutoPlayer()
    {
        $diceautoplayer = new DiceAutoPlayer("TestAutoPlayer", 6);
        $this->assertInstanceOf("\peje17\Dice\DiceAutoPlayer", $diceautoplayer);

        $res = $diceautoplayer->autoroll(0.15);
        $this->assertInternalType("array", $res);
    }
}
