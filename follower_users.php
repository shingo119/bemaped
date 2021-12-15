<?php
session_start();
include("funcs.php");
loginCheck();

$id = $_SESSION["id"];
//1.  ローカルDB接続します
$pdo = db_connect();

$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(); //ユーザー情報を取得

if(isset($_SESSION["id"])){
    $sql2 = "SELECT * FROM bemaped_follow_table INNER JOIN bemaped_users_table ON bemaped_follow_table.followed = bemaped_users_table.id WHERE bemaped_follow_table.be_followed=:be_followed"; //あいまい検索
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindValue(":be_followed", $id, PDO::PARAM_INT); 
    $status2 = $stmt2->execute(); //sql文にエラーがないか
    // console_log($status2);

    $sql3 = "SELECT COUNT(*) FROM bemaped_follow_table WHERE be_followed=:be_followed";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->bindValue(":be_followed", "$id", PDO::PARAM_INT); 
    $status3 = $stmt3->execute(); //sql文にエラーがないか
    $val3 = $stmt3->fetch(PDO::FETCH_COLUMN);

    console_log($status3);
    console_log($val3);

    $user_view = "";
    while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        $sql4 = "SELECT COUNT(*) FROM bemaped_follow_table WHERE be_followed=:be_followed";
        $stmt4 = $pdo->prepare($sql4);
        $stmt4->bindValue(":be_followed", $val2["followed"], PDO::PARAM_INT); 
        $status4 = $stmt4->execute(); //sql文にエラーがないか
        $val4 = $stmt4->fetch(PDO::FETCH_COLUMN);
        $sql5 = "SELECT COUNT(*) FROM bemaped_data_table WHERE u_id=:be_followed";
        $stmt5 = $pdo->prepare($sql5);
        $stmt5->bindValue(":be_followed", $val2["followed"], PDO::PARAM_INT); 
        $status5 = $stmt5->execute(); //sql文にエラーがないか
        $val5 = $stmt5->fetch(PDO::FETCH_COLUMN);
        $user_view .= '<div class="skill-card">';
        $user_view .= '<header class="skill-card__header"><img class="skill-card__icon" src="upload/'.$val2["icon"].'" alt="HTML5 Logo" /></header>';
        $user_view .= '<section class="skill-card__body">';
        $user_view .= '<h2 class="skill-card__title">'.$val2["u_name"].'</h2><span class="skill-card__duration">フォロワー情報</span>';
        $user_view .= '<ul class="skill-card__knowledge">';
        $user_view .= '<li>フォロワー数:'.$val4.'</li>';
        $user_view .= '<li>動画本数:'.$val5.'</li>';
        $user_view .= '</ul></section></div>';
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sass/follower_users.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <a href="index.php"><h1>bemaped</h1></a>
    </div>
    <div class="main">
        <div class="skill_wrap">
            <div class="skill-card">
                <header class="skill-card__header"><img class="skill-card__icon" src="https://upload.wikimedia.org/wikipedia/commons/3/38/HTML5_Badge.svg" alt="HTML5 Logo" /></header>
                <section class="skill-card__body">
                    <h2 class="skill-card__title">フォロワーリスト→</h2><span class="skill-card__duration">フォロワー情報</span>
                    <ul class="skill-card_knowledge">
                        <li>フォロワー数</li>
                        <li>動画本数</li>
                    </ul>
                </section>
            </div>
            <?= $user_view ?>
        </div>
    </div>
</body>
</html>

