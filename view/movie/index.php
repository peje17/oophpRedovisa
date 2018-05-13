<?php
if (!$resultset) {
    return;
}
?>
<div class="row col-12 mt-2 clearfix">
    <div class="col-12">
        <form class="form-inline" method="POST">
            <fieldset class="form-group row  ">
                <div class="row">
                <!-- <div class=""><input type="submit" class="btn btn-outline-danger" name="btnReset" value="Reset DB"></div>-->
                <div class="mr-2"><input type="submit" class="btn btn-outline-success" name="btnSearchTitle" value="Search Title"></div>
                <div class="mr-2"><input type="submit" class="btn btn-outline-success" name="btnSearchYear" value="Search Year"></div>
                <div class="mr-2"><input type="submit" class="btn btn-outline-success" name="btnAddFilm" value="Add film"></div>
                </div>
            </fieldset>
        </form>
<div>

<div class="row clearfix mt-2">
    <table class="table">
        <tr class="first">
            <th>Rad</th>
            <th>Id</th>
            <th>Bild</th>
            <th>Titel</th>
            <th>År</th>
        </tr>
    <?php $id = -1; foreach ($resultset as $row) :
        $id++;
    ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $row->id ?></td>
            <td><img class="img-thumbnail" src="<?= $row->image ?>"></td>
            <td><?= $row->title ?></td>
            <td><?= $row->year ?></td>
            <td>
                <div class=""><a class="btn btn-success" href="movie/editfilm?Id=<?= $row->id ?>" role="button" value="Edit" data-id="<?= $id ?>">Edit</a></div>
                <div class="mt-1"><a class="btn btn-danger" href="movie/deletefilm?Id=<?= $row->id ?>" role="button" value="Delete" data-id="<?= $id ?>">Delete</a></div>
            </td>
            <!-- <td><div class="col-2"><input type="submit" href="movie/editfilm" class="btn btn-outline-dark" name="btnEdit" value="Edit" data-id="<?= $id ?>"></div></td> -->
        </tr>
    <?php endforeach; ?>
    </table>
</div>
