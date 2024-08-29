<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');

//Admin Login Verification
if(!isset($_SESSION['is_admin_login'])){
if (isset($_POST['checkLogemail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])) {
    $adminLogEmail = $_POST['adminLogEmail'];
    $adminLogPass = $_POST['adminLogPass'];

    $stmt = $conn->prepare("SELECT admin_email, admin_pass FROM admin WHERE admin_email = ? AND admin_pass = ?");
    $stmt->bind_param("ss", $adminLogEmail, $adminLogPass);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->num_rows;

    if ($row === 1) {
        $_SESSION['is_admin_login'] = true;
        $_SESSION['adminLogEmail'] = $adminLogEmail;
        echo json_encode($row);
    } else if ($row === 0) {
        echo json_encode($row);
    }
}
}

?>
