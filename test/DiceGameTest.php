<?php

namespace peje17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceGameTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dicegame = new DiceGame();
        $this->assertInstanceOf("\peje17\Dice\DiceGame", $dicegame);

        $res = $dicegame->playertotal();
        $exp = 0;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectOneArguments()
    {
        $dicegame = new DiceGame("TestPlayer");
        $this->assertInstanceOf("\peje17\Dice\DiceGame", $dicegame);

        $res = $dicegame->player()->name();
        $exp = "TestPlayer";
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties.
     */
    public function testObjectProperties()
    {
        $dicegame = new DiceGame("TestPlayer");

        $this->assertInstanceOf("\peje17\Dice\DiceGame", $dicegame);
        $this->assertInstanceOf("\peje17\Dice\DicePlayer", $dicegame->player());
        $this->assertInstanceOf("\peje17\Dice\DiceAutoPlayer", $dicegame->autoplayer());
    }



    /**
     * Construct object and verify that the methods work as expected
     */
    public function testObjectMethods()
    {
        $dicegame1 = new DiceGame("TestPlayer");
        $this->assertInstanceOf("\peje17\Dice\DiceGame", $dicegame1);

        $res = $dicegame1->playerroll();
        $this->assertInternalType("string", $res);

        $res = $dicegame1->setgamestatus();
        $this->assertEquals(false, $res);
    }
}
