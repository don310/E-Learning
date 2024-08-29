<?php
if (!isset($_SESSION)) {
    session_start();
}
include ('../adminInclude/header.php');
include ('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
    exit;
}

//Update 
if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $lid = $_REQUEST['lesson_id'];
        $lname = $_REQUEST['lesson_name'];
        $ldesc = $_REQUEST['lesson_desc'];
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $llink = '../lessonvid/'.$_FILES['lesson_link']['name'];

        $sql = "UPDATE lesson SET lesson_id ='$lid', lesson_name ='$lname', lesson_desc ='$ldesc', course_id ='$cid', course_name ='$cname', lesson_link ='$llink' WHERE lesson_id = '$lid'";
        
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron" style="background-color: #a6c4de; padding: 30px;">
    <h3 class="text-center">Update Lesson Details</h3>

    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="lesson_id mt-2">Lesson ID:</label>
            <input type="text" class="form-control mt-2" id="lesson_id" name="lesson_id" value="<?php if (isset($row['lesson_id'])) {
                echo $row['lesson_id'];
            } ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="lesson_name mt-2">Lesson Name:</label>
            <input type="text" class="form-control mt-2" id="lesson_name" name="lesson_name" value="<?php if (isset($row['lesson_name'])) {
                echo $row['lesson_name'];
            } ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="lesson_desc">Lesson Description:</label>
            <textarea class="form-control mt-2" id="lesson_desc" name="lesson_desc" rows="2" required> <?php if (isset($row['lesson_desc'])) {
                echo $row['lesson_desc'];
            } ?> </textarea>
        </div>
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
        <div class="form-group mt-3">
            <label for="lesson_link">Lesson Link:</label><br>

            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                    src="<?php if (isset($row['lesson_link'])) {
                        echo $row['lesson_link'];
                    } ?>" allowfullscreen></iframe>
            </div>

            <input type="file" class="form-control-file" name="lesson_link" id="lesson_link">
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="lesson.php" class="btn btn-secondary mx-3">Close</a>
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