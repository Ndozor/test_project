<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="resource/css/style.css">
</head>
<body>
<noscript>
    <div class="noscript">
        Для полной функциональности этого сайта необходимо включить JavaScript.
        Вот <a href="https://www.enable-javascript.com/ru/">
            инструкции, как включить JavaScript в вашем браузере</ a>.)
    </div>
</noscript>
<div id="wrapper" class="clearfix">
    <div id="wrapper_form">
        <form id="form" method="post">
            <h1 class="header header_register">Регистрация</h1>
            <div class="tab_content" id="main_data" style="display: block">
                <div class="input">
                    <p class="login_error"></p>
                    <input type="text" name="login" placeholder="Логин" class="input" required />
                </div>
                <div class="input">
                    <p class="password_error">
                    </p>
                    <input type="password" name="password" placeholder="Пароль" class="input" required />
                </div>
                <div class="input">
                    <p class="rpassword_error"></p>
                   <input type="password" name="rpassword" placeholder="Повторите пароль" class="input" required />
                </div>
                <div class="input">
                    <p class="email_error"></p>
                    <input type="email" name="email" placeholder="E-mail" class="input" required/>
                </div>
                <div class="input">
                    <p class="name_error"></p>
                    <input type="text" name="name" placeholder="Настоящее имя" class="input"required/>
                </div>
            </div>
            <div class="ramember_btn">
                <a href="sign-in">У вас уже есть Аккаунт ?</a>
            </div>
            <div class="btn_reg">
                <input type="button" class="btn_login" name="enter" id="btn_reg" value="Зарегистрироваться">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/resource/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/resource/js/ajax.js"></script>
</body>
</html>