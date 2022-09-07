<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCC extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_name',
        'branch_code',
        'address',
        'phone',
        'status',
        'mcci_id'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }
}
