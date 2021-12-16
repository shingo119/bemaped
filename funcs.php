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

function logout_flg(){
  if($_SESSION["id"] == "" || $_SESSION["id"] == NULL){
    return NULL; 
  }else{
    return 'style="display:none"';
  }
}

function login_flg(){
  if($_SESSION["id"] != "" || $_SESSION["id"] != NULL){
    return NULL; 
  }else{
    return 'style="display:none"';
  }
}



function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

//fileUpload("送信名","アップロード先フォルダ");
function fileUpload($fname,$path){
  if (isset($_FILES[$fname] ) && $_FILES[$fname]["error"] ==0 ) {
      //ファイル名取得
      $file_name = $_FILES[$fname]["name"];
      //一時保存場所取得
      $tmp_path  = $_FILES[$fname]["tmp_name"];
      //拡張子取得
      $extension = pathinfo($file_name, PATHINFO_EXTENSION);
      //ユニークファイル名作成
      $file_name = date("YmdHis").md5(session_id()) . "." . $extension;
      // FileUpload [--Start--]
      $file_dir_path = $path.$file_name;
      if ( is_uploaded_file( $tmp_path ) ) {
          if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
              chmod( $file_dir_path, 0644 );
              return $file_name; //成功時：ファイル名を返す
          } else {
              return 1; //失敗時：ファイル移動に失敗
          }
      }
    }else{
        return 2; //失敗時：ファイル取得エラー
    }
}


function replace_width_height($data){
  $str = $data;
  $str = str_replace('width="560"', 'width="800"',$str);
  $str = str_replace('height="315"', 'height="450"', $str);
  return $str;
}

function word_split($word){
  $word_split_array = str_replace("　",",",$word);
  return $word_split_array;
}


?>