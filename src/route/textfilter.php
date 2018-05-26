<?php
/**
 * Textfilter specific routes.
 */

$app->router->get("textfilterview/textfilterview", function () use ($app) {

    $data = ["title" => "Textfilter applied in class"];
    $filter = new peje17\TextFilter1\TextFilter1();

    $bbcodesource = "En [b]fet[/b] [i]moped.[/i]";
    $bbcodehtml = $filter->parse($bbcodesource, ["bbcode"]);
    $data["bbcodesource"]  =  $bbcodesource;
    $data["bbcodehtml"] = $bbcodehtml;

    $nl2brsource = "One line.\nAnother line.";
    $nl2brhtml = $filter->parse($nl2brsource, ["nl2br"]);
    $data["nl2brsource"]  =  $nl2brsource;
    $data["nl2brhtml"] = $nl2brhtml;

    $linksource = "There is no place like 127.0.0.1! Except maybe http://news.bbc.co.uk/1/hi/england/surrey/8168892.stm?";
    $linkhtml = $filter->parse($linksource, ["link"]);
    $data["linksource"]  =  $linksource;
    $data["linkhtml"] = $linkhtml;

    $markdownsource = file_get_contents(__DIR__ . "/../../content/markdownsample.md");
    $markdownhtml = $filter->parse($markdownsource, ["markdown"]);
    $data["markdownsource"]  =  $markdownsource;
    $data["markdownhtml"] = $markdownhtml;

    $app->view->add("textfilterview/textfilterview", $data);
    $app->page->render($data);
});
