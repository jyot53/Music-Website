<?php

session_start();
if (!$_SESSION['username']) {
    echo "<script> 
        alert('Please login first before checking out');
        location.href = 'signin.php';
        </script>";
} else {

    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $databaseHost     = 'localhost';
    $databaseName     = 'practice_music';
    $databaseUsername = 'root';
    $databasePassword = 'root';

    $con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    $getemail = "select * from registration where username = '" . $_SESSION['username'] . "' ";
    $result = $con->query($getemail);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $email = $row["email"];
        }
    }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="GENERATOR" content="Evrsoft First Page">
        <title>Checkout Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c7ad1ef82c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
        <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
        <script src="js/jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>

    <body>


        <div class="container mt-5">

            <div class="row">
                <div class="jumbotron col-sm-6 offset-sm-3">
                    <h3 class="mb-5 text-center">Welcome To Payment Page</h3>
                    <form method="post" action="PaytmKit/pgRedirect.php">

                        <div class="form-group row">
                            <label for="ORDER_ID" class="col-sm-4 col-form-label">Order Id</label>
                            <div class="col-sm-8">
                                <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CUST_ID" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $email ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="planName" class="col-sm-4 col-form-label">Plan</label>
                            <div class="col-sm-8">
                                <input id="planNmae" class="form-control" tabindex="1" maxlength="20" size="20" name="planName" autocomplete="off" value="Advanced" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                            <div class="col-sm-8">
                                <input title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="599" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">INDUSTRY TYPE ID</label>
                            <div class="col-sm-8">
                                <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CHANNEL_ID" class="col-sm-4 col-form-label">CHANNEL ID</label>
                            <div class="col-sm-8">
                                <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Ckeckout" class="btn btn-primary" onclick="">
                            <a href="premium.php" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                    <small class="form-text text-muted">Note : Compelete Payment By Clicking on Ckeckout Button </small>
                </div>
            </div>

        </div>




    </body>

    </html>

<?php }
