<?php
session_start();
include_once ('function.php');

if($_COOKIE['user']){
    $res = file_get_contents('bd2.json');
    $data = json_decode($res, true);
    for($i = 0; $i<count($data);$i++){
        if($data[$i]['login'] == $_COOKIE['user']){
            $_SESSION['USER_ID'] = $data[$i];
            $_SESSION['USER_LOGIN'] = $data[$i]['login'];
            $_SESSION['USER_NAME'] = $data[$i]['name'];
            $_SESSION['USER_PASSWORD'] = $data[$i]['password'];
            $_SESSION['USER_EMAIL'] = $data[$i]['email'];
            $_SESSION['USER_LOGIN_IN'] = 1;
            $_SERVER['HTTP_REFERER']  = '/';
        }
    }
}

    if ($_SERVER['REQUEST_URI'] == '/') $page= 'index';
    else{
        $page = substr($_SERVER['REQUEST_URI'],1);
        /*if(!preg_match('/^[A-z0-9]{3,50}$/',$page)) exit('error_url');*/
    }
    if (file_exists('account/'.$page.'.php')) include 'account/'.$page.'.php';
    else if (file_exists('all/'.$page.'.php')) include 'all/'.$page.'.php';
//    else if (file_exists('quest/'.$page.'.php')) include 'quest/'.$page.'.php';


?>