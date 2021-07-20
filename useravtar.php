<?php


function make_avatar($character)
{
    $path = "avatar/". time() . ".png";
    $image = imagecreate(200,200); //inbulit gd library 
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);  
    $textcolor = imagecolorallocate($image, 255,255,255);  

    imagettftext($image, 100, 0, 55, 150, $textcolor, 'arial.ttf', $character);  
    //header("Content-type: image/png");  
    imagepng($image, $path);
    imagedestroy($image);
    return $path; 
}

function Get_user_avatar($user_email, $connect)
{
 $query3 = "
 SELECT avatar FROM registration 
    WHERE email = '".$user_email."'
 ";

//  $statement = $connect->prepare($query);

//  $statement->execute();

 $result3 = $connect->query($query3);

 if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
      echo  $row["avatar"];
    }
  } 

//  foreach($result as $row)
//  {
//   echo '<img src="'.$row["avatar"].'" style=" height: 45px; width:45px; border-radius:50%;"  />';
//  }
}
