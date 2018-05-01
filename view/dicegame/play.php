<?php

namespace Anax\View;

/**
 * View file for the Dice Game
 */

?><h1><?= $title ?></h1>
    <!-- View part for the game play -->
    <h3>Playing the game</h3>
    <p>Press ROLL to roll the dices - if you don't hit a one eye you can continue<br/>
       Press STOP to stop rolling<br />
       When you stop or hit one eye, the autoplay will roll the dice for the computer and finalize the Round -
       hit the ROUND button to continue with the next round.<br/>
       When one player hits 100 points the game is over and you can press NEW to start a new game.
   </p>
    <hr />

    <div class="row">
            <div class="col-6">
                <h4>Player Stat</h4>
                 <pre><?= $game->player()->hand()->histogram()->getAsText() ?></pre>
            </div>
            <div class="col-6">
                <h4>Autoplayer Stat</h4>
                <pre><?= $game->autoplayer()->hand()->histogram()->getAsText() ?></pre>
            </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-6"><?= $game->autoplayer()->name() ?? "Computer" ?></div>
        <div class="col-2"><?= $game->autoplayertotal() ?? "0" ?></div>
    </div>
    <div class="row">
        <div class="col-6"><?= $game->player()->name() ?? "Unknown" ?></div>
        <div class="col-2"><?= $game->playertotal() ?? "0" ?></div>
    </div>
    <hr />
        <p class="text-danger text-center"><?= $winner ?? " " ?></p>
    <hr />
    <div class="row">
        <div class="col-6"><?= $game->player()->name() ?? "Unknown" ?></div>
        <div class="col-6"><?= $game->autoplayer()->name() ?? "Computer" ?></div>
    </div>
    <div class="row">
        <div class="col-6"><p>Sum is: <?= isset($playerscore) ? $playerscore : "" ?></p></div>
        <div class="col-6"><p>Sum is: <?= isset($autoplayerscore) ? $autoplayerscore : "" ?></p></div>
    </div>
    <div class="row">
        <div class="col-6 dice-utf8">
            <?=  $playergraphic ?? "" ?>
            <!-- <?=  (isset($values)) ? implode("    ", $values) : "" ?> -->
        </div>
        <div class="col-6 dice-utf8"><?= $autoplayervalues ?? "" ?></div>
    </div>

    <hr />
    <div class="col-12">
        <form class="form-inline" method="POST" action="<?= url($action) ?>">

            <fieldset class="form-group row col-12 " <?= ($game->status() == true) ? "" : "disabled" ?>>
                <div class="row">
                <div class="col-sm-4"><input type="submit" class="btn btn-outline-dark btn-sm "name="btnRoll" value="Roll the dices" <?= $btnRollStatus ?? " " ?>></div>
                <div class="col-sm-4 "><input type="submit" class="btn btn-dark btn-sm "name="btnStop" value="Stop rolling" <?= $btnStopStatus ?? "disabled" ?>></div>
                <div class="col-sm-4 col-sm-offset-2"><input type="submit" class="btn btn-warning btn-sm "name="btnRound" value="Next Round" <?= $btnRoundStatus ?? "disabled" ?>  ></div>
                </div>
            </fieldset>

            <fieldset class="form-group  row col-12" <?= ($game->status()) ? "disabled" : "" ?>>
                <div class="col-sm-2 offset-sm-10"><input type="submit" class="btn btn-danger btn-sm "name="btnNew" value="New Game"></div>
            </fieldset>
        </form>
    </div>
