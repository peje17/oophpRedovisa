<?php

namespace peje17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHistogramTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObject()
    {
        $histogram = new Histogram();
        $this->assertInstanceOf("\peje17\Dice\Histogram", $histogram);

        $res = $histogram->getSerie();
        $this->assertInternalType("array", $res);
    }
}
