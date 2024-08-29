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

<div class="col-sm-9 mt-5">
    <!--Table-->
    <p class="bg-dark text-white p-2">List of Feedbacks</p>
    <?php
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table">
            <thead>
                <tr>
                    <th scope="col">Feedback ID</th>
                    <th scope="col">Content</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $row['f_id'] . '</th>';
            echo '<td>' . $row['f_content'] . '</td>';
            echo '<td>' . $row['stu_id'] . '</td>';
            echo '<td> <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value=' . $row["f_id"] . '>
                <button
                type="submit"
                class="btn btn-secondary mx-3"
                name="delete"
                value="delete"
                >
                <i class="far fa-trash-alt"></i>
                </button> 
                </form>
                        </form>
                     </td>
                     </tr>';
        }

        echo '</tbody>
        </table>';
    } else {
        echo "<div class='alert alert-info' role='alert'>
                No Results
              </div>";
    }

    if (isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
        if ($conn->query($sql) === TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo "<div class='alert alert-danger' role='alert'>Unable to Delete Data</div>";
        }
    }

    ?>

</div>


<!--div Row Close From Header-->
<div>
    <a href="./addnewstudent.php" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>

<!--div Container-fluid Close From Header-->




<?php
include ('../adminInclude/footer.php');
?>