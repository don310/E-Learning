<?php
include ('dbConnection.php');
session_start();
if (!isset($_SESSION['stuLogEmail'])) {
    echo "<script> location.href='loginsignup.php'; </script>";
    exit;
} else {
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $stuEmail = $_SESSION['stuLogEmail'];
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="GENERATOR" content="Evrsoft First Page">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--Font Awesome CSS-->
        <link rel="stylesheet" href="css/all.min.js">
        <!--Google Font-->
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/style.css">
        <title>Checkout</title>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-sm-3 jumbotron " style="background-color: #a6c4de; padding: 30px;">
                    <h3 class="text-center mb-5">Welcome to IntraCobroid Payment Page</h3>
                    <form method="post" action="./Paytmkit/pgRedirect.php">
                        <div class="form-group row">
                            <label for="ORDER_ID" class="col-sm-4 col-from-label mt-3">Order ID:</label>
                            <div class="col-sm-8">
                                <input id="ORDER_ID" class="form-control mt-3" tabindex="1" maxlength="20" size="20"
                                    name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS" . rand(10000, 99999999) ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CUST_ID" class="col-sm-4 col-from-label mt-3">Student Email:</label>
                            <div class="col-sm-8">
                                <input id="CUST_ID" class="form-control mt-3" tabindex="2" maxlength="12" size="12"
                                    name="CUST_ID" autocomplete="off" value="<?php if (isset($stuEmail)) {
                                        echo $stuEmail;
                                    } ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="TXN_AMOUNT" class="col-sm-4 col-from-label mt-3">Amount:</label>
                            <div class="col-sm-8 ">
                                <input title="TXN_AMOUNT" class="form-control mt-3" tabindex="10" type="text" name="TXN_AMOUNT"
                                    value="<?php if (isset($_POST['id'])) {
                                        echo $_POST['id'];
                                    } ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <input id="INDUSTRY_TYPE_ID" class="form-control mt-3" tabindex="4" type="hidden" maxlength="12"
                                    size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <input id="CHANNEL_ID" class="form-control" tabindex="4" type="hidden" maxlength="12"
                                    size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                            </div>
                        </div>
                        <div class="text-center">
                            <input value="CheckOut" type="submit" class="btn btn-primary mt-5" onclick="">
                            <a href="./courses.php" class="btn btn-secondary mt-5">Cancel</a>
                        </div>
                    </form>
                    <small class="form-text text-muted mt-5">Note: Complete Payment by Clicking Checkout Button</samll>
                </div>
            </div>

    </body>

    </html>

<?php }

?>