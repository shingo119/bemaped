<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/login.css">
    <title>新規登録画面</title>
</head>
<body>
    <div class="formWrap">
        <div class="login-content">
            <h1>bemaped</h1>
            <form action="sign_up_act.php" method="post">
                <input placeholder="ユーザー名" type="text" name="u_name"/>
                <input placeholder="Email" type="text" name="u_email"/>
                <input placeholder="パスワード" type="password" name="u_pw"/>            
                <button class="btn" type="submit" style="text-align:center;">新規登録</button>
            </form>
            <a href="login.php"></a><h6 id="ohSocial">Or, login?</h6></a>
        </div>
        <footer>
            
        </footer>
    </div>

    <!-- jQuery読み込みCDN -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JQuery --> 

    <script>
        // スライドトグルのjQuery
        $('#ohSocial').on('click', function () {
            $('#social').slideToggle()
        });
    </script>
    
</body>
</html>