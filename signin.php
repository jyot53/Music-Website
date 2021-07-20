<?php
session_start(); 
// if (!isset($_SESSION['username'])) {
//     echo "You are Logged Out";

//     header("location:signin.php");
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music - SignIn</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
<style>
    .card {
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        /* margin: 0 auto; */
        /* padding: 0 70px; */

    }

    .btn-fb {
        border: 1px solid darkblue;
        border-radius: 2px;

    }

    .btn-li {
        border: 1px solid #0077b5;
        border-radius: 2px;

    }

    .btn-tw {
        border: 1px solid #1DA1F2;
        border-radius: 2px;

    }

    .btn-git {
        border: 1px solid black;
        border-radius: 2px;

    }

    .fa-facebook-f {
        color: darkblue;
    }

    .fa-github {
        color: black;
    }

    .fa-twitter {
        color: #1DA1F2;
    }

    .fa-linkedin-in {
        color: #0077b5;
    }

    .btn-floating {
        margin-left: 5px;
    }

    .hand {
        color: black;
        padding-right: 5px;
    }

    .homeLink {
        color: black;
    }
</style>

<body>

    <?php

    $con = mysqli_connect("localhost", "root", "root", "practice_music");
    if (isset($_POST['submit'])) { 
        $email = $_POST['email']; 
        $password = $_POST['password'];

        $email_search = " select * from registration where email= '$email' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];

            

            // $confir = $db_pass == $password;
            // echo "$confir";
            if (strcmp($db_pass, $password) !== 0) {
    ?>

                <script>
                    alert("Incorrect Password");
                </script>

            <?php
            } else {
            ?>

                <script>
                    alert("Login Successfully!!!");
                    location.replace("index1.php");
                </script>

            <?php
                $_SESSION['username'] = $email_pass['username'];
                // header("location:index1.php");
            }
        } else {
            ?>

            <script>
                alert("Invalid Email");
            </script>

            <?php
        }
    }


            ?>

    <div class="card py-5 w-50">

        <h5 class="card-header success-color white-text text-center py-4">
            <strong>Sign in</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" method="POST" style="color: #757575;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <!-- Email -->
                <div class="md-form">
                    <input type="email" id="materialLoginFormEmail" name="email" class="form-control">
                    <label for="materialLoginFormEmail">E-mail</label>
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" id="materialLoginFormPassword" name="password" class="form-control">
                    <label for="materialLoginFormPassword">Password</label>
                </div>

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="register.php">Register</a>
                </p>

                <!-- Social login -->
                <p>or sign in with:</p>
                <a type="button" class="btn-floating btn-fb btn-sm ">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a type="button" class="btn-floating btn-tw btn-sm ">
                    <i class="fab fa-twitter"></i>
                </a>
                <a type="button" class="btn-floating btn-li btn-sm">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a type="button" class="btn-floating btn-git btn-sm ">
                    <i class="fab fa-github"></i>
                </a>

            </form>
            <!-- Form -->

            

        <div class="text-center ">
            <a href="index1.php" class="homeLink"><i class="fas fa-hand-point-right hand"></i>Go To Home</a>
        </div>

    </div>
    <!-- Material form login -->




    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</body>

</html>