<?php

    $con = mysqli_connect('localhost','root','root');
    if($con){
        echo "Connection done";
    }
    else{
        echo "Connection failed";
    }

    mysqli_select_db($con,'practice_music');

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    echo "$user";
    echo "$pass";
    echo "$email";
    echo "$mobile";

    $query = " insert into userinfodata (user,email,mobile,password) values ('$user','$email','$mobile','$pass') ";
    echo "$query";
    mysqli_query($con,$query);
    header('location:index.php');

?>