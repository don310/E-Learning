<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../stuInclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $adminEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
    exit;
}


$stuEmail = $_SESSION['stuLogEmail'];
if(isset($_REQUEST['stuPassUpdatebtn'])) {
    if(($_REQUEST['stuNewPass'] == "")){
        //msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $stuPass = $_REQUEST['stuNewPass'];
            $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
            if ($conn->query($sql) === TRUE) {
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
            }
        }
    }
}
?>

<div class="col-sm-6 mt-5">
    <form class="mt-5 mx-5">
        <div class="form-group mt-3">
            <label for="inputEmail">Email:</label>
            <input type="email" class="form-control mt-2" id="inputEmail" value="<?php echo $stuEmail;
            ?>" readonly>
        </div>
        <div class="form-group mt-3">
            <label for="inputnewpassword">New Password:</label>
            <input type="password" class="form-control  mt-2" id="inputnewpassword" name="stuNewPass" placeholder="New Password">
        </div>
        <div>
            <button type="submit" class="btn btn-primary mr-4 mt-4" name="stuPassUpdatebtn">Update</button>
            <button type="reset" class="btn btn-secondary mx-3 mt-4" >Reset</button>
        </div>
        <?php if(isset($passmsg)) {echo $passmsg;} ?>
    </form>
</div>

</div> <!--div Row close from header-->
</div> <!--div container-fluid close from header-->

<?php
include ('../stuInclude/footer.php');
?>