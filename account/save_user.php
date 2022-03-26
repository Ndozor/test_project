<?php
session_start();

$flag = true;


if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    $flag = false;
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$user ='';
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

$res = file_get_contents('../bd2.json');
$data = json_decode($res, true);
if($flag == true) {
    for ($i = 0; i < count($data); $i++) {
        if ($data[$i]['login'] == $login) {
            if ($data[$i]['password'] == md5("соль".$password)) {
                $user = $login;
                $_SESSION['USER_ID'] = $data[$i];
                $_SESSION['USER_LOGIN'] = $data[$i]['login'];
                $_SESSION['USER_NAME'] = $data[$i]['name'];
                $_SESSION['USER_PASSWORD'] = $data[$i]['password'];
                $_SESSION['USER_EMAIL'] = $data[$i]['email'];
                $_SESSION['USER_LOGIN_IN'] = 1;
                $_SERVER['HTTP_REFERER'] = '/';
                if ($_REQUEST['remember']) {
                    setcookie('user', $_POST['login'], strtotime('+30 days'), '/');
                }
                echo 'yes';
                break;
            } else {
                echo 'Неправильно введен пароль или логин';
                break;
            }
        }
    }
}
