<?php
/* Основные настройки */
// TODO Laba 8. Создаём основные константы и присваиваем им значения.
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = 'пустая строка';
const DB_NAME = "gbook";
// TODO Устанавливаем соединение с сервером базы данных MySQL,
//  выбрав необходимую для работы базу данных
$link = mysqli_connect(DB_HOST, DB_LOGIN,
    DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());

/* Сохранение записи в БД */

/* Сохранение записи в БД */

/* Удаление записи из БД */

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */

/* Вывод записей из БД */
?>