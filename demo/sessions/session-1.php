<?
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = strip_tags($_POST["name"]);
	$age = $_POST["age"] * 1;
	
	$_SESSION["name"] = $name;
	$_SESSION["age"] = $age;
}
else {
	$name = $_SESSION["name"];
	$age = $_SESSION["age"];
}
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta charset="utf-8">
	<title>Демонстрация сессии</title>
</head>

<body>
<h1>Демонстрация сессии</h1>
<a href="session-2.php">Демо сессии</a><br>
<a href="session_destroy.php">Закрыть сессию</a><br><br>
<form action="<?=$_SERVER["PHP_SELF"]?>" 
		method="post">
	Ваше имя:
	<input type="text" name="name" value="<?=$name?>"><br>
	Ваш возраст:
	<input type="text" name="age" value="<?=$age?>"><br>
	<input type="submit" value="Передать">
</form>
<?
if ($name and $age) {	
	if ($name and $age) {
		echo "<h1>Привет, $name</h1>";
		echo "<h3>Тебе $age лет</h3>";
	}
	else {
		print "<h3>Заполните все поля!</h3>";
	}
}
?>


</body>
</html>
