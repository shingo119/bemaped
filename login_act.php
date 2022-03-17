<?php
session_start();//sessionを使うための関数

include("funcs.php");//funcs読み込み

//postでid,pw受け取り
// $lid = $_POST["lid"];
$u_email = $_POST["u_email"];
$lpw = $_POST["lpw"];

//db接続
$pdo = db_connect();

//さくらサーバーDB接続
// $pdo = sdb_connect();

//id,pwが一致するレコードをとる
$sql = "SELECT * FROM bemaped_users_table WHERE u_email=:u_email";
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':u_email', $u_email, PDO::PARAM_STR);
$status = $stmt->execute();

// $login->execute();

// sql文にエラーがある時
if($status == false){
    $error = $stmt->errorInfo();
    exit("QueryError!".$error[2]);
}


$val = $stmt->fetch(PDO::FETCH_ASSOC);


$pw = password_verify($lpw, $val["u_pw"]);

if($pw){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["id"] = $val["id"];
    $_SESSION["u_email"] = $val["u_email"];
    header("Location: index.php");
}else{
    header("Location: login.php");
    
}

exit();

?>