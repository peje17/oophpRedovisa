<?php
    $result = $resultset ?? [];
?>
<!-- <div class="row col-12 mt-2 clearfix">
    <div class="col-12">
        <form class="form-inline" method="POST">
            <fieldset class="form-group row  ">
                <div class="row">
                <div ><input type="submit" class="btn btn-outline-danger "name="btnReset" value="Reset DB"></div>
                <div class="col-3"><input type="submit" class="btn btn-outline-success"name="btnSearchTitle" value="Search Title"></div>
                </div>
            </fieldset>
        </form>
<div> -->
<div class="row col-12 mt-2 clearfix">
    <form method="get" class="form-inline">
        <fieldset>
            <input type="hidden" name="route" value="searchyear">
            <input type="text" name="searchYearFrom" id="searchYearFrom" class="form-control mb-2 mr-sm-2" placeholder="from" value="<?= $searchYearFrom ?>" />
            <input type="text" name="searchYearTo" id="searchYearTo" class="form-control mb-2 mr-sm-2" placeholder="to" value="<?= $searchYearTo ?>" />
            <button type="submit" class="btn btn-success mb-2" name="doSearch" >Search</button>
        </fieldset>
    </form>
</div>

<div class="row clearfix mt-2">
    <table class="table">
        <tr class="first">
            <th>Rad</th>
            <th>Id</th>
            <th>Bild</th>
            <th>Titel</th>
            <th>År</th>
        </tr>

    <?php if ($result) : ?>
    <?php $id = -1;
    foreach ($result as $row) :
            $id++;
    ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $row->id ?></td>
            <td><img class="thumb" src="../<?= $row->image; ?>"></td>
            <td><?= $row->title ?></td>
            <td><?= $row->year ?></td>
        </tr>
    <?php
    endforeach; ?>
    <?php endif; ?>
    </table>
