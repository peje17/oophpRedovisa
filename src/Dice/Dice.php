<?php
namespace peje17\Dice;

/**
* Showing off a standard class with methods and properties.
*/
class Dice
{
    /**
     * @var integer $dicevalue value of dice
     */
    protected $dicesides;


    /**
     * @var integer last roll of the dice
     */
    protected $lastRoll;

    /**
     * Constructor to create a Dice.
     *
     */
    public function __construct(int $sides = 6)
    {
        $this->dicesides = 6;
    }

    /**
     * Return value of dice
     *
     * @return int $dicevalue with value of dice.
     */
    public function dicesides()
    {
        return $this->dicesides;
    }

    /**
     * Return new value of dice after roll
     *
     */
    public function rolldice()
    {
        $this->lastRoll =  random_int(1, 6);
        return $this->lastRoll;
    }

    /**
     * Get a graphic value of the last rolled dice.
     *
     * @return string as graphical representation of last rolled dice.
     */
    public function graphic()
    {
        return '<span class="dice-' . $this->lastRoll . '"></span>';
    }
}
