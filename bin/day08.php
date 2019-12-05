<?php

namespace Aoc;

include('../src/RegistryEntry.php');
include('../src/Functions.php');

$input = file('../data/day08.txt');

$objects = array();
// creates an registry for every unique registry name
foreach($input as $stuff){
    $ele = explode(' ', $stuff);
    if(!isset($objects[$ele[0]])){
        $obj = new RegistryEntry($ele[0]);
        $objects[$obj->name] = $obj;
    }
    if(!isset($objects[$ele[4]])){
        $obj = new RegistryEntry($ele[4]);
        $objects[$obj->name] = $obj;
    }    
}
// foreach($objects as $reg){
//     echo $reg->name;
//     echo " " . $reg->value . "<br>";
// }

$highestEver = 0;

foreach($input as $instruction){
    $ele = explode(' ', $instruction);
    switch($ele[5]){
        case ">":
            if($objects[$ele[4]]->value > $ele[6]){
                if($ele[1] == "inc"){
                    $objects[$ele[0]]->value += $ele[2];
                }
                else{
                    $objects[$ele[0]]->value -= $ele[2];
                }
                if($objects[$ele[0]]->value > $highestEver){
                    $highestEver = $objects[$ele[0]]->value;
                }
            }
            break;
        case "==":
            if($objects[$ele[4]]->value == $ele[6]){
                if($ele[1] == "inc"){
                    $objects[$ele[0]]->value += $ele[2];
                }
                else{
                    $objects[$ele[0]]->value -= $ele[2];
                }
                if($objects[$ele[0]]->value > $highestEver){
                    $highestEver = $objects[$ele[0]]->value;
                }
            }
            break;
        case ">=":
            if($objects[$ele[4]]->value >= $ele[6]){
                if($ele[1] == "inc"){
                    $objects[$ele[0]]->value += $ele[2];
                }
                else{
                    $objects[$ele[0]]->value -= $ele[2];
                }
                if($objects[$ele[0]]->value > $highestEver){
                    $highestEver = $objects[$ele[0]]->value;
                }
            }
            break;
        case "<=":
            if($objects[$ele[4]]->value <= $ele[6]){
                if($ele[1] == "inc"){
                    $objects[$ele[0]]->value += $ele[2];
                }
                else{
                    $objects[$ele[0]]->value -= $ele[2];
                }
                if($objects[$ele[0]]->value > $highestEver){
                    $highestEver = $objects[$ele[0]]->value;
                }
            }
            break;
        case "!=":
            if($objects[$ele[4]]->value != $ele[6]){
                if($ele[1] == "inc"){
                    $objects[$ele[0]]->value += $ele[2];
                }
                else{
                    $objects[$ele[0]]->value -= $ele[2];
                }
                if($objects[$ele[0]]->value > $highestEver){
                    $highestEver = $objects[$ele[0]]->value;
                }
            }
            break;
        case "<":
            if($objects[$ele[4]]->value < $ele[6]){
                if($ele[1] == "inc"){
                    $objects[$ele[0]]->value += $ele[2];
                }
                else{
                    $objects[$ele[0]]->value -= $ele[2];
                }
                if($objects[$ele[0]]->value > $highestEver){
                    $highestEver = $objects[$ele[0]]->value;
                }
            }
            break;
        default:
            echo "\"" . $ele[5] . "\" was not matched.<br><br>";
    }
}

$highest = 0;
foreach($objects as $struct){
    if($struct->value > $highest){
        $highest = $struct->value;
    }
}

echo $highest;
echo "<br>" . $highestEver;




?>