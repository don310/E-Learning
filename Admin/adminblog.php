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
// Function to sanitize input
function sanitizeInput($input) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($input));
}

if(isset($_POST['new_post'])){
    $title = sanitizeInput($_POST['title']);
    $content = sanitizeInput($_POST['content']);

    // Validate input
    if (!empty($title) && !empty($content)) {
        $sql = "INSERT INTO data(title, content) VALUES('$title', '$content')";
        mysqli_query($conn, $sql);

        header("Location: blog.php?info=added");
        exit();
    } else {
        // Handle validation errors
        $validationError = true;
    }
}

$sql = "SELECT * FROM data";
$query = mysqli_query($conn, $sql);
?>

<?php if(isset($_REQUEST["info"]) && $_REQUEST['info'] === "added"): ?>
    <?php $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Post has been added successfully</div>'; ?>
<?php endif; ?>


<div class="col-sm-9 mt-5 mx-3">
    <form action="" method="POST">
        <input name="title" type="text" placeholder="Blog Title" class="form-control bg-white text-dark my-3 text-center">
        <textarea name="content" class="form-control bg-white text-dark my-3" placeholder="Blog content...."></textarea>
        <?php if(isset($validationError) && $validationError): ?>
            <div class="alert alert-danger" role="alert">Title and content are required</div>
        <?php endif; ?>
        <button name="new_post" class="btn btn-danger">Add Post</button>
    </form>
</div>

<div class="row">
    <?php foreach($query as $q): ?>
        <div class="col-4 d-flex justify-content-center align-items-center">
            <div class="card text-white bg-dark mt-5">
                <div class="card-body" style="width: 18rem; padding: 30px;">
                    <h5 class="card-title"><?php echo $q['title']; ?></h5>
                    <p class="card-text"><?php echo $q['content']; ?></p>
                    <a href="view.php?id=<?php echo $q['id']; ?>" class="btn btn-danger"> Read More<span class="text-danger">&rarr;</span></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<?php
include ('../adminInclude/footer.php');
?>
