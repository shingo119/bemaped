<?php

include("funcs.php");

$movie_title = $_POST["movie_title"];
$movie_url = $_POST["movie_url"];
$tag = $_POST["tag"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
$ifram = $_POST["ifram"];

if(
    !isset($_POST["movie_title"]) || $_POST["movie_title"]=="" ||
    !isset($_POST["movie_url"]) || $_POST["movie_url"]=="" ||
    !isset($_POST["tag"]) || $_POST["tag"]=="" ||
    !isset($_POST["lat"]) || $_POST["lat"]=="" ||
    !isset($_POST["lon"]) || $_POST["lon"]=="" ||
    !isset($_POST["ifram"]) || $_POST["ifram"]==""
){
    exit("ParamErro");
}

$pdo = db_connect();

$sql = "INSERT INTO bemaped_data_table (movie_title, movie_url, tag, lat, lon, ifram, indate, u_id )VALUES(:movie_title, :movie_url, :tag, :lat, :lon, :ifram, sysdate(),:u_id)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':movie_title', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':movie_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':tag', $author, PDO::PARAM_STR);
$stmt->bindValue(':lat', $kansou, PDO::PARAM_STR);
$stmt->bindValue(':lon', $u_id, PDO::PARAM_INT);
$stmt->bindValue(':ifram', $u_id, PDO::PARAM_INT);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: index.html");
    exit;
}
?>