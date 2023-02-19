<?php
require_once "session.inc.php";
require_once "secure.inc.php";

$title = 'Authorisation';
$login  = '';
// todo Функция session_start() создаёт сессию, либо возобновляет существующую,
//   основываясь на идентификаторе сессии, переданном через GET- или POST-запрос,
//   либо переданный через cookie.
//  header — Отправка HTTP-заголовка.
session_start();
header("HTTP/1.0 401 Unauthorized");
require_once "secure.inc.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $login = trim(strip_tags($_POST["login"]));
    $pw = trim(strip_tags($_POST["pw"]));
    $ref = trim(strip_tags($_GET["ref"]));
    if(!$ref) $ref = '/eshop/admin/';
    if($login and $pw){
        if($result = userExists($login)){
            list($_, $hash) = explode(':', $result);
            if(checkHash($pw, $hash)){
                $_SESSION['admin'] = true;
                header("Location: $ref");
                exit; }else{
                $title = 'Incorrect user name or password!';
            }
}else{
            $title = 'Incorrect user name or password!';
        }
}else{
        $title = 'Fill up all form fields';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Authorisation</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../../inc/style.css" />
</head>
<body style="padding: 20px; margin: auto 0;">
	<h1 style="padding-left: 20px;"><?= $title?></h1>
	<form action="<?= $_SERVER['REQUEST_URI']?>" method="post">
		<div>
			<label for="txtUser">Login</label>
			<input  style="padding-left: 30px;"
                    id="txtUser" type="text" name="login" value="<?= $login?>" />
		</div>
		<div>
			<label for="txtString">Password</label>
			<input id="txtString" type="password" name="pw" />
		</div>
		<div>
            <br>
			<button style="width: 240px; height: 40px; background-color: green;
                           border: none; border-radius: 2px; font-size: 15PX;"
                    type="submit">Enter the matrix
            </button>
		</div>	
	</form>
</body>
</html>