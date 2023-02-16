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

function saveBasket(){
    // todo внутри функции как global все ссылки на любую
    //  из этих переменных будут указывать на их глобальную версию.
    //  В config.php ранее инициализирован пустой массив $basket.
    //  setcookie — отправляет cookie.
    //  0xFFFFFFF это -1,то есть время жизни куки будет бесконечным.
    //  base64_encode — Кодирует данные в формат MIME base64.
    //  serialize — генерирует пригодное для хранения представление переменной.
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie('basket',$basket, -1);
}

function basketInit(){
    // todo isset — Определяет, была ли установлена переменная значением,
    //  отличным от null.
    //  переменная $count ранее инициализирована в config.php и содержит
    //  по умолчанию число 0.
    //  функция count — подсчитывает количество элементов массива
    //  встроенная php функция uniqid() — генерирует уникальный ID,
    //  основанный на текущем времени в микросекундах. НЕ БЕЗОПАСНО!
    global $basket, $count;
    if (!isset($_COOKIE['basket'])){
        // todo если в куках не обнаружено ранее созданной корзины,
        //  то она будет создана как ассоциативный массив и первым
        //  значением будет присвоен уникальный идентификатор заказа
        //  при помощи функции uniqid(). Если массив $basket уже
        //  существует то он извлекается unserialize().
        $basket = ['orderid' => uniqid()];
        saveBasket();
    }else{
        $basket = unserialize(base64_decode($_COOKIE['basket']));
        // todo чтобы посчитать количество товаров нужно отнять 1,
        //  так как первое поле массива $basket занято не заказом
        //   а уникальным идентификатором всего заказа.
        $count = count($basket) - 1;
    }
}

function add2Basket($id){
    global $basket;
    $basket[$id] = 1;
    saveBasket();
}

function result2Array($data){
    // todo mysql_fetch_assoc — Возвращает ряд результата запроса
    //  в качестве ассоциативного массива.
    global $basket;
    $arr = [];
    while($row = mysqli_fetch_assoc($data))
    { $row['quantity'] = $basket[$row['id']];
        $arr[] = $row;
    }
    return $arr;
}
function myBasket(){
    // todo array_keys — Возвращает все или некоторое подмножество ключей массива.
    //  array_shift — Извлекает (удаляет) первый элемент массива.
    //  implode — Объединяет элементы массива в строку.
    //  mysqli_query — Выполняет запрос к базе данных.
    //  mysqli_free_result — Освобождает память от результата запроса.
    global $link, $basket;
    $goods = array_keys($basket);
    array_shift($goods);
    if (!$goods)
        return false;
    $ids = implode(",", $goods);
    $sql = "SELECT id, author, title, pubyear, price
            FROM catalog WHERE id IN ($ids)";
    if(!$result = mysqli_query($link, $sql))
        return false;
    $items = result2Array($result);
    mysqli_free_result($result);
    return $items;
}




function debugArray($array){
    $log = date('Y-m-d H:i:s') . ' ';
    $log .= str_replace(array('	', PHP_EOL), '',
        print_r($array, true));
    file_put_contents(__DIR__ . '../../debug_log.txt', $log . PHP_EOL,
        FILE_APPEND);
}

