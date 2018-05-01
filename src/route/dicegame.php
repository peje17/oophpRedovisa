<?php

/**
 * Dice game specific routes.
 */


/**
 * Dice game GET
 */

$app->router->get("dicegame", function () use ($app) {
    $data = [
        "title"     => "Dice game Start Ä",
        "action"    => "dicegame/reset",
        "method"    => "post",
    ];

    $app->view->add("dicegame/dicegameStart", $data);
    $app->page->render($data);
});



/**
 * Dice game restart
 */
$app->router->post("dicegame/reset", function () use ($app) {
    $dices = $app->request->getPost("numberOfDices");
    $player = $app->request->getPost("playerName");
    $game  = new peje17\Dice\DiceGame($player, $dices);

    $data["btnRollStatus"] = "";
    $data["btnStopStatus"] = "Disabled";
    $data["btnRoundStatus"] = "Disabled";

    $app->session->set("game", $game);
    $app->response->redirect("dicegame/play");
});



/**
 * Dice game play
 */
$app->router->any(["GET", "POST"], "dicegame/play", function () use ($app) {
    $data = [
        "title"     => "Dice game Play",
        "action"    => "dicegame/play",
        "method"    => "post",
    ];
    $game = $app->session->get("game");

    /**
     * Control the button roll action
     */
    if ($app->request->getPost("btnRoll")) {
        $game->playerroll();
        $data["playergraphic"] = implode(' ', $game->player()->graphics()) . ' ';
        $data["playerscore"]  =$game->player()->score();
        $data["autoplayervalues"] = $game->autoplayerhand();
        $data["autoplayerscore"]  = $game->autoplayer()->score();
        $data["btnRollStatus"] = ($game->activeround()) ? "" : "Disabled";
        $data["btnStopStatus"] = ($game->activeround()) ? "" : "Disabled";
        $data["btnRoundStatus"] = ($game->activeround()) ? "Disabled" : "";
        $data["winner"]  = $game->winner();
    }

    /**
     * Control the start new round button
     */
    if ($app->request->getPost("btnRound")) {
        $game->gameround();
        $data["playerscore"]  = 0;
        $data["autoplayervalues"] = '';
        $data["autoplayerscore"]  = 0;
        $data["btnRollStatus"] = "";
        $data["btnStopStatus"] = "Disabled";
        $data["btnRoundStatus"] = "Disabled";
    }

    /**
     * Control the stop roll button
     */
    if ($app->request->getPost("btnStop")) {
        $game->autoplay();
        $data["playergraphic"] = implode(' ', $game->player()->graphics()) . ' ';
        $data["playerscore"]  = $game->player()->score();
        $data["autoplayervalues"] = $game->autoplayerhand();
        $data["autoplayerscore"]  = $game->autoplayer()->score();
        $data["winner"]  = $game->winner();
        $data["btnRollStatus"] = "Disabled";
        $data["btnStopStatus"] = "Disabled";
        $data["btnRoundStatus"] = "";
    }

    /**
     * Handle the new button action
     */
    if ($app->request->getPost("btnNew")) {
        $app->session->set("game", null);
        $data = [
            "title"     => "Dice game Start",
            "action"    => "dicegame/reset",
            "method"    => "post",
        ];
        $app->view->add("dicegame/dicegameStart", $data);
        $app->page->render($data);
    } else {
        $data["game"] = $game; 
        $app->view->add("dicegame/play", $data);
        $app->page->render($data);
    }
});
