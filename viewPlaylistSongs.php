<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "You need to signin first";
    header("location:signin.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist Songs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c7ad1ef82c.js" crossorigin="anonymous"></script>
    <style>
        .content a:hover {
            color: #72f788;
        }


        .content {
            display: flex;
            flex-flow: row wrap;
        }

        .content__middle {
            width: 70%;
        }


        @media (max-width: 1400px) {


            .content__middle {
                width: 80%;
            }
        }

        @media (max-width: 768px) {


            .content__middle {
                width: 100%;
            }
        }





        .artist {
            height: 617px;
            /* overflow-y: scroll; */
        }

        .artist__header {
            height: 320px;
            border-bottom: 1px solid #282828;
            position: relative;
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/spotify_img_bground.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
            z-index: 1;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
            align-items: flex-end;
        }

        .artist__header:before {
            content: " ";
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.15;
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/g-eazy.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top;
        }

        .artist__header .artist__info {
            padding: 15px;
            z-index: 1;
            width: 80%;
            margin-top: 78px;
            display: flex;
            flex-flow: row wrap;
            align-items: flex-end;
        }

        .artist__header .artist__info .profile__img {
            margin-right: 15px;
        }

        .artist__header .artist__info .profile__img img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .artist__header .artist__info__type {
            color: #aaaaaa;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .artist__header .artist__info__name {
            color: white;
            font-size: 36px;
            font-weight: 100;
            padding: 0 0 10px 0;
        }

        .artist__header .artist__info__actions {
            display: flex;
            flex-flow: row wrap;
        }

        .artist__header .artist__info__actions button {
            margin-right: 10px;
            height: 27px;
            display: flex;
            flex-flow: row wrap;
            align-items: center;
            padding: 0 15px;
            font-weight: 500;
        }

        .artist__header .artist__info__actions button i {
            font-size: 20px;
            margin-right: 5px;
        }

        .artist__header .artist__info__actions .more {
            width: 27px;
            height: 27px;
            border-radius: 50%;
            padding: 0;
            text-align: center;
        }

        .artist__header .artist__info__actions .more i {
            margin: 0;
            padding-left: 6px;
        }

        .artist__header .artist__listeners {
            width: 20%;
            z-index: 1;
            padding: 15px;
            text-align: right;
            color: #aaaaaa;
            font-weight: 100;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .artist__header .artist__listeners__label {
            font-weight: 300;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .artist__header .artist__navigation {
            width: 100%;
            z-index: 1;
            background: rgba(24, 24, 24, 0.6);
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
            align-items: center;
        }

        .artist__header .artist__navigation ul {
            border: none;
        }

        .artist__header .artist__navigation ul li {
            padding: 0 15px;
        }

        .artist__header .artist__navigation ul li a {
            padding: 15px 0;
            color: #aaaaaa;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            border-bottom: 4px solid rgba(0, 0, 0, 0);
        }

        .artist__header .artist__navigation ul li a:hover {
            background: none;
            border: none;
            color: white;
            transition: all 0.4s ease;
            border-bottom: 4px solid rgba(0, 0, 0, 0);
        }

        .artist__header .artist__navigation ul li.active a {
            color: white;
            background: none;
            border: none;
            border-bottom: 4px solid #1ed760;
        }

        .artist__header .artist__navigation ul li.active a:hover {
            border-bottom: 4px solid #1ed760;
        }

        .artist__header .artist__navigation__friends {
            padding: 15px;
        }

        .artist__header .artist__navigation__friends img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: relative;
        }

        .artist__header .artist__navigation__friends .tooltip {
            z-index: 1;
            position: absolute;
        }

        .artist.is-verified .profile__img {
            position: relative;
        }

        .artist.is-verified .profile__img:after {
            font-family: "Ionicons";
            content: "";
            position: absolute;
            bottom: 5px;
            right: 25px;
            color: white;
            background: #4688d7;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            text-align: center;
            font-size: 18px;
            line-height: 1;
        }

        .artist__content {
            padding: 15px;
        }

        .artist__content .overview {
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
            margin-top: 40px;
        }

        .artist__content .overview__artist {
            padding-right: 15px;
            width: 70%;
        }

        .artist__content .overview__artist .latest-release {
            margin-bottom: 30px;
            display: flex;
            flex-flow: row wrap;
        }

        .artist__content .overview__artist .latest-release__art {
            width: 75px;
        }

        .artist__content .overview__artist .latest-release__art img {
            width: 75px;
            height: 75px;
        }

        .artist__content .overview__artist .latest-release__song {
            width: calc(100% - 75px);
            padding: 10px 15px;
            background: #282828;
            color: #aaaaaa;
            display: flex;
            flex-flow: column wrap;
            justify-content: space-between;
        }

        .artist__content .overview__artist .latest-release__song__title {
            color: #c8c8c8;
        }

        .artist__content .overview__related {
            width: 30%;
        }

        @media (max-width: 1024px) {
            .artist__content .overview__artist {
                width: 100%;
            }

            .artist__content .overview__related {
                width: 100%;
                margin-top: 15px;
            }
        }

        @media (max-width: 768px) {
            .artist__content .overview__artist {
                padding-right: 0;
            }
        }

        @media (max-width: 768px) {
            .artist {
                overflow-y: auto;
            }
        }

        @media (max-width: 522px) {
            .artist__header {
                height: auto;
                flex-flow: column wrap;
            }

            .artist__header .artist__info {
                margin-top: 0;
                width: 100%;
                display: flex;
                flex-flow: column wrap;
                align-items: center;
                text-align: center;
            }

            .artist__header .artist__info .profile__img {
                margin-right: 0;
            }

            .artist__header .artist__info__type {
                margin-top: 10px;
            }

            .artist__header .artist__listeners {
                width: 100%;
                text-align: center;
            }
        }

        .tracks {
            display: flex;
            flex-flow: column wrap;
            /* margin-bottom: 15px; */
        }

        .tracks__heading {
            color: #aaaaaa;
            height: 42px;
            display: flex;
            flex-flow: row wrap;
            align-items: center;
        }

        .tracks__heading__number {
            margin-left: 10px;
            font-style: italic;
        }

        .tracks__heading__title {
            margin-left: 70px;
            width: 45%;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .tracks__heading__length {
            margin-left: auto;
            font-size: 20px;
        }

        .tracks__heading__popularity {
            font-size: 20px;
            margin-left: 55px;
            padding-right: 10px;
        }

        .tracks .track {
            border-top: 1px solid #282828;
            height: 42px;
            display: flex;
            flex-flow: row wrap;
            align-items: center;
        }

        .tracks .track:hover {
            background: #35e66a;
            color: white;
        }

        .tracks .track:last-child {
            border-bottom: 1px solid #282828;
        }

        .tracks .track__art img {
            width: 42px;
            height: 42px;
        }

        .tracks .track__number {
            margin-left: 10px;
            color: #aaaaaa;
            width: 12px;
        }

        .tracks .track__added {
            margin-left: 30px;
            color: #c8c8c8;
        }

        .tracks .track__added .added {
            color: #c8c8c8;
        }

        .tracks .track__added .not-added {
            color: #aaaaaa;
        }

        .tracks .track__title {
            width: 45%;
            margin-left: 30px;
            color: green;
        }

        .tracks .track__title.featured .title:after {
            content: "-";
            margin: 0 5px;
        }

        .tracks .track__title.featured .feature {
            color: #aaaaaa;
        }

        .tracks .track__title.featured .feature:after {
            content: ",";
            margin-right: 5px;
        }

        .tracks .track__title.featured .feature:last-child:after {
            content: "";
            margin-right: 0;
        }

        .tracks .track__title.featured .feature:hover {
            cursor: pointer;
            color: #c8c8c8;
            text-decoration: underline;
        }

        .tracks .track__explicit .label {
            border: 1px;
            border-style: solid;
            border-color: #424242;
            color: #424242;
            text-transform: uppercase;
        }

        .tracks .track__plays {
            color: #aaaaaa;
            margin-left: auto;
            padding-right: 10px;
        }

        .tracks .track__length {
            margin-left: auto;
            color: #aaaaaa;
        }

        .tracks .track__popularity {
            margin-left: 46px;
            padding-right: 10px;
            font-size: 20px;
            color: #aaaaaa;
        }

        .track:hover .track__plays {
            color: white;
        }

        .track:hover .track__title {
            color: white;
        }

        .track:hover .track__number {
            color: white;
        }

        @media (max-width: 1200px) {
            .tracks__heading__title {
                width: auto;
            }

            .tracks__heading__popularity {
                display: none;
            }

            .tracks .track__title {
                width: auto !important;
            }

            .tracks .track__explicit {
                display: none;
            }

            .tracks .track__popularity {
                display: none;
            }
        }



        .album .track__title {
            width: 70%;
        }

        @media (max-width: 1200px) {
            .album .tracks .track {
                height: auto;
                padding: 10px 0;
            }
        }


        .section-title {
            text-transform: uppercase;
            color: black;
            letter-spacing: 1.25px;
            font-weight: bolder;
            font-style: italic;
            font-family: 'Times New Roman', Times, serif;
            font-size: 23.2px;
            margin-bottom: 30px;
        }

        .header {
            height: 250px;
            width: 100%;
        }

        .header img {
            object-fit: contain;
            max-width: 100%;
            height: 100%;
            /* margin-left: auto; */
            padding: 5px;
            padding-left: 10%;
        }

        .headerContent {
            margin-top: auto;
            letter-spacing: 1.25px;
        }

        .middleContent {
            background-color: #5d4257;
            background-image: linear-gradient(315deg, #5d4257 0%, #a5c7b7 74%);
        }

        body {
            background: linear-gradient(to right, #ffffff 0%, #d1f5d4 100%);
        }

        .row h4 {
            /* margin-bottom: 0; */
            line-height: 43px;
            padding-left: 40px;
        }
    </style>
</head>

<body>

    <?php
    $databaseHost     = 'localhost';
    $databaseName     = 'practice_music';
    $databaseUsername = 'root';
    $databasePassword = 'root';
    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    $id = $_GET['id'];
    $getPlaylistDetails = "select * from playlist where id='$id'";
    $getPlaylistSongs = "select * from playlist_items where playlist_id='$id'";
    $result1 = mysqli_query($conn, $getPlaylistDetails); //Single row only
    $result2 = mysqli_query($conn, $getPlaylistSongs); // multiple playlist of one user
    $playlist = array();
    $playlistSongs = array();
    $songs = array();
    $allSongs = array();
    $noOfSongs = 0;
    $numSongs = 0;
    while ($row = mysqli_fetch_array($result1)) {
        $playlist[] = $row;
    }
    while ($row = mysqli_fetch_array($result2)) {
        $noOfSongs++;
        $playlistSongs[] = $row;
    }
    $getSongDetails = "select title,path,idsongs FROM songs where idsongs in (select music_id from playlist_items where playlist_id = '$id');";
    $result3 = mysqli_query($conn, $getSongDetails);
    while ($row = mysqli_fetch_array($result3)) {
        $songs[] = $row;
    }

    $getAllSongs = "select * from songs";
    $result4 = mysqli_query($conn, $getAllSongs);
    while ($row = mysqli_fetch_array($result4)) {
        $numSongs++;
        $allSongs[] = $row;
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


    <section class="container-fluid middleContent">
        <div class="row">
            <div class="header col">
                <img src="https://images.pexels.com/photos/894156/pexels-photo-894156.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Loading...">
            </div>
            <div class="col-10 headerContent">
                <p>Playlist</p>
                <div class="row">
                    <h2 style="text-transform:capitalize;"><?php echo $playlist[0]['title'] ?></h2>
                    <h4> <?php echo $noOfSongs; ?> Songs</h4>
                </div>
            </div>
        </div>

    </section>



    <section class="content">
        <div class="content__middle">
            <div class="artist is-verified">
                <div class="artist__content">
                    <div class="tab-content">

                        <!-- Overview -->
                        <div role="tabpanel" class="tab-pane active" id="artist-overview">

                            <div class="overview">

                                <div class="overview__artist">



                                    <!-- Popular-->
                                    <div class="section-title">Songs
                                        <button style="float: right;" type="button" class="btn btn-sm btn-success bg-gradient-primary mr-5" id="manage_playlist" data-id="<?php echo $_SESSION['username']; ?>" data-toggle="modal" data-target="#form1"><i class="fa fa-plus"></i> Add Songs
                                        </button>
                                    </div>

                                    <div class="tracks">
                                        <?php
                                        for ($x = 0; $x < $noOfSongs; $x++) {
                                        ?>
                                            <div class="track album-poster" data-switch="0">

                                                <div class="track__art">

                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/whenDarkOut.jpg" alt="When It's Dark Out" />

                                                </div>

                                                <div class="track__number"><?php echo $x + 1 ?></div>

                                                <div class="track__added">

                                                    <i class="ion-checkmark-round added"></i>

                                                </div>

                                                <div class="track__title"><?php echo $songs[$x]['title'] ?></div>

                                                <div class="track__explicit">

                                                    <span class="label" style="border: none;"><i class="far fa-heart"></i></span>

                                                </div>

                                                <div class="track__plays play-wrap"><?php echo $x + 5 ?>
                                                   
                                                    <a href="songs.php?id=<?php echo $songs[$x]['idsongs'] ?>" style="float: right; margin-left:10px;" type="button" class="btn btn-sm btn-primary bg-gradient-primary ml-5">Play
                                                    </a>

                                                </div>

                                            </div>

                                        <?php
                                        }
                                        ?>

                                    </div>



                                </div>



                            </div>


                        </div>

                    </div>

                </div>

            </div>

    </section>

    <section class="playSong">
        <audio src="" id="audioPlayer"></audio>
    </section>

    <div id="aplayer"></div>


    <section class="managePlay">
        <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="py-5">
                        <div class="tracks">
                            <?php for ($x = 0; $x < $numSongs; $x++) { ?>
                                <div class="track">

                                    <div class="track__art">

                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/whenDarkOut.jpg" alt="When It's Dark Out" />

                                    </div>

                                    <div class="track__number"><?php echo $x + 1 ?> </div>

                                    <div class="track__added">

                                        <i class="ion-checkmark-round added"></i>

                                    </div>

                                    <div class="track__title"><?php echo $allSongs[$x]['title']; ?>
                                    </div>
                                    <div class="track__explicit">

                                        <button href="" style="float: right;" type="button" class="btn btn-sm btn-success bg-gradient-primary mr-5 addSong" data-id1="<?php echo $playlist[0]['id'] ?>" data-id="<?php echo $allSongs[$x]['idsongs']; ?>">Add
                                        </button>

                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <form>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <!-- <button type="submit" id="managesubmit" class="btn btn-primary">Add</button> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- for ajax -->


    <script>
        $(".addSong").on('click', function(e) {
            var dataId = $(this).attr('data-id'); //id of song
            var dataId1 = $(this).attr('data-id1');
            $.ajax({
                url: "addsong.php",
                method: "get",
                data: {
                    Songid: dataId,
                    Playlistid: dataId1
                },
                success: function(data) {
                    alert(data);
                }
            });

        });
      
    </script>
</body>

</html>