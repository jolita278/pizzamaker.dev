<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PizzaType extends CoreModel
{
    protected $table = 'pizza_type';
    protected $fillable = ['id', 'name', 'callories'];
}
