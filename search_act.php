<?php

session_start();
include("funcs.php");
$id = $_SESSION["id"];
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     echo $_POST['search_word'];
// }

$pdo = db_connect();//1.  ローカルDB接続します
$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";//ログイン情報の取得
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute(); //sql文にエラーがないか
$val = $stmt->fetch(); //ユーザー情報を取得

console_log("ID:".$id); //ログイン中のユーザーID
console_log($val); //ユーザー情報が取れているか
console_log("status:".$status); //sql文にエラーがないか

$search_word = $_GET["search_word"]; //検索ワードを今のページからPOSTで取得
$sql2 = "SELECT * FROM `bemaped_data_table` WHERE movie_title LIKE :search_word"; //あいまい検索
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(":search_word", "%{$search_word}%", PDO::PARAM_STR); //検索ワードをバインド変数化
$status2 = $stmt2->execute(); //sql文にエラーがないか
$val2 = $stmt2->fetch(PDO::FETCH_ASSOC);

$sql3 = "SELECT COUNT(*) FROM bemaped_data_table WHERE movie_title LIKE :search_word"; //あいまい検索
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindValue(":search_word", "%{$search_word}%", PDO::PARAM_STR); //検索ワードをバインド変数化
$status3 = $stmt3->execute(); //sql文にエラーがないか
$val3 = $stmt3->fetch(PDO::FETCH_ASSOC);

console_log("search_word:".$search_word);
console_log("status2:".$status2);
console_log("status3:".$status3);
console_log($val2);
console_log($val3);

?>
