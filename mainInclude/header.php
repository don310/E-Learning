<?php
if (basename($_SERVER['PHP_SELF']) === 'courses.php') {
    $pageTitle = "Courses";
} elseif (basename($_SERVER['PHP_SELF']) === 'payment.php') {
    $pageTitle = "Payment Status";
} elseif (basename($_SERVER['PHP_SELF']) === 'tutorial.php') {
    $pageTitle = "Tutorial";
} elseif (basename($_SERVER['PHP_SELF']) === '#') {
    $pageTitle = "Login";
} elseif (basename($_SERVER['PHP_SELF']) === 'logout.php') {
    $pageTitle = "Logout";
} elseif (basename($_SERVER['PHP_SELF']) === 'blog.php') {
    $pageTitle = "Blog";
} elseif (basename($_SERVER['PHP_SELF']) === 'note.php') {
    $pageTitle = "Notes";
} elseif (basename($_SERVER['PHP_SELF']) === '#') {
    $pageTitle = "Signup";
} elseif (basename($_SERVER['PHP_SELF']) === 'Student/studentProfile.php') {
    $pageTitle = "My Profile";
} elseif (basename($_SERVER['PHP_SELF']) === 'work.php') {
    $pageTitle = "Work With Us";
} elseif (basename($_SERVER['PHP_SELF']) === '#') {
    $pageTitle = "Feedback";
} elseif (basename($_SERVER['PHP_SELF']) === '#') {
    $pageTitle = "Contact";
} else {
    $pageTitle = "IntraCobroid";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="css/all.min.js">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <!--Start Navigation-->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
        <a class="navbar-brand" href="index.php">IntraCobroid</a>
        <span class="navbar-text">Learn and Implement</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav custom-nav pl-5">
                <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item "><a href="courses.php
                " class="nav-link">Courses</a></li>
                <li class="nav-item custom-nav-item "><a href="tutorial.php
                " class="nav-link">Tutorial</a></li>
                <li class="nav-item custom-nav-item">
                    <a href="blog.php" class="nav-link">
                        Blog
                    </a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a href="note.php" class="nav-link">
                        Notes
                    </a>
                </li>
                <li class="nav-item custom-nav-item"><a href="payment.php" class="nav-link">Payment Status</a></li>

                <?php
                session_start();
                if (isset($_SESSION['is_login'])) {
                    echo '<li class="nav-item custom-nav-item">
                                <a href="Student/studentProfile.php" class="nav-link">My Profile</a>
                              </li>
                              <li class="nav-item custom-nav-item">
                                <a href="logout.php" class="nav-link">Logout</a>
                              </li>';
                } else {
                    echo '<li class="nav-item custom-nav-item">
                                <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuLoginModalCenter">Login</a>
                              </li>
                              <li class="nav-item custom-nav-item">
                                <a href="signup.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Signup</a>
                              </li>';
                }
                ?>
                <li class="nav-item custom-nav-item"><a href="work.php" class="nav-link">Work With Us</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
                <li class="nav-item custom-nav-item text-right">
                    <button id="darkModeBtn" class="btn btn-outline-light mx-2">
                        <i class="fas fa-moon"></i>
                    </button>
                </li>

            </ul>
        </div>

    </nav>
    <!--End Navigation-->