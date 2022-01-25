<?php
session_start();
include("funcs.php");
loginCheck();

$id = $_SESSION["id"];
console_log($id);
//1.  ローカルDB接続します
$pdo = db_connect();

$u_name = $_POST["u_name"];
$u_email = $_POST["u_email"];
$explan = $_POST["explan"];
$icon = "";
$back_ground = "";

$icon = fileUpload("icon_upfile","upload/");
sleep(1);
if($icon ==1 || $icon ==2){
    exit("FileUpload Error!");
}

$back_ground = fileUpload("background_upfile","upload/");
if($back_ground ==1 || $back_ground ==2){
    exit("FileUpload Error!");
}





if (
    !isset($_POST["u_name"]) || $_POST["u_name"]=="" ||
    !isset($_POST["u_email"]) || $_POST["u_email"]=="" ||
    !isset($_POST["explan"]) || $_POST["explan"]=="" ||
    !isset($icon) || $icon=="" ||
    !isset($back_ground) || $back_ground==""
){
    exit('paramError!');
}

$sql = "UPDATE bemaped_users_table SET u_name=:u_name, u_email=:u_email, explan=:explan, icon=:icon, back_ground=:back_ground WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
$stmt->bindValue(':u_email', $u_email, PDO::PARAM_STR);
$stmt->bindValue(':explan', $explan, PDO::PARAM_STR);
$stmt->bindValue(':icon', $icon, PDO::PARAM_STR);
$stmt->bindValue(':back_ground', $back_ground, PDO::PARAM_STR);
$status = $stmt->execute();

if($status == false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: mypage.php");
    exit;
}
?>