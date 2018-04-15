<?php

namespace Anax\View;

/**
 * View file for the Game type SESSION
 */

?>
<div class="container">
    <h1><?= $title ?></h1>
    <p>Guess a number between 1 and 100 - tries left: <?= $_SESSION["tries"] ?>
    </p>

    <form class="" method="POST">
        <div class="form-group row">
        <input type="number" class="form-control col-sm-3" name="guess" autofocus>
        <div class="col-sm-2"><input type="submit" class="btn btn-info btn-lg <?= ($_SESSION["number"]>0 && $_SESSION["tries"]>0) ? "" : "disabled" ?>" name="btnGuess" value="Guess"></div>
        <div class="col-sm-2 "><input type="submit" class="btn btn-warning btn-lg <?= ($_SESSION["number"]>0 && $_SESSION["tries"]>0) ? "" : "disabled" ?>" name="btnCheat" value="Cheat"></div>
        <div class="col-sm-2"><input type="submit" class="btn btn-primary btn-lg" name="btnReset" value="Start/Restart Game"></div>
        </div>
    </form>


    <?php if (isset($res)) : ?>
        <p class="text-danger">Your guess: <?= $guess ?> - <em><?= $res ?></em></p>
    <?php endif; ?>
    <?php if (isset($_POST["btnCheat"]) && $_SESSION["number"] > 0) : ?>
        <p>Cheat: <?= $_SESSION["number"] ?> </p>
    <?php endif; ?>
</div>
