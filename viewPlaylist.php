<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "You need to signin first";
    header("location:signin.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c7ad1ef82c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <!-- APlayer CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css" />
    <!-- bootstrap-4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Playlist</title>
    <style>
        body {
            /* background-color: #f7f7f7; */
            /* font-family: Open sans; */
            background-image: linear-gradient(#16222A, #3A6073);
        }

        .page1 {
            padding-top: 100px;
        }

        .main img {
            width: 100%;
            min-height: 100%;
        }

        .main {
            padding: 40px 0;
        }

        .col-md-3 {
            margin-bottom: 40px;
        }

        .album-poster {
            position: relative;
            display: block;
            border-radius: 7px;
            /* overflow: hidden; */
            box-shadow: none;
            transition: all ease 0.4s;
            height: 150px;
        }

        /* .artist {
            position: relative;
            display: block;
            border-radius: 7px;
            overflow: hidden;
            border-radius: 50%;
            box-shadow: 0 15px 35px #3d2173a1;
            height: 150px;
        } */

        .artist:hover {
            box-shadow: none;
            transform: scale(0.98) translateY(5px);
        }

        .album-poster:hover {
            box-shadow: 0 15px 35px #3d2173a1;
        }

        .main h3 {
            font-size: 34px;
            margin-bottom: 34px;
            border-bottom: 4px solid #e6e6e6;
            padding-bottom: 15px;
        }

        .main p {
            font-size: 15px;
        }

        .main h4 {
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 15px;
            font-weight: 700;
        }


        /*default is hide music player*/
        #aplayer {
            position: fixed;
            bottom: -100%;
            left: 0;
            width: 100%;
            margin: 0;
            box-shadow: 0 -2px 2px #dadada;
            background-color: #fff;
            transition: all ease 0.5s;
        }

        #aplayer.showPlayer {
            bottom: 0;
        }


        /*MUSIC PLAYER CUSTOMIZING STYLE*/
        .main span {
            color: #000 !important;
            font-size: 16px;
        }

        .aplayer .aplayer-info .aplayer-controller .aplayer-bar-wrap .aplayer-bar .aplayer-loaded {
            background: #e0e0e0;
            height: 4px;
        }

        .aplayer .aplayer-info .aplayer-controller .aplayer-bar-wrap .aplayer-bar .aplayer-played {
            height: 4px;
            background-color: #2196F3 !important;
        }

        .aplayer .aplayer-info .aplayer-controller .aplayer-bar-wrap .aplayer-bar .aplayer-played .aplayer-thumb {
            background-color: #2196F3 !important;
        }

        .aplayer .aplayer-icon {
            width: 20px;
            height: 20px;
        }

        .aplayer .aplayer-info .aplayer-controller .aplayer-time .aplayer-icon path {
            fill: #000;
        }

        .aplayer .aplayer-info .aplayer-music {
            margin-bottom: 5px;
        }


        .cont1 {
            position: relative;
        }

        .cont1 img {
            display: block;
        }

        .cont1 .fas {
            position: absolute;
            bottom: 115px;
            left: 130px;
            color: black;
            border: 2px solid black;
            background-color: whitesmoke;
            width: 20px;
            height: 25px;
            text-align: center;
            padding-top: 2px;
        }


        .headerPlaylist {
            margin-top: 10px;
            background-image: linear-gradient(#283048, #859398);
            /* border: 2px solid red; */

        }

        .headerPlaylist h1 {
            font-size: 90px;
            font-weight: 400;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* color: #283048; */
            color: white;
            /* align-items: center; */
            text-align: center;

        }

        .headerPlaylist h3 {
            font-size: 50px;
            font-weight: 400;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* color: #95a0c2; */
            color: white;
            /* align-items: center; */
            margin-left: 150px;
        }
    </style>
</head>


<body>

    <?php
    $databaseHost     = 'localhost';
    $databaseName     = 'practice_music';
    $databaseUsername = 'root';
    $databasePassword = 'root';

    $userid = array();
    $playlists = array();
    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    $name = $_SESSION['username'];
    $name = trim($name, "'");

    $getuserid = "select id from registration where username='$name'";
    $result1 = mysqli_query($conn, $getuserid);
    while ($row = mysqli_fetch_array($result1)) {

        $userid[] = $row;
    }

    $val = $userid[0]['id'];
    $noOfPlaylist = 0;
    $getplaylistDetails = "select * from playlist where user_id='$val'";
    $result2 = mysqli_query($conn, $getplaylistDetails);
    while ($row = mysqli_fetch_array($result2)) {
        $noOfPlaylist++;

        $playlists[] = $row;
    }



    ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand " href="#"><i class="fab fa-soundcloud pr-2"></i>Music</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto smooth-scroll">
                <li class="nav-item active" id="navItem">
                    <a class="nav-link" href="index1.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="navItem">
                    <a class="nav-link" href="premium.php">Premium</a>
                </li>




            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span><a href="logout.php" class="btn btn-outline-success " style="border-radius:30px !important;" id="logoutbtn" type="submit">Logout</a></span>
            </form>
        </div>
    </nav>

    <section class="headerPlaylist" style="overflow: hidden;">
        <div class="row justify-content-between my-5">
            <div class="col-7">
                <h1 style="text-transform: uppercase;">MY Playlist</h1>
                <h3 class="" style="text-transform: uppercase;"><?php echo $name ?></h3>
            </div>
            <!-- <div class="col-4">
                <div>
                    <a href=""> <button type="button" class="btn btn-primary btn-sm mr-5" style="float:right;"><i class="fas fa-plus pr-2"></i>Add New Playlist</button> </a>
                </div>
            </div> -->
        </div>

    </section>

    <div class="main">
        <div class="container">
            <div class="row">



                <!-- <div class="card mb-3" style="max-width: 540px; border:none;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="cont1">
                                <a href="javascript:void();" class="album-poster" data-switch="0">
                                    <img src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="Loading..." class="img-fluid" />
                                </a>
                                <a href=""><i class="fas fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">My Playlist3</h5>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                </p>
                                <p class="card-text">s a wider card with supporting t</p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="card mb-3" style="max-width: 540px;border:none;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="cont1">
                                <a href="javascript:void();" class="album-poster" data-switch="0">
                                    <img src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="Loading..." class="img-fluid" />
                                </a>
                                <a href=""><i class="fas fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">My Playlist2</h5>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                </p>
                                <p class="card-text">
                                    <a href=""> <button type="button" class="btn btn-primary  btn-sm">View Playlist</button> </a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="card mb-3" style="max-width: 540px; border:none;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="cont1">
                                <a href="javascript:void();" class="album-poster" data-switch="0">
                                    <img src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="Loading..." class="img-fluid" />
                                </a>
                                <a href=""><i class="fas fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">My Playlist3</h5>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                </p>
                                <p class="card-text">
                                    <a href=""> <button type="button" class="btn btn-primary  btn-sm">View Playlist</button> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->








            </div>






        </div>
    </div>


    <!-- testing -->


    <section class="searchAdd">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3">
            <div class="form-group" style="width:calc(50%) ">
                <div class="input-group">
                    <input type="search" id="filter" class="form-control form-control-md ml-5 bg-light" placeholder="Search playlist using title">
                    <div class="input-group-append">
                        <button type="button" id="search" class="btn btn-sm bg-success">
                            <i class="fa fa-search r"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- <button class="btn btn-sm btn-success bg-gradient-primary mr-5" type="button" id="manage_playlist"><i class="fa fa-plus"></i> Add New Playlist</button> -->
            <button type="button" class="btn btn-sm btn-success bg-gradient-primary mr-5" id="manage_playlist" data-id="<?php echo $_SESSION['username']; ?>" data-toggle="modal" data-target="#form3"><i class="fa fa-plus"></i> Add New Playlist
            </button>
        </div>
    </section>


    <div class="col-lg-12  py-5">

        <div class="row justify-content-center d-flex" id="playlist-list">

            <?php
            for ($x = 0; $x < $noOfPlaylist; $x++) {
            ?>

                <div class="card bg-black playlist-item my-2 mx-1" date-id="" style="width:15vw">
                    <div class="card-img-top flex-w-100 position-relative">

                        <div class="dropdown position-absolute" style="right:.5em;top:.5em">
                            <button type="button" class="btn btn-tool py-1" data-toggle="dropdown" title="Manage" style="background: #000000ab;">
                                <a href=""><i class="fa fa-ellipsis-v"></i></a>
                            </button>
                            <div class="dropdown-menu bg-dark">
                                <button type="button" class="dropdown-item bg-light" data-id="" data-toggle="modal" data-target="#form1">Manage List
                                </button>
                                <button type="button" class="dropdown-item bg-light editPlaylist" data-id2="<?php echo $playlists[$x]['id'] ?>" data-toggle="modal" data-target="#form"> Edit
                                </button>
                                <button type="button" class="dropdown-item bg-light deletePlaylist"  data-id1="<?php echo $val ?>" data-id2="<?php echo $playlists[$x]['id'] ?>" data-toggle="modal" data-target="#form2">Delete
                                </button>

                            </div>
                        </div>

                        <a href="viewPlaylistSongs.php?id=<?php echo $playlists[$x]['id'] ?>">
                            <img src="https://images.pexels.com/photos/894156/pexels-photo-894156.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="card-img-top" style="object-fit: cover;max-width: 100%;height:26vh" alt="playlist Cover">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $playlists[$x]['title'] ?></h5>
                        <p class="card-text">
                            <?php echo $playlists[$x]['description'] ?>
                        </p>
                    </div>

                </div>
            <?php
            }
            ?>



        </div>
    </div>

    <section class="addnewPlay">
        <div class="modal fade" id="form3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Create Playlist</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name1">Name</label>
                                <input type="text" class="form-control" id="addname1" aria-describedby="emailHelp" placeholder="Enter Name" required>

                            </div>
                            <div class="form-group">
                                <label for="desc1">Description</label>
                                <input type="text" class="form-control" id="adddesc1" placeholder="Description">
                            </div>
                            <div class=" form-group mb-3">
                                <label for="desc1">Cover Image</label>
                                <br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="addinputfile1">
                                    <label class="custom-file-label" for="addinputfile1">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" id="addsubmit" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="editPlay">
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Playlist</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name1">Name</label>
                                <input type="text" class="form-control editname1" aria-describedby="emailHelp" placeholder="Enter Name" value="">

                            </div>
                            <div class="form-group">
                                <label for="desc1">Description</label>
                                <input type="text" class="form-control editdesc1" placeholder="Description">
                            </div>
                            <div class=" form-group mb-3">
                                <label for="desc1">Cover Image</label>
                                <br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input editinputfile1">
                                    <label class="custom-file-label" for="editfile1">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <small>Note :- If you don't want change any value just leave it blank</small>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit"  class="btn btn-primary editsubmit">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <section class="managePlay">
        <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Manage Playlist Music</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" id="managesubmit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="deletePlay">
        <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Playlist Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <p>Are you sure to delete this Playlist ? </p>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit"   class="btn btn-primary delesubmit">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>








    <div id="aplayer"></div>


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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident
                        voluptate
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

    <!-- Jquery Link -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> -->
    <!-- Bootstrap Link -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
    <!-- APlayer Jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="addPlaylist.js"></script>
    <script src="deletePlaylist.js"></script>
    <script src="editPlaylist.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- for ajax -->
    <script>
    
    </script>

</body>

</html>