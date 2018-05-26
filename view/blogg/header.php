<?php
require "../src/Blogg/function.php";
?>
<div class="row col-12 mt-2 clearfix">
    <div class="col-12">
        <form class="form-inline" method="POST">
            <fieldset class="form-group row ">
                <div class="row">
                <div class="mr-2"><input type="submit" class="btn btn-outline-success <?= $pagetitle == "Show All" ? "active" : ""; ?>" name="btnShowAll" value="Show all"></div>
                <div class="mr-2"><input type="submit" class="btn btn-outline-success <?= $pagetitle == "Admin" ? "active" : ""; ?>" name="btnAdmin" value="Admin"></div>
                <div class="mr-2"><input type="submit" class="btn btn-outline-success" name="btnCreate" value="Create"></div>
                <div class="mr-2"><input type="submit" class="btn btn-outline-success" name="btnResetDB" value="Reset DB"></div>
                <div class="mr-2"><input type="submit" class="btn btn-outline-success" name="btnPages" value="View Pages"></div>
                <div class="mr-2"><input type="submit" class="btn btn-outline-success" name="btnPosts" value="View Posts"></div>
                </div>
            </fieldset>
        </form>
<div>
<div class="lead mt-4"><?= $pagetitle ?></div>
