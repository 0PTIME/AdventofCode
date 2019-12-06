<?php

$input = file_get_contents("input/day01.txt");

$uord = str_split($input);

$floor = 0;
$cycle = 0;
$test = true;

foreach($uord as $dir){
    switch($dir)
    {
        case "(":
            $floor++;
            break;
        case ")":
            $floor--;
            break;
        default:
            echo "Something went wrong<br>";
    }
    if($test)
    {
        $cycle++;
    }
    if($floor < 0)
    {
        $test = false;
    }
}

echo $cycle . "<br>";
echo $floor;





?>