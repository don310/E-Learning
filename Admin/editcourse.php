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

//Update 
if (isset($_REQUEST['requpdate'])) {
    //Checking for Empty Fields
    if (($_REQUEST['course_id'] == "") || ($_REQUEST["course_name"] == "") || ($_REQUEST["course_desc"] == "") || ($_REQUEST["course_author"] == "") || ($_REQUEST["course_duration"] == "") || ($_REQUEST["course_price"] == "") || ($_REQUEST["course_original_price"] == "")) {
        //Msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        //Assigning User Values to Variable 
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cauthor = $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginal_price = $_REQUEST['course_original_price'];
        $cimg = '../img/courseimg/' . $_FILES['course_img']['name'];

        $sql = "UPDATE course SET course_id ='$cid', course_name ='$cname', course_desc ='$cdesc', course_author ='$cauthor', course_duration ='$cduration', course_price ='$cprice', course_original_price ='$coriginal_price', course_img ='$cimg'
        WHERE course_id = '$cid'";
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron" style="background-color: #a6c4de; padding: 30px;">
    <h3 class="text-center">Update Course Details</h3>

    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="course_id mt-2">Course ID:</label>
            <input type="text" class="form-control mt-2" id="course_id" name="course_id" value="<?php if (isset($row['course_id'])) {
                echo $row['course_id'];
            } ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="course_name mt-2">Course Name:</label>
            <input type="text" class="form-control mt-2" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {
                echo $row['course_name'];
            } ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="course_desc">Course Description:</label>
            <textarea class="form-control mt-2" id="course_desc" name="course_desc" rows="2" required> <?php if (isset($row['course_desc'])) {
                echo $row['course_desc'];
            } ?> </textarea>
        </div>
        <div class="form-group mt-2">
            <label for="course_author">Course Author:</label>
            <input type="text" class="form-control mt-2" id="course_author" name="course_author" value="<?php if (isset($row['course_author'])) {
                echo $row['course_author'];
            } ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="course_duration">Course Duration:</label>
            <input type="text" class="form-control mt-2" id="course_duration" name="course_duration" value="<?php if (isset($row['course_duration'])) {
                echo $row['course_duration'];
            } ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="course_original_price">Course Original Price:</label>
            <input type="text" class="form-control mt-2" id="course_original_price" name="course_original_price" value="<?php if (isset($row['course_original_price'])) {
                echo $row['course_original_price'];
            } ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="course_price">Course Selling Price:</label>
            <input type="text" class="form-control mt-2" id="course_price" name="course_price" value="<?php if (isset($row['course_price'])) {
                echo $row['course_price'];
            } ?>" required>
        </div>
        <div class="form-group mt-3">
            <label for="course_img">Course Image:</label><br>
            <?php if (isset($row['course_img']) && !empty($row['course_img'])): ?>
                <img src="<?php echo $row['course_img']; ?>" alt="" class="img-thumbnail">
            <?php else: ?>
                <i class="fas fa-image"></i>
            <?php endif; ?>
            <input type="file" class="form-control-file mt-2" id="course_img" name="course_img" required>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary mx-3">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>

</div> <!--div Row close from header-->
</div> <!--div container-fluid close from header-->

<?php
include ('../adminInclude/footer.php');
?>