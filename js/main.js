
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
        if(uid !== null){
        map.infobox(lat, lon, "この場所に動画をマッピングしますか？", `<a href="up-load.html?sample1=${lat}&sample2=${lon}">設定画面に移動</a>`);
        }
        //map.pinLayerClear(pin2); ピンのレイヤーの時の削除コード
        //map.pinIcon(lat, lon, "BmapQuery-master/img/poi_custom.png", 1.0, 12, 39);
        

    });

    //現在地表示
    map.geolocation(function (data) {
        //location
        const lat = data.coords.latitude;
        const lon = data.coords.longitude;
        //Map
        // map.startMap(lat, lon, "load", 10);
        //pin
        map.pin(lat, lon, "#ff0000");
    });



}

// ここまでがマップのjQueryの部分

// データベースのuidをローカルストレージへ入れようとしている

const uid = localStorage.getItem('uid');
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
        localStorage.setItem("loginFlag","true");
    });
}else{//サイトに来たことがある人はオープニングエフェクトなし
    $(function(){
        $(".top h1").css("display", "none");
        $(".top").css("display", "none");
        $(".top-announce").css("display", "none");
        $(".main").css("display", "flex");
    });
}

$('#login').on('click', function(){
    window.location.href = 'login.html';
});
