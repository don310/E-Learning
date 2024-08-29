<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');

//Checking Email Already Registered
if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT stu_email FROM student WHERE stu_email = '". 
    $stuemail."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
} 

//Insert Stduent
if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])){
    // Retrieve data from POST request
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];
    
    $sql = "INSERT INTO student (stu_name, stu_email, stu_pass) VALUES ('$stuname', '$stuemail', '$stupass')";

    // Execute SQL query
    if($conn->query($sql) === TRUE){
        echo json_encode("OK"); 
    }else{
        echo json_encode("Failed"); 
    }
}


//Student Login Verification
if(!isset($_SESSION['is_login'])){
if (isset($_POST['checkLogemail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])) {
    $stuLogEmail = $_POST['stuLogEmail'];
    $stuLogPass = $_POST['stuLogPass'];

    $stmt = $conn->prepare("SELECT stu_email, stu_pass FROM student WHERE stu_email = ? AND stu_pass = ?");
    $stmt->bind_param("ss", $stuLogEmail, $stuLogPass);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->num_rows;

    if ($row === 1) {
        $_SESSION['is_login'] = true;
        $_SESSION['stuLogEmail'] = $stuLogEmail;
        echo json_encode($row);
    } else if ($row === 0) {
        echo json_encode($row);
    }
}
}
?>
