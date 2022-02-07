<?php
session_start();
include("funcs.php");
loginCheck();

$id = $_SESSION["id"];
//1. DB接続します
$pdo = db_connect();

$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(PDO::FETCH_ASSOC); //ユーザー情報を取得
$icon = $val["icon"];
if($icon == "" || $icon == null){
    $icon = "img/logo.png";
}else{
    $icon = "upload/".$val["icon"];
}

$sql2 = "SELECT * FROM `bemaped_data_table` WHERE u_id=:id"; 
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(":id", "$id", PDO::PARAM_STR); 
$status2 = $stmt2->execute(); 
$val2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
$json_val2 = json_encode($val2);
// $val2_array = [];
// while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
//     array_push($val2_array, $val2);
// }

$sql3 = "SELECT COUNT(*) FROM bemaped_data_table WHERE u_id=:id"; 
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindValue(":id", "$id", PDO::PARAM_STR); 
$status3 = $stmt3->execute(); 
$val3 = $stmt3->fetch(PDO::FETCH_COLUMN);

console_log($status3);
console_log($val3);

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
    <link rel="stylesheet" href="css/mypage_sub.css">
    <link rel="stylesheet" href="sass/mypage.css">
    <title>マイマップ</title>
</head>
<body>
    <div class="main">
        <div class="inner contact">
            <!-- Form Area -->
            <div class="contact-form">
                <a href="index.php"><h1>bemaped</h1></a>
                
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col sm-12 col-md-8 col-lg-5">
                            <div class="rotate-container">
                                <div class="card card-front text-center">
                                    <div class="card-header">
                                        <!-- <p>About You</p> -->
                                    </div>
                                    <div class="card-background" style='background-size:contain; background-image: url("upload/<?=$val["back_ground"]?>")'></div>
                                    <div class="card-block"><img class="avatar" src="<?=$icon?>">
                                        <h3 class="card-title"><?= $val["u_name"]?></h3>
                                        <button class="btn btn-primary btn-rotate">Read more<i class="fa fa-long-arrow-right"></i></button>
                                        <a href="profile_edit.php"><button class="btn btn-primary edit">編集</button></a>
                                    </div>
                                </div>
                                <div class="card card-back text-center">
                                    <div class="card-header">
                                        <!-- <p>More About You</p> -->
                                    </div>
                                    <div class="card-block">
                                        <h4>説明</h4>
                                        <p><?= $val["explan"]?></p>
                                        <h4>Connect:</h4>
                                        <ul class="social-links list-unstyled d-flex justify-content-center">
                                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fa fa-snapchat"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        </ul><button class="btn btn-primary btn-rotate"> <i class="fa fa-long-arrow-left"></i>&nbsp;Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

                console.log(lat);
                console.log(lon);
                //Map
                // map.startMap(lat, lon, "load", 10);
                //pin
                map.pin(lat, lon, "#0000ff");
            });

            let movie_data_count = "<?= $val3 ?>";
            if( movie_data_count != ""){
                for (let i = 0; i < movie_data_count ; i++) {
                // const str = <= $val2 ?>;
                // const obj = JSON.parse(str);
                // const lat = Number(obj.lat);  //Get latitude
                // const lon = Number(obj.lon); //Get longitude
                let json_val2 = JSON.parse(JSON.stringify(<?= $json_val2 ?>));
                // let val2 = <= $val2 ?>;
                // console.log(json_val2);
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

        $(function() {
        // For card rotation
            $('.btn-rotate').click(function(){
                $('.card-front').toggleClass(' rotate-card-front');
                $('.card-back').toggleClass(' rotate-card-back');
            });
        });
    </script>

</body>
</html>