<?php

namespace Anax\View;

/**
 * View file for the Game type GET
 */

?>

<div class="container">

    <h1><?= $title ?></h1>
    <p>Guess a number between 1 and 100 - tries left: <?= $game->tries() ?></p>

    <form class="" method="GET">
        <input type="hidden" name="number" value="<?= $game->number() ?>">
        <input type="hidden" name="tries" value="<?= $game->tries() ?>">
        <div class="form-group row">
        <input type="number" class="form-control col-sm-3 " name="guess" autofocus>
        <div class="col-sm-2"><input type="submit" class="btn btn-info btn-lg <?= ($game->number()>0 && $game->tries()>0) ? "" : "disabled" ?>" name="btnGuess" value="Guess" > </div>
        <div class="col-sm-2 "><input type="submit" class="btn btn-warning btn-lg <?= ($game->number()>0 && $game->tries()>0) ? "" : "disabled" ?>" name="btnCheat" value="Cheat"></div>
        <div class=" col-sm-2"><p><a class="btn btn-primary btn-lg" href="?reset">Start/Restart Game</a></p></div>
        </div>
    </form>

    <?php if (isset($res)) : ?>
        <p class="text-danger">Your guess: <?= $guess ?> - <em><?= $res ?></em></p>
    <?php endif; ?>
    <?php if (isset($_GET["btnCheat"]) && $number > 0) : ?>
        <p>Cheat: <?= $game->number(); ?></p>
    <?php endif; ?>
</div>
