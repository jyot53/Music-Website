<?php
    // session_start();
    // if(!isset($_SESSION['username'])){
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

    .fas{
        margin-right: 5px;
    }

    
</style>

<body>


<?php

    $con = mysqli_connect("localhost","root","root","practice_music");

     if(isset($_POST['register'])){

        $username = mysqli_real_escape_string($con, $_POST['username'] );   
        $email = mysqli_real_escape_string($con,  $_POST['email']);
        $mobile = mysqli_real_escape_string($con,  $_POST['mobile']);
        $password = mysqli_real_escape_string($con,  $_POST['password']);
        $cpassword = mysqli_real_escape_string($con,  $_POST['cpassword']);

        $emailquery = "select * from registration where email='$email'";
        $query = mysqli_query($con,$emailquery);
        $emailcount = mysqli_num_rows($query);
        
        if($emailcount>0){
            ?>

            <script>
                alert("Email Id Already Exists!!!");
            </script>

            <?php
        }else{
            if(strcmp($password,$cpassword)!==0){
                
                ?>

                    <script>
                        alert("Password Are Not MAtching");
                    </script>

                    <?php



            }
            else{
                $insertquery = "INSERT INTO registration(username, email, mobile, `password`, cpassword) VALUES ('$username','$email',  '$mobile','$password','$cpassword') ";
                $iquery = mysqli_query($con,$insertquery);

                if($iquery){
                    ?>

                    <script>
                        alert("Registration Done!!! Now you can login through your credentials. click on login");
                    </script>

                    <?php
                }else{
                    ?>
                    <script>    
                        alert("Registration Failed!!!");
                    </script>
                    <?php
                }
                
                
            }
        }
    }



?>




    <div class="card py-5 w-50">

        <h5 class="card-header success-color white-text text-center py-4">
            <strong>Register Here</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" method="POST" style="color: #757575;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <!-- Name -->
                
                <div class="md-form">
                    <input type="text" name="username" id="materialLoginFormEmail" class="form-control" required>
                    <label for="materialLoginFormEmail"><i class="fas fa-user"></i>Name</label>
                </div>

                <!-- Email -->
                <div class="md-form">
                    <input type="email" name="email" id="materialLoginFormEmail" class="form-control" required>
                    <label for="materialLoginFormEmail"><i class="fas fa-envelope"></i>E-mail</label>
                </div>

                <!-- Mobile Number -->
                <div class="md-form">
                    <input type="number" name="mobile" id="materialLoginFormEmail" class="form-control" required>
                    <label for="materialLoginFormEmail"><i class="fas fa-phone"></i>Mobile Number</label>
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" name="password" id="materialLoginFormPassword" class="form-control" required>
                    <label for="materialLoginFormPassword"><i class="fas fa-lock"></i>Password</label>
                </div>

                <!-- Repeat Pass -->
                <div class="md-form">
                    <input type="password" name="cpassword" id="materialLoginFormEmail" class="form-control" required>
                    <label for="materialLoginFormEmail"><i class="fas fa-lock"></i>Confirm Password</label>
                </div>

                

                <!-- Sign in button -->
                <button class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0" name="register" type="submit">Register</button>

            </form>
            <!-- Form -->

        </div>

        <div class="text-center ">
            <!-- <a href="index.php" class="homeLink"><i class="fas fa-hand-point-right hand" ></i>Go To Home</a> -->
            <br>
            <label for="">Have an Account ?</label>
            <a href="signin.php" ></i>Login</a>
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