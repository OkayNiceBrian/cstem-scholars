<?php

helper('application_status_label');

$title = 'Applications';
$layout = 'admin/_layout.php';
$currentRole = "reviewer";
echo template('switch_roles.php', ['currentRole' => $currentRole]);
?>

<h1>Applications</h1>

<table>
    <thead>
        <th>Student Name</th>
        <th>Title</th>
        <th>Advisor</th>
        <th>Status</th>
        <th>Date Submitted</th>
        <th>Date Approved</th>
        <th>Download</th>
    </thead>

    <?php
    foreach ($reviews as $r) { ?>
        <?php
        $a = $r->application() ?>
        <tr>
            <td><?= e($a->name) ?></td>
            <td><?= HTML::link("../reviewers/applications.php?id={$r->id}", e($a->title)) ?></td>
            <td><?= e($a->advisorName) ?></td>
            <td><?= applicationStatus($a) ?></td>
            <td><?= e($a->dateSubmitted) ?></td>
            <td><?= e($a->dateApproved) ?></td>
            <td><?= HTML::link("../reviewers/download_application.php?id={$a->id}", e("Download")) ?></td>
        </tr>
    <?php
    } ?>

    

</table>

<p><a href="../reviewers/download.php">Download All Applications</a></p>