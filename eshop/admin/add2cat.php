<?
require "secure/session.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Форма добавления товара в каталог</title>
    <link rel="stylesheet" type="text/css" href="../../inc/style.css" />
</head>
<body>
	<form action="save2cat.php" method="post">
		<p>Name: <input type="text" name="title" size="100">
		<p>Author: <input type="text" name="author" size="50">
		<p>Year published: <input type="text" name="pubyear" size="4">
		<p>Price: <input type="text" name="price" size="6"> usd
		<p><input type="submit" value="Add">
	</form>
</body>
</html>