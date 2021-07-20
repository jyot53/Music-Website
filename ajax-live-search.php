<?php

// $search_val = $_POST["search"];

// $con = mysqli_connect('localhost','root','root','practice_music');
// if (!$con) {
//     die('Could not connect: ' . mysqli_error($con));
// }


// $query="SELECT * from songs where title like '%{$search_val}%'";
// $query1 = "SELECT * from albums where album_name like '%{$search_val}%'";
// $result = mysqli_query($con,$query);
// $result1 = mysqli_query($con,$query1);

// $output="";
// $output1 = "";

// if(mysqli_num_rows($result) > 0){

//              while($row = mysqli_fetch_assoc($result)){
//                  $output.= "<a href=`{$row['link']}` class='dropdown-item'  type='button'>{$row['title']}   </a>";
//              }         
//             echo $output;
// }else if(mysqli_num_rows($result1) > 0){

//     while($row1 = mysqli_fetch_assoc($result1)){
//         $output1.= "<a href=`{$row1['link']}` class='dropdown-item' type='button'>{$row1['album_name']} </a>";
//     }   
//     echo $output1;
// }

// else{
//     echo "<h3>No record Found</h3>";
// }
// mysqli_close($con);



// require_once 'db_conn.php';

$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (isset($_POST['query'])) {
    $search_val = $_POST['query'];
    $sql = "SELECT title,link from songs where title like '%{$search_val}%' union SELECT album_name as title,link from albums where album_name like '%{$search_val}%'";
    $result = mysqli_query($conn, $sql); // substring searching
    $output = "";
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '<a href='.$row['link'].' class="list-group-item list-group-item-action border-1 mt-1" style="width: 535px;border-radius:10px;">'.$row['title'].'</a>';
        }
        echo $output;
    }  else {
        echo '<p class="list-group-item border-1" style="width: 535px;border-radius:10px;">No Record Found</p>';
    }
    mysqli_close($conn);
    
  

}
