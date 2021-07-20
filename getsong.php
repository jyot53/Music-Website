<?php

$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','root','practice_music');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}


$query="SELECT * FROM songs WHERE idsongs = '".$q."'";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){

    echo $row['path'];

}

mysqli_close($con);

?>

