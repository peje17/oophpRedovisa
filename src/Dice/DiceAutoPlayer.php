<?php
namespace peje17\Dice;

/**
 * An autoplayer of the Dice game
 */

class DiceAutoPlayer extends DicePlayer
{
    /**
     * Auto roll the dices - no of roll depending on number of dices and the lead of the game
     *
     * @return void.
     */
    public function autoroll($autoplayerLead)
    {
        $noOfRolls = floor(6/count($this->hand->dices()));
        if ($autoplayerLead < 0.10) {
            $noOfRolls++;
        }

        for ($i=0; $i < $noOfRolls; $i++) {
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
