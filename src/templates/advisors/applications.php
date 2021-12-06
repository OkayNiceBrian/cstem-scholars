<?php

$title = 'Applications';
$layout = 'admin/_layout.php';
$currentRole = "advisor";
echo template('switch_roles.php', ['currentRole' => $currentRole]);

helper('application_status_label');

?>

<h1>Applications</h1>

<?php
if ($period == null) { ?>
    <p>There is currently no ongoing period.</p>
<?php
} else { ?>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Title</th>
            <th>Status</th>
            <th>Date Submitted</th>
            <th>Download</th>
        </tr>

        <?php
        foreach ($applications as $a) {
            if ($a->periodID == $period->id) { ?>
                <tr>
                    <td><?= e($a->name) ?></td>
                    <td><?= HTML::link("../advisors/applications.php?id={$a->id}", e($a->title)) ?></td>
                    <td><?= applicationStatus($a) ?></td>
                    <td><?= e($a->dateSubmitted) ?></td>
                    <td><?= HTML::link("../advisors/download_application.php?id={$a->id}", e("Download")) ?></td>
                </tr>
        <?php
            }
        } ?>

        

    </table>

    <p><a href="../advisors/download.php">Download All Applications</a></p>
<?php
} ?>