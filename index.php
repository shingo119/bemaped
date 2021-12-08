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
                <a href="sign_up.php">
                <div class="menu-item" id="signup">
                    <img src="img/home-yellow.png" alt="">
                    <p>登録</p>
                    <div class="description">登録</div>
                </div>
                </a>
                <div class="menu-item">
                    <img src="img/megane3.png" alt="">
                    <p>フォロー</p>
                    <div class="description">フォロー</div>
                </div>
                <div class="menu-item">
                    <img src="img/hurt-pink.png" alt="">
                    <p>フォロワー</p>
                    <div class="description">フォロワー</div>
                </div>
                <div class="menu-item">
                    <img src="img/search.png" alt="">
                    <p>検索</p>
                    <div class="description">検索</div>
                </div>
                <div class="menu-item" id="login">
                    <img src="img/login-icon.png" alt="">
                    <p>ログイン</p>
                    <div class="description">ログイン</div>
                </div>
                <div class="menu-item" id="logout">
                    <img src="img/logout-icon.png" alt="">
                    <p>ログアウト</p>
                    <div class="description">ログアウト</div>
                </div>
            </div>
            <!-- サブメニュー -->
            <div class="left-sub-menu">
                <div class="menu-item">
                    <img src="img/runk-up.png" alt="">
                    <p>急上昇</p>
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
                <div class="search-bar">
                    <input type="text" id="search" placeholder="bemaped で 検索する">
                    <div class="search-icon bar-icon">
                        <img src="img/search-gray.png" id="search-img" alt="">
                        <div class="description">住所</div>
                    </div>
                    <div class="youtube-icon bar-icon">
                        <img src="img/Youtube-icon.png" id="movie-search-img" alt="">
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
    <script src="js/main.js"></script>
</body>

</html>