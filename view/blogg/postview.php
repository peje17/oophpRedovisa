<?php
if (!$resultset) {
    return;
}
require "../src/Blogg/function.php";
?>

<div class="lead mt-4"><?= $pagetitle ?></div>
<form method="post" class="form">
    <fieldset>
     <input type="text" class="form-control" readonly name="contentId" id="contentId" value="<?= esc($resultset->id()) ?>"/>

    <div class="form-group">
        <label for="formGroupTitle">Title:</label>
        <input type="text" class="form-control" readonly name="contentTitle" id="contentTitle" placeholder="Title" value="<?= esc($resultset->title()) ?>" />
    </div>

    <div class="form-group">
        <label for="formGroupPath">Path:</label>
        <input type="text" class="form-control"  readonly name="contentPath" id="contentPath" placeholder="contentPath" value="<?= esc($resultset->path()) ?>" />
    </div>

    <div class="form-group">
        <label for="formGroupSlug">Slug:</label>
        <input type="text" class="form-control" readonly name="contentSlug" id="contentSlug" placeholder="Slug" value="<?= esc($resultset->slug()) ?>" />
    </div>

    <div class="form-group">
        <label for="contentData">Text:</label>
        <p><?= $resultset->data() ?></p>
    </div>

    <div class="form-group">
        <label for="contentType">ContentType:</label>
        <select class="form-control" id="contentType" readonly name="contentType">
          <option <?= (esc($resultset->type()) == "Page") ? "selected" : "" ?>>Page</option>
          <option <?= (esc($resultset->type()) == "Post") ? "selected" : "" ?>>Post</option>
        </select>
    </div>

    <div class="form-group">
        <label for="contentFilter">FilterType:</label>
        <select class="form-control" id="contentFilter" readonly name="contentFilter">
          <option <?= (esc($resultset->filter()) == "bbcode") ? "selected" : "" ?>>bbcode</option>
          <option <?= (esc($resultset->filter()) == "nl2br") ? "selected" : "" ?>>nl2br</option>
          <option <?= (esc($resultset->filter()) == "markdown") ? "selected" : "" ?>>markdown</option>
          <option <?= (esc($resultset->filter()) == "link") ? "selected" : "" ?>>link</option>
        </select>
    </div>

    <div class="form-group">
        <label for="contentPublish">Publish:</label>
        <input type="datetime" readonly name="contentPublish" class="form-control" id="contentPublish" value="<?= esc($resultset->published()) ?>" />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-outline-warning" name="btnReturn" value="Close" />
    </div>
    </fieldset>
</form>
