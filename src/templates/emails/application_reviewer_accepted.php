<?php

$layout = 'emails/layout.php';
?>

    <p>
        A CSTEM Scholars application is available for final approval. You may go to
        <?= HTML::link(BASE_URL . '/admin/', BASE_URL . '/admin/') ?>
        to approve it. Here are the details:
    </p>

    <div class="label">Project Title:</div>
    <p><?= e($application->title) ?></p>

<?= HTML::template('application_details.php', $application) ?>