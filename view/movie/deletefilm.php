<?php
    $result = $resultset ?? [];

?><h1><?= $title ?></h1>

<div class="row col-12 mt-2 clearfix">
    <form method="POST" class="form">
        <fieldset>
            <input type="hidden" name="route" value="deletefilm">

            <input type="text" name="id" class="form-control mb-2 mr-sm-2" placeholder="" value="<?= $result[0]->id ?? "" ?>" readonly />
            <input type="text" name="image" class="form-control mb-2 mr-sm-2" placeholder="image" value="<?= $result[0]->image ?? '' ?>" readonly />
            <input type="text" name="title" class="form-control mb-2 mr-sm-2" placeholder="title" value="<?= $result[0]->title ?? '' ?>" readonly/>
            <input type="text" name="year" class="form-control mb-2 mr-sm-2" placeholder="year" value="<?= $result[0]->year ?? '' ?>" readonly/>


            <input type="submit" class="btn btn-primary mb-2" name="btnDelete" value="Delete">
            <input type="submit" class="btn btn-primary mb-2" name="btnCancel" value="Cancel">
        </fieldset>
    </form>
</div>
