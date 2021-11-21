<?php

helper('application_status_label');
?>

<table>
    <thead>
    <th>Student Name</th>
    <th>Title</th>
    <th>Status</th>
    <th>Date Submitted</th>
    <th>Date Approved</th>
    </thead>

    <?php
    foreach ($applications as $a) { ?>
        <tr>
            <td><?= e($a->name) ?></td>
            <td><?= HTML::link("../admin/applications.php?id={$a->id}", e($a->title)) ?></td>
            <td><?= applicationStatus($a) ?></td>
            <td><?= e($a->dateSubmitted) ?></td>
            <td><?= e($a->dateApproved) ?></td>
        </tr>
    <?php
    } ?>

</table>
