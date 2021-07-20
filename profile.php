<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "You are not logged in Kindly signin first";

    header("location:signin.php");
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <style>
        body {
            background-color: #f9f9fa;
            width: 50%;
            margin: auto;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .padding {
            padding: 1rem !important
        }

        .user-card-full {
            overflow: hidden
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px
        }

        .m-r-0 {
            margin-right: 0px
        }

        .m-l-0 {
            margin-left: 0px
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px
        }

        .bg-c-lite-green {
            background: linear-gradient(to right, #7c98b3,#637081
);
        }

        .user-profile {
            padding: 0px 0
        }

        .card-block {
            padding: 1.25rem
        }

        .m-b-25 {
            margin-bottom: 25px
        }

        .img-radius {
            border-radius: 50px
        }

        h1 {
            font-size: 50px;
            text-transform: uppercase;
        }

        .card .card-block p {
            line-height: 25px
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .card-block {
            padding: 1rem;
            height: 350px;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .m-b-20 {
            margin-bottom: 10px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .card .card-block p {
            line-height: 25px
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .text-muted {
            color: #919aa3 !important
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
            font-weight: 600
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .user-card-full .social-link li {
            display: inline-block
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }

        .homeLink {
            margin: 10px 0;
            padding: 0px 250px;
        }
    </style>

</head>

<body>
    <?php

    $databaseHost     = 'localhost';
    $databaseName     = 'practice_music';
    $databaseUsername = 'root';
    $databasePassword = 'root';
    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    $query = "select * from registration where username='$username'";
    $userDetails = array();
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $userDetails[] = $row;
    }
    ?>

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="<?php echo $userDetails[0]['avatar'] ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h1 class="f-w-600"><?php echo $userDetails[0]['username'] ?></h1>
                                    <p style="font-size: 30px;text-align:center;">"Music is the soundtrack of your life"</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block" style="height: 450px;">
                                    <h3 style="font-size: 30px;" class="m-b-20 p-b-5 b-b-default f-w-600">Information</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Username</p>
                                            <h3 class="text-muted f-w-400"><?php echo $userDetails[0]['username'] ?></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h3 class="text-muted f-w-400"><?php echo $userDetails[0]['email'] ?></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <h3 class="text-muted f-w-400"><?php echo $userDetails[0]['mobile'] ?></h3>
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="m-b-10 f-w-600">Password</p>
                                            <h3 class="text-muted f-w-400"><?php echo $userDetails[0]['password'] ?></h3>
                                        </div>

                                        <div class="homeLink">
                                            <a href="index1.php"><i class="fas fa-hand-point-right hand"></i>Go To Home</a>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>

</body>

</html>