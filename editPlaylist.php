<?php
$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';


$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$title = $_GET['title'];
$description = $_GET['description'];
$id= $_GET['id'];
$file = $_GET['file'];
$query="";

$flag1=1; //for title
$flag2=1; //for desc
$flag3=1; // for file
if($title==""){
    $flag1=0;
}
if($file==""){
    $flag3=0;
}
if($description==""){
    $flag2=0;
}

//6 cases 
/*
000 100 010 001 110 101 011 111 

UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value 

*/ 

if($flag1==0 && $flag2==0 && $flag3==0){
    $query="";
}
elseif($flag1==1 && $flag2==0 && $flag3==0){
    $query="update playlist set title=$title where id=$id";
}
elseif($flag1==0 && $flag2==1 && $flag3==0){
    $query="update playlist set description=$description where id=$id";
}
elseif($flag1==0 && $flag2==0 && $flag3==1){
    $query="update playlist set file=$file where id=$id";
}
elseif($flag1==1 && $flag2==1 && $flag3==0){
    $query="update playlist set title=$title,description=$description where id=$id";
}
elseif($flag1==1 && $flag2==0 && $flag3==1){
    $query="update playlist set title=$title,file=$file where id=$id";
}
elseif($flag1==0 && $flag2==1 && $flag3==1){
    $query="update playlist set description=$description,file=$file where id=$id";
}
elseif($flag1==1 && $flag2==1 && $flag3==1){
    $query="update playlist set title=$title,description=$description,file=$file where id=$id";
}

if (mysqli_query($conn, $query)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn)


?>