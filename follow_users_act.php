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
$u_id  = $_POST["u_id"];




// $followed = $data["folloed"];
// $be_followed = $data["be_followed"];


//２．表示する分のSQL作成
// $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE u_id=:id");
// $sql = "INSERT INTO bemaped_follow_table(followed, be_followed,indate)VALUE(:followed, :be_followed,sysdate())";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(":followed", $followed, PDO::PARAM_INT);
// $stmt->bindValue(":be_followed", $be_followed, PDO::PARAM_INT);
// $status = $stmt->execute();


$stmt2 = $pdo->prepare("SELECT * FROM bemaped_data_table WHERE u_id=:u_id");
$stmt2->bindValue(":u_id", $u_id, PDO::PARAM_INT);
$status2 = $stmt2->execute();
$val2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
$json_val2 = json_encode($val2);

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
echo $json_val2;
exit;

?>