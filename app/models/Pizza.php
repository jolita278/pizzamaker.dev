<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends CoreModel
{
    protected $table = 'pizza';
    protected $fillable = ['id', 'type_id', 'cheese_id'];

    public function type() {
        return $this->hasOne(PizzaType::class, 'id', 'type_id');
    }

    public function cheese() {
        return $this->hasOne(Cheese::class, 'id', 'cheese_id');
    }

//    public function connPizzaIngridients () {
//        return $this->hasMany(ConnPizzaIngridients::class, 'pizza_id', 'id')->with('ingridients');
//    }
//
//    public function ingridients () {
//        return $this->belongsToMany(Ingridients::class, 'conn_pizza_ingridients', 'pizza_id', 'ingridients_id');
//    }
}
