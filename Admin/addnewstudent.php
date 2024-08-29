<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../adminInclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
    exit;
}

if(isset($_REQUEST['newStuSubmitBtn'])) {
    if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

        $sql = "INSERT INTO student (stu_name, stu_email, stu_pass, stu_occ) VALUES ('$stu_name', '$stu_email', '$stu_pass', '$stu_occ')";

        if($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
            // header("Location: students.php");
            // exit;
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Student</div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5 mx-3 jumbotron" style="background-color: #a6c4de; padding: 30px;">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="course_name mt-2">Name:</label>
            <input type="text" class="form-control mt-2" id="stu_name" name="stu_name" required>
        </div>
        <div class="form-group mt-2">
            <label for="stu_email">Email:</label>
            <input type="text" class="form-control mt-2" id="stu_email" name="stu_email" required>
        </div>
        <div class="form-group mt-2">
            <label for="stu_pass">Password:</label>
            <input type="password" class="form-control mt-2" id="stu_pass" name="stu_pass" required>
        </div>
        <div class="form-group mt-2">
            <label for="stu_occ">Occupation:</label>
            <input type="text" class="form-control mt-2" id="stu_occ" name="stu_occ" required>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="students.php" class="btn btn-secondary mx-3">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div> <!--div Row close from header-->
</div> <!--div container-fluid close from header-->
<?php
include ('../adminInclude/footer.php');
?>