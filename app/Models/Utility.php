<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;
    protected $fillable = [
        'generator_reading',
        'wapda_reading',
        'ssgc_reading',
        'date',
        'user_id',
        'mcc_id',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }

}
