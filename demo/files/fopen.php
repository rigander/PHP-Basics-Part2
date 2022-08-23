<HTML>
<HEAD>
<TITLE>fopen</TITLE>
</HEAD>
<BODY style="background-color: #2A4F6F; color: wheat; font-size: 25px;">
<?php
    $f = fopen("data.txt", "r");
    echo fread($f, 5);
    echo fread($f, 3);
        echo "<br/>";
    echo "File length " . filesize("data.txt") . " bytes";
        echo "<br/>"; // Узнав всю длину файла,
                      // указываем ее в параметрах и получаем содержимое
                      // всего файла.
    echo fread($f, 52);

    echo fpassthru($f); //выдаст всю оставшуюся длину файла.
?>
<?php
// Читаем файл построчно в массив

$file = fopen("data.txt", "r");
$lines = [];
while ( $line = fgets($file) ){
    $lines[] = $line;
}
fclose($file);
echo "<br/>";
echo "<br/>";
print_r($lines);
?>
</BODY>
</HTML>