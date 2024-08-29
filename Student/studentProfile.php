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

$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuid = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_img"];
} else {
    echo "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to fetch data</div>";
}

// // Debugging code
// echo "<pre>";
// print_r($_SESSION);
// print_r($row);
// echo "</pre>";

if (isset($_REQUEST['updateStuNameBtn'])) {
    if (($_REQUEST['stuName'] == "")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        //Assigning User values to variable
        $stuName = $_REQUEST['stuName'];
        $stuOcc = $_REQUEST['stuOcc'];
        $stu_image = $_FILES['stuImg']['name'];
        $stu_image_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../img/stu/' . $stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);

        $sql = "UPDATE student SET stu_name ='$stuName', stu_occ ='$stuOcc', stu_img ='$img_folder' WHERE stu_email = '$stuEmail'";
        if ($conn->query($sql) === TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5 mx-3 " style="background-color: #c8d8e9; padding: 30px;">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="stuId mt-2">Student ID:</label>
            <input type="text" class="form-control mt-2" id="stuId" name="stuId" value="<?php if (isset($stuid)) {
                echo $stuid;
            } ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="stuEmail mt-2">Email:</label>
            <input type="email" class="form-control mt-2" id="stuEmail" name="stuEmail" value="<?php if (isset($stuEmail)) {
                echo $stuEmail;
            } ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="stuName">Name:</label>
            <input type="text" class="form-control mt-2" id="stuName" name="stuName" value="<?php if (isset($stuName)) {
                echo $stuName;
            } ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="stuOcc">Occupation:</label>
            <input type="text" class="form-control mt-2" id="stuOcc" name="stuOcc" value="<?php if (isset($stuOcc)) {
                echo $stuOcc;
            } ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="stuImg">Upload Image:</label>
            <input type="file" class="form-control-file mt-2" id="stuImg" name="stuImg" required>
        </div>
        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Submit</button>
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