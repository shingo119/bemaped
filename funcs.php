<?php
//XSS対応関数
function h($val){
  return htmlspecialchars($val,ENT_QUOTES);
}

//LOGIN認証チェック関数
function loginCheck(){
  if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
  echo "LOGIN Error!";
  exit();
  }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

//db接続
function db_connect(){
  try {
    if($_SERVER['HTTP_HOST'] == "localhost"){
      $db_name = "bemaped_db";
      $db_host = "localhost";
      $db_id = "root";
      $db_pw = "root";
    } else {
      // さくらサーバ－用
      $db_name = "bemaped_unit";
      $db_host = "mysql749.db.sakura.ne.jp";
      $db_id = "bemaped";
      $db_pw = "saibaba5072";
    }

  $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  return $pdo;
}

function login_flg(){
  if($_SESSION["id"] != "" && $_SESSION["u_id"] != ""){
    return 'style="display:block"'; //ここ途中！！！！！！
  }
}

?>