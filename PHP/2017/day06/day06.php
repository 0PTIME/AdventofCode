<?php

$input = file_get_contents('./input/input.txt');

$mem = explode("\t", $input);
$cycles = 0;
$new = $mem;
echo "<table style=\"width: 100%\">";
do{

    $max = max($new);
    echo "<tr>";
    echo "<td>max: " . $max . "</td>";
    echo "<td>iteration: " . $cycles . "</td>";
    foreach($new as $value){
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";

    $key = array_search($max, $new);
    $new[$key] = 0;
    while($max > 0){
        if(isset($new[++$key])){
            $new[$key]++;
            $max--;
        }
        else { $key = -1; }
    }
    $cycles++;
    if($cycles > 1000){
        break;
    }
}while($mem != $new);
echo "</table>";
echo $cycles;

?>