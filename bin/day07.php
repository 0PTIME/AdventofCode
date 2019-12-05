<?php
namespace Aoc;

// error_reporting(E_ALL);
// ini_set("display_errors","On");


include('../src/Program.php');
include('../src/Functions.php');

$input = file('../data/day07.txt');

$objects = array();
foreach($input as $stuff){
    $obj = new Program($stuff);
    $objects[$obj->name] = $obj;
}
defineRelationships($objects);
$root = partOne($objects);
$objects = createTree($objects, $root);




echo "Part One = " . $root . "<br>";
// partTwo($objects);





function partOne($objects){
    foreach($objects as $testing){
        if($testing->parent == "def"){
            $base = $testing;
        }
    }
    
    if(isset($base->name)){
        return $base->name;
    }
    else{
        return "none set :(";
    }
}

function partTwo($objects){
    $ends = array();
    foreach($objects as $object){
        if(count($object->programs) == 0){
            $ends[] = $object;
        }
    }

}
?>