<?php

$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$Songid = $_GET['Songid'];
$Playlistid = $_GET['Playlistid'];

$query = "insert into playlist_items( playlist_id, music_id) values ('$Playlistid','$Songid');";
// echo $query;
if(mysqli_query($conn,$query)){
    echo"Song Added";
}else{
    mysqli_error($conn);
}
mysqli_close($conn);

?>