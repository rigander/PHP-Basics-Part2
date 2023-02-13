<?php
// todo Файл Библиотека Случаев. На каждое действие: добавление, создание, выборка,
//  и т.д. будет написана своя функция.
function clearStr($data){
    // todo Функция принимает данные затем стрипит, тримит,
    //  прогоняет через escape_string и возвращает.
    global $link;
    // todo trim — Удаляет пробелы (или другие символы)
    //   из начала и конца строки.
    //  strip_tags — Удаляет теги HTML и PHP из строки.
    $data = trim(strip_tags($data));
    // todo Экранирует специальные символы в строке
    //  для использования в SQL-выражении,
    //  используя текущий набор символов соединения.
    return mysqli_real_escape_string($link, $data);
}

function clearInt($data){
    // todo Функция преобразует в int число и
    //  приводит числа к абсолютному значению
    //  (модуль числа).
    return abs((int)$data);
}

function addItemToCatalog($title, $author, $pubyear, $price){
    $sql = 'INSERT INTO catalog (title, author, pubyear, price)
            VALUES (?, ?, ?, ?)';
    // todo Импортируем глобальную переменную $link в функцию.
    global $link;
    if (!$stmt = mysqli_prepare($link, $sql)) return false;
    mysqli_stmt_bind_param($stmt, "ssii", $title, $author,
        $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function selectAllItems(){
    $sql = 'SELECT id, title, author, pubyear, price FROM catalog';
    global $link;
    // todo mysqli_query — Выполняет запрос к базе данных
    //  если запрос не исполнился мы вываливаемся из функции.
    if(!$result = mysqli_query($link, $sql)) return false;
    // todo mysql_fetch_assoc — Возвращает ряд результата запроса
    //   в качестве ассоциативного массива.
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // todo Освобождает память, занятую результатами запроса.
    mysqli_free_result($result);
    return $items;
}

