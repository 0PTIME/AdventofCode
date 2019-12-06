<?php

$input = file_get_contents("input/input.txt");

$lines= explode(PHP_EOL, $input);
$total = 0;
$ribbon = 0;

foreach($lines as $line)
{
    $nums = explode('x', $line);
    sort($nums);
    $total += ((2 * ($nums[0] * $nums[1])) + (2 * ($nums[0] * $nums[2])) + (2 * ($nums[1] * $nums[2])) + ($nums[0] * $nums[1]));
    $ribbon += ((2 * $nums[0]) + (2 * $nums[1]) + ($nums[0] * $nums[1] * $nums[2]));
}

echo $total . "<br>";
echo $ribbon;

?>