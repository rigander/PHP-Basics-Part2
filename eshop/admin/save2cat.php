<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";
    // todo Берем данные в переменные из
    //  супер глобального массива POST.
   $title = clearStr($_POST["title"]);
   $author = clearStr($_POST["author"]);
   $pubyear = clearStr($_POST["pubyear"]);
   $price = clearStr($_POST["price"]);

    if(!addItemToCatalog($title, $author, $pubyear, $price)){
        echo 'Произошла ошибка при добавлении товара в каталог';
    }else{
        header("Location: add2cat.php");
        exit;
    }
