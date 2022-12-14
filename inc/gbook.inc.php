<?php
/* Основные настройки */
// TODO Laba 8. Создаём основные константы и присваиваем им значения.
const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'gbook';
// TODO Устанавливаем соединение с сервером базы данных MySQL,
//  выбрав необходимую для работы базу данных
$link = mysqli_connect(DB_HOST, DB_LOGIN,
    DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());

function clearStr($data){
    global $link;
   $data = trim(strip_tags($data));
   return mysqli_real_escape_string($link, $data);
}

/* Сохранение записи в БД */
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = clearStr($_POST["name"]);
    $email = clearStr($_POST["email"]);
    $msg = clearStr($_POST["msg"]);

    //TODO делаем sql запрос
    $sql = "INSERT INTO msgs (name, email, msg)
            VALUES ('$name', '$email', '$msg')";

    //TODO посылаем sql запрос
    mysqli_query($link, $sql);

    //TODO после того как послали запрос, избавляемся от буфера
    //  метода POST. Перезагружаем страничку.
    header("Location: " . $_SERVER["REQUEST_URI"]);
    exit;
}
/* Сохранение записи в БД */

/* Удаление записи из БД */
 if (isset($_GET["del"])){
    $id = abs((int)$_GET["del"]);
    if ($id){
        $sql = "DELETE FROM msgs WHERE id = $id";
        mysqli_query($link, $sql);
    }
 }
/* Удаление записи из БД */
?>
    <link rel="stylesheet" type="text/css" href="gbook_style.css" />
    <body>
        <div class="dv">
            <h3>Please leave your feedback in out guest book</h3>
            <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                Name: <br/><input type="text" name="name"/><br/>
                <br>
                Email: <br/><input type="text" name="email"/><br/>
                <br>
                Message: <br/><textarea name="msg"></textarea><br/>
                <br/>
                <input  class="btn" type="submit" value="SEND!"/>

            </form>
        </div>
    </body>
<?php
/* Вывод записей из БД */
//todo установить временную метку плюс DESC означает
// что последняя запись будет выводится первой
$sql = "SELECT id, name, email, msg,
            UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC";
$res =  mysqli_query($link, $sql);
/* Вывод записей из БД */
//todo выводим при помощи mysqli_num_rows() значение общего количества записей
echo "<p>Total amount of entries in guest book:</p>" .
    mysqli_num_rows($res);
//todo выводим эти записи при помощи цикла

while ($row = mysqli_fetch_assoc($res)){
    $dt = date("d-m-Y H:i:s", $row["dt"]);
    $msg = nl2br($row["msg"]);
    //todo сообщение выводимое на экран уложено <<< любая метка (MSG, HEREDOC etc.)
    // и в конце та же закрывающая метка MSG или HEREDOC (к примеру)
    //todo Удаление. Когда человек нажимает на ссылку. По ссылке методом GET прилетает
    // параметр del с id.
    echo <<<MSG
    <p> 
    <a href="{$row['email']}">{$row['name']}</a>
    {$dt} написал <br/>{$msg} 
     </p align="right"> 
       <a href="http://mysite.local/index.php?id=gbook&del={$row['id']}">Удалить</a>
     </p>
MSG;
}
?>