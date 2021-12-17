<?php

namespace App;

class AreaSearch
{

    // public $id;
    // public $name;
    // public $parent;
    // public $key;

    public function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            $this->$key=$value;
            // $this->id = $value->id;
            // $this->name = $value->name;
            // $this->parent = $value->parent;
            // $this->key = $value->key;
        }
    }
}
