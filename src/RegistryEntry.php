<?php

namespace Aoc;

class RegistryEntry{
    public $name;
    public $value;

    public function __construct($string)
    {
        $this->name = $string;
        $this->value = 0;
    }
    
}


?>