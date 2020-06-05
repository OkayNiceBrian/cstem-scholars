<?php

$title = 'Applications';
$layout = 'admin/_layout.php';

helper('message_flash');
?>

<h1>Applications</h1>

<?= messageFlash() ?>

<table>
    <thead>
    <th>Student Name</th>
    <th>Title</th>
    <th>Status</th>
    </thead>

    <?php
    foreach ($applications as $a) { ?>
        <tr>
            <td><?= e($a->name) ?></td>
            <td><?= HTML::link("../admin/applications.php?id={$a->id}", e($a->title)) ?></td>
            <td><?= e($a->status) ?></td>
        </tr>
        <?php
    } ?>
</table>
