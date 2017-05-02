<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class CoreModel extends Model
{
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model)
        {
            if (!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }
}
