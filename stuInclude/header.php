<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once ('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogEmail'];
}
//else {
//     echo "<script> location.href='../index.php'; </script>";
//     exit;
// }

if (isset($stuLogEmail)) {
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stu_img = $row['stu_img'];
    } else {
        $stu_img = "default_image.jpg";
    }
}
if (basename($_SERVER['PHP_SELF']) === 'myCourse.php') {
    $pageTitle = "My Courses";
} elseif (basename($_SERVER['PHP_SELF']) === 'stufeedback.php') {
    $pageTitle = "Feedback";
} elseif (basename($_SERVER['PHP_SELF']) === 'studentChangePass.php') {
    $pageTitle = "Change Password";
} elseif (basename($_SERVER['PHP_SELF']) === 'logout.php') {
    $pageTitle = "Logout";

} else {
    $pageTitle = "Profile"; 
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
<body data-bs-theme="dark">
    <div class="form-check form-switch mx-4">
        <input type="Checkbox" class="form-check-input p-2" role="switch" id="flexSwitchCheckCkecked" Checked onclick="myFunction()" />
    </div>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <div class="container-fluid">
            <a class="navbar-brand pl-3" href="studentProfile.php">IntraCobroid</a>
        </div>
    </nav>

    <!--SideBar-->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light slidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a href="studentProfile.php" class="nav-link">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourse.php" class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                My Courses
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="stufeedback.php" class="nav-link">
                                <i class="fas fa-comments"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentChangePass.php" class="nav-link">
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