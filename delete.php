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

$stmt = $pdo->prepare("DELETE FROM bemaped_data_table WHERE id=:movie_id");
$stmt->bindValue(":movie_id", $_GET["movie_id"], PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  header("Location: index.php");
  exit();
}
?>