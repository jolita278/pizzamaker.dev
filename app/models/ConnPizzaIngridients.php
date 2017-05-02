<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnPizzaIngridients extends Model
{
    protected $table = 'conn_pizza_ingridients';
    protected $fillable = ['pizza_id', 'ingridients_id'];
}
