<?php

$input = file_get_contents("input/input.txt");
$directions = str_split($input);

$robotx = 0;
$roboty = 0;
$santax = 0;
$santay = 0;
$house[$santax][$santay] = 2;
$one_present = 1;
$santa = true;
$part = 2;

foreach($directions as $dir)
{
    if($santa)
    {
        $x = $santax;
        $y = $santay;
    }
    else
    {
        $x = $robotx;
        $y = $roboty;
    }
    switch($dir) 
    {
        case '>':
            if(isset($house[++$x][$y]))
            {
                $house[$x][$y]++;
            }
            else
            {
                $house[$x][$y] = 1;
                $one_present++;
            }
            break;

        case '^':
            if(isset($house[$x][++$y]))
            {
                $house[$x][$y]++;
            }
            else
            {
                $house[$x][$y] = 1;
                $one_present++;
            }
            break;

        case '<':
            if(isset($house[--$x][$y]))
            {
                $house[$x][$y]++;
            }
            else
            {
                $house[$x][$y] = 1;
                $one_present++;
            }
            break;

        case 'v':
            if(isset($house[$x][--$y]))
            {
                $house[$x][$y]++;
            }
            else
            {
                $house[$x][$y] = 1;
                $one_present++;
            }
            break;

        default:
            echo "SOMETHING WENT WRONG<br>";
    }
    if($santa)
    {
        $santax = $x;
        $santay = $y;
        if($part == 2)
        {
            $santa = false;
        }
    }
    else
    {
        $robotx = $x;
        $roboty = $y;
        $santa = true;
    }
}

echo $one_present;


?>