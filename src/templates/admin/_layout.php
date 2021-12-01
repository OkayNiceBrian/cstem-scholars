<?php              
 $name = $_SESSION["name"];
 $email = $_SESSION["email"];
 $user = User::current();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?> - CSTEM Research Grant Admininstrator</title>
    <link rel="stylesheet" href="../CSS/admin.css">
    <link rel="stylesheet" href="../CSS/app_status.css">
    <link rel="icon" href="../favicon.png" />
    <script src="/jquery-3.5.1.slim.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="../admin.js"></script>
</head>

<body>

    <button id="menu-button" title="Menu"><i class="icon menu-light"></i> Menu</button>

    <nav class="sidebar" id="menu">
        <div class="logo">
            <img src="../images/logo.svg" alt="EWU Logo" width="128" height="128">
        </div>

        <?php
        if ($user->isAdvisor()) { ?>
            <p>Advisor</p>
            <ul>
                <li><a href="../advisors/applications.php"><i class='far fa-user-circle' style='font-size:16px; margin-left:4px; margin-right:6px;'></i> User: <?php echo $name ?></a></li>
                <!-- <li><a href="../advisors/applications.php"><i class='fas fa-file-export' style='font-size:16px; left:4px'></i> Email: <?php echo $email ?></a></li> -->
                <li><a href="../advisors/applications.php"><i class="icon check-square-light"></i>Accept Applications</a>
                </li>
            </ul>
        <?php
        } ?>

        <?php
        if ($user->isReviewer()) { ?>
            <p>Reviewer</p>
            <ul>
                <li><a href="../reviewers/applications.php"><i class='far fa-user-circle' style='font-size:16px; margin-left:4px; margin-right:6px;'></i> User: <?php echo $name ?></a></li>
                <!-- <li><a href="../reviewers/applications.php"><i class='fas fa-file-export' style='font-size:36px'></i> Email: <?php echo $email ?></a></li> -->
                <li><a href="../reviewers/applications.php"><i class="icon list-light"></i>Review Applications</a></li>
            </ul>
        <?php
        } ?>

        <?php
        if ($user->isAdmin()) { ?>
            <p>Administrator</p>
            <ul>
                <li><a href="../admin/"><i class='far fa-user-circle' style='font-size:16px; margin-left:4px; margin-right:6px;'></i> User: <?php echo $name ?></a></li>
                <!-- <li><a href="../admin/"><i class='fas fa-file-export' style='font-size:36px'></i> Email: <?php echo $email ?></a></li> -->
                <li><a href="../admin/"><i class="icon grid-light"></i>Dashboard</a></li>
                <li><a href="../admin/periods.php"><i class="icon calendar-light"></i>Periods</a></li>
                <li><a href="../admin/applications.php"><i class="icon file-text-light"></i>Applications</a></li>
                <li><a href="../admin/users.php"><i class="icon users-light"></i>Users</a></li>
            </ul>
        <?php
        } ?>

        <ul>
            <li><a href="../help.php"><i class="icon help-circle-light"></i>Help</a></li>
            <li><a href="../logout.php"><i class="icon log-out-light"></i>Log out</a></li>
        </ul>
    </nav>

    <main class="content">
        <?= $content ?>
    </main>
</body>

</html>