<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/login.css">
    <title>ログイン画面</title>
</head>
<body>
    <div class="formWrap">
        <div class="login-content">
            <h1>bemaped</h1>
            <form action="login_act.php" method="post">
                <input placeholder="Email" type="text" name="u_email"/>
                <input placeholder="パスワード" type="password" name="lpw"/>            
                <button class="btn" type="submit">Log in</button>
            </form>
            <h6 id="ohSocial">social?</h6>
            <div id="social">
                <button class="tw btn" id="tw">Twitter</button>
                <button class="fb btn" id="fb">Facebook</button>
                <button class="google fb btn" id="google">Google+</button>
            </div>
        </div>
        <footer>
            
        </footer>
    </div>

    <!-- jQuery読み込みCDN -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JQuery --> 

    <!-- Firebase読み込み -->
    <script type="module" src="js/Firebase.js"></script>

    <script>
        // スライドトグルのjQuery
        $('#ohSocial').on('click', function () {
            $('#social').slideToggle()
        });
    </script>
    
</body>
</html>