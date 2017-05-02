<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cheese extends CoreModel
{
    protected $table = 'cheese';
    protected $fillable = ['id', 'name', 'calories'];
}
