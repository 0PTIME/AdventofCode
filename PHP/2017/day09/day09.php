<?php


$input = file_get_contents('input/input.txt');
$part = 1;

$char = str_split($input);
$total = 0;
$score = 0;
$noncanceledgarbage = 0;
$garbage = false;

for($i = 0; $i < (count($char)-1); $i++)
{
    switch($char[$i])
    {
        case '{':
            if(!$garbage)
            {
                $score++;
                $total += $score;
            }
            else
            {
                $noncanceledgarbage++;
            }
            break;
        case '}':
            if(!$garbage)
            {
                $score--;
            }
            else
            {
                $noncanceledgarbage++;
            }
            break;
        case '<':
            if(!$garbage)
            {
                $garbage = true;
            }
            else
            {
                $noncanceledgarbage++;
            }
            break;
        case '>':
            if($garbage)
            {
                $garbage = false;
            }
            break;
        case '!':
            $i++;
            break;
        default:
            if($garbage)
            {
                $noncanceledgarbage++;
            }
    }
}

echo $part == 2 ? $noncanceledgarbage : $total;

?>