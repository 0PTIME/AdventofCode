<?php

$input = file('./input/input.txt');
$inputTwo = file_get_contents('./input/input.txt');

$steps = 0;
$current = 0;

// var_dump($input);

// echo "<br><br><br><br><br><br>";

$inputTwo = explode(PHP_EOL, $inputTwo);
// var_dump($inputTwo);


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













// $input = file_get_contents('./input/input.txt');

// $steps = 0;
// $current = 0;
// $input = explode(PHP_EOL, $input);

// while(isset($input[$current])){
//     $value = trim($input[$current]);
//     if($part == 1) // according to past me, all I had to do was this :)
//     {
//         $input[$current] = $value + 1;
//     }
//     elseif($part == 2)
//     {
//         // this is part 2, if you want part 1 take away the ifelse and leave what's in the else statement :)
//         if($value >= 3){
//             $input[$current] = $value -1;
//         }
//         else{
//             $input[$current] = $value + 1;
//         }
//     }        
//     $current += $value;
//     $steps++;
// }

// echo $steps;





?>