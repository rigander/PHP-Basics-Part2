<?php
$file = fopen("log/path.log", "r");
$lines = [ ];
$x = 1;
while ($line = fgets($file)){
    echo $lines[ ] = $x++ . ") " . $line . "<br>";
}
fclose($file);

?>
