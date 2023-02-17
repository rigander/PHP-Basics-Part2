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
global $count;
if (!$count){
    echo "Корзина пуста! Вернитесь в " ?>
    <a href="catalog.php">каталог</a><br><br><?php
    exit;
}else{
    echo "Вернуться в" ?><a href="catalog.php">каталог</a>;<?php
}

$goods = myBasket();

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
$i = 1;
$sum = 0;
foreach ($goods as $item){
    ?> <tr>
        <td><?= $i++?></td>
        <td><?= $item['title']?></td>
        <td><?= $item['author']?></td>
        <td><?= $item['pubyear']?></td>
        <td><?= $item['price']?></td>
        <td><?= $item['quantity']?></td>
        <td><a href="delete_from_basket.php.php?id=<?= $item['id']?>">Delete
            </a></td> </tr> <?php
        $sum += $item['price'] * $item['quantity'];
}
?>
</table>

<p>Всего товаров в корзине на сумму: <?= $sum ?> usd</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







