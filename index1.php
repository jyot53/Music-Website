<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "You are not logged in Kindly signin first";

    header("location:signin.php");
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c7ad1ef82c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        /* Dropdown Button */
        .dropbtn {
            /* background-color: #4CAF50; */
            /* color: white; */
            /* padding: 16px; */
            /* font-size: 16px; */
            /* border: none; */
            height: 35px; width:35px; border-radius:50%;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown1 {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content1 {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content1 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content1 a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown1:hover .dropdown-content1 {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown1:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
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
                <li class="nav-item mr-2 py-1" id="navItem">
                    <!-- <img src="<?php Get_user_avatar($email_curr, $con) ?>" style="height: 35px; width:35px; border-radius:50%;" alt="load"> -->
                    <div class="dropdown1">
                        <!-- <button class="dropbtn">Dropdown</button> -->
                        <img src="<?php Get_user_avatar($email_curr, $con) ?>" class="dropbtn"  alt="load">
                        <div class="dropdown-content1">
                            <a href="profile.php">My Account</a>
                            <a href="viewPlaylist.php?username='<?php echo $_SESSION['username'] ?>'">MY Playlist</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>

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

    <div class="container my-4 ">

        <!-- <div class="row">
            <div class="col text-center">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search :
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item" type="button">

                            <div class="main1">

                                <div class="input-group">
                                    <input class="form-control mr-sm-2 " style="width: 90%;" id="search" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger mt-3" style="height: 41.1px;" type="button">
                                            <i id="clickme" class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>


                            </div> -->

        <!-- <input class="form-control mr-sm-2 my-3" id="search" type="search" placeholder="Search" aria-label="Search"> <i id="clickme" class="fas fa-search"></i> -->

        <!-- </a>
                        <div id="table-data">

                        </div> -->
        <!-- <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button> -->
        <!-- </div>
                </div>

            </div>
        </div>

    </div> -->

        <section class="my-5">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-8 mx-auto bg-light rounded p-4">
                        <!-- <h5 class="text-center font-weight-bold">AutoComplete Search Using Bootstrap 4, PHP, PDO - MySQL & Ajax</h5> -->
                        <hr class="my-1">
                        <!-- <h5 class="text-center text-secondary">Write any country name in the search box</h5> -->
                        <form action="albums.php?album=pop" method="post" class="p-3">
                            <div class="input-group">
                                <input type="text" name="search" id="searchVal" class="form-control form-control-lg  border-info" placeholder="Search..." autocomplete="off" style="border-radius:10px;" required>
                                <div class="input-group-append px-3">
                                    <input type="submit" name="submit" value="Search" style="border-radius:20px;" class="btn btn-info btn-lg">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 210px;">
                        <div class="list-group" id="show-list">
                            <!-- <a href="#" class="list-group-item list-group-item-action border-1 mt-1" style="width: 535px;border-radius:10px;">List 1</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="my-5">
            <div class="container">
                <div class="row">
                    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/bg1.jpg" alt="Los Angeles" width="1100" height="500">
                                <div class="carousel-caption">
                                    <h3>Los Angeles</h3>
                                    <p>We had such a great time in LA!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/bg5.jpg" alt="Chicago" width="1100" height="500">
                                <div class="carousel-caption">
                                    <h3>Chicago</h3>
                                    <p>Thank you, Chicago!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/bg4.jpg" alt="New York" width="1100" height="500">
                                <div class="carousel-caption">
                                    <h3>New York</h3>
                                    <p>We love the Big Apple!</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <section class="my-5" style="background-color: white;">
            <div class="py-5">
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
            <div class="d-flex justify-content-center py-3">
                <a href="about.php" class="text-center btn btn-success bg-success text-white" id="aboutLink">Know More</a>
            </div>

        </section>



        <section class="my-5" id="weeklytop">
            <div class="py-5">
                <h2 class="text-center">Weekly Top</h2>
            </div>

            <div class="container-fluid " id="cards">
                <div class="row  py-2">
                    <div class="col-12 col-md-4 col-lg-4 mr-0">
                        <div class="card">
                            <img class="card-img-top" src="images/arigit.jpg" alt="Card image">
                            <div class="card-body text-center">
                                <h4 class="card-title" id="songName">Arijit Singh</h4>
                                <p class="card-text">Janam Janam</p>
                                <a class="btn btn-outline-success my-2 my-sm-0 ">Play</a>
                                <!-- <a class="btn btn-outline-success my-2 my-sm-0 " id="music-button" onclick="togglePlay()">Play</a> -->
                                <!-- <audio id="playMusic" src="<?php echo $path; ?>" preload="auto" autoplay> </audio> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 mr-0">
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
                    <div class="col-12 col-md-4 col-lg-4 mr-0">
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

                    <div class="col-12 col-md-4 col-lg-4 mr-0">
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

                    <div class="col-12 col-md-4 col-lg-4 mr-0">
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
                    <div class="col-12 col-md-4 col-lg-4 mr-0">
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

                    <div class="col-12 col-md-4 col-lg-4 mr-0">
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

                    <div class="col-12 col-md-4 col-lg-4 mr-0">
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

        <section class="my-5">
            <div class="py-1 text-center">
                <a href="page.html" class="btn btn-outline-secondary my-2 my-sm-0 mx-auto text-center" style="width: 250px;">Explore More</a>
            </div>
        </section>


        <section class="my-5" id="contactus">

            <div class="py-5">
                <h2 class="text-center">Contact Us</h2>
            </div>

            <div class="w-50 m-auto">

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



        <!-- <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
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
                        <div class="col-sm">
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
                        <div class="col-sm">
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
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-sm">
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
                <div class="col-sm">
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
                <div class="col-sm">
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
            </div>
            <div class="carousel-item">
                <div class="col-sm">
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
                <div class="col-sm">
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
                <div class="col-sm">
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
            </div>
        </div>


        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div> -->

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
            <div class="footer-copyright text-center py-1   ">© 2021 Copyright:
                <a href="#"> MUSIC.com</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->


        <script>
            $(document).ready(function() {

                // $("#search").on("keyup", function() {
                //     var search_term = $(this).val();

                //     if (search_term != '') {
                //         $.ajax({

                //             url: "ajax-live-search.php",
                //             type: "POST",
                //             data: {
                //                 search: search_term
                //             },
                //             success: function(data) {
                //                 $('#table-data').html(data);
                //             }

                //         });
                //     }


                // });

                $("#searchVal").keyup(function() {
                    let searchText = $(this).val();
                    if (searchText != "") {
                        $.ajax({
                            url: "ajax-live-search.php",
                            method: "post",
                            data: {
                                query: searchText,
                            },
                            success: function(response) {
                                $("#show-list").html(response);
                            },
                        });
                    } else {
                        $("#show-list").html("");
                    }
                });
                // Set searched text in input field on click of search button
                $(document).on("click", "a", function() {
                    $("#searchVal").val($(this).text());
                    $("#show-list").html("");
                });

            });

            $('#clickme').click(function(e) {
                var inputvalue = $("#search").val();
                window.location.replace("albums.php");

            });

            function playAudio(str) {
                a = new Audio(str);
                a.play();
            }

            var myAudio = document.getElementById('playMusic');
            var isPlaying = false;

            function togglePlay() {
                return isPlaying ? myAudio.pause() : myAudio.play();
            }

            myAudio.onplaying = function() {
                isPlaying = true;
                myAudio.innerHTML = "Pause";
            }

            myAudio.onpause = function() {
                isPlaying = false;
                myAudio.innerHTML = "Play";
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>

</html>