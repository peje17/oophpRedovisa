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
        </tr>
        <?php $id = -1; foreach ($resultset as $row) :
            $id++;
        ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $row->id ?></td>
            <td><a  href="blogg/postview?Id=<?= $row->id ?>"><?= $row->title ?></a></td>
            <td><?= $row->type ?></td>
            <td><?= $row->published ?></td>
            <td><?= $row->created ?></td>
            <td><?= $row->updated ?></td>
            <td><?= $row->deleted ?></td>

        </tr>
        <?php endforeach; ?>
    </table>
</div>
