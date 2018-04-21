<?php
/**
 * Dice game specific routes.
 */


/**
 * Dice gameT
 */
$app->router->any(["GET", "POST"], "dicegame/dicegame", function () use ($app) {

    $data = ["title" => "Dice game"];

    /**
     * Start a new game
     */
    if (!isset($_SESSION["game"]) && isset($_POST["btnStartGame"])) {
        $_SESSION["game"] = new peje17\Dice\DiceGame($_POST["playerName"], $_POST["numberOfDices"]);
        $data["btnRollStatus"] = "";
        $data["btnStopStatus"] = "Disabled";
        $data["btnRoundStatus"] = "Disabled";
    }

    /**
     * Control the button roll action
     */
    if (isset($_POST["btnRoll"])) {
        $_SESSION["game"]->playerroll();
        $data["playergraphic"] = implode(' ', $_SESSION["game"]->player()->graphics()) . ' ';
        $data["playerscore"]  = $_SESSION["game"]->player()->score();
        $data["autoplayervalues"] = $_SESSION["game"]->autoplayerhand();
        $data["autoplayerscore"]  = $_SESSION["game"]->autoplayer()->score();
        $data["btnRollStatus"] = (($_SESSION["game"])->activeround()) ? "" : "Disabled";
        $data["btnStopStatus"] = (($_SESSION["game"])->activeround()) ? "" : "Disabled";
        $data["btnRoundStatus"] = (($_SESSION["game"])->activeround()) ? "Disabled" : "";
        $data["winner"]  = $_SESSION["game"]->winner();
    }

    /**
     * Control the start new round button
     */
    if (isset($_POST["btnRound"])) {
        $_SESSION["game"]->gameround();

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
    if (isset($_POST["btnStop"])) {
        $_SESSION["game"]->autoplay();
        $data["playergraphic"] = implode(' ', $_SESSION["game"]->player()->graphics()) . ' ';
        $data["playerscore"]  = $_SESSION["game"]->player()->score();
        $data["autoplayervalues"] = $_SESSION["game"]->autoplayerhand();
        $data["autoplayerscore"]  = $_SESSION["game"]->autoplayer()->score();
        $data["winner"]  = $_SESSION["game"]->winner();
        $data["btnRollStatus"] = "Disabled";
        $data["btnStopStatus"] = "Disabled";
        $data["btnRoundStatus"] = "";
    }

    /**
     * Handle the new button action
     */
    if (isset($_POST["btnNew"])) {
        unset($_SESSION["game"]);
    }

    /**
     * Render the page
     */
    $app->view->add("dicegame/dicegame", $data);
    $app->page->render($data);
});
