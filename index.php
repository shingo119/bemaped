<?php

session_start();
include("funcs.php");
$id = $_SESSION["id"];
$_SESSION["search_word"] = $_POST["search_word"];
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     echo $_POST['search_word'];
// }
console_log($_SESSION["search_word"]);


$pdo = db_connect();//1.  ローカルDB接続します
$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";//ログイン情報の取得
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute(); //sql文にエラーがないか
$val = $stmt->fetch(); //ユーザー情報を取得

console_log("ID:".$id); //ログイン中のユーザーID
console_log($val); //ユーザー情報が取れているか
console_log("status:".$status); //sql文にエラーがないか

if(isset($_POST["search_word"])){
$search_word = $_POST["search_word"]; //検索ワードを今のページからPOSTで取得
$split_word = word_split($search_word);
console_log($split_word);

// 複数ワードでのあいまい検索ができるように記述を変更
$sql2 = "SELECT * FROM `bemaped_data_table` WHERE"; //あいまい検索
for ($i = 0; $i < count($split_word); $i++) {
  $sql2 .= " movie_title LIKE '%" . $split_word[$i] . "%' OR tag LIKE '%";
  if ($i == count($split_word) - 1) {
    $sql2 .= $split_word[$i] . "%'";
  } else {
    $sql2 .= $split_word[$i] . "%' OR";
  }
}
$stmt2 = $pdo->prepare($sql2);
// $stmt2->bindValue(":search_word", "%{$search_word}%", PDO::PARAM_STR); //検索ワードをバインド変数化
// $stmt2->bindValue(":search_word", $split_word, PDO::PARAM_STR); //検索ワードをバインド変数化
$status2 = $stmt2->execute(); //sql文にエラーがないか
$val2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
$json_val2 = json_encode($val2);
// $val2_array = [];
// console_log(word_split($search_word));
// while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
//     array_push($val2_array, $val2);
// }

// 複数ワードでのあいまい検索ができるように記述を変更
$sql3 = "SELECT COUNT(*) FROM bemaped_data_table WHERE"; //あいまい検索
for ($i = 0; $i < count($split_word); $i++) {
  $sql3 .= " movie_title LIKE '%" . $split_word[$i] . "%' OR tag LIKE '%";
  if ($i == count($split_word) - 1) {
    $sql3 .= $split_word[$i] . "%'";
  } else {
    $sql3 .= $split_word[$i] . "%' OR";
  }
}$stmt3 = $pdo->prepare($sql3);
$status3 = $stmt3->execute(); //sql文にエラーがないか
$val3 = $stmt3->fetch(PDO::FETCH_COLUMN);
// $culmn_count = (int)$val3["count(*)"];
}

console_log("search_word:".$search_word);
console_log("status2:".$status2);
console_log("status3:".$status3);
// console_log($val2_array);
// console_log($json_val2);
console_log($val2);
console_log($val3);

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bemaped</title>
    <style>html,body{height:100%;}body{padding:0;margin:0;}h1{padding:0;margin:0;font-size:50%;}</style>
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="img/favicon.png" sizes="16x16" type="image/png" />
</head>

<body>
    <div class="top">
        <h1>bemaped</h1>
    </div>
    <div class="top-announce">
        <div class="announcewrap">
            <h2>好きな動画のその場所へ</h2>
        </div>
    </div>

    <div class="main">
    <!-- 左側のメニューカラム -->
        <div class="left-culmn">
            <!-- メインメニュー -->
            <div class="main-icon">
                <h1>bemaped</h1>
            </div>
            <div class="left-main-menu">
                <!-- サインアップタグ -->
                <a href="sign_up.php">
                <div class="menu-item" id="signup" <?=logout_flg()?>>
                    <img src="img/home-yellow.png" alt="">
                    <p>サインアップ</p>
                    <div class="description">登録</div>
                </div>
                </a>
                <!-- マイページタグ -->
                <a href="mypage.php">
                <div class="menu-item" id="mypage" <?=login_flg()?>>
                    <img src="img/home-yellow.png" alt="">
                    <p>マイページ</p>
                    <div class="description">マイページ</div>
                </div>
                </a>
                <!-- フォローしてる人を確認するページ -->
                <a href="follow_users.php">
                <div class="menu-item">
                    <img src="img/megane3.png" alt="">
                    <p>フォロー</p>
                    <div class="description">フォロー</div>
                </div>
                </a>
                <!-- フォローされている人を確認するページ -->
                <a href="follower_users.php">
                <div class="menu-item">
                    <img src="img/hurt-pink.png" alt="">
                    <p>フォロワー</p>
                    <div class="description">フォロワー</div>
                </div>
                </a>
                <!-- いろいろ検索するページ -->
                <div class="menu-item">
                    <img src="img/search.png" alt="">
                    <p>サーチ</p>
                    <div class="description">検索</div>
                </div>
                <!-- ログインタグ -->
                <a href="login.php">
                <div class="menu-item" id="login" <?=logout_flg()?>>
                    <img src="img/login-icon.png" alt="">
                    <p>ログイン</p>
                    <div class="description">ログイン</div>
                </div>
                </a>
                <!-- ログアウトタグ -->
                <a href="logout.php">
                <div class="menu-item" id="logout" <?=login_flg()?>>
                    <img src="img/logout-icon.png" alt="">
                    <p>ログアウト</p>
                    <div class="description">ログアウト</div>
                </div>
                </a>

                <!-- ログイン中だけ表示されるメッセージ -->
                <h3 class="youkoso" <?=login_flg()?>>ようこそ、<?= $val["u_name"];?>さん</h3> 
            </div>
            <!-- サブメニュー -->
            <div class="left-sub-menu">
                <div class="menu-item">
                    <img src="img/runk-up.png" alt="">
                    <p>ホットスポット</p>
                    <div class="description">急上昇</div>
                </div>
                <div class="menu-item" id="Youtube">
                    <img src="img/Youtube-icon2.png" alt="">
                    <p>Youtube<br>マッピング</p>
                    <div class="description">Youtubeマッピング</div>
                </div>
                <div class="menu-item">
                    <img src="img/insta-icon.png" alt="">
                    <p>Instagram<br>マッピング</p>
                    <div class="description">Instagramマッピング</div>
                </div>
                <div class="menu-item">
                    <img src="img/logo.png" alt="" style="border-radius: 5px;">
                    <p>動画UP<br>マッピング</p>
                    <div class="description">動画マッピング</div>
                </div>
            </div>
        </div>
        <!-- 右側のエリア -->
        <div class="right-culmn">
            <!-- 動画再生などのビューエリア -->
            
            <!-- マップ表示エリア -->
            <div class="map-area">
                <form method="POST" action="">
                <div class="search-bar">
                    <input type="text" id="search" name="search_word" placeholder="bemaped で 検索する">
                    <div class="search-icon bar-icon">
                        <img src="img/search-gray.png" id="search-img" alt="">
                        <div class="description">住所</div>
                    </div>
                    <div class="youtube-icon bar-icon">
                        <button type="submit">
                            <img src="img/Youtube-icon.png" id="movie-search-img" alt="">
                        </button>
                        <div class="description">動画</div>
                    </div>
                    <div class="insta-icon bar-icon">
                        <img src="img/insta-icon.png" alt="">
                        <div class="description">写真</div>
                    </div>
                    <div class="go-there-icon bar-icon">
                        <img src="img/go-there-blue.png" alt="">
                        <div class="description">経路</div>
                    </div>
                </div>
                </form>
                <!-- MAP[START] -->
                <div id="myMap" style='width:100%;height:100%;float:right;'></div>
                <!-- MAP[END] -->
            </div>
        </div>
    </div>

        
    
    <!-- jQuery読み込みCDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    
    <!-- bingmapのAPI読み込みCDN -->
    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ApPcFw7GdzTHXhj7erJNlk_tpn3P3DrjLSsbAPzasrG0b7f8_EDggHCOVS9brMbx' async
        defer></script>
    
    <!-- 山崎先生のBmapQueryライブラリの読み込み -->
    <script src="js/BmapQuery.js"></script>
    
    <!-- FirebaseのAPI読み込み -->
    <script type="module" src="js/Firebase.js"></script>

    <!-- mainJSを読み込み -->
    <script>
        //****************************************************************************************
        // BingMaps&BmapQuery マップのjQueryの部分
        //****************************************************************************************

        //Init
        function GetMap() {
            //------------------------------------------------------------------------
            //1. Instance
            //------------------------------------------------------------------------
            const map = new Bmap("#myMap");
            //------------------------------------------------------------------------
            //2. Display Map（表示されるマップの設定）
            //   スタートマップ（緯度、経度、マップの種類、ズームの度合い）
            //   startMap(lat, lon, "MapType", Zoom[1~20]);
            //   マップの種類：↓色々ある
            //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
            //--------------------------------------------------
            map.startMap(35.712772, 139.750443, "canvasLight", 10);

            // キーワード検索で座標を取ってきて、その座標を表示
            // map.getGeocode("Seattle", function (data) {
            //     console.log(data);          //Get Geocode ObjectData
            //     const lat = data.latitude;  //Get latitude
            //     const lon = data.longitude; //Get longitude
            //     document.querySelector("#geocode").innerHTML = lat + '<br>' + lon;
            // });

            //----------------------------------------------------
            //3. Add Pushpin-Icon 好きな画像アイコンをマッピングできる
            // （緯度、経度、アイコン画像、アイコン大きさ、アイコンと位置情報のリンクするところのX位置、アイコンと位置情報のリンクするところY位置）
            // pinIcon(lat, lon, icon, scale, anchor_x, anchor_y);
            //----------------------------------------------------
            //let pin = map.pinIcon(47.6130, -122.1945, "../img/poi_custom.png", 1.0, 0, 0);

            //クリックすると座標を取ってくる
            map.onGeocode("click", function (data) {
                //console.log(data);                   //Get Geocode ObjectData
                const lat = data.location.latitude;  //Get latitude
                const lon = data.location.longitude; //Get longitude
                //console.log(lat + ':' + lon);

                //ローカルストレージへ緯度経度保存
                // const obj = {
                //     lat,
                //     lon
                // }
                // const str = JSON.stringify(obj);
                // localStorage.setItem("str",str);
                //map.pinIcon(lat, lon, "img/red-pin.png", 1.0, 16, 32);

                let uid = "<?= $id ?>";
                //console.log(uid);
                if (uid !="") {
                    map.crearInfobox()
                    // map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 76);
                    setTimeout(map.infobox(lat, lon, "この場所に動画をマッピングしますか？", `<a href="up_load.php?sample1=${lat}&sample2=${lon}">設定画面に移動</a>`), 500);
                }else{

                }
                //map.pinLayerClear(pin2); ピンのレイヤーの時の削除コード
                //map.pinIcon(lat, lon, "BmapQuery-master/img/poi_custom.png", 1.0, 12, 39);
            });


            //A. Address "Seattle"

            $('#search-img').on('click', function () {
                let address = String(document.querySelector("#search").value);
                map.getGeocode(address, function (data) {
                    console.log(data);          //Get Geocode ObjectData
                    const lat = data.latitude;  //Get latitude
                    const lon = data.longitude; //Get longitude
                    map.pin(lat, lon, "#ff0000");
                    //document.querySelector("#geocode").innerHTML = lat + ',' + lon;
                });
            });


            //現在地表示
            map.geolocation(function (data) {
                //location
                const lat = data.coords.latitude;
                const lon = data.coords.longitude;
                //Map
                // map.startMap(lat, lon, "load", 10);
                //pin
                map.pin(lat, lon, "#0000ff");
            });



            // $('#movie-search-img').on('click', function () {
            //     //ローカルストレージからデータ取得
            //     //inputのデータ取得
            //     // let inputWord = String(document.querySelector("#search").value);
            let search_word = "<?= $_POST["search_word"] ?>";
            let search_data_count = "<?=$val3?>";
            // この次の行はfor文の外に出しておいた方が良い（iと関係ない要素なので、for文の中に入れると毎回計算を行うことになって無駄な処理になる）
            let json_val2 = JSON.parse(JSON.stringify(<?= $json_val2 ?>));
            if( search_word != ""){
                for (let i = 0; i < search_data_count ; i++) {
                // const str = <= $val2 ?>;
                // const obj = JSON.parse(str);
                // const lat = Number(obj.lat);  //Get latitude
                // const lon = Number(obj.lon); //Get longitude
                // let val2 = <= $val2 ?>;
                //console.log(json_val2);
                // console.log(val2);
                // window.addEventListener('DOMContentLoaded', function(){
                const lat = json_val2[i]["lat"];
                const lon = json_val2[i]["lon"];
                map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 85);
                map.changeMap(lat, lon, "load", 9); //ここも毎回changeMapを入れるのは無駄になりそうなので、良い位置が表示されるように検討する
                // console.log(lat);
                // console.log(lon);
                map.infoboxHtml(lat, lon, '<div id="info_id' + i + '" hidden style="width: 300px; background-color: #fff"><h5 style="font-size: 16px">' + json_val2[i]["movie_title"] + '</h5></div>');
                x = map.pinText(lat, lon, " ", " ", " ");
                map.onPin(x, "click", function () {
                    if (confirm('ページ遷移しますか？')) {
                        const url = "/bemaped/view.php?movie_id=" + json_val2[i]["id"];
                        window.location.href = `${url}`;
                    }
                });
                // ホバーした時のみ説明を表示する
                map.onPin(x, "mouseout", function () {
                    $('#info_id'+i).attr('hidden', true);
                });
                map.onPin(x, "mouseover", function () {
                    $('#info_id'+i).removeAttr('hidden');
                });
                }
            }
        }
            // });
                

            //         map.onPin(map.pinText(lat, lon, " ", " ", " "), "click", function () {
            //             if (confirm('ページ遷移しますか？')) {
            //                 const url = obj.movieUrl;
            //                 window.open(url, '_blank')
            //             }
            //         });

            //         map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 85);
            //         //map.pin(lat, lon, "#ffffff");
            //         // document.querySelector("#geocode").innerHTML = lat + ',' + lon;
            //         // console.log(obj);
            //         console.log(lat);
            //         console.log(lon);
            // }
                //検索ワードが富山ならスタートマップは（２）
                //検索ワードがタイならスタートマップは（９）
                // if (inputWord === "タイ 観光") {
                //     const str = sessionStorage.getItem(9);
                //     const obj = JSON.parse(str);
                //     const lat = Number(obj.lat);  //Get latitude
                //     const lon = Number(obj.lon); //Get longitude
                //     map.changeMap(lat, lon, "load", 6);
                // } else if (inputWord === "富山 グルメ") {
                //     const str = sessionStorage.getItem(2);
                //     const obj = JSON.parse(str);
                //     const lat = Number(obj.lat);  //Get latitude
                //     const lon = Number(obj.lon); //Get longitude
                //     map.changeMap(lat, lon, "load", 10);
                // }
            // });


        

        // ここまでがマップのjQueryの部分

        // const uid = localStorage.getItem('uid');
        //console.log(uid);



        let mX = 0; //マウスのX軸位置情報をグローバル変数へ保存
        let mY = 0; //マウスのY軸位置情報をグローバル変数へ保存
        window.onload = function () {
            //マウス移動時のイベントをBODYタグに登録する
            document.body.addEventListener("mousemove", function (e) {
                //座標を取得する
                mX = e.pageX;  //X座標
                mY = e.pageY;  //Y座標
                return [mX, mY];
            });
        }

        // 左のメニューアイテムにカーソルを乗せると案内が出る
        $('.menu-item').mouseover(function () {
            $(this).children(".description").css("left", mX + 10);
            $(this).children(".description").css("top", mY);
            $(this).children(".description").show();
        });
        // 左のメニューアイテムにカーソルが外れると案内が消える
        $('.menu-item').mouseout(hideDescription);

        //検索バーのアイコンにカーソルを乗せると案内が出る
        $('.search-icon').mouseover(showDescription);

        //検索バーのアイコンからカーソルが外れると案内が消える
        $('.search-icon').mouseout(hideDescription);

        //検索バーのアイコンにカーソルを乗せると案内が出る
        $('.youtube-icon').mouseover(showDescription);

        //検索バーのアイコンからカーソルが外れると案内が消える
        $('.youtube-icon').mouseout(hideDescription);

        //検索バーのアイコンにカーソルを乗せると案内が出る
        $('.insta-icon').mouseover(showDescription);

        //検索バーのアイコンからカーソルが外れると案内が消える
        $('.insta-icon').mouseout(hideDescription);

        //経路検索アイコンにカーソルを乗せると案内が出る
        $('.go-there-icon').mouseover(showDescription);

        //経路検索アイコンからカーソルが外れると案内が消える
        $('.go-there-icon').mouseout(hideDescription);

        //デスクリプションクラスを隠す関数
        function hideDescription() {
            $(this).children(".description").hide();
        }
        // デスクリプションクラスを出す関数
        function showDescription() {
            $(this).children(".description").show();
        }

        let loginFlag = localStorage.getItem("loginFlag");
        //console.log(loginFlag);
        if (loginFlag == null) {
            $(function () { //オープニング画面エフェクト
                $(".top h1").addClass("is-fadein");
                $(".top").addClass("is-fadein");
                setTimeout(function () {
                    $(".top h1").css("display", "none");
                    $(".top").css("display", "none");
                }, 5500);
            });

            $(function () { //メッセージ画面移管
                setTimeout(function () {
                    $(".top-announce").css("display", "flex");
                    $(".top-announce").css("justify-content", "center");
                    $(".top-announce").css("align-items", "center");
                }, 5500);
            });

            $(function () { //メイン画面に移管
                setTimeout(function () {
                    $(".top-announce").css("display", "none");
                    $(".main").css("display", "flex");
                }, 8500);//ローカルストレージにフラグ設置
                localStorage.setItem("loginFlag", "true");
            });
        } else {//サイトに来たことがある人はオープニングエフェクトなし
            $(function () {
                $(".top h1").css("display", "none");
                $(".top").css("display", "none");
                $(".top-announce").css("display", "none");
                $(".main").css("display", "flex");
            });
        }

        // $('#login').on('click', function(){
        //     window.location.href = 'login.php';
        // });

        // $('#signup').on('click', function(){
        //     window.location.href = 'signup.php';
        // });


        //movie_mapping();
    </script>

</body>

</html>