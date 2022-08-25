<?php
$dt = date("F j, Y, g:i a");
$page = $_GET["id"] ?? "index";
$ref = $_SERVER["HTTP_REFERER"];
$ref = pathinfo($ref, PATHINFO_BASENAME);
$path = "$dt|$page|$ref\r\n";
file_put_contents("log/" . PATH_LOG, "$path", FILE_APPEND);
?>

