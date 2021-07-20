<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "You are not logged in Kindly signin first";

    header("location:signin.php");
}

// include('useravtar.php');
// include('signin.php');
// include('register.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c7ad1ef82c.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <script src="js/jquery.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php

    $con = mysqli_connect('localhost', 'root', 'root', 'practice_music');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }


    // $query = "SELECT * FROM songs WHERE idsongs = '" . $q . "'";
    $query = "select * from songs where idsongs='105342'";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($result)) {
        $path = $row['path'];
        // echo $row['path'];
    }

    // mysqli_close($con);

    // function get_connection()
    // {
    //     $dsn = "mysql:host=localhost;dbname=practice_music";
    //     $user = "root";
    //     $passwd = "root";
    //     $conn = new PDO($dsn, $user, $passwd);
    //     return $conn;
    // }



    // function get_random_name($num = 6)
    // {
    //     $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    //     $string = '';
    //     $max = strlen($characters) - 1;
    //     for ($i = 0; $i < $num; $i++) {
    //         $string .= $characters[mt_rand(0, $max)];
    //     }
    //     return $string;
    // }

    // function save_media($filename, $description)
    // {
    //     $conn = get_connection();
    //     $sql = "INSERT INTO media(`file`,`description`) VALUES (?,?)";
    //     $query = $conn->prepare($sql);
    //     $query->execute([$filename, $description]);
    // }

    // function save_playlist($name)
    // {
    //     $conn = get_connection();
    //     $sql = "INSERT INTO media_playlist(`name`) VALUES (?)";
    //     $query = $conn->prepare($sql);
    //     $query->execute([$name]);
    // }

    // function save_to_playlist($mediaId, $playlistId)
    // {
    //     $conn = get_connection();
    //     $sql = "INSERT INTO media_playlist_files(`media`, `playlist`) VALUES (?,?)";
    //     $query = $conn->prepare($sql);
    //     $query->execute([$mediaId, $playlistId]);
    // }

    // function get_media()
    // {
    //     $pl = isset($_GET['playlist']) ? $_GET['playlist'] : 'all';
    //     $results = [];
    //     try {
    //         $conn = get_connection();
    //         if ($pl && $pl != "all") {
    //             $query = $conn->prepare("SELECT * from media 
    //                 WHERE id IN (SELECT media from media_playlist_files WHERE playlist=?)");
    //             $query->execute([$pl]);
    //             $results = $query->fetchAll();
    //         } else {
    //             $results = $conn->query("SELECT * from media");
    //         }
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }
    //     return $results;
    // }

    // function get_playlists()
    // {
    //     $results = [];
    //     try {
    //         $conn = get_connection();
    //         $results = $conn->query("SELECT * from media_playlist");
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }
    //     return $results;
    // }

    // function get_play_que()
    // {
    //     $medaFiles = get_media();
    //     $que = [];
    //     foreach ($medaFiles as $media) {
    //         $que[] = './uploads/' . $media['file'];
    //     }
    //     return json_encode($que);
    // }


    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-media'])) {

    //     $uploadDir = "./uploads/";
    //     if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

    //         $filename = $_FILES['file']['name'];
    //         $filetype = $_FILES['file']['type'];
    //         $filesize = $_FILES['file']['size'];
    //         $newFileName = get_random_name() . "." . pathinfo($filename, PATHINFO_EXTENSION);
    //         if (file_exists($uploadDir . $newFileName)) {
    //             echo $filename . ' is already exists';
    //         } else {
    //             move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir .  $newFileName);
    //             save_media($newFileName, $filename);
    //             echo "Your file was uploaded successfully";
    //         }
    //     }
    // }


    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-playlist'])) {

    //     $playlist = isset($_POST['playlist']) ? $_POST['playlist'] : null;
    //     if ($playlist) {
    //         save_playlist($playlist);
    //         echo "Playlist added successfully";
    //     }
    // }

    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-to-playlist'])) {

    //     $media = isset($_POST['media']) ? $_POST['media'] : [];
    //     $playlistId = isset($_POST['addtoplaylist']) ? $_POST['addtoplaylist'] : null;
    //     if ($playlistId) {
    //         if (count($media) > 0) {
    //             foreach ($media as $mid) {
    //                 save_to_playlist($mid, $playlistId);
    //             }
    //         }
    //     }
    // }

    echo $_SESSION['username'];
    //  phpinfo();

    include 'useravtar.php';
    $userchar = $_SESSION['username'];
    $user_avatar = make_avatar(strtoupper($userchar[0]));

    $query2_email = "select * from registration where username = '" . $userchar . "' ";
    $result = $con->query($query2_email);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $email_curr = $row["email"];
        }
    }


    // // $sql = mysqli_query($con,$query2_email);
    // $query = mysqli_query($con, $query2_email) || trigger_error("Query Failed! SQL: $query_email - Error: ".mysqli_error($con), E_USER_ERROR);
    // $query2_count = mysqli_num_rows($query);
    // if($query2_count){
    //     $email_all = mysqli_fetch_assoc($query2);
    //     $email_curr = $email_all['email'];
    // }



    $query1 = "update registration set avatar = '" . $user_avatar . "' where email = '" . $email_curr . "'  ";
    $statement = $con->prepare($query1);
    $statement->execute();

    $src = Get_user_avatar($email_curr, $con);



    ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand " href="#"><i class="fab fa-soundcloud pr-2"></i>Music</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto smooth-scroll">
                <li class="nav-item active" id="navItem">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="navItem">
                    <a class="nav-link" href="premium.php">Premium</a>
                </li>
                <li class="nav-item" id="navItem">
                    <a class="nav-link" href="#weeklytop">Weekly 10</a>
                </li>
                <li class="nav-item" id="navItem">
                    <a class="nav-link " href="#contactus">Contact Us</a>
                </li>
                <li class="nav-item" id="navItem">
                    <!-- <img src="images/dhillon.jpg" id="userimg" alt="img" style=" height: 45px; width:45px; border-radius:50%;"> -->

                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <!-- <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search" aria-label="Search"> -->
                <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                <!-- <a href="signin.php" class="btn btn-outline-success my-2 my-sm-0 ml-2" id="signinbtn" type="submit">Sign In</a> -->
                <span><a href="logout.php" class="btn btn-outline-success " style="border-radius:30px !important;" id="logoutbtn" type="submit">Logout</a></span>
            </form>
        </div>
    </nav>

    <!-- <div class="container my-4 ">

        <div class="row">
            <div class="col text-center">
                <input class="form-control mr-sm-2 my-3" id="search" type="search" placeholder="Search" aria-label="Search">

                <div id="table-data">

                </div>

                <table>

                     <tr>
                        <th>Suggestions</th>
                    </tr>

                    <tr>
                        <td id="table-data">

                        </td>
                    </tr> 

                 </table> 
                 <button class="btn btn-outline-success my-2 my-sm-0 mx-auto" type="submit">Search</button> 
            </div>
        </div>


    </div> -->

    <div class="container my-4 ">

        <div class="row">
            <div class="col text-center ">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search Through Song Names :
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item" type="button"><input class="form-control mr-sm-2 my-3" id="search" type="search" placeholder="Search" aria-label="Search"></a>
                        <div id="table-data">

                        </div>
                        <!-- <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button> -->
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div>
        <h2>welcome
            <img src="<?php Get_user_avatar($email_curr, $con) ?>" style=" height: 45px; width:45px; border-radius:50%;" alt="load">
            hiii
        </h2>

    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/bg4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bg5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bg1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




    <section class="my-5">
        <div class="py-2">
            <h2 class="text-center">Why US ?</h2>
        </div>

        <div class="conatiner-fluid d-flex justify-content-center">
            <div class="row ">
                <div class="col-12 col-lg-3 col-md-6 py-4 ml-auto mr-auto">
                    <img src="images/proj1.png" alt="Background">
                    <h3>Play your favorites.</h3>
                    <p> Listen to the songs you love, and <br> discover new music and podcasts.</p>
                </div>
                <div class="col-12 col-lg-3 col-md-6 py-4">
                    <img src="images/proj2.png" alt="Background">
                    <h3>Playlists made easy.</h3>
                    <p> We'll help you make playlists.<br>Or enjoy playlists made by music experts</p>
                </div>
                <div class="col-12 col-lg-3 col-md-6 py-4">
                    <img src="images/proj3.png" alt="Background">
                    <h3>Make it yours.</h3>
                    <p> Tell us what you like, and we'll <br>recommend music for you.</p>
                </div>
                <div class="col-12 col-lg-3 col-md-6 py-4">
                    <img src="images/proj4.png" alt="Background">
                    <h3>Save mobile data.</h3>
                    <p> To use less data when you play<br>music, turn on Data Saver in <br>Settings. </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="about.php" class="text-center btn btn-success bg-success text-white" id="aboutLink">Know More</a>
        </div>

    </section>



    <section class="my-5" id="weeklytop">
        <div class="py-5">
            <h2 class="text-center">Weekly Top</h2>
        </div>

        <div class="container-fluid " id="cards">
            <div class="row  py-2">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/arigit.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title" id="songName">Arijit Singh</h4>
                            <p class="card-text">Janam Janam</p>
                            <a class="btn btn-outline-success my-2 my-sm-0 " id="music-button" onclick="function togglePlay() {
            return isPlaying ? myAudio.pause() : myAudio.play();
        }">Play</a>
                            <audio id="playMusic" src="<?php echo $path; ?>" preload="auto" autoplay> </audio>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/dhillon.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">A.P. Dhillon </h4>
                            <p class="card-text">Brown Munde</p>
                            <a class="btn btn-outline-success my-2 my-sm-0 play">Play </a>

                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>
                        </div>
                    </div>
                </div>
                <!-- onclick="playAudio('songs/song2.mp3')"  -->
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/honey.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">Honey Singh</h4>
                            <p class="card-text">Blue Eyes</p>
                            <button class="btn btn-outline-success my-2 my-sm-0 play" onclick="playAudio('songs/song2.mp3')" type="submit">Play</button>
                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row py-2">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/arigit.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <button class="btn btn-outline-success my-2 my-sm-0 play" onclick="playAudio('songs/song2.mp3')" type="submit">Play</button>
                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/dhillon.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <button class="btn btn-outline-success my-2 my-sm-0 play play" onclick="playAudio('songs/song2.mp3')" type="submit">Play</button>
                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/honey.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <button class="btn btn-outline-success my-2 my-sm-0 play" onclick="playAudio('songs/song2.mp3')" type="submit">Play</button>
                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-2">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/arigit.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <button class="btn btn-outline-success my-2 my-sm-0 play" onclick="playAudio('songs/song2.mp3')" type="submit">Play</button>
                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/dhillon.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <button class="btn btn-outline-success my-2 my-sm-0 play" onclick="playAudio('songs/song2.mp3')" type="submit">Play</button>
                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="images/honey.jpg" alt="Card image">
                        <div class="card-body text-center">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <button class="btn btn-outline-success my-2 my-sm-0 play" onclick="playAudio('songs/song2.mp3')" type="submit">Play</button>
                            <audio class="player">
                                <source src='songs/song3.mp3' type='audio/mpeg' />
                            </audio>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="my-5" id="contactus">

        <div class="py-5">
            <h2 class="text-center">Contact Us</h2>
        </div>

        <div class="w-50 m-auto">

            <!-- <form action="userinfo.php" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="">Username : </label>
                    <input type="text" name="user" placeholder="Enter Username" autocomplete="off" class="form-control">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="">Email :</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password :</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="ppassword">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="">Mobile No. :</label>
                    <input type="number" class="form-control" placeholder="Enter Mobile No." name="mobile">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="">Your Suggestions :</label>
                    <textarea class="form-control"></textarea>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0 mx-auto text-center">Submit</button>
                </div>


            </form> -->

            <form action="userinfo.php" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="uname">Username:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="user" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="pass" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter E-Mail" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="number">Mobile No :</label>
                    <input type="tel" class="form-control" placeholder="Enter Mobile No." name="mobile" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> I agree on Terms & Conditions.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0 mx-auto text-center">Submit</button>
                </div>
            </form>


        </div>

    </section>

    <!-- <section class="my-5">

        <div class="py-5">
            <h2 class="text-center">Play Songs</h2>
        </div>

        <div class="w-50 m-auto">

            <form action="songs.php" method="post" enctype="multipart/form-data">

                <input type="file" name="audioFile">
                <input type="submit" value="Upload Audio" name="save_audio">

            </form>



        </div> -->

    <!-- </section>

    <section class="my-5">

        <div class="w-50 m-auto"> -->

    <!-- <button type="submit" class="btn btn-outline-success my-2 my-sm-0 mx-auto text-center" id="test" onclick="playAudio('105341')">Play</button> -->

    <!-- <button type="submit" class="btn btn-outline-success my-2 my-sm-0 mx-auto text-center" id="test" onclick="playAudio('105342')">Play</button>

        </div>

    </section> -->


    <h3>Mp3 Player</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" />
        <button type="submit" name="save-media">Save Media</button>
    </form>
    <h3>Create Playlist</h3>
    <form method="post">
        <input type="text" name="playlist" />
        <button type="submit" name="save-playlist">Save Playlist</button>
    </form>
    <br>
    <form method="get">
        Select a playlist:
        <select name="playlist">
            <option selected value>--select a playlist--</option>
            <option value="all">All Songs</option>
            <?php foreach (get_playlists() as $prow) : ?>
                <option value="<?php echo $prow["id"]; ?>"><?php echo $prow["name"]; ?></option>
            <?php endforeach; ?>
        </select>
        <button>Use this playlist</button>
    </form>


    <br>
    Actions: <button id="pause-button">Pause</button>
    <button id="from-start">From Start</button>
    <button id="next">Next</button>
    <br><br>
    <form method="post">
        <select name="addtoplaylist">
            <option selected value>--select a playlist--</option>
            <?php foreach (get_playlists() as $prow) : ?>
                <option value="<?php echo $prow["id"]; ?>"><?php echo $prow["name"]; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="add-to-playlist">Add to playlist</button>
        <ul>
            <?php $count = 0;
            foreach (get_media() as $media) : ?>
                <li><input type="checkbox" name="media[]" value="<?php echo $media["id"]; ?>" />
                    <a data-count="<?php echo $count; ?>" class="play-media" href="javascript:void(0);" data-file="./uploads/<?php echo $media["file"]; ?>">
                        <?php echo $media["description"]; ?>
                    </a>
                </li>
            <?php $count++;
            endforeach; ?>

        </ul>
    </form>


    <!-- Footer -->
    <footer class="page-footer font-small mdb-color lighten-3 pt-4 bg-dark text-light ">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

                    <!-- Content -->
                    <h5 class="font-weight-bold text-uppercase mb-4">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident voluptate
                        esse
                        quasi, veritatis totam voluptas nostrum.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p>
                                <a href="#!">PROJECTS</a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="#!">ABOUT US</a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="#!">BLOG</a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="#!">AWARDS</a>
                            </p>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

                    <!-- Contact details -->
                    <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p>
                                <i class="fas fa-home mr-3"></i> Gandhinagar , Ahmedabad
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fas fa-envelope mr-3"></i> music@gmail.com
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fas fa-phone mr-3"></i> + 01 234 567 88
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fas fa-print mr-3"></i> + 01 234 567 89
                            </p>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

                    <!-- Social buttons -->
                    <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>

                    <div class="d-flex justify-content-center flex-column ">

                        <!-- Facebook -->
                        <a type="button" class="btn-floating btn-fb mt-3">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <!-- Twitter -->
                        <a type="button" class="btn-floating btn-tw mt-3">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <!-- Google +-->
                        <a type="button" class="btn-floating btn-gplus mt-3">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                        <!-- Dribbble -->
                        <a type="button" class="btn-floating btn-dribbble mt-3">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="#"> MUSIC.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->


    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // var audio = document.getElementById("player");
        // var button = document.getElementById("play");
        // button.addEventListener("click", function() {
        //     if (audio.paused) {
        //         audio.play();
        //         button.innerHTML = "Pause";
        //     } else {
        //         audio.pause();
        //         button.innerHTML = "Play";
        //     }
        // });

        // var button1 = document.getElementById("test");

        // function audioControls(url) {
        //     audio.setAttribute("src",url);
        //     if (audio.paused) {
        //         audio.play();
        //         // new Audio(url).play();
        //         button1.innerHTML = "Pause";
        //     } else {
        //         audio.pause();
        //         // new Audio(url).pause();
        //         button1.innerHTML = "Play";
        //     }
        // }



        // function playAudio(id) {
        //     var xmlhttp = new XMLHttpRequest();
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             // document.getElementById("test").innerHTML = this.responseText + "Added";
        //             // new Audio(this.responseText).play();
        //             // alert(this.responseText);
        //             audioControls(this.responseText);
        //             // document.getElementById("test").innerHTML = "Pause";
        //         }
        //     };
        //     xmlhttp.open("GET", "getsong.php?q=" + id, true);
        //     xmlhttp.send();    

        // }

        // $(document).ready(function(){
        //     $.ajax({
        //         url : "getSong.php",
        //         type : "GET",
        //         success : function(data){
        //             alert(data);
        //             $("#songName").html(data);
        //         }
        //     })
        // });

        // $('#music-button').toggle( function(){
        //     document.getElementById('playMusic').play();
        //     document.getElementById('playMusic').innerHTML="Pause";
        // } , function(){
        //     document.getElementById('playMusic').pause();
        //     document.getElementById('playMusic').innerHTML="Play";
        // } );


        var audio = null;
        var currentFile = null;
        var playlist = <?php echo get_play_que(); ?>;
        var currentCount = 0;

        $(document).ready(function() {

            $('.play-media').on('click', function() {
                var el = $(this);
                var filename = el.attr('data-file');
                var count = el.attr('data-count');
                currentCount = parseInt(count);
                console.log(currentCount);
                if (audio && currentFile === filename) {
                    audio.currentTime = 0;
                    audio.play();
                } else {
                    if (audio) {
                        audio.pause();
                    }
                    audio = new Audio(filename);
                    currentFile = filename;
                    audio.play();
                }
                return false;
            });

            $('#pause-button').on('click', function() {
                if (audio) {
                    audio.pause();
                }
                return false;
            });

            $('#from-start').on('click', function() {
                if (audio) {
                    audio.currentTime = 0;
                    audio.play();
                }
                return false;
            });

            $('#next').on('click', function() {
                if (currentCount < playlist.length) {
                    if (audio) {
                        audio.pause();
                    }
                    var index = currentCount + 1;
                    audio = new Audio(playlist[index]);
                    audio.play();
                    currentCount++;
                }
                return false;
            });



        });







        var myAudio = document.getElementById('playMusic');
        var isPlaying = false;

        // function togglePlay() {
        //     return isPlaying ? myAudio.pause() : myAudio.play();
        // }

        myAudio.onplaying = function() {
            isPlaying = true;
            myAudio.innerHTML = "Pause";
        }

        myAudio.onpause = function() {
            isPlaying = false;
            myAudio.innerHTML = "Play";
        }


        $(document).ready(function() {

            $("#search").on("keyup", function() {
                var search_term = $(this).val();

                $.ajax({

                    url: "ajax-live-search.php",
                    type: "POST",
                    data: {
                        search: search_term
                    },
                    success: function(data) {
                        $('#table-data').html(data);
                    }

                });
            });

        });
    </script>
    <!-- <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Bootstrap tooltips -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script> -->
    <!-- Bootstrap core JavaScript -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  -->
</body>

</html>