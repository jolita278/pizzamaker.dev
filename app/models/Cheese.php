<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheese extends CoreModel
{
    protected $table = 'cheese';
    protected $fillable = ['id', 'name', 'calories'];
}
