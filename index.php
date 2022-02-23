<?php
ini_set('session.cookie_samesite', 'None');
session_start();
header("Expires:-1");//戻るボタンからのフォームの再送信エラー回避
header("Cache-Control:");//戻るボタンからのフォームの再送信エラー回避
header("Pragma:");//戻るボタンからのフォームの再送信エラー回避
include("funcs.php");
$id = $_SESSION["id"];
$user_id = (int)$_GET["user_id"];
// console_log($user_id);
$_SESSION["search_word"] = $_POST["search_word"];
// console_log($_SESSION["search_word"]);


$pdo = db_connect();//1.DB接続します
$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute(); //sql文にエラーがないか
$val = $stmt->fetch(); //ユーザー情報を取得

// console_log("ID:".$id); //ログイン中のユーザーID
// console_log($val); //ユーザー情報が取れているか
// console_log("status:".$status); //sql文にエラーがないか

if(isset($_POST["search_word"]) && $_POST["search_word"] != " " && $_POST["search_word"] != "　"){//半角スペース、全角スペース、検索ブロック
$search_word = $_POST["search_word"]; //検索ワードを今のページからPOSTで取得
$split_word = word_split($search_word);
// console_log($split_word);

// 複数ワードでのあいまい検索ができるように記述を変更
$sql2 = "SELECT * FROM bemaped_data_table WHERE"; //あいまい検索
for ($i = 0; $i < count($split_word); $i++) {
  $sql2 .= " (movie_title LIKE '%" . $split_word[$i] . "%' OR tag LIKE '%";
  if ($i == count($split_word) - 1) {
    $sql2 .= $split_word[$i] . "%')";
  } else {
    $sql2 .= $split_word[$i] . "%') AND";
  }
}
$stmt2 = $pdo->prepare($sql2);
$status2 = $stmt2->execute(); //sql文にエラーがないか
$val2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
$json_val2 = json_encode($val2);

// 複数ワードでのあいまい検索ができるように記述を変更
$sql3 = "SELECT COUNT(*) FROM bemaped_data_table WHERE"; //あいまい検索
for ($i = 0; $i < count($split_word); $i++) {
  $sql3 .= " (movie_title LIKE '%" . $split_word[$i] . "%' OR tag LIKE '%";
  if ($i == count($split_word) - 1) {
    $sql3 .= $split_word[$i] . "%')";
  } else {
    $sql3 .= $split_word[$i] . "%') AND";
  }
}$stmt3 = $pdo->prepare($sql3);
$status3 = $stmt3->execute(); //sql文にエラーがないか
$val3 = $stmt3->fetch(PDO::FETCH_COLUMN);
}

$sql4 = "SELECT * FROM bemaped_data_table WHERE u_id=:id";
$stmt4 = $pdo->prepare($sql4);
$stmt4->bindValue(":id", $user_id, PDO::PARAM_INT);
$status4 = $stmt4->execute(); //sql文にエラーがないか
$val4 = $stmt4->fetchall(PDO::FETCH_ASSOC);
$json_val4 = json_encode($val4);

// console_log($json_val4);

// 複数ワードでのあいまい検索ができるように記述を変更
$sql5 = "SELECT COUNT(*) FROM bemaped_data_table WHERE u_id=:id"; //あいまい検索
$stmt5 = $pdo->prepare($sql5);
$stmt5->bindValue(":id", $user_id, PDO::PARAM_INT);
$status5 = $stmt5->execute(); //sql文にエラーがないか
$val5 = $stmt5->fetch(PDO::FETCH_COLUMN);

// console_log($val5);

// console_log("search_word:".$search_word);
// console_log("status2:".$status2);
// console_log("status3:".$status3);
// console_log($val2);
// console_log($val3);

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
                <a href="index.php"><h1>bemaped</h1></a>
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
                <!-- <div class="menu-item">
                    <img src="img/search.png" alt="">
                    <p>サーチ</p>
                    <div class="description">検索</div>
                </div> -->
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
            <!-- <div class="left-sub-menu">
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
            </div> -->
        </div>
        <!-- 右側のエリア -->
        <div class="right-culmn">
            <!-- 動画再生などのビューエリア -->
            
            <!-- マップ表示エリア -->
            <div class="map-area">
                <form method="POST" action="index.php">
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
                    <!-- <div class="insta-icon bar-icon">
                        <img src="img/insta-icon.png" alt="">
                        <div class="description">写真</div>
                    </div> -->
                    <!-- <div class="go-there-icon bar-icon">
                        <img src="img/go-there-blue.png" alt="">
                        <div class="description">経路</div>
                    </div> -->
                </div>
                </form>
                <!-- MAP[START] -->
                <div id="myMap" style='width:100%;height:100%;float:right;'></div>
                <!-- MAP[END] -->

                <!-- アルファ版の注意事項[START] -->
                <div class="disclaimer" style="width: 460px; position: absolute; bottom: 10%; right: 2%; z-index: 100; background-color: rgba(137,231,215); border-radius: 10px; box-shadow: 2px 2px 6px #959595; font-size: 20px; ">
                    <div style="color:red; font-size: 28px; margin:20px 10px 10px 10px;">※注意！</div>
                    <div style="margin: 10px 10px 10px 20px">
                        bemapedアルファ版をご覧いただきありがとうございます。<br>
                        bemapedは動画と地図上の位置を紐づけるアプリであり、
                        現在本番リリースに向けて開発を進めております。<br>
                        アプリに興味を持っていただいた方は、使用感についてのアンケートにご協力ください。<br><br>
                        １．上部の検索窓に「グルメ」と入力<br>
                        ２．エンターボタン押下でグルメ動画の検索<br>
                        ３．出てきたピンにマウスを乗せて地図上で動画が再生される<br><br>
                        現在登録されたデータ数が少なく検索できるワードが限定されていますが、<br>
                        今後ユーザーを増やしてあらゆる場所のあらゆる娯楽情報を検索できるようにしたいと思っています。<br>
                        より詳細な使い方を見たい方はこちらの使用説明書からご確認ください。<br>
                        <a href="https://docs.google.com/presentation/d/1-qODrnM__zfjtMChfcFhxfUipHzHJHaw/edit?usp=sharing&ouid=101344222594026290734&rtpof=true&sd=true" target="_blank" style="color:blue; text-decoration:underline;">使用説明書</a>からご確認ください。<br><br>
                        興味を持たれた方は<a href="https://forms.gle/qQAG7DqDe6GAjAX78" target="_blank" style="color:blue; text-decoration:underline;">アンケート</a>へのご回答もお願いいたします。
                    </div>
                </div>
                <!-- アルファ版の注意事項[] -->
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

        function make_iframe_on_map_by_video_id(data){
            return '<iframe width="315" height="170" src="https://www.youtube.com/embed/'+data+'?autoplay=1&mute=1&version=3&loop=1&playlist='+data+'&fs=0&modestbranding=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        //****************************************************************************************
        // ↓↓↓BingMaps&BmapQuery マップのjQueryの部分↓↓↓
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
            map.startMap(35.712772, 139.750443, "load", 10);

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
                let uid = "<?= $id ?>";
                if (uid !="") {
                    map.crearInfobox()
                    // map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 76);
                    setTimeout(map.infobox(lat, lon, "この場所に動画をマッピングしますか？", `<a href="up_load.php?sample1=${lat}&sample2=${lon}">設定画面に移動</a>`), 500);
                }else{

                }
                //map.pinLayerClear(pin2); ピンのレイヤーの時の削除コード
                //map.pinIcon(lat, lon, "BmapQuery-master/img/poi_custom.png", 1.0, 12, 39);
            });

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

            let search_word = "<?= $_POST["search_word"] ?>";
            let search_data_count = "<?=$val3?>";
            let user_id = "<?=$user_id?>";
            let user_id_data_count = "<?=$val5?>";
            // この次の行はfor文の外に出しておいた方が良い（iと関係ない要素なので、for文の中に入れると毎回計算を行うことになって無駄な処理になる）
            // console.log(user_id);
            // console.log(user_id_data_count);
            if( search_word != ""){
                let json_val2 = JSON.parse(JSON.stringify(<?= $json_val2 ?>));
                let totalLat = 0;
                let totalLon = 0;
                let maxLat = -90;
                let maxLon = -180;
                let minLat = 90;
                let minLon = 180;
                let latZoom = 0;
                let lonZoom = 0;
                for (let i = 0; i < search_data_count ; i++) {
                    const lat = json_val2[i]["lat"];
                    const lon = json_val2[i]["lon"];
                    totalLat += Number(lat);
                    totalLon += Number(lon);
                    maxLat = maxLat > lat ? maxLat:lat;
                    maxLon = maxLon > lon ? maxLon:lon;
                    minLat = minLat < lat ? minLat:lat;
                    minLon = minLon < lon ? minLon:lon;
                    map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 85);
                    // map.changeMap(lat, lon, "load", 13); //ここも毎回changeMapを入れるのは無駄になりそうなので、良い位置が表示されるように検討する
                    map.infoboxHtml(lat, lon, '<div id="info_id' + i + '" hidden style="width: 300px; background-color: #fff; position:absolute; top:-250px; left:-145px;">'+ make_iframe_on_map_by_video_id(json_val2[i]["video_id"]) +'<h5 style="font-size: 16px">' + json_val2[i]["movie_title"] + '</h5></div>');
                    x = map.pinText(lat, lon, " ", " ", " ");
                    map.onPin(x, "click", function () {
                        // if (confirm('ページ遷移しますか？')) {
                        const url = "/bemaped/view.php?movie_id=" + json_val2[i]["id"];
                        window.location.href = `${url}`;
                        // }
                    });
                    // ホバーした時のみ説明を表示する
                    map.onPin(x, "mouseout", function () {
                        $('#info_id'+i).attr('hidden', true);
                    });
                    map.onPin(x, "mouseover", function () {
                        $('#info_id'+i).removeAttr('hidden');
                    });
                }
                const latLength = (maxLat - minLat)*91;
                const lonLength = (maxLon - minLon)*110;
                const latLengthList = [36615, 14646, 7323, 3661, 2929, 1464, 732, 366, 146, 73, 29, 14, 7.3, 3.6, 1.4, 0.7]
                const lonLengthList = [55961, 22384, 11192, 5596, 4476, 2238, 1119, 559, 223, 111, 44, 22, 11, 5, 2.2, 1.1]
                latLengthList.forEach(el => latLength < el ? latZoom++:null);
                lonLengthList.forEach(el => lonLength < el ? lonZoom++:null);
                const zoom = Math.min(...[latZoom,lonZoom]);
                const maxLength = Math.max(...[latLength,lonLength]);
                console.log("maxLength:"+maxLength);
                console.log("zoom:"+zoom);
                map.changeMap(totalLat/search_data_count, totalLon/search_data_count, "load", zoom); //ここも毎回changeMapを入れるのは無駄になりそうなので、良い位置が表示されるように検討する

            }
            if( search_word == "" && user_id != 0){
                let json_val4 = JSON.parse(JSON.stringify(<?= $json_val4 ?>));
                let totalLat = 0;
                let totalLon = 0;
                let maxLat = 0;
                let maxLon = 0;
                let minLat = 0;
                let minLon = 0;
                let latZoom = 0;
                let lonZoom = 0;
                for (let i = 0; i < user_id_data_count ; i++) {
                    const lat = json_val4[i]["lat"];
                    const lon = json_val4[i]["lon"];
                    totalLat += Number(lat);
                    totalLon += Number(lon);
                    maxLat = maxLat > lat ? maxLat:lat;
                    maxLon = maxLon > lon ? maxLon:lon;
                    minLat = minLat < lat ? minLat:lat;
                    minLon = minLon < lon ? minLon:lon;

                    map.pinIcon(lat, lon, "img/Youtube-pinicon.png", 0.3, 38, 85);
                    // map.changeMap(totalLat/user_id_data_count, totalLon/user_id_data_count, "load", 13); //ここも毎回changeMapを入れるのは無駄になりそうなので、良い位置が表示されるように検討する
                    map.infoboxHtml(lat, lon, '<div id="info_id' + i + '" hidden style="width: 300px; background-color: #fff; position:absolute; top:-250px; left:-145px;">'+ make_iframe_on_map_by_video_id(json_val4[i]["video_id"]) +'<h5 style="font-size: 16px">' + json_val4[i]["movie_title"] + '</h5></div>');
                    x = map.pinText(lat, lon, " ", " ", " ");
                    map.onPin(x, "click", function () {
                        // if (confirm('ページ遷移しますか？')) {
                        const url = "/bemaped/view.php?movie_id=" + json_val4[i]["id"];
                        window.location.href = `${url}`;
                        // }
                        });
                    // ホバーした時のみ説明を表示する
                    map.onPin(x, "mouseout", function () {
                        $('#info_id'+i).attr('hidden', true);
                    });
                    map.onPin(x, "mouseover", function () {
                        $('#info_id'+i).removeAttr('hidden');
                    });
                }
                const latLength = (maxLat - minLat)*91;
                const lonLength = (maxLon - minLon)*110;
                const latLengthList = [36615, 14646, 7323, 3661, 2929, 1464, 732, 366, 146, 73, 29, 14, 7.3, 3.6, 1.4, 0.7]
                const lonLengthList = [55961, 22384, 11192, 5596, 4476, 2238, 1119, 559, 223, 111, 44, 22, 11, 5, 2.2, 1.1]
                latLengthList.forEach(el => latLength < el ? latZoom++:null);
                lonLengthList.forEach(el => lonLength < el ? lonZoom++:null);
                const zoom = Math.min(...[latZoom,lonZoom]);
                console.log("zoom:"+zoom);
                map.changeMap(totalLat/user_id_data_count, totalLon/user_id_data_count, "load", zoom); //ここも毎回changeMapを入れるのは無駄になりそうなので、良い位置が表示されるように検討する
            }else{
                map.changeMap(lat, lon, "load", 13); //ここも毎回changeMapを入れるのは無駄になりそうなので、良い位置が表示されるように検討する
            }

            //現在地表示してもピンはそのままに変更
            map.geolocation(function (data) {
                const lat = data.coords.latitude;
                const lon = data.coords.longitude;
                map.pin(lat, lon, "#0000ff");
                if( search_word != ""){
                for (let i = 0; i < search_data_count ; i++) {
                const lat2 = json_val2[i]["lat"];
                const lon2 = json_val2[i]["lon"];
                map.pinIcon(lat2, lon2, "img/Youtube-pinicon.png", 0.3, 38, 85);
                map.infoboxHtml(lat2, lon2, '<div id="info_id' + i + '" hidden style="width: 300px; background-color: #fff; position:absolute; top:-250px; left:-145px;">'+ make_iframe_on_map_by_video_id(json_val2[i]["video_id"]) +'<h5 style="font-size: 16px">' + json_val2[i]["movie_title"] + '</h5></div>');
                x = map.pinText(lat2, lon2, " ", " ", " ");
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
            });
        }

        //****************************************************************************************
        // ↑↑↑BingMaps&BmapQuery マップのjQueryの部分↑↑↑
        //****************************************************************************************

        //****************************************************************************************
        // ↓↓↓Map以外のJS↓↓↓ 
        //****************************************************************************************


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

    </script>

</body>

</html>