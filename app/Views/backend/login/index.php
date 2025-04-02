<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>後台管理系統</title>
    <link href="../image/backend/favico.ico" rel="shortcut icon">
    <link rel="stylesheet" href="../public/assets/css/style_backend.css">
    <script src="../js/backend/jquery-2.1.4.min.js"></script>
</head>

<body>
    <article id="wrap" class="is-login">
        <main class="login-wrap">
            <div class="login-main">
                <figure class="login-logo">
                    <img src="../image/backend/logo.png">
                </figure>
                <form action="/backend/login" method="post">
                    <div class="login-form">
                        <div class="login-input is-account">
                            <input type="text" placeholder="帳號" name="account">
                        </div>
                        <div class="login-input is-password">
                            <input type="password" placeholder="密碼" name="pwd">
                        </div>
                        <div class="login-btn">
                            <button class="btn-login">登入</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </article>
    
    <?php if (session()->getFlashdata('error')): ?>
        <script>
            $(function() {
                alert('<?= session()->getFlashdata('error'); ?>')
            })
        </script>
    <?php endif; ?>
</body>

</html>