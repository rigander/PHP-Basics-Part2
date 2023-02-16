<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина пользователя</title>
    <link rel="stylesheet" type="text/css" href="../../inc/style.css" />
</head>
<body style="padding: 10px">
	<h1>Your purchase order</h1>
<?php
myBasket();
global $items;
if (!$items){
    echo "Корзина пуста! Вернитесь в " ?>
    <a href="catalog.php">каталог</a><br><br><?php
}else{
    echo "Вернуться в" ?><a href="catalog.php">каталог</a>;<?php
}

?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Name</th>
	<th>Author</th>
	<th>Year published</th>
	<th>Price, usd</th>
	<th>Quantity</th>
	<th>Delete</th>
</tr>
<?php
	
?>
</table>

<p>Всего товаров в корзине на сумму: usd</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







