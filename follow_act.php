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

$stmt2 = $pdo->prepare("SELECT * FROM bemaped_follow_table WHERE followed =:followed AND be_followed =:be_followed");
$stmt2->bindValue(":followed", $followed, PDO::PARAM_INT);
$stmt2->bindValue(":be_followed", $be_followed, PDO::PARAM_INT);
$status2 = $stmt2->execute();
$result2 = $stmt2->fetch();

if($result2 == "" || $result2 == null){
  $sql = "INSERT INTO bemaped_follow_table(followed, be_followed,indate)VALUE(:followed, :be_followed,sysdate())";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":followed", $followed, PDO::PARAM_INT);
  $stmt->bindValue(":be_followed", $be_followed, PDO::PARAM_INT);
  $status = $stmt->execute();
}else{
  $sql3 = "DELETE FROM bemaped_follow_table WHERE followed =:followed AND be_followed =:be_followed";
  $stmt3 = $pdo->prepare($sql3);
  $stmt3->bindValue(":followed", $followed, PDO::PARAM_INT);
  $stmt3->bindValue(":be_followed", $be_followed, PDO::PARAM_INT);
  $status3 = $stmt3->execute(); //実行
}





//ajax.php

//echo "<div>あああああ</div><div>いいいいい</div><div>ううううう</div>";

$json = '[
    {
      "id":"'.$id.'",
      "mode":"'.$mode.'",
      "type":"'.$type.'"
    }
]';

//作成したJSON文字列をリクエストしたファイルに返す
echo $result2;
exit;

?>