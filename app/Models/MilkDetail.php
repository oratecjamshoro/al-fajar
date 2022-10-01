<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilkDetail extends Model
{
    use HasFactory;

    
    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }

    public function supplierdata()
    {
        return $this->hasOne('App\Models\Supplier','id','supplier');
    }
}
