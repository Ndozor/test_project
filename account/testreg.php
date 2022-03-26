<?php
session_start();
$flag = true;
include_once ('../function.php');

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (isset($_POST['rpassword'])) { $rpassword=$_POST['rpassword']; if ($rpassword =='') { unset($rpassword);} }
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }

//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password) or empty($rpassword) or empty($email) or empty($name)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$rpassword = stripslashes($rpassword);
$rpassword = htmlspecialchars($rpassword);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$name = stripslashes($name);
$name = htmlspecialchars($name);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$rpassword = trim($rpassword);
$email = trim($email);
$name = trim($name);
// подключаемся к базе


$res = file_get_contents('../bd2.json');
$data = json_decode($res, true);

for($i=0;$i<count($data); $i++){
    if ($login == $data[$i]['login']){
        error('login','Такой логин уже занят');
        $flag =false;
    }
}



if ($flag ==true){
    if(strlen($login)>5) {
        if ($password == $rpassword) {
            if( preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}/', $password)) {
                if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {
                    if (preg_match("/[a-zA-z]/", $name) and strlen($name) == 2) {
                        $value_read = (int)$data[0]['kolread'];
                        $value_read++;
                        $data[0]['kolread'] = $value_read;
                        $password = md5("соль" . $password);
                        $arr2 = array(array(
                            "login" => $login,
                            "name" => $name,
                            "password" => $password,
                            "email" => $email));

                        $result = array_merge($data, $arr2);
                        file_put_contents('../bd2.json', json_encode($result, JSON_PRETTY_PRINT));
                        echo 'yes';
                    } else {
                        error('name', 'Имя должно содержать только 2 симвала из букв');
                    }
                } else {
                    error('email', 'Email указан не правильно.');
                }
            }else{
                error('password', 'минимум 6 символов , обязательно должны состоять из цифр и букв');
            }
        } else {
            error('rpassword', 'Пароли не совпадают');
        }
    }else{
        error('login', 'Логин должен быть минимум из 6 символов');
    }
}





