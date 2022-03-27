<?php
session_start();
include("funcs.php");
loginCheck();

$pdo = db_connect();
$sql = "SELECT * FROM bemaped_users_table INNER JOIN bemaped_data_table ON bemaped_users_table.id = bemaped_data_table.u_id WHERE bemaped_data_table.id =:movie_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":movie_id", $_GET["movie_id"], PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(); //ユーザー情報を取得

if ($val["u_id"]!=$_SESSION["id"]) {
    echo "編集可能な動画ではありません";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/edit.css">
    <title>Youtubeマッピング画面</title>
</head>
<body>
    <div class="main">
        <div class="inner contact">
            <div style="display: flex; justify-content: space-between;">
                <a href="index.php"><h1>bemaped</h1></a>
                <div  style="display: flex; align-items: flex-end;" id="delete"><a><h4>マッピングを削除する</h4></a></div>
            </div>
            <!-- map表示エリア -->
            <div id="myMap" style='width:100%;height:40vh;float:left;'></div>
            <!-- map表示エリア -->
            <!-- Form -->
            <!-- Left Inputs -->
            <form action="edit_act.php?movie_id=<?=$_GET["movie_id"]?>" method="POST">
                <div class="input_item" data-wow-delay=".5s">
                    <!-- Name -->
                    <input type="text" name="movie_title" id="movie-title" required="required" class="form" placeholder="動画タイトル" value="<?=$val["movie_title"]?>"/>
                    <!-- Email -->
                    <input type="text" name="movie_url" id="movie-url" required="required" class="form" placeholder="動画URL" value="https://www.youtube.com/watch?v=<?=$val["video_id"]?>"/>
                    <!-- コメント -->
                    <textarea type="text" name="comment" id="comment" class="form" placeholder="説明"><?=$val["comment"]?></textarea>
                    <!-- Subject -->
                    <input type="text" name="tag" id="tag" class="form" placeholder="＃タグ" value="<?=$val["tag"]?>" />
                    <input type="hidden" id="lat" name="lat" value="<?=$lat?>">
                    <input type="hidden" id="lon" name="lon" value="<?=$lon?>">
                    <input type="hidden" name="u_id" value="<?= $_SESSION["id"]?>">
                </div>
                <!-- Bottom Submit -->
                <div class="relative fullwidth col-xs-12">
                    <!-- Send Button -->
                    <button type="submit" id="submit" name="submit" class="form-btn semibold">編集を反映する</button>
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
    
    <!-- FirebaseのAPI読み込み -->
    <script type="module" src="js/Firebase.js"></script>

    <!-- アップロードhtmlのメインJS -->
    <script type="text/javascript">

        function GetMap() {
            const map = new Bmap("#myMap");
            map.startMap(Number(<?= $val["lat"] ?>), Number(<?= $val["lon"] ?>), "load", 18);
            lat = Number(<?= $val["lat"] ?>);
            lon = Number(<?= $val["lon"] ?>);
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
        textarea.style.height = clientHeight + 'px';
        //textareaの入力内容の高さを取得
        let scrollHeight = textarea.scrollHeight;
        //textareaの高さに入力内容の高さを設定
        textarea.style.height = scrollHeight + 'px';

        //textareaのinputイベント
        textarea.addEventListener('input', ()=>{
            //textareaの要素の高さを設定（rows属性で行を指定するなら「px」ではなく「auto」で良いかも！）
            textarea.style.height = clientHeight + 'px';
            //textareaの入力内容の高さを取得
            let scrollHeight = textarea.scrollHeight;
            //textareaの高さに入力内容の高さを設定
            textarea.style.height = scrollHeight + 'px';
        });

        $("#delete").on('click', function () {
            var result = window.confirm('本当にこの動画のマッピングを削除しますか？');
            if (result==true) {
                window.location.href = "delete.php?movie_id=<?=$_GET["movie_id"]?>";
            }
        });
    </script>
</body>
</html>