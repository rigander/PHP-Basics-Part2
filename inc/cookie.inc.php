<?php
$visitCounter = 0;
if (isset($_COOKIE["visitCounter"])){
    $visitCounter = $_COOKIE["visitCounter"];
    $visitCounter ++;
}
if ($visitCounter === 0){
    $visitCounter ++;
}
$lastVisit = "";
if (isset($_COOKIE["lastVisit"]))
    $lastVisit = date("d m Y h:i:s", $_COOKIE["lastVisit"]);
setcookie("visitCounter", $visitCounter, time()+3600);
setcookie("lastVisit", date("d. m. Y h:i:s"), time()+3600);

//0x7FFFFFFF - время существования куки в секундах, около 68 лет.
// Это число в шестнадцатеричном виде (2 147 483 647 в десятичном значении),
// которое представляет максимальное положительное значение для 32-разрядного
// бинарного двоичного числа.
?>

