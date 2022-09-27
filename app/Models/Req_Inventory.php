<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Req_Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'item_id',
        'qty',
        'status',
        'user_id'
    ];


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }
    
}
