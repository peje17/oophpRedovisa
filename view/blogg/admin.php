<?php
if (!$resultset) {
    return;
}
require "header.php";
?>


<div class="row clearfix mt-2">
    <table class="table table-sm">
        <tr class="first">
            <th>Rad</th>
            <th>Id</th>
            <th>Title</th>
            <th>Type</th>
            <th>Published</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Action</th>

        </tr>
        <?php $id = -1; foreach ($resultset as $row) :
            $id++;
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $row->id ?></td>
                <td><?= $row->title ?></td>
                <td><?= $row->type ?></td>
                <td><?= $row->published ?></td>
                <td><?= $row->created ?></td>
                <td><?= $row->updated ?></td>
                <td><?= $row->deleted ?></td>
                <td>
                    <div class=""><a class="btn btn-outline-warning btn-sm" href="blogg/editcontent?Id=<?= $row->id ?>" role="button" value="Edit" name="btnEdit" data-id="<?= $id ?>">Edit</a></div>
                    <!-- <div class="mt-1"><a class="btn btn-outline-danger btn-sm" href="blogg/editcontent?Id=<?= $row->id ?>" role="button" value="Delete" name="btnDelete" data-id="<?= $id ?>">Delete</a></div> -->
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
