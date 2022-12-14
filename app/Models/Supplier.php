<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'father_name',
        'cnic',
        'contact',
        'address',
        'photo',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }
}
