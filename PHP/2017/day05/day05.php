<?php

$input = file('./input/input.txt');

$steps = 0;
$current = 0;

while(isset($input[$current])){
    $value = $input[$current];
    // this is part 2, if you want part 1 take away the ifelse and leave what's in the else statement :)
    if($value >= 3){
        $input[$current] = $value -1;
    }
    else{
        $input[$current] = $value + 1;
    }
    $current += $value;
    $steps++;
}

echo $steps;





?>