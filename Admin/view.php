<?php
include ('./dbConnection.php');
include ('./mainInclude/header.php'); 
?>

<div class="container mt-5">
<?php foreach($query as $q) { ?>
        <div>
            <h1><?php echo $q['title']; ?></h1>
        </div>
        <p><?php echo $q['content']; ?></p>
    <?php } ?>
</div>

<?php
include('./mainInclude/footer.php');
?>