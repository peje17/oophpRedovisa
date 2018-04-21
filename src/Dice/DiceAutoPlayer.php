<?php
namespace peje17\Dice;

/**
 * An autoplayer of the Dice game
 */

class DiceAutoPlayer extends DicePlayer
{
    /**
     * Auto roll the dices - no of roll depending on number of dices
     *
     * @return void.
     */
    public function autoroll()
    {
        $dices = count($this->hand->dices());
        for ($i=0; $i < floor(6/$dices); $i++) {
            $this->hand->roll();
            $this->graphics = array_merge($this->graphics, $this->hand->graphic());
            $this->updatescore($this->hand->values());
            if (in_array(1, $this->hand->values())) {
                break;
            }
        }
        return ($this->hand->values());
    }
}
