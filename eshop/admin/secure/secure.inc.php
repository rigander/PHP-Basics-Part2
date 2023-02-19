<?php
//todo session_destroy() уничтожает все данные, связанные с текущей сессией.
//   Данная функция не удаляет какие-либо глобальные переменные,
//   связанные с сессией и не удаляет сессионные cookie.
//   Чтобы вновь использовать переменные сессии, следует вызвать session_start().
function logOut(){
    session_destroy();
    header('Location: secure/login.php');
    exit;
}
