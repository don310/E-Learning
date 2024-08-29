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
?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group row align-items-center">
            <label for="checklid" class="col-form-label">Enter Course ID:</label>
            <div class="col-sm-auto">
                <input type="text" class="form-control" id="checklid" name="checklid">
            </div>
            <div class="col-sm-auto">
                <button type="submit" class="btn btn-danger">Search</button>
            </div>
        </div>
    </form>

    <?php
    if (isset($_REQUEST['checklid'])) {
        $checkid = $_REQUEST['checklid'];
        $sql = "SELECT * FROM course WHERE course_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $checkid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['course_id'] = $row['course_id'];
            $_SESSION['course_name'] = $row['course_name'];
            ?>
            <h3 class="mt-5 bg-dark text-white p-2">Course ID:
                <?php if (isset($row['course_id'])) {
                    echo $row['course_id'];
                } ?> Course Name:
                <?php if (isset($row['course_name'])) {
                    echo $row['course_name'];
                } ?>
            </h3>
            <?php
            $sql = "SELECT * FROM lesson WHERE course_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $checkid);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Lesson ID</th>
                                <th scope="col">Lesson Name</th>
                                <th scope="col">Lesson Link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['lesson_id'] . '</th>';
                    echo '<td>' . $row['lesson_name'] . '</td>';
                    echo '<td>' . $row['lesson_link'] . '</td>';
                    echo '<td>
                    <form action="editlesson.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                           <button
                            type="submit"
                            class="btn btn-info mr-3"
                            name="view"
                            value="view"
                            >
                            <i class="fas fa-pen"></i>
                            </button>
                            </form>
                            <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                            <button
                            type="submit"
                            class="btn btn-secondary mx-3"
                            name="delete"
                            value="delete"
                            >
                            <i class="far fa-trash-alt"></i>
                            </button> 
                            </form>
                         </td>
                         </tr>';
                }
                echo '</tbody>
                </table>';
            } else {
                echo '<div class="alert alert-dark mt-4" role="alert">No lessons found for this course!</div>';
            }
        } else {
            echo '<div class="alert alert-dark mt-4" role="alert">Course Not Found !</div>';
        }

        if (isset($_REQUEST['delete'])) {
            $sql = "DELETE FROM lesson WHERE lesson_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_REQUEST['id']);
            if ($stmt->execute()) {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            } else {
                echo "<div class='alert alert-danger' role='alert'>Unable to Delete Data</div>";
            }
        }
    }
    ?>


    <?php
    include ('../adminInclude/footer.php');
    ?>