<? session_start();
$name = $_SESSION["name"];
$age = $_SESSION["age"];
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Демо сессии</title>
</head>
<body>
<h1>Демо сессии</h1>
<a href="session-1.php">Демонстрация сессии</a><br>
<a href="session_destroy.php">Закрыть сессию</a><br><br>
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
