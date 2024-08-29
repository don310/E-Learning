<!-- Start Including header -->
<?php
include ('./dbConnection.php');
include ('./mainInclude/header.php');
?>
<!-- End Including header -->
<!--Start Course Page Banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="https://source.unsplash.com/1600x500/?courses, school, books" alt="courses"
            style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;" />


    </div>
</div>



<!--Start All Courses-->
<div class="container mt-5">
    <h1 class="text-center">All Courses</h1>
    <div class="row mt-4">
    <?php
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '
                <div class="col-sm-4 mb-4">
                   <a href="coursedetails.php?course_id=' . $course_id .'"  class="btn" style="text-align: left; padding:0px; ">
                <div class="card">
                    <img src="' . str_replace('..', '.', $row['course_img'] . '" class="card-img-top" alt="Image" />
                    <div class="card-body">
                        <h5 class="card-title">' . $row['course_name']) . '</h5>
                        <p class="card-text">' . $row['course_desc'] . '</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_original_price'] . '</del></small>
                            <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '</span>
                        </p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right " href="coursedetails.php?course_id=' . $course_id . '">Enroll</a>
                    </div>
                </div>
            </a> </div>';

            }
        }
        ?>
    </div>
</div>


<!-- Start Including footer -->
<?php
include ('./mainInclude/footer.php');
?>
<!-- End Including footer -->