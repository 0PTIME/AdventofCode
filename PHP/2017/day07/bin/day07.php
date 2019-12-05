<?php
namespace Aoc;
error_reporting(E_ALL);
ini_set("display_errors","On");
use Aoc\Program;

$input = file('../input/input.txt');

$test = new Program($input[0]);
var_dump($test);

// $objects = array();
// foreach($input as $stuff){
//     $obj = new Program($stuff);
//     echo $obj->string;
//     // $objects[$obj->name] = $obj;
// }
// var_dump($objects);
// foreach($objects as $temp){
//     echo "Name: " . $temp->name . "<br>";
//     echo "Weight: " . $temp->weight . "<br>";
//     echo "<br><br>";
// }

// // Creates the Relation ships for the parents and the children
// foreach($objects as $object){
//     // if the current program has programs on top of it
//     if($object->hasPrograms){
//         $keys = array_keys($object->programs);
//         // for each of them add the program that is resting on it
//         foreach($keys as $name){
//             $object->programs[$name] = $objects[$name];
//         }
//         // for each of the programs resting on it set the parent element to 
//         foreach($object->programs as $program){
//             $program->parent = $object;
//         }
//     }
//     if($object->parent == null){
//         $base = $object;
//     }
// }

// echo isset($base->name) ? $base->name : "none set :(";


?>