<?php

namespace Anax\View;

/**
 * View file for the Game type GET
 */

?>
<h1><?= $title ?></h1>

<!-- View part for the game setup -->

<h2>Setup the game</h2>

    <div class="col-12 ">
        <form class="" method="POST" action="<?= url($action) ?>">
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
                <div class="col-sm-2"><input type="submit" class="btn btn-success btn-sm" name="btnStartGame" value="Start Game"></div>
            </div>
        </form>
    </div>
