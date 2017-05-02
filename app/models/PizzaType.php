<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaType extends CoreModel
{
    protected $table = 'cheese';
    protected $fillable = ['id', 'name', 'calories'];
}
