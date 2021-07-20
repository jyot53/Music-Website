<?php
$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$getemail = "select email from registration where username = '" .`jyot` . "' ";
    $result = $con->query($getemail);
    // echo $_SESSION['username'];
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row["email"];
        }
    }
    else{
        echo "No rows found";
    }



?>

