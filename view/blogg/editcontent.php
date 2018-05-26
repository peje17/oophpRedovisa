<?php
if (!$resultset) {
    return;
}
require "../src/Blogg/function.php";
//print_r($resultset);
?>
<div class="lead mt-4"><?= $pagetitle ?></div>
<form method="post" class="form">
    <fieldset>
     <input type="text" class="form-control" readonly name="contentId" id="contentId" value="<?= esc($resultset->id()) ?>"/>

    <div class="form-group">
        <label for="formGroupTitle">Title:</label>
        <input type="text" class="form-control" name="contentTitle" id="contentTitle"  value="<?= esc($resultset->title()) ?>" />
    </div>

    <div class="form-group">
        <label for="formGroupPath">Path:</label>
        <input type="text" class="form-control" name="contentPath" id="contentPath"  value="<?= esc($resultset->path()) ?>" />
    </div>

    <div class="form-group">
        <label for="formGroupSlug">Slug:</label>
        <input type="text" class="form-control" name="contentSlug" id="contentSlug"  value="<?= esc($resultset->slug()) ?>" />
    </div>

    <div class="form-group">
        <label for="contentData">Text:</label>
        <textarea class="form-control" name="contentData" id="contentData"  rows="7"><?= esc($resultset->data()) ?></textarea>
    </div>

    <div class="form-group">
        <label for="contentType">FilterType:</label>
        <select class="form-control" id="contentType" name="contentType">
          <option <?= (esc($resultset->type()) == "Page") ? "selected" : "" ?>>Page</option>
          <option <?= (esc($resultset->type()) == "Post") ? "selected" : "" ?>>Post</option>
        </select>
    </div>

    <div class="form-group">
        <label for="contentFilter">FilterType:</label>
        <select class="form-control" id="contentFilter" name="contentFilter">
          <option <?= (esc($resultset->filter()) == "bbcode") ? "selected" : "" ?>>bbcode</option>
          <option <?= (esc($resultset->filter()) == "nl2br") ? "selected" : "" ?>>nl2br</option>
          <option <?= (esc($resultset->filter()) == "markdown") ? "selected" : "" ?>>markdown</option>
          <option <?= (esc($resultset->filter()) == "link") ? "selected" : "" ?>>link</option>
        </select>
    </div>

    <div class="form-group">
        <label for="contentPublish">Publish:</label>
        <input type="datetime" name="contentPublish" class="form-control" id="contentPublish" value="<?= esc($resultset->published()) ?>" />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-outline-success" name="btnSave" value="Save" />
        <input type="reset" class="btn btn-outline-primary" name="btnReset" value="Reset" />

        <input type="submit" class="btn btn-outline-warning" name="btnCancel" value="Cancel" />

        <input type="submit" class="btn btn-outline-danger" name="btnDelete" value="Delete" />
    </div>
    </fieldset>
</form>
