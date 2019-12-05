<?php

namespace Aoc;

class Program{
    public $layer;
    public $child;
    public $string;
    public $name;
    public $weight;
    public $programs;
    public $parent;

    public function __construct($string)
    {
        $this->string = $string;
        $elements = explode(' ', $this->string);
        $this->name = $elements[0];
        $this->weight = trim($elements[1], "() \t\n\r\0\x0B");
        $elements = array_slice($elements, 3);
        foreach($elements as $ele){
            $this->programs[trim($ele, ", \t\n\r\0\x0B")] = trim($ele, ", \t\n\r\0\x0B");
        }
        $this->parent = "def";
        $this->layer = "def";
        $this->child = "def";
    }

    public function hasPrograms(){
        // return count($this->programs) == 0 ? false : true;
        if(count($this->programs) == 0){
            return false;
        }
        else { return true; }
    }
}


?>