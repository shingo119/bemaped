<?php
session_start();
include("funcs.php");

$lat = $_GET["sample1"];
$lon = $_GET["sample2"];

console_log($lat);
console_log($lon);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/up_load.css">
    <title>Youtubeマッピング画面</title>
</head>
<body>
    <div class="main">
        <div class="inner contact">
            <!-- map表示エリア -->
            <div class="mymap">
            <div id="myMap" style='width:100%;height:100%;float:left;'></div>
            </div>
            <!-- map表示エリア -->
            <!-- Form Area -->
            <div class="contact-form">
                <form method="POST" action="index.php">
                    <input id="pin_lat" name="pin_lat" hidden>
                    <input id="pin_lon" name="pin_lon" hidden>
                    <h1 type="submit">bemaped</h1>
                </form>
                <!-- Form -->
                <!-- <form id="contact-us" method="#" action="#"> -->
                <!-- Left Inputs -->
                <form action="up_load_act.php" method="POST">
                    <div class="input_item" data-wow-delay=".5s">
                        <!-- Name -->
                        <input type="text" name="movie_title" id="movie-title" required="required" class="form" placeholder="動画タイトル" />
                        <!-- Email -->
                        <input type="text" name="movie_url" id="movie-url" required="required" class="form" placeholder="動画URL" />
                        <!-- コメント -->
                        <input type="text" name="comment" id="comment" class="form" placeholder="コメント" />
                        <!-- Subject -->
                        <input type="text" name="tag" id="tag" class="form" placeholder="＃タグ" />
                        <input type="hidden" name="lat" value="<?=$lat?>">
                        <input type="hidden" name="lon" value="<?=$lon?>">
                        <input type="hidden" name="u_id" value="<?= $_SESSION["id"]?>">
                    </div>
                    <!-- Bottom Submit -->
                    <div class="relative fullwidth col-xs-12">
                        <!-- Send Button -->
                        <button type="submit" id="submit" name="submit" class="form-btn semibold">動画をマッピング</button>
                    </div><!-- End Bottom Submit -->
                </form>
                <!-- </form> -->
            </div><!-- End Contact Form Area -->
        </div><!-- End Inner -->
    </div>

    <!-- jQuery読み込みCDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    
    <!-- bingmapのAPI読み込みCDN -->
    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ApPcFw7GdzTHXhj7erJNlk_tpn3P3DrjLSsbAPzasrG0b7f8_EDggHCOVS9brMbx'
        async defer></script>
    
    <!-- 山崎先生のBmapQueryライブラリの読み込み -->
    <script src="js/BmapQuery.js"></script>
    
    <!-- FirebaseのAPI読み込み -->
    <script type="module" src="js/Firebase.js"></script>

    <!-- アップロードhtmlのメインJS -->
    <script type="text/javascript">

        var urlPrm = new Object;
        var urlSearch = location.search.substring(1).split('&');
        for (i = 0; urlSearch[i]; i++) {
            var kv = urlSearch[i].split('=');
            urlPrm[kv[0]] = kv[1];
        }

        sessionStorage.setItem('lat',urlPrm.sample1);
        sessionStorage.setItem('lon',urlPrm.sample2);

        function GetMap() {
            const map = new Bmap("#myMap");
            map.startMap(Number(urlPrm.sample1), Number(urlPrm.sample2), "load", 18);
            map.pinIcon(Number(urlPrm.sample1), Number(urlPrm.sample2), "img/red-pin.png", 1.0, 16, 32);
        }

    </script>

</body>
</html>