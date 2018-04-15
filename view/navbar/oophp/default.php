<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<!-- <navbar>
    <a href="<?= url("") ?>">Hem</a> |
    <a href="<?= url("redovisning") ?>">Redovisning</a> |
    <a href="<?= url("om") ?>">Om</a> |
    <a href="<?= url("lek") ?>">Lek</a> |
    <a href="<?= url("debug") ?>">Debug</a>
</navbar> -->

<nav class="navbar navbar-expand-lg navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav navbar-dark">
        <a class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == "index.php" ? "active" : ""; ?>" href="<?= url("") ?>">Hem</a>
        <a class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == "redovisning" ? "active" : ""; ?>" href="<?= url("redovisning") ?>">Redovisning</a>
        <a class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == "om" ? "active" : ""; ?>" href="<?= url("om") ?>">Om</a>
        <a class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == "gissa" ? "active" : ""; ?>" href="<?= url("gissa") ?>">Gissa</a>
        <a class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == "lek" ? "active" : ""; ?>" href="<?= url("lek") ?>">Lek</a>
        <a class="nav-item nav-link <?= basename($_SERVER['PHP_SELF']) == "debug" ? "active" : ""; ?>" href="<?= url("debug") ?>">Debug</a>
    </div>
  </div>
</nav>
