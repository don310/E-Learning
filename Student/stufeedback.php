<?php

if (!isset($_SESSION)) {
    session_start();
}
include ('../stuInclude/header.php');
include_once ('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
    exit;
}

$stuEmail = $_SESSION['stuLogEmail'];
$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuid = $row["stu_id"];
}

if (isset($_REQUEST["submitFeedbackBtn"])) {
    if(($_REQUEST['f_content'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else { 
        $fcontent = $_REQUEST['f_content'];
        $sql = "INSERT INTO feedback (f_content, stu_id) VALUES ('$fcontent', '$stuid')";
        if ($conn->query($sql) === TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Submitted Successfully</div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Submit</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5 " style=" padding: 30px;">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="stuId mt-2">Student ID:</label>
            <input type="text" class="form-control mt-2" id="stuId" name="stuId" value="<?php if (isset($stuid)) {
                echo $stuid;
            } ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="f_content mt-2">Write Feedback:</label>
           <textarea class="form-control mt-2" id="f_content" name="f_content" rows=2 required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2" name="submitFeedbackBtn">Submit</button>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
</div>
</div> <!--div Row close from header-->
</div> <!--div container-fluid close from header-->

<?php
include ('../stuInclude/footer.php');
?>