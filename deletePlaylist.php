<?php

$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';


$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$playlistid = $_GET['id'];

$deleteQuery = "delete from playlist where id='$playlistid'";
echo $deleteQuery;
if (mysqli_query($conn, $deleteQuery)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
