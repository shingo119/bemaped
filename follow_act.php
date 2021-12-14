<?php
session_start();
include("funcs.php");
// loginCheck();
header("Content-type: application/json; charset=UTF-8");

$id = $_SESSION["id"];
//1.  ローカルDB接続します
$pdo = db_connect();
// $data = $_POST["data"];
//POSTパラメータを取得
$followed   = $_POST["followed"];
$be_followed = $_POST["be_followed"];
$type = $_POST["type"];



// $followed = $data["folloed"];
// $be_followed = $data["be_followed"];


//２．表示する分のSQL作成
// $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE u_id=:id");
$sql = "INSERT INTO bemaped_follow_table(followed, be_followed,indate)VALUE(:followed, :be_followed,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":followed", $followed, PDO::PARAM_INT);
$stmt->bindValue(":be_followed", $be_followed, PDO::PARAM_INT);
$status = $stmt->execute();


$stmt2 = $pdo->prepare("SELECT * FROM bemaped_follow_table WHERE bemaped_follow_table.followed =:followed AND bemaped_follow_table.be_followed =:be_followed");
$stmt->bindValue(":followed", $followed, PDO::PARAM_INT);
$stmt->bindValue(":be_followed", $be_followed, PDO::PARAM_INT);
$status2 = $stmt2->execute();
$result2 = $stmt2->fetch();

//ajax.php

//echo "<div>あああああ</div><div>いいいいい</div><div>ううううう</div>";

$json = '[
    {
      "id":"'.$id.'",
      "mode":"'.$mode.'",
      "type":"'.$type.'"
    },
    {
     "id":"'.$id.'",
     "mode":"'.$mode.'",
     "type":"'.$type.'"
    }
]';

//作成したJSON文字列をリクエストしたファイルに返す
echo $status;
exit;

?>