<?php
const FILE_NAME = ".htpasswd";
function getHash($password){
    // todo password_hash — создаёт хеш пароля используя сильный,
    //  необратимый алгоритм хеширования.
    //  PASSWORD_BCRYPT - использует алгоритм CRYPT_BLOWFISH.
    //  Генерирует стандартный хеш, совместимый с генерированным функцией crypt()
    //  с использованием идентификатора "$2y$".
    //  В результате будет сгенерирована строка длиной 60 символов
    //  или false в случае возникновения ошибки.
    $hash = password_hash($password, PASSWORD_BCRYPT);
    return $hash;
}

function checkHash($password, $hash){
    return password_verify($password, $hash);
}
function saveUser($login, $hash){
    $str = "$login:$hash\n";
    if(file_put_contents(FILE_NAME, $str, FILE_APPEND))
         return true;
    else return false;
}
function userExists($login){
    if(!is_file(FILE_NAME)) return false;
    $users = file(FILE_NAME);
    foreach($users as $user){
        // todo strpos — возвращает позицию первого вхождения подстроки.
        if(strpos($user, $login.':') !== false)
            return $user;
    }
    return false;
}

session_start();

if(!isset($_SESSION['admin'])){
    header('Location: /eshop/admin/secure/login.php?ref='.
    $_SERVER['REQUEST_URI']);
    exit; 
}

