<?php
$link = mysqli_connect('localhost', 'root', '', 'web');
$result = mysqli_query($link, "SET NAMES 'utf8'");
$sql =  "SELECT name FROM teachers";
$result = mysqli_query($link, $sql);
echo mysqli_error($link);
mysqli_close($link);

// TODO(2/2) 02:50. Основные манипуляции с сервером баз данных. Запросы в sql бывают двух типов: 1) Безответные и 2) Ответные.
//  Безответные (простые) запросы это те которые не присылают в ответ таблицу. insert
//  delete, update, etc.
//  для того чтобы послать запрос используется функция mysqli_query куда вторым
//  параметром передается в виде строки запроc.  Посылаем простой запрос.
//  $result = mysqli_query($link, "SET NAMES 'utf8'"); Если запрос безответный,
//  то результатом будет значение булево типа. Результат: true или false.
//  Если мы посылаем запрос в ответ на который должны прийти данные то мы
//  используем ту же самую функцию, все то же самое
//  $result = mysqli_query($link, 'SELECT * FROM teachers'); но теперь в эту
//  переменную придет false если все плохо либо объект. то есть таблица
//  упакованная в виде объекта.


// TODO Обрабатываем результат fetch - привести или принести.
//  $row = mysqli_fetch_array($result); при этом действии
//  создаётся массив и далее для каждого поля создается два
//  элемента массива один элемент под именем второй по позиции с нуля.

$row = mysqli_fetch_array($result); // TODO Индексированный массив
$row = mysqli_fetch_array($result, MYSQLI_NUM);

// todo Ассоциативный массив
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

// todo Полная выборка: массив массивов
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($row);

// TODO Полезные функции.
//  Экранируем строки! Часто строки в базах данных передаются в апострофах, например
//  многие ирландские фамилии O'Brian O'Neil etc. Если так оставить то php не верно воспримет код.
//    Апострофы нужно экранировать. Для того что бы не пользоваться \ символом используется
//  специальная функция mysqli_real_escape_string(); Закон такой все строки пропускаются через
//  эту функцию!!!
//  .
//      Пример!
//  .
//  $name = mysqli_real_escape_string($link, "John O'Brian");
//  $sql = "INSERT INTO teachers(name, email) VALUES('$name', 'johnh@gmail.com')";