<?php
if (basename($_SERVER['PHP_SELF']) === 'adminDashboard.php') {
    $pageTitle = "Dashboard";
} elseif (basename($_SERVER['PHP_SELF']) === 'courses.php') {
    $pageTitle = "Courses";
} elseif (basename($_SERVER['PHP_SELF']) === 'lesson.php') {
    $pageTitle = "Lessons";
} elseif (basename($_SERVER['PHP_SELF']) === 'students.php') {
    $pageTitle = "Students";
} elseif (basename($_SERVER['PHP_SELF']) === 'sellReport.php') {
    $pageTitle = "Self Report";
} elseif (basename($_SERVER['PHP_SELF']) === 'adminPaymentStatus.php') {
    $pageTitle = "Payment Status";
} elseif (basename($_SERVER['PHP_SELF']) === 'feedback.php') {
    $pageTitle = "Feedback";
} elseif (basename($_SERVER['PHP_SELF']) === 'adminChangePass.php') {
    $pageTitle = "Change Password";
} elseif (basename($_SERVER['PHP_SELF']) === '../logout.php') {
    $pageTitle = " Logout";
} elseif (basename($_SERVER['PHP_SELF']) === 'adminblog.php') {
    $pageTitle = " Blog";
} else {
    $pageTitle = "E-Learning";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/adminstyle.css">

</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #225470;">
        <div class="container-fluid">
            <a class="navbar-brand" href="adminDashboard.php">IntraCobroid <small class="text-white"> Admin Area
                </small> </a>
    </nav>

    <!--SideBar-->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light slidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="adminDashboard.php" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php" class="nav-link">
                                <i class="fas fa-book"></i>
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lesson.php" class="nav-link">
                                <i class="fas fa-graduation-cap"></i>
                                Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminblog.php" class="nav-link">
                                <i class="fas fa-blog"></i>
                                Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="students.php" class="nav-link">
                                <i class="fas fa-user-graduate"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sellReport.php" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                Self Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminPaymentStatus.php" class="nav-link">
                                <i class="fas fa-money-check-alt"></i>
                                Payment Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link">
                                <i class="fas fa-comments"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminChangePass.php" class="nav-link">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>