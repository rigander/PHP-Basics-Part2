<!DOCTYPE HTML>

<html>
<head>
	<meta charset="utf-8" />
	<title>Хеширование MD5 и SHA1</title>
</head>

<body>
<h1>Хеширование MD5 и SHA1</h1>
<?
$str = $_GET["str"];
?>
<form action="<?=$_SERVER["PHP_SELF"]?>">
	Строка:
	<input type="text" name="str" value="<?=$str?>">
	<input type="submit" value="Hash it!">
</form>
<?
if ($str) {
	echo "<h2>MD5: ", md5($str) ,"</h2>";
	echo "<h2>SHA1: ", sha1($str) ,"</h2>";
}
?>
</body>
</html>
