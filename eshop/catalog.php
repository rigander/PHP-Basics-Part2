<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
    basketInit();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог товаров</title>
    <link rel="stylesheet" type="text/css" href="../../inc/style.css" />
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?= $count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Name</th>
	<th>Author</th>
	<th>Year published</th>
	<th>Price, USD</th>
	<th>To Cart</th>
</tr>
<?php
$goods = selectAllItems();
// todo Проверки на результат отработки функции: если false
//  то ошибка, если ноль, то есть массив пуст, то сообщение empty.
if ($goods === false){echo "ERROR!"; exit;}
if (!count($goods)){echo "EMPTY"; exit;}

foreach($goods as $item){
    ?> <tr> <td><?= $item['title']?></td>
        <td><?= $item['author']?></td>
        <td><?= $item['pubyear']?></td>
        <td><?= $item['price']?></td>
        <td><a href="add2basket.php?id=<?= $item['id']?>">В
        корзину</a></td> </tr> <?php }
?>
</table>
</body>
</html>