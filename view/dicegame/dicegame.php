<?php

namespace Anax\View;

/**
 * View file for the Dice Game
 */

?>
    <h1><?= $title ?></h1>

    <!-- View part for the game setup -->
    <?php if (!isset($_SESSION["game"])) : ?>
    <h2>Setup the game</h2>

        <div class="col-12 ">
            <form class="" method="POST">
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label for="playerName">Player name</label>
                    <input type="text" class="form-control" id="playerName" name="playerName" pattern="[a-öA-Ö ]{2,}" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="numberOfDices">Number of dices</label>
                    <input type="number" class="form-control" id="numberOfDices" name="numberOfDices" min="1" max="6" required>
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-2"><input type="submit" class="btn btn-success btn-sm "name="btnStartGame" value="Start Game"></div>
                </div>
            </form>
        </div>
    <?php endif; ?>



    <!-- View part for the game play -->
    <?php if (isset($_SESSION["game"])) : ?>
    <h3>Playing the game</h3>
    <p>Press ROLL to roll the dices - if you don't hit a one eye you can continue<br/>
       Press STOP to stop rolling<br />
       When you stop or hit one eye, the autoplay will roll the dice for the computer and finalize the Round -
       hit the ROUND button to continue with the next round.<br/>
       When one player hits 100 points the game is over and you can press NEW to start a new game.
   </p>
   <hr />
    <div class="row">
        <div class="col-6"><?= $_SESSION["game"]->autoplayer()->name() ?? "Computer" ?></div>
        <div class="col-2"><?= $_SESSION["game"]->autoplayertotal() ?? "0" ?></div>
    </div>
    <div class="row">
        <div class="col-6"><?= $_SESSION["game"]->player()->name() ?? "Unknown" ?></div>
        <div class="col-2"><?= $_SESSION["game"]->playertotal() ?? "0" ?></div>
    </div>
    <hr />
        <p class="text-danger text-center"><?= $winner ?? " " ?></p>
    <hr />
    <div class="row">
        <div class="col-6"><?= $_SESSION["game"]->player()->name() ?? "Unknown" ?></div>
        <div class="col-6"><?= $_SESSION["game"]->autoplayer()->name() ?? "Computer" ?></div>
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
        <form class="form-inline" method="POST" >

            <fieldset class="form-group row col-12 " <?= ($_SESSION["game"]->status() == true) ? "" : "disabled" ?>>
                <div class="row">
                <div class="col-sm-3"><input type="submit" class="btn btn-outline-dark btn-sm "name="btnRoll" value="Roll the dices" <?= $btnRollStatus ?? " " ?>></div>
                <div class="col-sm-3"><input type="submit" class="btn btn-dark btn-sm "name="btnStop" value="Stop rolling" <?= $btnStopStatus ?? " " ?>></div>
                <div class="col-sm-3 col-sm-offset-2"><input type="submit" class="btn btn-warning btn-sm "name="btnRound" value="Next Round" <?= $btnRoundStatus ?? " " ?>></div>
                </div>
            </fieldset>

            <fieldset class="form-group  row col-12" <?= ($_SESSION["game"]->status()) ? "disabled" : "" ?>>
                <div class="col-sm-2 offset-sm-10"><input type="submit" class="btn btn-danger btn-sm "name="btnNew" value="New Game"></div>
            </fieldset>
        </form>
    </div>
    <?php endif; ?>
