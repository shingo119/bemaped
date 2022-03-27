<?php
session_start();
include("funcs.php");

$id = $_SESSION["id"];
$pdo = db_connect();
$movie_id = $_GET["movie_id"];

$sql = "SELECT * FROM bemaped_users_table INNER JOIN bemaped_data_table ON bemaped_users_table.id = bemaped_data_table.u_id WHERE bemaped_data_table.id =:movie_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":movie_id", $movie_id, PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(); //ユーザー情報を取得

$sql2 = "SELECT * FROM bemaped_data_table WHERE"; //あいまい検索
$sql2 .= " (6378137 * ACOS(COS(RADIANS(".strval($val["lat"]).")) * COS(RADIANS(lat)) * COS(RADIANS(lon) - RADIANS(".strval($val["lon"]).")) + SIN(RADIANS(".strval($val["lat"]).")) * SIN(RADIANS(lat)))) < 10000 OR lat=".strval($val["lat"])." AND lon=".strval($val["lon"]);
$stmt2 = $pdo->prepare($sql2);
$status2 = $stmt2->execute(); //sql文にエラーがないか
$val2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
$json_val2 = json_encode($val2);

$followed = $_SESSION["id"];
$be_followed = $val["u_id"];
$sql4 = "SELECT * FROM bemaped_follow_table WHERE followed=:followed AND be_followed=:be_followed";
$stmt4 = $pdo->prepare($sql4);
$stmt4->bindValue(":followed", $followed, PDO::PARAM_INT);
$stmt4->bindValue(":be_followed",$be_followed, PDO::PARAM_INT);
$status4 = $stmt4->execute();
$val4 = $stmt4->fetch(PDO::FETCH_ASSOC);
$follow_btn = "";
if($val4 == "" || $val4 == null){
    $follow_btn = "フォローする";
}else{
    $follow_btn = "フォローを外す";
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
    <link rel="stylesheet" href="css/view_sub.css">
    <link rel="stylesheet" href="css/view.css">
    <title>マイマップ</title>
</head>
<body>
    <div class="main">
        <a href="index.php"><h1>bemaped</h1></a>
        <div class="inner">
            <!-- Form Area -->
            <div class="contact-form">
                <div class="grid">
                    <div class="user_profile">
                        <div class="user_profile_main">
                            <div class="user_icon">
                                <img src="upload/<?=$val["icon"]?>" alt="">
                            </div>
                            <div class="user_name">
                                <h3><?= $val["u_name"]?></h3>
                            </div>
                            <div class="user_exp"></div>
                        </div>
                        <div id="btns">
                            <?php
                                if ($val["u_id"]===$id) {
                                    echo '<a href="edit.php?movie_id='.$_GET["movie_id"].'" class="btn_02">'.'編集する'.'</a>';
                                }
                                else {
                                    echo '<a href="#" class="btn_02" id="follow_btn">'.$follow_btn.'</a>';
                                }
                            ?>
                        </div>
                    </div>
                    <div><?= make_iframe_by_video_id($val["video_id"]);?></div>
                </div>
                <div id="myMap"></div>
            </div>
            <div class="comment">
                <p>動画タイトル</p>
                <a href="https://www.youtube.com/watch?v=<?=$val["video_id"]?>" target="_blank" rel="noopener noreferrer"><h2><?=$val["movie_title"]?></h2></a>
                <p>説明</p>
                <p><?=nl2br(link_url($val["comment"]))?></p>
            </div>
            <!-- map表示エリア -->
        </div><!-- End Inner -->
    </div>

    <!-- jQuery読み込みCDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
    <!-- bingmapのAPI読み込みCDN -->
    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ApPcFw7GdzTHXhj7erJNlk_tpn3P3DrjLSsbAPzasrG0b7f8_EDggHCOVS9brMbx'
        async defer></script>
    
    <!-- 山崎先生のBmapQueryライブラリの読み込み -->
    <script src="js/BmapQuery.js"></script>
    
    <!-- FirebaseのAPI読み込み -->
    <script type="module" src="js/Firebase.js"></script>

    <!-- アップロードhtmlのメインJS -->
    <script type="text/javascript">
        function make_iframe_on_map_by_video_id(data){
            return '<iframe width="315" height="170" src="https://www.youtube.com/embed/'+data+'?autoplay=1&mute=1&version=3&loop=1&playlist='+data+'&fs=0&modestbranding=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        function GetMap() {

            const map = new Bmap("#myMap");
            
            map.startMap(<?=$val["lat"]?>, <?=$val["lon"]?>, "load", 17);

            let search_word = "<?= $_SESSION["search_word"] ?>";
            let search_data_count = "<?=count($val2)?>";
            let json_val2 = JSON.parse(JSON.stringify(<?= $json_val2 ?>));
            console.log(json_val2);
            for (let i = 0; i < search_data_count ; i++) {
                const lat = json_val2[i]["lat"];
                const lon = json_val2[i]["lon"];
                if (json_val2[i]["id"]==<?=$_GET["movie_id"]?>) {
                    console.log(1);
                    map.pinLayer(lat, lon, "#0000ff");
                    map.infoboxHtml(lat, lon, '<div id="info_id' + i + '" hidden style="width: 300px; background-color: #fff; position:absolute; top:-60px; left:-145px;">' +'<h5 style="font-size: 16px">この動画の場所です</h5></div>');
                    x = map.pinText(lat, lon, " ", " ", " ");
                    map.onPin(x, "mouseout", function () {
                        $('#info_id'+i).attr('hidden', true);
                    });
                    map.onPin(x, "mouseover", function () {
                        $('#info_id'+i).removeAttr('hidden');
                    });
                }
                else {
                    map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 85);
                    map.infoboxHtml(lat, lon, '<div id="info_id' + i + '" hidden style="width: 300px; background-color: #fff; position:absolute; top:-270px; left:-145px;">'+ json_val2[i]["video_id"] + '</div>');
                    x = map.pinText(lat, lon, " ", " ", " ");
                    map.onPin(x, "click", function () {
                        const url = "view.php?movie_id=" + json_val2[i]["id"];
                        window.location.href = `${url}`;
                    });
                    // ホバーした時のみ説明を表示する
                    let txt='';
                    map.onPin(x, "mouseout", function () {
                        $('#info_id'+i).attr('hidden', true);
                        $('#info_id'+i).empty();
                        $('#info_id'+i).append(txt);
                    });
                    map.onPin(x, "mouseover", function () {
                        $('#info_id'+i).removeAttr('hidden');
                        txt=document.getElementById('info_id'+i).innerHTML;
                        $('#info_id'+i).empty();
                        $('#info_id'+i).append(make_iframe_on_map_by_video_id(txt));
                    });
                }
            }
        }

        $("#follow_btn").on("click", function(){
            //Ajax（非同期通信）
            let follow_btn = "";
            const params = new URLSearchParams();
            params.append('followed', <?=$_SESSION["id"]?>);
            params.append('be_followed', <?= $val["u_id"]?>);
            //axiosでAjax送信
            axios.post('follow_act.php',params).then(function (response) {
                if(response.data == "" || response.data == null){
                    let div = document.getElementById("follow_btn");
                    div.innerHTML = "フォローを外す";
                }else{
                    let div = document.getElementById("follow_btn");
                    div.innerHTML = "フォローをする";
                }
            }).catch(function (error) {
                console.log(error);//通信Error
            }).then(function () {
                console.log("Last");//通信OK/Error後に処理を必ずさせたい場合
            });
        });
    </script>

</body>
</html>