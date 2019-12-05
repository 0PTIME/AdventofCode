<?php



$phrases = file_get_contents('./input/input.txt');
$input = explode("\n", $phrases);
$count = 0;
foreach($input as $pwd){
    $words = explode(' ', $pwd);
    $unique = array_unique($words);
    if(count($words) === count($unique)){
        echo $pwd . "<br>";
        $count += 1;
    }
}

echo $count;


?>