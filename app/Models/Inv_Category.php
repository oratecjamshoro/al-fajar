<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status'
        
   	 ];


   	 public function inv_items()
    {
        return $this->hasMany('App\Models\Inv_Item');
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }
}
