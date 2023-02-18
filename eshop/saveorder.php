<?php
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

    //todo Получаем данные из массива POST.
    $name = clearStr($_POST["name"]);
    $email = clearStr($_POST["email"]);
    $phone = clearStr($_POST["phone"]);
    $address = clearStr($_POST["address"]);

    global $basket;
    // todo Получаем идентификатор заказа oid.
    $oid = $basket["orderid"];
    $dt = time();
    $order = "$name|$email|$phone|$address|$oid|$dt\n";
    //todo file_put_contents — Пишет данные в файл. В этой функции
    //  доступны некоторые флаги:
    //  FILE_APPEND - Если файл filename уже существует,
    //  данные будут дописаны в конец файла вместо того, чтобы его перезаписать.
    //  ORDERS_LOG - имя файла, в который будут записаны данные.
    file_put_contents("admin/".ORDERS_LOG, $order, FILE_APPEND);
    saveOrder($dt);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Сохранение данных заказа</title>
    <link rel="stylesheet" type="text/css" href="../../inc/style.css" />
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>