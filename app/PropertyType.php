<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $fillable=['name'];

    public $timestamps=false;
}
