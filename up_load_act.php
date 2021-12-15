<?php
session_start();
include("funcs.php");
loginCheck();

$id = $_SESSION["id"];
$movie_title = $_POST["movie_title"];
$movie_url = $_POST["movie_url"];
$tag = $_POST["tag"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
$ifram = $_POST["ifram"];
$u_id = $_POST["u_id"];

$ifram = replace_width_height($ifram);

if(
    !isset($_POST["movie_title"]) || $_POST["movie_title"]=="" ||
    !isset($_POST["movie_url"]) || $_POST["movie_url"]=="" ||
    !isset($_POST["lat"]) || $_POST["lat"]=="" ||
    !isset($_POST["lon"]) || $_POST["lon"]=="" ||
    !isset($_POST["ifram"]) || $_POST["ifram"]=="" ||
    !isset($_POST["u_id"]) || $_POST["u_id"]==""
){
    exit("ParamErro");
}

$pdo = db_connect();

$sql = "INSERT INTO bemaped_data_table (movie_title, movie_url, tag, lat, lon, ifram, indate, u_id )VALUES(:movie_title, :movie_url, :tag, :lat, :lon, :ifram, sysdate(),:u_id)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':movie_title', $movie_title, PDO::PARAM_STR);
$stmt->bindValue(':movie_url', $movie_url, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
$stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
$stmt->bindValue(':lon', $lon, PDO::PARAM_STR);
$stmt->bindValue(':ifram', $ifram, PDO::PARAM_STR);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: index.php");
    exit;
}
?>