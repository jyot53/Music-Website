<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c7ad1ef82c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- APlayer CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css" />

    <title>Song</title>
    <style>
        /* body {
            background-color: #f7f7f7;
            font-family: Open sans;
        } */

        .page1 {
            padding-top: 100px;
        }

        .main img {
            width: 100%;
            min-height: 100%;
        }

        .main {
            padding: 40px 0;
            height: 100vh;
        }

        .col-md-3 {
            margin-bottom: 40px;
        }

        .album-poster {
            position: relative;
            display: block;
            border-radius: 7px;
            overflow: hidden;
            box-shadow: 0 15px 35px #3d2173a1;
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
            box-shadow: none;
            transform: scale(0.98) translateY(5px);
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

        /* @charset "UTF-8"; */

        /* body {
            background: #181818;
            font-family: "Roboto", sans-serif;
        } */

        /* body a {
            color: #aaaaaa;
        } */

        body a:hover {
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
            overflow-y: scroll;
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

        .link img {

            height: 300px;
            width: 1000px;

        }

        body{
            background-image: linear-gradient(to top,#076585,#fff);
        }

    </style>
</head>



<?php

$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';

$array = array();
$getSongValue = array();

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$id = $_GET['id'];
$query = "Select * from songs where idsongs='$id'"; //id is unique only one row
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

    // echo $row['path'];
    $array[] = $row;
}



// echo $getSongValue[0]['totalsongs'];
mysqli_close($conn);



?>








<body>

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

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 style="text-transform: uppercase;">SONG</h3>
                </div>

                <div class="d-flex justify-content-around" style="margin-top: 50px;
">

                    <div class="col-md-2 text-center">
                        <a href="javascript:void();" class="album-poster" data-switch="0">
                            <!-- <img src="https://images.pexels.com/photos/1763075/pexels-photo-1763075.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                            alt="" class="img-fluid"> -->
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/00/Eminem_-_Not_Afraid.jpg/220px-Eminem_-_Not_Afraid.jpg" style="width: 2000px;" alt="" class="img-fluid">
                        </a>
                        <h4><?php echo $array[0]['title'] ?></h4>
                        <p><?php echo $array[0]['singer'] ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div id="aplayer"></div>




    <!-- Jquery Link -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <!-- Bootstrap Link -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- APlayer Jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>

    <script>
        // NOW I CLICK album-poster TO GET CURRENT SONG ID
        $(".album-poster").on('click', function(e) {
            var dataSwitchId = $(this).attr('data-switch');

            //console.log(dataSwitchId);

            // and now i use aplayer switch function see
            ap.list.switch(dataSwitchId); //this is static id but i use dynamic 

            // aplayer play function
            // when i click any song to play
            ap.play();

            // click to slideUp player see
            $("#aplayer").addClass('showPlayer');
        });

        const ap = new APlayer({
            container: document.getElementById('aplayer'),
            listFolded: true,
            storageName: 'aplayer-setting',
            audio: [{
                name: '<?php echo $array[0]['title'] ?>',
                artist: '<?php echo $array[0]['singer'] ?>',
                url: '<?php echo $array[0]['path'] ?>',
                cover: 'https://images.pexels.com/photos/1699161/pexels-photo-1699161.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'
            }]
        });










        // Sliders

        var slider = document.getElementById('song-progress');

        noUiSlider.create(slider, {
            start: [20],
            range: {
                'min': [0],
                'max': [100]
            }
        });

        var slider = document.getElementById('song-volume');

        noUiSlider.create(slider, {
            start: [90],
            range: {
                'min': [0],
                'max': [100]
            }
        });


        // Tooltips

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Viewport Heights

        $(window).on("resize load", function() {

            var totalHeight = $(window).height();

            var headerHeight = $('.header').outerHeight();
            var footerHeight = $('.current-track').outerHeight();
            var playlistHeight = $('.playlist').outerHeight();
            var nowPlaying = $('.playing').outerHeight();

            var navHeight = totalHeight - (headerHeight + footerHeight + playlistHeight + nowPlaying);
            var artistHeight = totalHeight - (headerHeight + footerHeight);

            console.log(totalHeight);

            $(".navigation").css("height", navHeight);
            $(".artist").css("height", artistHeight);
            $(".social").css("height", artistHeight);

        });





        // Collapse Toggles

        $(".navigation__list__header").on("click", function() {

            $(this).toggleClass("active");

        });


        // Media Queries

        $(window).on("resize load", function() {
            if ($(window).width() <= 768) {

                $(".collapse").removeClass("in");

                $(".navigation").css("height", "auto");

                $(".artist").css("height", "auto");

            }
        });

        $(window).on("resize load", function() {
            if ($(window).width() > 768) {

                $(".collapse").addClass("in");

            }
        });
    </script>

</body>

</html>