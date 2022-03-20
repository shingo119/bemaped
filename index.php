<?php
ini_set('session.cookie_samesite','None');
session_start();
header("Expires:-1");//戻るボタンからのフォームの再送信エラー回避
header("Cache-Control:");//戻るボタンからのフォームの再送信エラー回避
header("Pragma:");//戻るボタンからのフォームの再送信エラー回避
include("funcs.php");
$user_id = (int)$_GET["user_id"];

$pdo = db_connect();//1.DB接続します
$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
$status = $stmt->execute(); //sql文にエラーがないか
$val = $stmt->fetch(); //ユーザー情報を取得

if(isset($_POST["search_word"]) && $_POST["search_word"] != " " && $_POST["search_word"] != "　"){//半角スペース、全角スペース、検索ブロック
    $search_word = $_POST["search_word"]; //検索ワードを今のページからPOSTで取得
    $split_word = word_split($search_word);

    // 複数ワードでのあいまい検索ができるように記述を変更
    $sql2 = "SELECT * FROM bemaped_data_table WHERE"; //あいまい検索
    $sql2 .= " (6378137 * ACOS(COS(RADIANS(".strval($_POST["pin_lat"]).")) * COS(RADIANS(lat)) * COS(RADIANS(lon) - RADIANS(".strval($_POST["pin_lon"]).")) + SIN(RADIANS(".strval($_POST["pin_lat"]).")) * SIN(RADIANS(lat)))) < ".strval($_POST["round"])." AND";
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
    $sql3 .= " (6378137 * ACOS(COS(RADIANS(".strval($_POST["pin_lat"]).")) * COS(RADIANS(lat)) * COS(RADIANS(lon) - RADIANS(".strval($_POST["pin_lon"]).")) + SIN(RADIANS(".strval($_POST["pin_lat"]).")) * SIN(RADIANS(lat)))) < ".strval($_POST["round"])." AND";
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

// 複数ワードでのあいまい検索ができるように記述を変更
$sql5 = "SELECT COUNT(*) FROM bemaped_data_table WHERE u_id=:id"; //あいまい検索
$stmt5 = $pdo->prepare($sql5);
$stmt5->bindValue(":id", $user_id, PDO::PARAM_INT);
$status5 = $stmt5->execute(); //sql文にエラーがないか
$val5 = $stmt5->fetch(PDO::FETCH_COLUMN);
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
                <!-- マッピングタグ -->
                <div class="menu-item" id="mapping" <?=login_flg()?>>
                    <img src="img/red-pin.png" alt="">
                    <p>マッピング</p>
                    <div class="description">青いピンの位置に動画をマッピングする</div>
                </div>
                <!-- 自分の動画の表示 -->
                <a href="index.php?user_id=<?=$_SESSION["id"]?>">
                <div class="menu-item" id="mymovie" <?=login_flg()?>>
                    <img src="img/Youtube-icon.png" alt="">
                    <p>マイ動画</p>
                    <div class="description">マイ動画</div>
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
                <!-- <a href="follow_users.php">
                <div class="menu-item" <?=login_flg()?>>
                    <img src="img/megane3.png" alt="">
                    <p>フォロー</p>
                    <div class="description">フォロー</div>
                </div>
                </a> -->
                <!-- フォローされている人を確認するページ -->
                <!-- <a href="follower_users.php">
                <div class="menu-item" <?=login_flg()?>>
                    <img src="img/hurt-pink.png" alt="">
                    <p>フォロワー</p>
                    <div class="description">フォロワー</div>
                </div>
                </a> -->
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
                <div class="menu-item" id="fadeIn_icon">
                    <img src="img/info2.png" alt="">
                    <p>ご注意</p>
                    <div class="description">ご注意</div>
                </div>
                <a href="https://forms.gle/qQAG7DqDe6GAjAX78" target="_blank">
                <div class="menu-item">
                    <img src="img/questionnaire.png" alt="">
                    <p>アンケート</p>
                    <div class="description">アンケート</div>
                </div>
                </a>
            <!-- ログインタグ -->
                <!-- ログイン中だけ表示されるメッセージ -->
                <h3 class="youkoso" <?=login_flg()?>>ようこそ、<?= $val["u_name"];?>さん</h3> 
            </div>
        </div>
        <!-- 右側のエリア -->
        <div class="right-culmn">
            <!-- マップ表示エリア -->
            <div class="map-area">
                <form method="POST" action="index.php">
                <div class="search-bar">
                    <input type="text" id="search" name="search_word" placeholder="検索ワード">
                    <input id="pin_lat" name="pin_lat" hidden>
                    <input id="pin_lon" name="pin_lon" hidden>
                    <div id="round-css">ピンからの距離<input type="number" value="1000" min="100" max="100000" step="100" id="round" name="round">m</div>
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
                </div>
                </form>
                <!-- MAP[START] -->
                <div id="myMap" style='width:100%;height:100%;float:right;'>
                    <div class="disclaimer" style="display:none; width: 460px; position: relative; top: 180px; left: 430px; z-index: 100; background-color: rgba(137,231,215); border-radius: 10px; box-shadow: 2px 2px 6px #959595; font-size: 20px; ">
                        <div style="color:red; font-size: 28px; margin:20px 10px 10px 10px;">※注意！</div>
                        <div style="margin: 10px 10px 10px 20px">
                            bemapedアルファ版をご覧いただきありがとうございます。<br>
                            bemapedは動画と地図上の位置を紐づけるアプリであり、現在本番リリースに向けて開発を進めております。<br>
                            アプリに興味を持っていただいた方は、使用感についての
                            <a href="https://forms.gle/qQAG7DqDe6GAjAX78" target="_blank" style="color:blue; text-decoration:underline;">
                                アンケート
                            </a>にご協力ください。
                            <br><br>
                            １．上部の検索窓に「グルメ」と入力<br>
                            ２．エンターボタン押下でグルメ動画の検索<br>
                            ３．出てきたピンにマウスを乗せて地図上で動画が再生される<br><br>
                            現在登録されたデータ数が少なく検索できるワードが限定されていますが、<br>
                            今後ユーザーを増やしてあらゆる場所のあらゆる娯楽情報を検索できるようにしたいと思っています。<br>
                            より詳細な使い方を見たい方は<br>こちらの
                            <a href="https://docs.google.com/presentation/d/1-qODrnM__zfjtMChfcFhxfUipHzHJHaw/edit?usp=sharing&ouid=101344222594026290734&rtpof=true&sd=true" target="_blank" style="color:blue; text-decoration:underline;">
                                使用説明書
                            </a>からご確認ください。<br>
                            <div class="wrap"><button id="fadeOut_btn" class="btn btn-radius-solid btn--shadow">閉じる<i class="fas fa-angle-right fa-position-right"></i></button></div>
                        </div>   
                    </div>
                </div>
                <!-- MAP[END] -->
                
                
            </div>
        </div>
    </div>

        
    
    <!-- jQuery読み込みCDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
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

        //クリックするとそこにピンを打つ
        function getCoordinate(map) {
            map.onGeocode("click", function (data) {
                map.pinLayerClear(pin);
                lat = data.location.latitude;  //Get latitude
                lon = data.location.longitude; //Get longitude
                pin = map.pinLayer(lat, lon, "#0000ff");
                document.getElementById("pin_lat").value = lat;
                document.getElementById("pin_lon").value = lon;
            });
        }

        // 虫眼鏡マークを押すとbing mapでの検索を行い、そこにピンを打つ
        function addressSearch(map) {
            $('#search-img').on('click', function () {
                    map.pinLayerClear(pin);
                    let address = String(document.querySelector("#search").value);
                    map.getGeocode(address, function (data) {
                        lat = data.latitude;  //Get latitude
                        lon = data.longitude; //Get longitude
                        pin = map.pinLayer(lat, lon, "#0000ff");
                        document.getElementById("pin_lat").value = lat;
                        document.getElementById("pin_lon").value = lon;
                    });
                });
        }

        // 動画の表示
        function movie(map,count,str) {
            let json_val2 = JSON.parse(str);
            let maxLat = -90;
            let maxLon = -180;
            let minLat = 90;
            let minLon = 180;
            let latZoom = 0;
            let lonZoom = 0;
            for (let i = 0; i < count ; i++) {
                const mlat = json_val2[i]["lat"];
                const mlon = json_val2[i]["lon"];
                maxLat = maxLat > mlat ? maxLat:mlat;
                maxLon = maxLon > mlon ? maxLon:mlon;
                minLat = minLat < mlat ? minLat:mlat;
                minLon = minLon < mlon ? minLon:mlon;
                map.pinIcon(mlat, mlon, "img/Youtube-pinicon.png", 0.3, 38, 85);
                map.infoboxHtml(mlat, mlon, '<div id="info_id' + i + '" hidden style="width: 300px; background-color: #fff; position:absolute; top:-250px; left:-145px;">'+ make_iframe_on_map_by_video_id(json_val2[i]["video_id"]) +'<h5 style="font-size: 16px">' + json_val2[i]["movie_title"] + '</h5></div>');
                x = map.pinText(mlat, mlon, " ", " ", " ");
                map.onPin(x, "click", function () {
                    const url = "/bemaped/view.php?movie_id=" + json_val2[i]["id"];
                    window.location.href = `${url}`;
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
            map.changeMap((Number(maxLat) + Number(minLat))/2, (Number(maxLon) + Number(minLon))/2, "load", zoom);
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
            map.geolocation(function(data) {
                //location
                lon = data.coords.longitude;
                lat = data.coords.latitude;
                if (<?php if ($_POST["pin_lat"]!='' && $_POST["pin_lon"]!='') {echo 'true';} else {echo 'false';} ?>) {
                    lat = Number(<?= $_POST["pin_lat"] ?>);
                    lon = Number(<?= $_POST["pin_lon"] ?>);
                }
                map.startMap(lat, lon, "load", 13);
                pin =map.pinLayer(lat,lon,"#0000ff");
                document.getElementById("pin_lat").value = lat;
                document.getElementById("pin_lon").value = lon;
                getCoordinate(map);
                addressSearch(map);
                let search_word = "<?= $_POST["search_word"] ?>";
                let search_data_count = "<?=$val3?>";
                let user_id = "<?=$user_id?>";
                let user_id_data_count = "<?=$val5?>";
                if( search_word != ""){
                    movie(map, search_data_count, JSON.stringify(<?= $json_val2 ?>));
                } else if ( search_word == "" && user_id != 0){
                    movie(map, user_id_data_count, JSON.stringify(<?= $json_val4 ?>));
                }
            })
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

        //デスクリプションクラスを隠す関数
        function hideDescription() {
            $(this).children(".description").hide();
        }
        // デスクリプションクラスを出す関数
        function showDescription() {
            $(this).children(".description").show();
        }

        let loginFlag = localStorage.getItem("loginFlag");
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

        $('#mapping').on('click', function () {
            window.location.href = `up_load.php?lat=${lat}&lon=${lon}`;
        })

        let description_flag = 0;
        $('#fadeIn_icon').on('click', function () {
            description_flag =(description_flag + 1) % 2;
            if(description_flag === 1){
                $('.disclaimer').fadeIn();
            }else{
                $('.disclaimer').fadeOut();
            }
        })

        $('#fadeOut_btn').on('click', function () {
            description_flag =(description_flag + 1) % 2;
            $('.disclaimer').fadeOut();
        })
    </script>

</body>

</html>