<?php

namespace peje17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceGraphicTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObject()
    {
        $graphicdice = new DiceGraphic(4);
        $this->assertInstanceOf("\peje17\Dice\DiceGraphic", $graphicdice);
    }

    /**
     * Test Methods
     */
    public function testMethods()
    {
        $graphicdice = new DiceGraphic(4);
        $res = $graphicdice->rolldice();
        $this->assertInternalType("int", $res);

        $res1 = $graphicdice->graphic();
        $exp = "dice-" . $res;
        $this->assertEquals($exp, $res1);
    }
}
