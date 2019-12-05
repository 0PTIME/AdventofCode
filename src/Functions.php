<?php

namespace Aoc;


function defineRelationships($objects){
    foreach($objects as $object){
        if($object->hasPrograms()){
            $keys = array_keys($object->programs);
            foreach($keys as $name){
                $object->programs[$name] = $objects[$name];
                $object->programs[$name]->parent = $object;
            }
        }
    }
}

function createTree($objects, $root){
    $objects[$root]->child = 0;
    $objects[$root]->layer = 0;
    $parents[0] = $objects[$root];
    $newObjects[$root] = $objects[$root];
    $newParents = array();
    $break = 1;
    while($break != 0){
        $break = 0;
        foreach($parents as $parent){
            $child = 0;
            if($parent->hasPrograms()){
                $children = $parent->programs;
                foreach($children as $decendant){
                    $decendant->layer = ($parent->layer + 1);
                    $decendant->child = $child++;
                    $newObjects[$decendant->name] = $decendant;
                    if($decendant->hasPrograms()){
                        $break++;
                        $newParents[] = $decendant;
                    }
                }
            }
        }
        $parents = $newParents;
        $newParents = array();
    }
    return $newObjects;
}



?>