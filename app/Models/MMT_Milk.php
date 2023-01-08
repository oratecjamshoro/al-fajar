<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMT_Milk extends Model
{
    use HasFactory;
    protected $fillable = [
        'gv',
        'fat',
        'lr',
        'snf',
        'percentage',
        'ts',
        'temperature',
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
