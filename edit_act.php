<?php
session_start();
include("funcs.php");
loginCheck();

$pdo = db_connect();
$sql = "SELECT * FROM bemaped_data_table WHERE id =:movie_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":movie_id", $_GET["movie_id"], PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(); //ユーザー情報を取得

if ($val["u_id"]!=$_SESSION["id"]) {
    echo "削除可能な動画ではありません";
    exit();
}

$stmt = $pdo->prepare("UPDATE bemaped_data_table SET movie_title=:movie_title, video_id=:video_id, tag=:tag, lat=:lat, lon=:lon, comment=:comment WHERE id=:id");
$stmt->bindValue(':movie_title',   $_POST["movie_title"],   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':video_id',  video_id($_POST["movie_url"]),  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tag', $_POST["tag"], PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lat', $_POST["lat"], PDO::PARAM_STR);
$stmt->bindValue(':lon', $_POST["lon"], PDO::PARAM_STR);
$stmt->bindValue(':comment', $_POST["comment"], PDO::PARAM_STR);
$stmt->bindValue(':id', $_GET["movie_id"], PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  header("Location: index.php");
  exit();
}
?>