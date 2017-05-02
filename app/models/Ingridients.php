<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingridients extends CoreModel
{
    protected $table = 'ingridients';
    protected $fillable = ['id', 'name', 'calories'];
}
