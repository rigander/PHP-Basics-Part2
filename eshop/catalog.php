<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог товаров</title>
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

?>
</table>
</body>
</html>