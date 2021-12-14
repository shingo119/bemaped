<?php
session_start();
include("funcs.php");
// loginCheck();

$id = $_SESSION["id"];
//1.  ローカルDB接続します
$pdo = db_connect();
$movie_id = $_GET["movie_id"];
// console_log($_SESSION["search_word"]);

console_log($movie_id);

$sql = "SELECT * FROM bemaped_users_table INNER JOIN bemaped_data_table ON bemaped_users_table.id = bemaped_data_table.u_id WHERE bemaped_data_table.id =:movie_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":movie_id", $movie_id, PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(); //ユーザー情報を取得
console_log($status);

if(isset($_SESSION["search_word"])){
$search_word = $_SESSION["search_word"]; //検索ワードを今のページからPOSTで取得
$sql2 = "SELECT * FROM `bemaped_data_table` WHERE movie_title LIKE :search_word"; //あいまい検索
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(":search_word", "%{$search_word}%", PDO::PARAM_STR); //検索ワードをバインド変数化
$status2 = $stmt2->execute(); //sql文にエラーがないか
$val2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
$json_val2 = json_encode($val2);
// $val2_array = [];
// while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
//     array_push($val2_array, $val2);
// }
$sql3 = "SELECT COUNT(*) FROM bemaped_data_table WHERE movie_title LIKE :search_word"; //あいまい検索
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindValue(":search_word", "%{$search_word}%", PDO::PARAM_STR); //検索ワードをバインド変数化
$status3 = $stmt3->execute(); //sql文にエラーがないか
$val3 = $stmt3->fetch(PDO::FETCH_COLUMN);
// $culmn_count = (int)$val3["count(*)"];
}

// console_log($status3);
// console_log($val3);

//３．データ表示
// if($status==false) {
//   //execute（SQL実行時にエラーがある場合）
//   $error = $stmt->errorInfo();
//   exit("ErrorQuery:".$error[2]);

// } else {
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     $u_name = $result["u_name"];
//     // $u_info = $result["u_info"];
// }


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
        <div class="inner contact">
            <!-- Form Area -->
            <div class="contact-form">
                <a href="index.php"><h1>bemaped</h1></a>
                
                <div class="grid">
                    <div class="user_profile">
                        <div class="user_icon">
                            <img src="img/hurt2.png" alt="">
                        </div>
                        <div class="user_name">
                            <h3><?= $val["u_name"]?></h3>
                        </div>
                        <div class="user_exp">みーもぐです。</div>
                        <section>
                            <a href="#" class="btn_02">フォローする</a>
                        </section>                          
                    </div>                    
                    <iframe width="800" height="450" src="https://www.youtube.com/embed/EwLr8YoyqvM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <!-- map表示エリア -->
            <div class="mymap">
                <div id="myMap" style='width:100%;height:100%;float:left;'></div>
            </div>
            <!-- map表示エリア -->

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
            
            map.startMap(35.712772, 139.750443, "canvasLight", 10);

            //現在地表示
            map.geolocation(function (data) {
                //location
                const lat = data.coords.latitude;
                const lon = data.coords.longitude;

                // console.log(lat);
                // console.log(lon);
                //Map
                // map.startMap(lat, lon, "load", 10);
                //pin
                map.pin(lat, lon, "#0000ff");
            });

            let search_word = "<?= $_SESSION["search_word"] ?>";
            let search_data_count = "<?=$val3?>";
            if( search_word != ""){
                for (let i = 0; i < search_data_count ; i++) {
                // const str = <= $val2 ?>;
                // const obj = JSON.parse(str);
                // const lat = Number(obj.lat);  //Get latitude
                // const lon = Number(obj.lon); //Get longitude
                let json_val2 = JSON.parse(JSON.stringify(<?= $json_val2 ?>));
                // let val2 = <= $val2 ?>;
                //console.log(json_val2);
                // console.log(val2);
                // window.addEventListener('DOMContentLoaded', function(){
                const lat = json_val2[i]["lat"];
                const lon = json_val2[i]["lon"];
                map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 85);
                map.changeMap(lat, lon, "load", 9);
                // console.log(lat);
                // console.log(lon);
                }
            }
        }

    </script>

</body>
</html>