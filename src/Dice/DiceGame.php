<?php
namespace peje17\Dice;

/**
 * Dicegame - controlling a play of dices
 */

class DiceGame
{
    private $player;
    private $playertotal;
    private $playerhand;
    private $autoplayer;
    private $autoplayertotal;
    private $autoplayerhand;
    private $noofdices;
    private $status;
    private $activeround;
    private $winner;

    /**
     * Constructor to initiate the game with a number of dices.
     *
     * @param string name of player
     * @param int dices - number of dices to play with
     */
    public function __construct(string $playername = 'Unknown', int $noofdices = 1)
    {
        $this->player   = new DicePlayer($playername, $noofdices);
        $this->playertotal = 0;
        $this->playerhand = "";

        $this->autoplayer = new DiceAutoPlayer('Computer', $noofdices);
        $this->autoplayertotal = 0;
        $this->autoplayerhand = "";

        $this->status = true;
        $this->activeround = false;
        $this->winner = "";
    }


    /**
     * Return value of dice
     *
     * @return player player
     */
    public function player()
    {
        return $this->player;
    }

    /**
     * Return value of dice
     *
     * @return autoplayer
     */
    public function autoplayer()
    {
        return $this->autoplayer;
    }

    /**
     * Return value of dice
     *
     * @return int playertotal
     */
    public function playertotal()
    {
        return $this->playertotal;
    }

    /**
     * Return value of dice
     *
     * @return int autoplayertotal
     */
    public function autoplayertotal()
    {
        return $this->autoplayertotal;
    }

    /**
     * Return playerhand
     *
     * @return playerhand
     */
    public function playerhand()
    {
        return $this->playerhand;
    }

    /**
     * Return autoplayer hand
     *
     * @return autoplayerhand
     */
    public function autoplayerhand()
    {
        return $this->autoplayerhand;
    }

    /**
     * Return value of dice
     *
     * @return activeround
     */
    public function activeround()
    {
        return $this->activeround;
    }

    /**
     * Return value of dice
     *
     * @return string $winner of the game
     */
    public function winner()
    {
        return $this->winner;
    }

    /**
     * Return value of dice
     *
     * @return status of the game
     */
    public function status()
    {
        return $this->status;
    }




    /**
     * Initialize new round in game
     *
     * @return void.
     */
    public function gameround()
    {
        $this->player->init();
        $this->playerhand = "";
        $this->autoplayer->init();
        $this->autoplayerhand = "";
    }


    /**
     * Roll the player dices
     *
     * @return void.
     */
    public function playerroll()
    {
        $this->activeround = true;
        $values = $this->player->roll();
        $graphics = $this->player->graphics();
        if (in_array(1, $values)) {
            $this->autoplay();
        }
        $this->playerhand .= implode(' ', $graphics) . ' ';
        return $this->playerhand;
    }

    /**
     * Autoplay the reste of the game
     *
     * @return void
     */
    public function autoplay()
    {
        $autoplayerLead = ($this->autoplayertotal - $this->playertotal) / ($this->autoplayertotal + 0.001);
        $values = $this->autoplayer->autoroll($autoplayerLead);
        $graphics = $this->autoplayer->graphics();
        $this->autoplayerhand .= implode(' ', $graphics) . ' ';
        $this->playertotal += $this->player->score();
        $this->autoplayertotal += $this->autoplayer->score();
        $this->setgamestatus();
    }

    /**
     * Set the status of the game from the total of points
     *
     * @return void
     */
    public function setgamestatus()
    {
        $winnertext = 'Winner is: ';
        if ($this->playertotal >= 100  || $this->autoplayertotal >= 100) {
            if ($this->playertotal > $this->autoplayertotal) {
                $this->winner = $winnertext . $this->player()->name();
            } elseif ($this->autoplayertotal > $this->playertotal) {
                $this->winner = $winnertext . $this->autoplayer()->name();
            } else {
                $this->winner = "None (it's a draw)";
            }
            $this->status = false;
        }
        $this->activeround = false;
    }
}
