<?php
session_start();
include("funcs.php");
loginCheck();

$lat = $_GET["lat"];
$lon = $_GET["lon"];

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
            <a href="index.php"><h1>bemaped</h1></a>
            <div class="mymap">
                <div id="myMap" style='width:100%;height:40vh;float:left;'></div>
            </div>
            <!-- map表示エリア -->
            <!-- Form -->
            <!-- Left Inputs -->
            <form action="up_load_act.php" method="POST">
                <div class="input_item" data-wow-delay=".5s">
                    <!-- Name -->
                    <input type="text" name="movie_title" id="movie-title" required="required" class="form" placeholder="動画タイトル" />
                    <!-- Email -->
                    <input type="text" name="movie_url" id="movie-url" required="required" class="form" placeholder="動画URL" />
                    <!-- コメント -->
                    <textarea type="text" name="comment" id="comment" class="form" placeholder="説明"></textarea>
                    <!-- Subject -->
                    <input type="text" name="tag" id="tag" class="form" placeholder="＃タグ" />
                    <input type="hidden" id="lat" name="lat" value="<?=$lat?>">
                    <input type="hidden" id="lon" name="lon" value="<?=$lon?>">
                    <input type="hidden" name="u_id" value="<?= $_SESSION["id"]?>">
                </div>
                <!-- Bottom Submit -->
                <div class="relative fullwidth col-xs-12">
                    <!-- Send Button -->
                    <button type="submit" id="submit" name="submit" class="form-btn semibold">動画をマッピング</button>
                </div><!-- End Bottom Submit -->
            </form>
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
    
    <!-- アップロードhtmlのメインJS -->
    <script type="text/javascript">

        function GetMap() {
            const map = new Bmap("#myMap");
            map.startMap(Number(<?= $lat ?>), Number(<?= $lon ?>), "load", 18);
            lat = Number(<?= $lat ?>);
            lon = Number(<?= $lon ?>);
            pin =map.pinLayer(lat,lon,"#0000ff");
            map.onGeocode("click", function (data) {
                map.pinLayerClear(pin);
                lat = data.location.latitude;  //Get latitude
                lon = data.location.longitude; //Get longitude
                pin = map.pinLayer(lat, lon, "#0000ff");
                document.getElementById("lat").value = lat;
                document.getElementById("lon").value = lon;
            });
        }

    </script>
    <script>
        //textareaの要素を取得
        let textarea = document.getElementById('comment');
        //textareaのデフォルトの要素の高さを取得
        let clientHeight = textarea.clientHeight;

        //textareaのinputイベント
        textarea.addEventListener('input', ()=>{
            //textareaの要素の高さを設定（rows属性で行を指定するなら「px」ではなく「auto」で良いかも！）
            textarea.style.height = clientHeight + 'px';
            //textareaの入力内容の高さを取得
            let scrollHeight = textarea.scrollHeight;
            //textareaの高さに入力内容の高さを設定
            textarea.style.height = scrollHeight + 'px';
        });
    </script>
</body>
</html>