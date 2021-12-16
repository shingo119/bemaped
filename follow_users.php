<?php
session_start();
include("funcs.php");
loginCheck();

$id = $_SESSION["id"];
//1.  ローカルDB接続します
$pdo = db_connect();

$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(); //ユーザー情報を取得

if(isset($_SESSION["id"])){
    $sql2 = "SELECT * FROM bemaped_follow_table INNER JOIN bemaped_users_table ON bemaped_follow_table.be_followed = bemaped_users_table.id WHERE bemaped_follow_table.followed=:followed"; //あいまい検索
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindValue(":followed", $id, PDO::PARAM_INT); //検索ワードをバインド変数化
    $status2 = $stmt2->execute(); //sql文にエラーがないか
    // console_log($status2);

    $sql3 = "SELECT COUNT(*) FROM bemaped_follow_table WHERE followed=:followed"; //あいまい検索
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->bindValue(":followed", "$id", PDO::PARAM_INT); //検索ワードをバインド変数化
    $status3 = $stmt3->execute(); //sql文にエラーがないか
    $val3 = $stmt3->fetch(PDO::FETCH_COLUMN);
    console_log($status3);
    console_log($val3);

    $user_view = "";
    while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        $user_view .= '<div class="rotate-container"><div class="card card-front"><div class="card-header">';
        $user_view .= '<p>フォロー中</p>';
        $user_view .= '</div><div class="card-background"><img class="back" src="upload/'.$val2["back_ground"].'" alt="" /></div><div class="card-block">';
        $user_view .= '<img class="avatar" src="upload/'.$val2["icon"].'" alt="" />';
        $user_view .= '<h3 class="card-title">'.$val2["u_name"].'</h3>';
        // console_log($val2["u_name"]);
        $user_view .= '<p>Time Traveler</p><button class="btn btn-primary btn-rotate" data-id="'.$val2["be_followed"].'">Read more<i class="fa fa-long-arrow-right"></i></button></div></div>';
        $user_view .= '<div class="card card-back"><div class="card-header"><p>More About Me</p></div><div class="card-block"><h4>説明</h4>';
        $user_view .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a faucibus.</p>';
        $user_view .= '<h4>Connect:</h4><ul class="social-links list-unstyled d-flex justify-content-center"><li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li><li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li><li><a href="#" target="_blank"><i class="fa fa-snapchat"></i></a></li><li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li></ul><button class="btn btn-primary btn-rotate map_hidden" data-id=""><i class="fa fa-long-arrow-left"></i>Back</button></div></div></div>';
    }
    // $json_val2 = json_encode($val2);
    // $val2_array = [];
    // while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    //     array_push($val2_array, $val2);
    // }

    // $sql4 = "SELECT * FROM `bemaped_data_table` WHERE u_id=:id"; //あいまい検索
    // $stmt4 = $pdo->prepare($sql4);
    // $stmt4->bindValue(":id", "$id", PDO::PARAM_STR); //検索ワードをバインド変数化
    // $status4 = $stmt4->execute(); //sql文にエラーがないか
    // $json_val4 = json_encode($val4);
    // $val4_array = [];
    // while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    //     array_push($val2_array, $val2);
    // }

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
    <link rel="stylesheet" href="css/follow_users_sub.css">
    <link rel="stylesheet" href="sass/follow_users.css">
    <title>マイマップ</title>
</head>
<body>
    <div class="main">
        <div class="inner contact">
            <!-- Form Area -->
            <div class="contact-form">
                <a href="index.php"><h1>bemaped</h1></a>
                
                <div class="grid">

                    <!-- <div class="rotate-container">
                        <div class="card card-front">
                            <div class="card-header">
                                <p>フォロー中</p>
                            </div>
                            <div class="card-background"></div>
                            <div class="card-block">
                                <img class="avatar" src="img/favicon.png" alt="" />
                                <h3 class="card-title">John Connor</h3>
                                <p>Time Traveler</p>
                                <button class="btn btn-primary btn-rotate">Read more
                                    <i class="fa fa-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card card-back">
                            <div class="card-header">
                                <p>More About Me</p>
                            </div>
                            <div class="card-block">
                                <h4>Interests</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a faucibus.</p>
                                <h4>Connect:</h4>
                                <ul class="social-links list-unstyled d-flex justify-content-center">
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-snapchat"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                                <button class="btn btn-primary btn-rotate">
                                    <i class="fa fa-long-arrow-left"></i>Back
                                </button>
                            </div>
                        </div>
                    </div> -->

                    <?= $user_view ?>

                    
                
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

            let movie_data_count = "";
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
                // map.onPin(map.pinText(lat, lon, " ", " ", " "), "click", function () {
                //     if (confirm('ページ遷移しますか？')) {
                //         const url = "/bemaped/view.php?movie_id=" + json_val2[i]["id"];
                //         window.location.href = `${url}`;
                //     }
                // });
                }
            }

            $('.map_hidden').on("click",function(){
                map.deletePin(); 
            });

            $(".btn-rotate").on("click", function(){
                let click = $(this).data('id');
                let $parent = $(this).closest(".rotate-container");
                $parent.children(".card-front").toggleClass(" rotate-card-front");
                $parent.children(".card-back").toggleClass(" rotate-card-back");

                //Ajax（非同期通信）
                const params = new URLSearchParams();
                params.append('u_id', click);            //axiosでAjax送信
                axios.post('follow_users_act.php',params).then(function (response) {
                    console.log(response.data);//通信OK
                    let obj_len = Object.keys(response.data).length;
                    console.log(obj_len);
                    console.log("ajax_post.php/通信OK");
                    if(obj_len != 0){
                        for(let i = 0; i < obj_len; i++){
                            let json_val2 = JSON.parse(JSON.stringify(response.data));
                            const lat = json_val2[i]["lat"];
                            const lon = json_val2[i]["lon"];
                            map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 85);
                            map.changeMap(lat, lon, "load", 9);
                            map.onPin(map.pinText(lat, lon, " ", " ", " "), "click", function () {
                                if (confirm('ページ遷移しますか？')) {
                                    const url = "/bemaped/view.php?movie_id=" + json_val2[i]["id"];
                                    window.location.href = `${url}`;
                                }
                            });
                        }
                    }else{
                        map.geolocation(function (data) {
                        //location
                        const lat = data.coords.latitude;
                        const lon = data.coords.longitude;
                        map.pin(lat, lon, "#0000ff");
                        });
                    }
                }).catch(function (error) {
                    console.log(error);//通信Error
                }).then(function () {
                    console.log("Last");//通信OK/Error後に処理を必ずさせたい場合
                });
            });



        }

        // $(function() {
        // // Time wasted here: 3 hours

        // // For card rotation
        // $(".btn-rotate").click(function() {
        //     // Long explanation: The button that is clicked, will have its grand parent add a class to its child. The main reason I couldn't use .parent() was that it gets the closest positioned parent, either relative or absolute. The problem was that the card-front got the .rotate-container as its parent, but the card-back was being the closest positioned element as the parent of the button. In order to circumvent this I either needed to use 3 offsetparent() and have really messy code, or just use the .closest() which as its name suggests gets the closest named or unnamed element. So in the end, I get the grand parent of the button which is the .rotate container and I find its children which are the .card-front and .card-back and toggle the rotation classes on them. Also if I didn't specify which button's ancestor would assign the class, whenever any btn-rotate button is clicked, all three cards would rotate at once which makes for a funny yet unhelpful design.
        //     var $parent = $(this).closest(".rotate-container");
        //     // Probably easier to use an id, but I made it work
        //     $parent.children(".card-front").toggleClass(" rotate-card-front");
        //     $parent.children(".card-back").toggleClass(" rotate-card-back");
        // });
        // });

        //  $(".btn-rotate").on("click", function(){
        //     let click = $(this).data('id');
        //     let $parent = $(this).closest(".rotate-container");
        //     $parent.children(".card-front").toggleClass(" rotate-card-front");
        //     $parent.children(".card-back").toggleClass(" rotate-card-back");

        //     //Ajax（非同期通信）
        //     const params = new URLSearchParams();
        //     params.append('u_id', click);            //axiosでAjax送信
        //     axios.post('follow_users_act.php',params).then(function (response) {
        //         console.log(response.data);//通信OK
        //         console.log("ajax_post.php/通信OK");
        //     }).catch(function (error) {
        //         console.log(error);//通信Error
        //     }).then(function () {
        //         console.log("Last");//通信OK/Error後に処理を必ずさせたい場合
        //     });
        // });
    </script>

</body>
</html>