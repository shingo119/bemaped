<?php
//funcs読み込み
include("funcs.php");

//dbのsessionを使うための関数
session_start();

//postでid,pw受け取り
$u_email = $_POST["u_email"];
$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];
$life_flg = 0;

//db接続
$pdo = db_connect();

//さくらサーバーDB接続
// $pdo = sdb_connect();

//user情報を送る
$sql = "INSERT INTO bemaped_users_table(u_id, u_email, u_pw, life_flg, indate)VALUES(:u_id, :u_email, :u_pw, :life_flg,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$stmt->bindValue(':u_email', $u_email, PDO::PARAM_STR);
$stmt->bindValue(':u_pw', $u_pw, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$res = $stmt->execute();

// sql文にエラーがある時
if($res == false){
    $error = $stmt->errorInfo();
    exit("QueryError!".$error[2]);
}else{
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_id"] = $_POST["u_id"];
    $_SESSION["u_pw"] = $_POST["u_pw"];
    // echo $_SESSION["u_name"];
    // echo $_SESSION["sid"];
    // exit('ok');
    header("Location: index.html");
}
exit();

?>