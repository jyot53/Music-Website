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

    <title>Online music streaming website using html,css And javascript</title>
    <style>
        body {
            background-image: linear-gradient(#1c92d2,#f2fcfe);
            font-family: Open sans;
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

        .container{
            height: 100vh;
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
$album = $_GET['album'];
$query = "Select * from songs where album='$album'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

    // echo $row['path'];
    $array[] = $row;
}

// $array[1]['path']
// print_r($array);

$getNoSongsQuery = "select totalsongs from albums where album_name='$album'";
$result1 = mysqli_query($conn, $getNoSongsQuery);
while ($row = mysqli_fetch_array($result1)) {

    $getSongValue[] = $row;
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
                    <h3 style="text-transform: uppercase;"><?php echo $album ?> SONGS</h3>
                </div>

                <div class="d-flex justify-content-around" style="margin-top: 75px;">
                    <?php
                    for ($x = 0; $x < $getSongValue[0]['totalsongs']; $x++) {
                    ?>
                        <div class="col-md-2">
                            <a href="javascript:void();" class="album-poster" data-switch="<?php echo $x ?>">
                                <!-- <img src="https://images.pexels.com/photos/1763075/pexels-photo-1763075.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                            alt="" class="img-fluid"> -->
                                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/00/Eminem_-_Not_Afraid.jpg/220px-Eminem_-_Not_Afraid.jpg" style="width: 2000px;" alt="" class="img-fluid">
                            </a>
                            <h4><?php echo $array[$x]['title'] ?></h4>
                            <p><?php echo $array[$x]['singer'] ?></p>
                        </div>
                    <?php
                    }
                    ?>

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
            audio : [ <?php
                    for ($x = 0; $x < $getSongValue[0]['totalsongs']; $x++) {
                    ?> {
                            name: '<?php echo $array[$x]['title'] ?>',
                            artist: '<?php echo $array[$x]['singer'] ?>',
                            url: '<?php echo $array[$x]['path'] ?>',
                            cover: 'https://images.pexels.com/photos/838696/pexels-photo-838696.jpeg?auto=compress&cs=tinysrgb& dpr=1&w=500'
                    },

                    <?php }?>
    
            ]
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