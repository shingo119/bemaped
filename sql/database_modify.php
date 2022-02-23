<?php
session_start();
include("funcs.php");
loginCheck();

$pdo = db_connect();

$stmt = $pdo->prepare("SELECT * FROM bemaped_data_table");
$status = $stmt->execute();

while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
  $sql = "UPDATE bemaped_data_table SET video_id =:video_id WHERE id=:id";
  $stmt2 = $pdo->prepare($sql);
  $stmt2->bindValue(':id', $res['id'], PDO::PARAM_STR);
  $stmt2->bindValue(':video_id', video_id($res['video_id']), PDO::PARAM_STR);
  $status = $stmt2->execute();
}

?>


