<?php


$phrases = file_get_contents('input/input.txt');
$input = explode(PHP_EOL, $phrases);
$count = 0;
$part = 2;

if($part == 1)
{
    foreach($input as $pwd){
        $pwd = trim($pwd);
        $words = explode(' ', $pwd);
        $unique = array_unique($words);
        if($words == $unique){
            $count += 1;
        }
    }
}
elseif($part == 2)
{
    foreach($input as &$pwd)
    {
        $pwd = trim($pwd);
        $words = explode(' ', $pwd);
        foreach($words as &$word)
        {
            $str = str_split($word);
            sort($str);
            $word = implode('', $str);
        }
        $unique = array_unique($words);
        if($words == $unique){
            $count += 1;
        }
    }
}

echo $count;


?>