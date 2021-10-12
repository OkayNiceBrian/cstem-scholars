<?php
$user = User::current();

if ($currentRole == "admin") {
    if ($user->isAdvisor()) {
    ?>
        <div>
            <a style="text-decoration: none;" href="?redirect=advisors/applications.php">
                <span style="display: block; padding: 5px; margin-bottom: 5px; border-radius: 5px 5px 5px; border: 1px solid green; background-color: #98fb98;">
                    You are currently an ADMIN, but you are also an ADVISOR. You can click here to switch to ADVISOR view.
                </span>
            </a>
        </div>
    <?php
    }
    if ($user->isReviewer()) {
    ?>
        <div>
            <a style="text-decoration: none;" href="?redirect=reviewers/applications.php">
                <span style="display: block; padding: 5px; margin-bottom: 5px; border-radius: 5px 5px 5px; border: 1px solid green; background-color: #98fb98;">
                    You are currently an ADMIN, but you are also a REVIEWER. You can click here to switch to REVIEWER view.
                </span>
            </a>
        </div>
    <?php
    }
} else if ($currentRole == "reviewer") {
    if ($user->isAdvisor()) {
    ?>
        <div>
            <a style="text-decoration: none;" href="?redirect=advisors/applications.php">
                <span style="display: block; padding: 5px; margin-bottom: 5px; border-radius: 5px 5px 5px; border: 1px solid green; background-color: #98fb98;">
                    You are currently a REVIEWER, but you are also an ADVISOR. You can click here to switch to ADVISOR view.
                </span>
            </a>
        </div>
    <?php
    }
    if ($user->isAdmin()) {
    ?>
        <div>
            <a style="text-decoration: none;" href="?redirect=admin/">
                <span style="display: block; padding: 5px; margin-bottom: 5px; border-radius: 5px 5px 5px; border: 1px solid green; background-color: #98fb98;">
                    You are currently a REVIEWER, but you are also an ADMIN. You can click here to switch to ADMIN view.
                </span>
            </a>
        </div>
    <?php
    }
} else if ($currentRole == "advisor") {
    if ($user->isReviewer()) {
    ?>
        <div>
            <a style="text-decoration: none;" href="?redirect=reviewers/applications.php">
                <span style="display: block; padding: 5px; margin-bottom: 5px; border-radius: 5px 5px 5px; border: 1px solid green; background-color: #98fb98;">
                    You are currently an ADVISOR, but you are also a REVIEWER. You can click here to switch to REVIEWER view.
                </span>
            </a>
        </div>
    <?php
    }
    if ($user->isAdmin()) {
    ?>
        <div>
            <a style="text-decoration: none;" href="?redirect=admin/">
                <span style="display: block; padding: 5px; margin-bottom: 5px; border-radius: 5px 5px 5px; border: 1px solid green; background-color: #98fb98;">
                    You are currently an ADVISOR, but you are also an ADMIN. You can click here to switch to ADMIN view.
                </span>
            </a>
        </div>
    <?php
    }
}

if (isset($_GET['redirect'])) {
    HTTP::redirect('../' . $_GET['redirect']);
}
?>