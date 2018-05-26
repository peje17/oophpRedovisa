<?php
require "../src/Blogg/function.php";
?>
<div class="lead mt-4"><?= $pagetitle ?></div>
<form method="post" class="form">
    <fieldset>


    <div class="form-group">
        <label for="formGroupTitle">Title:</label>
        <input type="text" class="form-control" name="contentTitle" id="contentTitle"   />
    </div>

    <div class="form-group">
        <label for="formGroupPath">Path:</label>
        <input type="text" class="form-control" name="contentPath" id="contentPath"   />
    </div>

    <div class="form-group">
        <label for="formGroupSlug">Slug:</label>
        <input type="text" class="form-control" name="contentSlug" id="contentSlug"   />
    </div>

    <div class="form-group">
        <label for="contentData">Text:</label>
        <textarea class="form-control" name="contentData" id="contentData"  rows="7" ></textarea>
    </div>

    <div class="form-group">
        <label for="contentType">BloggType:</label>
        <select class="form-control" id="contentType" name="contentType" >
          <option >Page</option>
          <option >Post</option>
        </select>
    </div>

    <div class="form-group">
        <label for="contentFilter">FilterType:</label>
        <select class="form-control" id="contentFilter" name="contentFilter"  >
          <option >bbcode</option>
          <option>nl2br</option>
          <option>markdown</option>
          <option>link</option>
        </select>
    </div>

    <div class="form-group">
        <label for="contentPublish">Publish:</label>
        <input type="datetime" name="contentPublish" class="form-control" id="contentPublish" value="<?= esc(date('Y-m-d H:i:s')) ?>" />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-outline-success" name="btnSave" value="Save" />
        <input type="reset" class="btn btn-outline-primary" name="btnReset" value="Reset" />
        <input type="submit" class="btn btn-outline-warning" name="btnCancel" value="Cancel" />
    </div>
    </fieldset>
</form>
