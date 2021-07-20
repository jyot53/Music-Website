<?php
$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';

$userid = array();

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$username = mysqli_real_escape_string($conn,$_GET['username']);
// $username="test";
$name = mysqli_real_escape_string($conn,$_GET['name']); //playlist name
$desc = mysqli_real_escape_string($conn,$_GET['desc']);
$file = mysqli_real_escape_string($conn,$_GET['file']);


$getuserid = "select id from registration where username='$username'";
$result1 = mysqli_query($conn, $getuserid);
while ($row = mysqli_fetch_array($result1)) {

    $userid[] = $row;
}

$val = $userid[0]['id'];

$addPlaylistQuery =" insert into playlist (user_id, title, description, cover_image) values ('$val','$name','$desc','$file')";



// $addPlaylistQuery ="insert into playlist(user_id, title, description, cover_image) VALUES ('1','prac','this is for practice','imagefile')";
echo $addPlaylistQuery;
if(mysqli_query($conn,$addPlaylistQuery)){
    echo"Playlist Created";
}else{
    mysqli_error($conn);
}
mysqli_close($conn);

?>