<?php

$input = file_get_contents('./input/input.txt');

$mem = explode("\t", trim($input));
$cycles = 0;
$new = $mem;
$test = true;
$part = 2;
$log[0] = $new;
do{

    $max = max($new);
    $key = array_search($max, $new);
    $new[$key] = 0;
    while($max > 0){
        if(isset($new[++$key])){
            $new[$key]++;
            $max--;
        }
        else { $key = -1; }
    }
    if(in_array($new, $log))
    {
        $cycles++;
        if($part == 1)
        {
            break;
        }
        elseif($part == 2)
        {
            if($test)
            {
                $cycles = 0;
                $log = array();
                array_push($log, $new);
                $test = false;
            }
            else
            {
                break;
            }
        }

    }
    else
    {
        $cycles++;
        array_push($log, $new);
    }

}while($cycles < 10000);

echo $cycles;

?>