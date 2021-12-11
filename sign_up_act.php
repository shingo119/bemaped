<?php
session_start();//dbのsessionを使うための関数

include("funcs.php");//funcs読み込み

$u_email = $_POST["u_email"];
$u_name = $_POST["u_name"];
$u_pw = password_hash($_POST["u_pw"], PASSWORD_DEFAULT);
$life_flg = 0;

//db接続
$pdo = db_connect();

// $pdo = sdb_connect();

//user情報を送る
$sql = "INSERT INTO bemaped_users_table(u_name, u_email, u_pw, life_flg, indate)VALUES(:u_name, :u_email, :u_pw, :life_flg,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
$stmt->bindValue(':u_email', $u_email, PDO::PARAM_STR);
$stmt->bindValue(':u_pw', $u_pw, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$res = $stmt->execute();
$_SESSION["id"] = $pdo->lastInsertId();

// sql文にエラーがある時
if($res == false){
    $error = $stmt->errorInfo();
    exit("QueryError!".$error[2]);
}else{
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_id"] = $_POST["u_id"];
    // echo $_SESSION["u_name"];
    // echo $_SESSION["sid"];
    // exit('ok');
    header("Location: index.php");
}
exit();

?>