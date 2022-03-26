<?php
session_start();
$res = file_get_contents('bd2.json');
$data = json_decode($res, true);

function nav(){
    if($_SESSION['USER_LOGIN_IN'] == 1) $Menu = '
        <ul>
            <li class="user">'.$_SESSION['USER_LOGIN'].'</li>
            <li><a href="/loginout">Выйти</a></li>
        </ul>';
    else $Menu = '
        <ul>
            <li><a href="/sign-in">Вход</a></li>
            <li><a href="/adduser">Регистрация</a></li>
        </ul>
    ';
    echo '<div class="menu">
        <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
            '.$Menu.'
    </div>
</div>';
}

function error($name,$error){
    echo $name.'-'.$error;
}
