<?php
//Var1
if(is_file("log/" .PATH_LOG)):
    $file = file("log/".PATH_LOG);
    echo "<ol>";
    foreach ($file as $line):
      list($dts, $page, $ref) = explode("|", $line);
      $dts = date("d-m-Y", (int)$dts);
      echo "<li>";
      echo "$dts - $ref -> $page";
      echo "</li>";
    endforeach;
    echo "</ol>";
endif;



//Var2
$file = fopen("log/path.log", "r");
$lines = [ ];
$x = 1;
while ($line = fgets($file)){
    echo $lines[ ] = $x++ . ") " . $line . "<br>";
}
fclose($file);

?>
