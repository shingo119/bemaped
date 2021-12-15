<?php
session_start();
include("funcs.php");
loginCheck();

$id = $_SESSION["id"];
console_log($id);
//1.  ローカルDB接続します
$pdo = db_connect();

$sql = "SELECT * FROM bemaped_users_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();
$val = $stmt->fetch(PDO::FETCH_ASSOC); //ユーザー情報を取得

console_log($val);

$sql2 = "SELECT * FROM `bemaped_data_table` WHERE u_id=:id"; 
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(":id", "$id", PDO::PARAM_STR); 
$status2 = $stmt2->execute(); //sql文にエラーがないか
$val2 = $stmt2->fetchall(PDO::FETCH_ASSOC);
$json_val2 = json_encode($val2);
// $val2_array = [];
// while($val2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
//     array_push($val2_array, $val2);
// }

$sql3 = "SELECT COUNT(*) FROM bemaped_data_table WHERE u_id=:id"; 
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindValue(":id", "$id", PDO::PARAM_STR); 
$status3 = $stmt3->execute(); //sql文にエラーがないか
$val3 = $stmt3->fetch(PDO::FETCH_COLUMN);

console_log($status3);
console_log($val3);

//３．データ表示
// if($status==false) {
//   //execute（SQL実行時にエラーがある場合）
//   $error = $stmt->errorInfo();
//   exit("ErrorQuery:".$error[2]);

// } else {
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     $u_name = $result["u_name"];
//     // $u_info = $result["u_info"];
// }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plofile_edit_sub.css">
    <link rel="stylesheet" href="css/plofile_edit.css">
    <title>マイマップ</title>
</head>
<body>
    <div class="main">
        <div class="inner contact">
            <!-- Form Area -->
            <div class="contact-form">
                <a href="index.php"><h1>bemaped</h1></a>
                
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col sm-12 col-md-8 col-lg-5">
                            <div class="rotate-container">
                                <div class="card card-front text-center">
                                    <div class="card-header">
                                        <!-- <p>About You</p> -->
                                    </div>
                                    <div class="card-background"></div>
                                    <div class="card-block"><img class="avatar" src="img/hurt2.png">
                                        <h3 class="card-title"><?= $val["u_name"]?></h3>
                                        <button class="btn btn-primary btn-rotate">Read more&nbsp;<i class="fa fa-long-arrow-right"></i></button>
                                    </div>
                                </div>
                                <div class="card card-back text-center">
                                    <div class="card-header">
                                        <!-- <p>More About You</p> -->
                                    </div>
                                    <div class="card-block">
                                        <h4>説明</h4>
                                        <p><?= $val["explan"]?></p>
                                        <h4>Connect:</h4>
                                        <ul class="social-links list-unstyled d-flex justify-content-center">
                                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fa fa-snapchat"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        </ul><button class="btn btn-primary btn-rotate"> <i class="fa fa-long-arrow-left"></i>&nbsp;Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="contact-form">
                
                <!-- Form -->
                <!-- <form id="contact-us" method="#" action="#"> -->
                <!-- Left Inputs -->
                <form action="profile_edit_act.php" method="POST" enctype="multipart/form-data">
                    <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                        <!-- Name -->
                        <input type="text" name="u_name" id="u_name" required="required" class="form" placeholder="ユーザー名" value="<?=$val["u_name"]?>" />
                        <!-- Email -->
                        <input type="text" name="u_email" id="u_email" required="required" class="form" placeholder="EMAIL" value="<?=$val["u_email"]?>" />
                        <!-- Subject -->
                        アイコン画像：<input type="file" accept="image/*" name="icon_upfile" value="<?=$val["icon"]?>">
                        背景画像：<input type="file" accept="image/*" name="background_upfile" value="<?=$val["back_ground"]?>">
                        
                    </div><!-- End Left Inputs -->
                    <!-- Right Inputs -->
                    <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                        <!-- Message -->
                        <textarea name="explan" id="explan" class="form textarea" placeholder="説明"><?= $val["explan"]?></textarea>
                    </div><!-- End Right Inputs -->
                    <!-- Bottom Submit -->
                    <div class="relative fullwidth col-xs-12">
                        <!-- Send Button -->
                        <button type="submit" id="submit" name="submit" class="form-btn semibold">プロフィールを更新</button>
                    </div><!-- End Bottom Submit -->
                </form>
                <!-- Clear -->
                <div class="clear"></div>
                <!-- </form> -->
            </div><!-- End Contact Form Area -->
        </div><!-- End Inner -->
    </div>

    <!-- jQuery読み込みCDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    
    <!-- bingmapのAPI読み込みCDN -->
    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ApPcFw7GdzTHXhj7erJNlk_tpn3P3DrjLSsbAPzasrG0b7f8_EDggHCOVS9brMbx'
        async defer></script>
    
    <!-- 山崎先生のBmapQueryライブラリの読み込み -->
    <script src="js/BmapQuery.js"></script>
    
    <!-- FirebaseのAPI読み込み -->
    <script type="module" src="js/Firebase.js"></script>

    <!-- アップロードhtmlのメインJS -->
    <script type="text/javascript">

        $(function() {
        // For card rotation
            $('.btn-rotate').click(function(){
                $('.card-front').toggleClass(' rotate-card-front');
                $('.card-back').toggleClass(' rotate-card-back');
            });
        });

    </script>

</body>
</html>